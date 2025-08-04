<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;

class UnitController extends Controller
{
   public function store(Request $request)
    {
        $validated = $request->validate([
            'property_id' => 'required|exists:properties,id',
            'name' => 'required|string|max:255',
            'bedroom' => 'nullable|integer|min:0',
            'kitchen' => 'nullable|integer|min:0',
            'bath' => 'nullable|integer|min:0',
            'rent' => 'required|numeric|min:0',
            'rent_type' => 'required|string|in:monthly,weekly',
            'rent_duration' => 'nullable|integer|min:1|max:30',
            'deposit_type' => 'required|string|in:fixed,percentage',
            'deposit_amount' => 'required|numeric|min:0',
            'late_fee_type' => 'required|string|in:fixed,percentage',
            'late_fee_amount' => 'required|numeric|min:0',
            'incident_receipt_amount' => 'nullable|numeric|min:0',
            'notes' => 'nullable|string|max:1000',
        ]);

        Unit::create($validated);

        return redirect()->back()->with('success', 'Unit created successfully!');
    }

}
