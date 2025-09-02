<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Blog;

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

    public function blog(Request $request)
{
    $blogs = Blog::where('status', 'active')
                 ->latest()
                 ->paginate(6); // 6 per page

    return view('blog', compact('blogs'));
}

public function blogDetails($slug)
{
    $blog = Blog::where('slug', $slug)
                ->where('status', 'active')
                ->firstOrFail();

    $recentBlogs = Blog::where('status', 'active')
                       ->where('id', '!=', $blog->id)
                       ->latest()
                       ->take(3)
                       ->get();

    return view('blog-details', compact('blog', 'recentBlogs'));
}

}