<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CareerDoctor;

class CareerDoctorController extends Controller
{
    // Show all job listings
    public function index()
    {
        $careers = CareerDoctor::latest()->paginate(10);
        return view('admin.careers.index', compact('careers')); // updated path
    }

       public function frontendIndex()
    {
        $careers = CareerDoctor::latest()->paginate(10);
        return view('career', compact('careers')); // updated path
    }

    

    // Show create form
    public function create()
    {
        return view('admin.careers.create'); // updated path
    }

    // Store job post
    public function store(Request $request)
    {

        
        $request->validate([
            'job_profile' => 'required|string|max:255',
            'speciality' => 'nullable|string|max:255',
            'experience' => 'nullable|string|max:100',
            'location' => 'nullable|string|max:255',
            'job_description' => 'nullable|string',
           
        ]);
 
        CareerDoctor::create($request->all());

        return redirect()->route('careers.index')->with('success', 'Job post created successfully.');
    }

    // Show edit form
    public function edit($id)
    {
        $career = CareerDoctor::findOrFail($id);
        return view('admin.careers.edit', compact('career')); // updated path
    }

    // Update job post
    public function update(Request $request, $id)
    {
        $career = CareerDoctor::findOrFail($id);

        $request->validate([
            'job_profile' => 'required|string|max:255',
            'speciality' => 'nullable|string|max:255',
            'experience' => 'nullable|string|max:100',
            'location' => 'nullable|string|max:255',
            'job_description' => 'nullable|string',
          
        ]);

        $career->update($request->all());

        return redirect()->route('careers.index')->with('success', 'Job post updated successfully.');
    }

    // Delete job post
    public function destroy($id)
    {
        $career = CareerDoctor::findOrFail($id);
        $career->delete();

        return redirect()->route('careers.index')->with('success', 'Job post deleted successfully.');
    }

    public function toggleStatus(Request $request, $id)
{
    $career = CareerDoctor::findOrFail($id);
    $career->status = $request->status;
    $career->save();

    return response()->json(['success' => true]);
}

}