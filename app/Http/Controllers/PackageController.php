<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use App\Notifications\OwnerPackagePending;
use App\Notifications\AdminPackageApproval;
use App\Notifications\OwnerPackageActivated;

class PackageController extends Controller
{
    /**
     * Admin: list packages with simple filters.
     */
    public function index(Request $request)
    {
        $packages = Package::query()
            ->when($request->filled('q'), function ($q) use ($request) {
                $q->where('package_type', 'like', '%' . $request->q . '%')
                  ->orWhere('currency', 'like', '%' . $request->q . '%');
            })
            ->when($request->filled('status'), fn ($q) => $q->where('status', (int) $request->status))
            ->orderByDesc('id')
            ->paginate(15)
            ->withQueryString();

        return view('admin.packages.index', compact('packages'));
    }

    /**
     * Admin: show create form.
     */
    public function create()
    {
        return view('admin.packages.create');
    }

    /**
     * Admin: store new package.
     */
    public function store(Request $request)
    {
        $data = $this->validatedData($request);

        $data['features']    = array_values($data['features'] ?? []);
        $data['auto_renews'] = (bool) ($data['auto_renews'] ?? false);
        $data['status']      = (bool) ($data['status'] ?? false);

        Package::create($data);

        return redirect()
            ->route('admin.packages.index')
            ->with('success', 'Package created successfully.');
    }

    /**
     * Admin: show edit form.
     */
    public function edit(Package $package)
    {
        return view('admin.packages.edit', compact('package'));
    }

    /**
     * Admin: update an existing package.
     */
    public function update(Request $request, Package $package)
    {
        $data = $this->validatedData($request);

        $data['features']    = array_values($data['features'] ?? []);
        $data['auto_renews'] = (bool) ($data['auto_renews'] ?? false);
        $data['status']      = (bool) ($data['status'] ?? false);

        $package->update($data);

        return redirect()
            ->route('admin.packages.index')
            ->with('success', 'Package updated successfully.');
    }

    /**
 * Admin: delete a package and remove its notifications.
 */
public function destroy(Package $package)
{
    // Delete notifications linked to this package
    DB::table('notifications')
        ->whereJsonContains('data->package_id', $package->id)
        ->delete();

    $package->delete();

    return back()->with('success', 'Package deleted and related notifications removed.');
}
    /**
     * Owner: choose a package (pending until approved).
     */
    public function choose(Package $package)
    {
        $user = auth()->user();

        if ($user->user_type !== 'owner') {
            abort(403, 'Unauthorized action');
        }

        // Save request with pending status
        $user->update([
            'package_id'     => $package->id,
            'package_status' => 'pending',
        ]);

        // Notify owner
        $user->notify(new OwnerPackagePending($package));

        // Notify all admins
        $admins = User::where('user_type', 'admin')->get();
        foreach ($admins as $admin) {
            $admin->notify(new AdminPackageApproval($user, $package));
        }

        return redirect()->route('dashboard')
            ->with('success', 'Package request submitted. Waiting for admin approval.');
    }

    /**
     * Admin confirm screen (GET) opened from notification.
     */
    public function approveConfirm(User $owner)
    {
        abort_unless($owner->user_type === 'owner', 404);

        $package = $owner->package; // may be null if not chosen
        return view('admin.packages.approve', compact('owner', 'package'));
    }

    /**
     * Admin actually approves (POST).
     */
    public function approve(Request $request, User $owner)
    {
        abort_unless($owner->user_type === 'owner', 404);

        $package = $owner->package;
        if (!$package) {
            return back()->with('error', 'Owner has no package request.');
        }

        // compute period (start now; or keep your logic)
        $now      = Carbon::now();
        $interval = strtolower($package->interval ?? 'month');
        $count    = (int) ($package->interval_count ?? 1);
        $trial    = (int) ($package->trial_days ?? 0);

        $startedAt = $now->copy();
        $firstExpiry = $trial > 0
            ? $startedAt->copy()->addDays($trial)
            : match ($interval) {
                'day'  => $startedAt->copy()->addDays($count),
                'week' => $startedAt->copy()->addWeeks($count),
                'year' => $startedAt->copy()->addYears($count),
                default => $startedAt->copy()->addMonthsNoOverflow($count),
            };

        $owner->update([
            'package_started_at' => $startedAt,
            'package_renews_at'  => $firstExpiry,
            'package_expires_at' => $firstExpiry,
            'package_status'     => 'active',
        ]);

        // notify owner
        $owner->notify(new OwnerPackageActivated($package));

        return redirect()
            ->route('admin.packages.index')
            ->with('success', 'Package approved and activated for ' . $owner->name . '.');
    }

    public function cancel(User $owner)
{
    if ($owner->user_type !== 'owner') {
        abort(403, 'Unauthorized');
    }

    $packageId = $owner->package_id;

    $owner->update([
        'package_id' => null,
        'package_status' => null,
        'package_started_at' => null,
        'package_expires_at' => null,
        'package_renews_at' => null,
    ]);

    // Delete notifications linked to this package
    DB::table('notifications')
        ->whereJsonContains('data->package_id', $packageId)
        ->delete();

    return back()->with('success', 'Your package has been removed and notifications cleared.');
}

    /**
     * Centralized validation to keep store/update consistent.
     */
    protected function validatedData(Request $request): array
    {
        return $request->validate([
            'package_type'   => ['required', 'string', 'max:191'],
            'price'          => ['required', 'numeric', 'min:0'],
            'interval'       => ['required', Rule::in(['day', 'week', 'month', 'year'])],
            'interval_count' => ['required', 'integer', 'min:1'],
            'auto_renews'    => ['nullable', 'boolean'],
            'trial_days'     => ['nullable', 'integer', 'min:0'],
            'total_cycles'   => ['nullable', 'integer', 'min:0'],
            'billing_cycle'  => ['nullable', Rule::in(['prepaid', 'postpaid'])],
            'currency'       => ['required', 'string', 'size:3'],
            'features'       => ['nullable', 'array'],
            'features.*'     => ['nullable', 'string'],
            'status'         => ['nullable', 'boolean'],
        ]);
    }
}