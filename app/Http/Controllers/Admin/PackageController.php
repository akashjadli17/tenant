<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::all();
        return view('admin.packages.index', compact('packages'));
    }

    public function create()
    {
        return view('admin.packages.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'package_type'   => 'required|string|max:50',
            'price'          => 'required|numeric',
            'billing_cycle'  => 'required|in:Monthly,Quarterly,Yearly,Unlimited',
            'currency'       => 'nullable|string|size:3',
            'features'       => 'nullable|array',
            'status'         => 'required|in:active,inactive',
        ]);

        $validated['features'] = json_encode($validated['features'] ?? []);

        Package::create($validated);

        return redirect()->route('admin.packages.index')->with('success', 'Package created successfully.');
    }

    public function show(Package $package)
    {
        return view('admin.packages.show', compact('package'));
    }

    public function edit(Package $package)
    {
        return view('admin.packages.edit', compact('package'));
    }

    public function update(Request $request, Package $package)
    {
        $validated = $request->validate([
            'package_type'   => 'required|string|max:50',
            'price'          => 'required|numeric',
            'billing_cycle'  => 'required|in:Monthly,Quarterly,Yearly,Unlimited',
            'currency'       => 'nullable|string|size:3',
            'features'       => 'nullable|array',
            'status'         => 'required|in:active,inactive',
        ]);

        $validated['features'] = json_encode($validated['features'] ?? []);

        $package->update($validated);

        return redirect()->route('admin.packages.index')->with('success', 'Package updated successfully.');
    }

    public function destroy(Package $package)
    {
        $package->delete();
        return redirect()->route('admin.packages.index')->with('success', 'Package deleted successfully.');
    }
}
