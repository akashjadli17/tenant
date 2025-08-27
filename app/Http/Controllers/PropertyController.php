<?php

namespace App\Http\Controllers;
use App\Models\Property;
use App\Models\Unit;
use App\Models\PropertyImage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{

public function index()
{
    $query = Property::with('units');

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
        'name'        => 'required',
        'description' => 'nullable',
        'thumbnail'   => 'nullable|image',
        'country'     => 'required',
        'state'       => 'required',
        'city'        => 'required',
        'zip_code'    => 'required',
        'address'     => 'required',
        'images.*'    => 'image|mimes:jpeg,png,jpg,webp|max:2048',
    ];

 

    $data = $request->validate($rules);

    // Thumbnail
    $thumbnailName = null;
    if ($request->hasFile('thumbnail')) {
        $thumbnailName = $request->file('thumbnail')->store('thumbnails', 'public');
    }

    // Decide owner_id safely (ignore any spoofed value by non-admin)
    $ownerId = Auth::user()->isAdmin()
        ? (int) $request->input('owner_id')
        : Auth::id();

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

    // images...
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $img) {
            $imgPath = $img->store('property_images', 'public');
            $property->images()->create(['image' => $imgPath]);
        }
    }

    return redirect()->route('properties.index')->with('success', 'Property created!');
}


    public function update(Request $request, Property $property)
    {
        $rules = [
            'type'        => 'required|in:lease,own',
            'name'        => 'required',
            'description' => 'nullable',
            'thumbnail'   => 'nullable|image',
            'country'     => 'required',
            'state'       => 'required',
            'city'        => 'required',
            'zip_code'    => 'required',
            'address'     => 'required',
        ];
 
        $data = $request->validate($rules);

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        // enforce owner again
        $data['owner_id'] = Auth::user()->isAdmin()
            ? (int) $request->input('owner_id')
            : $property->owner_id; // keep as is for non-admins

        $property->update(array_merge($data, ['added_by' => $property->added_by]));

        return back()->with('success', 'Property updated!');
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