<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CareerApplicationController extends Controller
{
    public function apply(Request $request)
    {
        // validate and save application
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'location' => 'nullable',
            'profile' => 'required',
            'message' => 'nullable',
            'resume' => 'nullable|file|mimes:pdf,doc,docx|max:2048'
        ]);

        // store logic or email logic here...

        return back()->with('success', 'Application submitted successfully.');
    }
}
