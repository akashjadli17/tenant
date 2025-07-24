<?php

namespace App\Http\Controllers;

 
use App\Models\TopCategory;  

class MenController extends Controller
{
     
    public function showMenCategories()
    {
        $topCategories = TopCategory::where('gender_id', 1)
            ->with('midCategories') 
            ->get();

        return view('men', compact('topCategories'));
    }

}
    