<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Unit;
use App\Models\PropertyImage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{
    public function index()
    {
        $query = Property::with('units', 'images');

        if (!auth()->user()->isAdmin()) {
            $query->where('owner_id', auth()->id());
        }

        $properties = $query->latest()->get();

        return view('admin.properties.index', compact('properties'));
    }

    public function create()
    {
        return view('admin.properties.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'type'        => 'required|in:lease,own',
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'thumbnail'   => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'country'     => 'required|string|max:255',
            'state'       => 'required|string|max:255',
            'city'        => 'required|string|max:255',
            'zip_code'    => 'required|string|max:20',
            'address'     => 'required|string',
            'images.*'    => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',

            // unit validation
            'unit_name'   => 'nullable|string|max:255',
            'unit_type'   => 'nullable|in:residential,commercial,other',
            'bedroom'     => 'nullable|integer|min:0',
            'kitchen'     => 'nullable|integer|min:0',
            'bath'        => 'nullable|integer|min:0',
            'cabins'      => 'nullable|integer|min:0',
            'capacity'    => 'nullable|integer|min:0',
            'size_sqft'   => 'nullable|integer|min:0',
            'rent'        => 'nullable|numeric|min:0',
            'rent_type'   => 'nullable|string|max:255',
            'rent_duration' => 'nullable|integer|min:0',
            'deposit_type'  => 'nullable|string|max:255',
            'deposit_amount'=> 'nullable|numeric|min:0',
            'late_fee_type' => 'nullable|string|max:255',
            'late_fee_amount' => 'nullable|numeric|min:0',
            'incident_receipt_amount' => 'nullable|numeric|min:0',
            'notes'       => 'nullable|string',
        ];

        $data = $request->validate($rules);

        // Thumbnail
        $thumbnailName = null;
        if ($request->hasFile('thumbnail')) {
            $thumbnailName = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        // Owner ID
        $ownerId = Auth::user()->isAdmin()
            ? (int) $request->input('owner_id')
            : Auth::id();

        // Create property
        $property = Property::create([
            'type'        => $data['type'],
            'name'        => $data['name'],
            'description' => $data['description'] ?? null,
            'thumbnail'   => $thumbnailName,
            'country'     => $data['country'],
            'state'       => $data['state'],
            'city'        => $data['city'],
            'zip_code'    => $data['zip_code'],
            'address'     => $data['address'],
            'owner_id'    => $ownerId,
            'added_by'    => Auth::id(),
        ]);

        // Property images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $img) {
                $imgPath = $img->store('property_images', 'public');
                $property->images()->create(['image' => $imgPath]);
            }
        }

        // Unit details (create only if unit_name exists)
        if ($request->filled('unit_name')) {
            $property->units()->create([
                'name'                   => $request->input('unit_name'),
                'unit_type'              => $request->input('unit_type', 'residential'),
                'bedroom'                => $request->input('bedroom', 0),
                'kitchen'                => $request->input('kitchen', 0),
                'bath'                   => $request->input('bath', 0),
                'cabins'                 => $request->input('cabins'),
                'capacity'               => $request->input('capacity'),
                'size_sqft'              => $request->input('size_sqft'),
                'rent'                   => $request->input('rent'),
                'rent_type'              => $request->input('rent_type'),
                'rent_duration'          => $request->input('rent_duration'),
                'deposit_type'           => $request->input('deposit_type', 'fixed'),
                'deposit_amount'         => $request->input('deposit_amount'),
                'late_fee_type'          => $request->input('late_fee_type', 'fixed'),
                'late_fee_amount'        => $request->input('late_fee_amount'),
                'incident_receipt_amount'=> $request->input('incident_receipt_amount'),
                'notes'                  => $request->input('notes'),
            ]);
        }

        return redirect()->route('properties.index')->with('success', 'Property created successfully!');
    }

    public function edit(Property $property)
    {
        return view('admin.properties.edit', compact('property'));
    }

    public function update(Request $request, Property $property)
    {
        $rules = [
            'type'        => 'required|in:lease,own',
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'thumbnail'   => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'country'     => 'required|string|max:255',
            'state'       => 'required|string|max:255',
            'city'        => 'required|string|max:255',
            'zip_code'    => 'required|string|max:20',
            'address'     => 'required|string',
        ];

        $data = $request->validate($rules);

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        $data['owner_id'] = Auth::user()->isAdmin()
            ? (int) $request->input('owner_id')
            : $property->owner_id;

        $property->update(array_merge($data, ['added_by' => $property->added_by]));

        return back()->with('success', 'Property updated successfully!');
    }

    public function destroy(Property $property)
    {
        // delete thumbnail if exists
        if ($property->thumbnail && Storage::disk('public')->exists($property->thumbnail)) {
            Storage::disk('public')->delete($property->thumbnail);
        }

        // delete images
        foreach ($property->images as $image) {
            if (Storage::disk('public')->exists($image->image)) {
                Storage::disk('public')->delete($image->image);
            }
            $image->delete();
        }

        // delete related units
        $property->units()->delete();

        // finally delete property
        $property->delete();

        return redirect()->route('properties.index')->with('success', 'Property deleted successfully!');
    }

    public function createUnit(Request $request)
    {
        $propertyId = $request->get('property_id');
        $properties = Property::all();
        $selectedProperty = Property::find($propertyId);
        $units = Unit::where('property_id', $propertyId)->get();

        return view('admin.units.index', compact('properties', 'propertyId', 'selectedProperty', 'units'));
    }

    public function units()
    {
        return view('admin.units.index');
    }
}
