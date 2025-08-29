<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view('index'); // your homepage
    }

    public function packages()
    {
        return view('packages'); // points to resources/views/packages.blade.php
    }
}
