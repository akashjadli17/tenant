<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tenant;
use App\Models\Property;
use App\Models\Unit;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class TenantController extends Controller
{
    public function index() {
        $tenants = Tenant::with(['property', 'unit'])->latest()->get();
        return view('tenants.index', compact('tenants'));
    }

    public function create() {
        $properties = Property::all();
        $units = Unit::all();
        return view('tenants.create', compact('properties', 'units'));
    }

public function store(Request $request) {
    $data = $request->validate([
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required|email|unique:tenants',
        'password' => 'required|min:6',
        'phone_number' => 'nullable',
        'total_family_member' => 'nullable|integer',
        'profile' => 'nullable|image|max:2048',
        'country' => 'required',
        'state' => 'required',
        'city' => 'required',
        'zip_code' => 'required',
        'address' => 'required',
        'property_id' => 'required|exists:properties,id',
        'unit_id' => 'required|exists:units,id',
        'lease_start_date' => 'required|date',
        'lease_end_date' => 'required|date',
        'documents.*' => 'nullable|file|max:4096' // For each document
    ]);

    $data['password'] = Hash::make($data['password']);

    if ($request->hasFile('profile')) {
        $data['profile'] = $request->file('profile')->store('tenant_profiles', 'public');
    }

    $tenant = Tenant::create($data);

    // Handle multiple documents
    if ($request->hasFile('documents')) {
        foreach ($request->file('documents') as $file) {
            $path = $file->store('tenant_documents', 'public');
            $tenant->documents()->create([
                'filename' => $file->getClientOriginalName(),
                'path' => $path,
            ]);
        }
    }

    return redirect()->route('tenants.index')->with('success', 'Tenant created successfully!');
}

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $tenant = Tenant::with(['property', 'unit', 'documents'])->findOrFail($id);
        return view('tenants.show', compact('tenant'));
    }


    /**
     * Show the form for editing the specified resource.
     */
   public function edit(string $id)
{
    $tenant = Tenant::with('documents')->findOrFail($id); // Fetch tenant with documents
    $properties = Property::all();
    $units = Unit::all();

    return view('tenants.edit', compact('tenant', 'properties', 'units'));
}

    /**
     * Update the specified resource in storage.
     */ 
public function update(Request $request, string $id)
{
    $tenant = Tenant::findOrFail($id);

    $data = $request->validate([
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required|email|unique:tenants,email,' . $tenant->id,
        'phone_number' => 'nullable',
        'total_family_member' => 'nullable|integer',
        'profile' => 'nullable|image|max:2048',
        'country' => 'required',
        'state' => 'required',
        'city' => 'required',
        'zip_code' => 'required',
        'address' => 'required',
        'property_id' => 'required|exists:properties,id',
        'unit_id' => 'required|exists:units,id',
        'lease_start_date' => 'required|date',
        'lease_end_date' => 'required|date',
        'documents.*' => 'nullable|file|max:4096'
    ]);

    if ($request->hasFile('profile')) {
        // Delete old profile image if exists
        if ($tenant->profile) {
            Storage::disk('public')->delete($tenant->profile);
        }

        $data['profile'] = $request->file('profile')->store('tenant_profiles', 'public');
    }

    $tenant->update($data);

    // Handle newly uploaded documents
    if ($request->hasFile('documents')) {
        foreach ($request->file('documents') as $file) {
            $path = $file->store('tenant_documents', 'public');
            $tenant->documents()->create([
                'filename' => $file->getClientOriginalName(),
                'path' => $path,
            ]);
        }
    }

    return redirect()->route('tenants.index')->with('success', 'Tenant updated successfully!');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
