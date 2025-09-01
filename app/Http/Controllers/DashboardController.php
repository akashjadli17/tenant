<?php

namespace App\Http\Controllers;

use App\Notifications\PackageExpiringSoon;
use App\Notifications\OwnerPackageActivated;
use App\Notifications\TenantPackageNotification;
use App\Models\Package;
use App\Models\Property;
use App\Models\Unit;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Common variables
        $totalProperties = 0;
        $totalUnits      = 0;
        $totalInvoice    = 0;
        $totalExpense    = 0;
        $packages        = collect();
        $showPackages    = false;
        $daysLeft        = null;

        if ($user->user_type === 'admin') {
            // Full stats
            $totalProperties = Property::count();
            $totalUnits      = Unit::count();

            $showPackages = $user->shouldSeePackageChooser(10);
            $daysLeft     = $user->daysUntilPackageExpires();

            $packages = $showPackages
                ? Package::where('status', 1)->orderBy('price')->get()
                : collect();

            // Notify if package expiring soon
            if (!is_null($daysLeft) && $daysLeft > 0 && $daysLeft <= 10) {
                $already = $user->notifications()
                    ->where('type', PackageExpiringSoon::class)
                    ->whereJsonContains('data->expires_at', optional($user->package_expires_at)->toDateString())
                    ->exists();

                if (!$already) {
                    $user->notify(new PackageExpiringSoon($user->package_expires_at, $daysLeft));
                }
            }
        }

            if ($user->user_type === 'owner') {
                // Only owner’s properties/units
                $totalProperties = Property::where('owner_id', $user->id)->count();
                $totalUnits      = Unit::whereIn(
                    'property_id',
                    Property::where('owner_id', $user->id)->pluck('id')
                )->count();

                // --- Package logic (same as admin) ---
                $daysLeft = $user->daysUntilPackageExpires();
                $showPackages = $user->shouldSeePackageChooser(10);

                $packages = $showPackages
                    ? Package::where('status', 1)->orderBy('price')->get()
                    : collect();

                // 🔔 Notify Owner if package is expiring soon
                if (!is_null($daysLeft) && $daysLeft > 0 && $daysLeft <= 10) {
                    $already = $user->notifications()
                        ->where('type', \App\Notifications\PackageExpiringSoon::class)
                        ->whereJsonContains('data->expires_at', optional($user->package_expires_at)->toDateString())
                        ->exists();

                    if (!$already) {
                        $user->notify(new \App\Notifications\PackageExpiringSoon($user->package_expires_at, $daysLeft));
                    }
                }
            }



        if ($user->user_type === 'tenant') {
            // Only tenant’s unit
            $totalProperties = 0;
            $totalUnits      = Unit::where('tenant_id', $user->id)->count();
        }

        return view('admin.dashboard', compact(
            'totalProperties',
            'totalUnits',
            'totalInvoice',
            'totalExpense',
            'packages',
            'showPackages',
            'daysLeft',
            'user'
        ));
    }

  public function choosePackage(Package $package)
{
    $user = auth()->user();

    // Only owner can choose package (if admin only, adjust accordingly)
    if ($user->user_type !== 'owner') {
        abort(403, 'Unauthorized action');
    }

    $now   = Carbon::now();
    $interval = strtolower($package->interval ?? 'month');   
    $count    = (int) ($package->interval_count ?? 1);
    $trial    = (int) ($package->trial_days ?? 0);

    $packageStartedAt = $now->copy();

    if ($trial > 0) {
        $firstExpiry = $packageStartedAt->copy()->addDays($trial);
    } else {
        $firstExpiry = match ($interval) {
            'day'   => $packageStartedAt->copy()->addDays($count),
            'week'  => $packageStartedAt->copy()->addWeeks($count),
            'year'  => $packageStartedAt->copy()->addYears($count),
            default => $packageStartedAt->copy()->addMonthsNoOverflow($count),
        };
    }

    $user->update([
        'package_id'         => $package->id,
        'package_started_at' => $packageStartedAt,
        'package_renews_at'  => $firstExpiry,
        'package_expires_at' => $firstExpiry,
    ]);

    // 🔔 Notify Owner
    $user->notify(new \App\Notifications\OwnerPackageActivated($package));

    // 🔔 Notify Admin(s)
    $admins = \App\Models\User::where('user_type', 'admin')->get();
    foreach ($admins as $admin) {
        $admin->notify(new \App\Notifications\AdminPackageApproval($user, $package));
    }

    // 🔔 Notify Tenant(s) (if needed)
    $tenants = \App\Models\User::where('user_type', 'tenant')->get();
    foreach ($tenants as $tenant) {
        $tenant->notify(new \App\Notifications\TenantPackageNotification($user, $package));
    }

    return redirect()->route('dashboard')->with('success', 'Package applied successfully.');
}

}