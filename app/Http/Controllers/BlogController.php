<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

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
            'title'   => 'required',
            'image'   => 'nullable|image',
            'content' => 'required',
        ]);

        $image = null;

        if ($request->hasFile('image')) {
            $filename = $request->file('image')->hashName();
            $request->file('image')->storeAs('blogs', $filename, 'public');
            $image = $filename; // Save only filename
        }

        Blog::create([
            'title'   => $request->title,
            'slug'    => Str::slug($request->title),
            'image'   => $image,
            'content' => $request->content,
            'status'  => $request->status ?? 'active',
        ]);

        return redirect()->route('blogs.index')->with('success', 'Blog created successfully.');
    }

    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        return view('blog-details', compact('blog'));
    }

    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title'   => 'required',
            'image'   => 'nullable|image',
            'content' => 'required',
        ]);

        if ($request->hasFile('image')) {
            // Optional: Delete old image
            if ($blog->image && Storage::disk('public')->exists('blogs/' . $blog->image)) {
                Storage::disk('public')->delete('blogs/' . $blog->image);
            }

            $filename = $request->file('image')->hashName();
            $request->file('image')->storeAs('blogs', $filename, 'public');
            $blog->image = $filename;
        }

        $blog->update([
            'title'   => $request->title,
            'slug'    => Str::slug($request->title),
            'content' => $request->content,
            'status'  => $request->status ?? 'active',
        ]);

        return redirect()->route('blogs.index')->with('success', 'Blog updated.');
    }

    public function destroy(Blog $blog)
    {
        // Optional: Delete image from storage
        if ($blog->image && Storage::disk('public')->exists('blogs/' . $blog->image)) {
            Storage::disk('public')->delete('blogs/' . $blog->image);
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
