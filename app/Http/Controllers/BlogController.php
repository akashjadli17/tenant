<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->paginate(10);
        return view('admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blogs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'heading'            => 'required|string|max:255',
            'short_description'  => 'nullable|string',
            'description'        => 'required',
            'image'              => 'nullable|image',
            'meta_title'         => 'nullable|string|max:255',
            'meta_keywords'      => 'nullable|string|max:255',
            'meta_description'   => 'nullable|string|max:500',
            'status'             => 'required|in:active,inactive',
        ]);

        $image = null;
        if ($request->hasFile('image')) {
            $filename = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('blogs'), $filename);
            $image = $filename;
        }

        Blog::create([
            'heading'           => $request->heading,
            'slug'              => Str::slug($request->heading),
            'image'             => $image,
            'author'            => $request->author ?? 'Admin',
            'short_description' => $request->short_description,
            'description'       => $request->description,
            'meta_title'        => $request->meta_title,
            'meta_keywords'     => $request->meta_keywords,
            'meta_description'  => $request->meta_description,
            'status'            => $request->status ?? 'active',
        ]);

        return redirect()->route('blogs.index')->with('success', 'Blog created successfully.');
    }

    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)->where('status', 'active')->firstOrFail();
        return view('blog-details', compact('blog'));
    }

    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'heading'            => 'required|string|max:255',
            'short_description'  => 'nullable|string',
            'description'        => 'required',
            'image'              => 'nullable|image',
            'meta_title'         => 'nullable|string|max:255',
            'meta_keywords'      => 'nullable|string|max:255',
            'meta_description'   => 'nullable|string|max:500',
            'status'             => 'required|in:active,inactive',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($blog->image && file_exists(public_path('blogs/' . $blog->image))) {
                unlink(public_path('blogs/' . $blog->image));
            }
            $filename = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('blogs'), $filename);
            $blog->image = $filename;
        }

        $blog->update([
            'heading'           => $request->heading,
            'slug'              => Str::slug($request->heading),
            'short_description' => $request->short_description,
            'description'       => $request->description,
            'meta_title'        => $request->meta_title,
            'meta_keywords'     => $request->meta_keywords,
            'meta_description'  => $request->meta_description,
            'status'            => $request->status ?? 'active',
        ]);

        return redirect()->route('blogs.index')->with('success', 'Blog updated successfully.');
    }

    public function destroy(Blog $blog)
    {
        if ($blog->image && file_exists(public_path('blogs/' . $blog->image))) {
            unlink(public_path('blogs/' . $blog->image));
        }

        $blog->delete();
        return back()->with('success', 'Blog deleted.');
    }

    public function toggleStatus(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);
        $status = $request->status === 'active' ? 'active' : 'inactive';
        $blog->status = $status;
        $blog->save();

        return response()->json([
            'success' => true,
            'status'  => $status,
            'message' => 'Blog status updated successfully.'
        ]);
    }

    public function frontendIndex()
    {
        $blogs = Blog::where('status', 'active')->latest()->paginate(6);
        return view('blogs', compact('blogs'));
    }
}
