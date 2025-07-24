<?php

namespace App\Http\Controllers;

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
        $data = $request->validate([
            'package_type' => 'required|string|max:100',
            'title' => 'required|string|max:255',
            'package_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'original_price' => 'required|numeric',
            'discounted_price' => 'required|numeric',
            'features' => 'required|string', // JSON string from frontend
        ]);

        // Handle Image Upload
        if ($request->hasFile('package_image')) {
            $image = $request->file('package_image')->store('packages', 'public');
            $data['package_image'] = $image;
        }

        // Decode features JSON string into PHP array
        $data['features'] = json_decode($data['features'], true);

        Package::create($data);

        return redirect()->route('packages.index')->with('success', 'Package created successfully.');
    }

    public function edit(Package $package)
    {
        return view('admin.packages.edit', compact('package'));
    }

    public function update(Request $request, Package $package)
    {
        $data = $request->validate([
            'package_type' => 'required|string|max:100',
            'title' => 'required|string|max:255',
            'package_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'original_price' => 'required|numeric',
            'discounted_price' => 'required|numeric',
            'features' => 'required|string', // JSON string again from frontend
        ]);

        // Handle Image Upload
        if ($request->hasFile('package_image')) {
            $image = $request->file('package_image')->store('packages', 'public');
            $data['package_image'] = $image;
        }

        // Decode features JSON string into PHP array
        $data['features'] = json_decode($data['features'], true);

        $package->update($data);

        return redirect()->route('packages.index')->with('success', 'Package updated successfully.');
    }

    public function destroy(Package $package)
    {
        $package->delete();
        return redirect()->route('packages.index')->with('success', 'Package deleted successfully.');
    }

    public function toggleStatus($id)
    {
        $package = Package::findOrFail($id);
        $package->status = $package->status === 'active' ? 'inactive' : 'active';
        $package->save();

        return response()->json([
            'status' => 'success',
            'new_status' => $package->status
        ]);
    }
   public function showPackages()
{
    $packages = Package::where('status', 'active')->get(); // Fetch only active packages
    return view('packages', compact('packages')); // Match the Blade view name
}
public function uploadImage(Request $request, $id)
{
    $request->validate([
        'package_image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    $package = Package::findOrFail($id);

    // Store new image
    $imagePath = $request->file('package_image')->store('packages', 'public');

    // Optionally delete old image here (if needed)
    // Storage::disk('public')->delete($package->package_image);

    $package->package_image = $imagePath;
    $package->save();

    return response()->json([
        'success' => true,
        'image_url' => asset('storage/' . $imagePath)
    ]);
}


}