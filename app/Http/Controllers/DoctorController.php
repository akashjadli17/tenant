<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::latest()->paginate(10);
        return view('admin.doctors.index', compact('doctors'));
    }

    public function create()
    {
        return view('admin.doctors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'dr_name'         => 'required|string|max:255',
            'dr_introduction' => 'nullable|string',
            'image'           => 'nullable|image',
            'phone'           => 'nullable|string|max:20',
            'email'           => 'nullable|email|max:255',
            'speciality'      => 'nullable|string|max:255',
            'experience'      => 'nullable|string|max:100',
            'degree'          => 'nullable|string|max:255',
        ]);

        $image = null;
        if ($request->hasFile('image')) {
            $filename = $request->file('image')->hashName();
            $request->file('image')->storeAs('doctors', $filename, 'public');
            $image = $filename;
        }

        Doctor::create([
            'dr_name'         => $request->dr_name,
            'dr_introduction' => $request->dr_introduction,
            'image'           => $image,
            'phone'           => $request->phone,
            'email'           => $request->email,
            'speciality'      => $request->speciality,
            'experience'      => $request->experience,
            'degree'          => $request->degree,
            'status'          => $request->status ?? 'active',
        ]);

        return redirect()->route('doctor_details.index')->with('success', 'Doctor added successfully.');
    }

    public function show(Doctor $doctor_detail)
    {
        return view('admin.doctors.show', ['doctor' => $doctor_detail]);
    }

    public function edit(Doctor $doctor_detail)
    {
        return view('admin.doctors.edit', ['doctor' => $doctor_detail]);
    }

    public function update(Request $request, Doctor $doctor_detail)
    {
        $request->validate([
            'dr_name'         => 'required|string|max:255',
            'dr_introduction' => 'nullable|string',
            'image'           => 'nullable|image',
            'phone'           => 'nullable|string|max:20',
            'email'           => 'nullable|email|max:255',
            'speciality'      => 'nullable|string|max:255',
            'experience'      => 'nullable|string|max:100',
            'degree'          => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            $filename = $request->file('image')->hashName();
            $request->file('image')->storeAs('doctors', $filename, 'public');
            $doctor_detail->image = $filename;
        }

        $doctor_detail->update([
            'dr_name'         => $request->dr_name,
            'dr_introduction' => $request->dr_introduction,
            'phone'           => $request->phone,
            'email'           => $request->email,
            'speciality'      => $request->speciality,
            'experience'      => $request->experience,
            'degree'          => $request->degree,
            'status'          => $request->status ?? 'active',
        ]);

        return redirect()->route('doctor_details.index')->with('success', 'Doctor updated successfully.');
    }

    public function destroy(Doctor $doctor_detail)
    {
        $doctor_detail->delete();
        return back()->with('success', 'Doctor deleted successfully.');
    }

    public function toggleStatus(Request $request, $id)
{
    $doctor = Doctor::findOrFail($id);

    $status = $request->input('status') === 'active' ? 'active' : 'inactive';
    $doctor->status = $status;
    $doctor->save();

    return response()->json([
        'success' => true,
        'status' => $status,
        'message' => 'Doctor status updated successfully.'
    ]);
}

   
    public function frontendShow(Doctor $doctor)
    {
        return view('doctor-details', compact('doctor'));
    }

    public function uploadImage(Request $request, $id)
{
    $doctor = Doctor::findOrFail($id);

    if ($request->hasFile('image')) {
        $filename = $request->file('image')->hashName();
        $request->file('image')->storeAs('doctors', $filename, 'public');
        $doctor->image = $filename;
        $doctor->save();

        return response()->json([
            'success' => true,
            'image_url' => asset('storage/doctors/' . $filename)
        ]);
    }

    return response()->json(['success' => false], 400);
}

    
}