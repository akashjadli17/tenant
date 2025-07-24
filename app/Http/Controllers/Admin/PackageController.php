<?php
namespace App\Http\Controllers\Admin; 
use App\Models\Package;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 

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
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'max_data_mb' => 'required|integer',
            'max_properties' => 'required|integer',
            'duration_months' => 'required|integer',
        ]);

        Package::create($request->all());

        return redirect()->route('admin.packages.index')->with('success', 'Package created');
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
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'max_data_mb' => 'required|integer',
            'max_properties' => 'required|integer',
            'duration_months' => 'required|integer',
        ]);

        $package->update($request->all());

        return redirect()->route('admin.packages.index')->with('success', 'Package updated');
    }

    public function destroy(Package $package)
    {
        $package->delete();

        return redirect()->route('admin.packages.index')->with('success', 'Package deleted');
    }
}
