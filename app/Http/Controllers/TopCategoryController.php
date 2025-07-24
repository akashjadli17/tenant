<?php

namespace App\Http\Controllers;

use App\Models\TopCategory;
use Illuminate\Http\Request;

class TopCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $topCategories = TopCategory::all();
        return view('admin.top-categories.index', compact('topCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.top-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'gender_id' => 'required|in:1,2',
            'name' => 'required|string|max:100|unique:top_categories,name,NULL,id,gender_id,' . $request->gender_id,
        ]);

        TopCategory::create([
            'gender_id' => $request->gender_id,
            'name' => $request->name,
        ]);

        return redirect()->route('top-categories.index')->with('success', 'Top category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(TopCategory $topCategory)
    {
        return view('admin.top-categories.show', compact('topCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TopCategory $topCategory)
    {
        return view('admin.top-categories.edit', compact('topCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TopCategory $topCategory)
    {
        $request->validate([
            'gender_id' => 'required|in:1,2',
            'name' => 'required|string|max:100|unique:top_categories,name,' . $topCategory->id . ',id,gender_id,' . $request->gender_id,
        ]);

        $topCategory->update([
            'gender_id' => $request->gender_id,
            'name' => $request->name,
        ]);

        return redirect()->route('top-categories.index')->with('success', 'Top category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TopCategory $topCategory)
    {
        $topCategory->delete();

        return redirect()->route('top-categories.index')->with('success', 'Top category deleted successfully.');
    }
}
