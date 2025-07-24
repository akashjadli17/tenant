<?php

namespace App\Http\Controllers;

 
use App\Models\TopCategory;  

class WomenController extends Controller
{
     
    public function showWomenCategories()
    {
        $topCategories = TopCategory::where('gender_id', 2)
            ->with('midCategories') 
            ->get();

        return view('women', compact('topCategories'));
    }

}
