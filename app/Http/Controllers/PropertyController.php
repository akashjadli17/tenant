<?php

namespace App\Http\Controllers;
use App\Models\Property;
use App\Models\Unit;
use App\Models\PropertyImage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PropertyController extends Controller
{

    public function index()
    {
        $properties = Property::with('units')->orderBy('created_at', 'desc')->get();

        return view('admin.properties.index', compact('properties'));
    }

    public function create()
    {
        return view('admin.properties.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'name' => 'required',
            'description' => 'nullable',
            'thumbnail' => 'nullable|image',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'zip_code' => 'required',
            'address' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        // Store thumbnail
        $thumbnailName = null;
        if ($request->hasFile('thumbnail')) {
            $thumbnailName = $request->thumbnail->store('thumbnails', 'public');
        }

        // Store property
        $property = Property::create([
            'type' => $request->type,
            'name' => $request->name,
            'description' => $request->description,
            'thumbnail' => $thumbnailName,
            'country' => $request->country,
            'state' => $request->state,
            'city' => $request->city,
            'zip_code' => $request->zip_code,
            'address' => $request->address,
        ]);

        // Store images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $img) {
                $imgPath = $img->store('property_images', 'public');
                $property->images()->create(['image' => $imgPath]);
            }
        }

        // Store unit (optional — if unit fields are in same form)
        if ($request->filled('unit_name')) {
            Unit::create([
                'property_id' => $property->id,
                'name' => $request->unit_name,
                'bedroom' => $request->bedroom,
                'kitchen' => $request->kitchen,
                'bath' => $request->bath,
                'rent' => $request->rent,
                'rent_type' => $request->rent_type,
                'rent_duration' => $request->rent_duration,
                'deposit_type' => $request->deposit_type,
                'deposit_amount' => $request->deposit_amount,
                'late_fee_type' => $request->late_fee_type,
                'late_fee_amount' => $request->late_fee_amount,
                'incident_receipt_amount' => $request->incident_receipt_amount,
                'notes' => $request->notes,
            ]);
        }

        return redirect()->route('properties.index')->with('success', 'Property created!');
    }
    
    
public function createUnit(Request $request)
{
    $propertyId = $request->get('property_id');
    $properties = Property::all();
    $selectedProperty = Property::find($propertyId); // ✅ get the specific one

    $units = Unit::where('property_id', $propertyId)->get();

    return view('admin.units.index', compact('properties', 'propertyId', 'selectedProperty', 'units'));
}


    // Optional: units page
    public function units()
    {
        return view('admin.units.index');
    }
}