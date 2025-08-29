<?php

namespace App\Http\Controllers\admin; // note: 'admin' matches your error path

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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

        // Cast/normalize a few fields for safety
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
     * Admin: delete a package.
     */
    public function destroy(Package $package)
    {
        $package->delete();

        return back()->with('success', 'Package deleted.');
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
            'currency'       => ['required', 'string', 'size:3'], // e.g. 'USD', 'INR'
            'features'       => ['nullable', 'array'],
            'features.*'     => ['nullable', 'string'],
            'status'         => ['nullable', 'boolean'], // 1=active, 0=inactive
        ]);
    }
}
