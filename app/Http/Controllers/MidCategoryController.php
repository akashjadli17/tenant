<?php

namespace App\Http\Controllers;


use App\Models\MidCategory;
use App\Models\TopCategory;
use Illuminate\Http\Request;

class MidCategoryController extends Controller
{
    /**
     * Display a listing of the mid categories.
     */
    public function index()
    {
        $midCategories = MidCategory::with('topCategory')->get();
        return view('admin.mid-categories.index', compact('midCategories'));
    }

    /**
     * Show the form for creating a new mid category.
     */
    public function create()
    {
        $topCategories = TopCategory::with('gender')->get(); // includes gender for dropdown labels
        return view('admin.mid-categories.create', compact('topCategories'));
    }

    /**
     * Store a newly created mid category in storage.
     */
public function store(Request $request)
{
    $request->validate([
        'top_category_id' => 'required|exists:top_categories,id',
        'name' => 'required|string|max:100|unique:mid_categories,name,NULL,id,top_category_id,' . $request->top_category_id,
        'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
    ]);

    $data = $request->only(['top_category_id', 'name']);

    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('uploads/mid_categories', $filename, 'public');

        $data['image'] = $filename; // ✅ only filename saved
    }

    MidCategory::create($data);

    return redirect()->route('mid-categories.index')->with('success', 'Mid Category created successfully.');
}


    /**
     * Show the form for editing the specified mid category.
     */
    public function edit(MidCategory $midCategory)
    {
        $topCategories = TopCategory::with('gender')->get();
        return view('admin.mid-categories.edit', compact('midCategory', 'topCategories'));
    }

    /**
     * Update the specified mid category in storage.
     */
public function update(Request $request, MidCategory $midCategory)
{
    $request->validate([
        'top_category_id' => 'required|exists:top_categories,id',
        'name' => 'required|string|max:100|unique:mid_categories,name,' . $midCategory->id . ',id,top_category_id,' . $request->top_category_id,
        'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
    ]);

    $data = $request->only(['top_category_id', 'name']);

    if ($request->hasFile('image')) {
        // Delete old image if exists
        if ($midCategory->image && \Storage::disk('public')->exists('uploads/mid_categories/' . $midCategory->image)) {
            \Storage::disk('public')->delete('uploads/mid_categories/' . $midCategory->image);
        }

        $file = $request->file('image');
        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('uploads/mid_categories', $filename, 'public');

        $data['image'] = $filename; // ✅ only filename saved
    }

    $midCategory->update($data);

    return redirect()->route('mid-categories.index')->with('success', 'Mid Category updated successfully.');
}


    /**
     * Remove the specified mid category from storage.
     */
    public function destroy(MidCategory $midCategory)
    {
        $midCategory->delete();
        return redirect()->route('mid-categories.index')->with('success', 'Mid Category deleted successfully.');
    }

    public function getTopCategories($genderId)
    {
        $topCategories = TopCategory::where('gender_id', $genderId)->get();

        return response()->json($topCategories);
    }


    public function uploadImage(Request $request, MidCategory $midCategory)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        // Delete old image
        if ($midCategory->image && \Storage::disk('public')->exists('uploads/mid_categories/' . $midCategory->image)) {
            \Storage::disk('public')->delete('uploads/mid_categories/' . $midCategory->image);
        }

        $file = $request->file('image');
        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('uploads/mid_categories', $filename, 'public');

        $midCategory->update(['image' => $filename]);

        return response()->json([
            'success' => true,
            'image_url' => asset('storage/uploads/mid_categories/' . $filename),
        ]);
    }


}