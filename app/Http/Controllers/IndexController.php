<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;

class IndexController extends Controller
{
    public function index()
    {
        return view('index'); // your homepage
    }

    public function packages(Request $request)
    {
        $packages = Package::query()
            ->where('status', 'active') // only active plans
            ->orderBy('price')
            ->get();

        return view('packages', compact('packages'));
    }
}
