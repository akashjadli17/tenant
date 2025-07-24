<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\Service;
use App\Models\MidCategory;
use App\Models\TopCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
 
class ServiceController extends Controller
{
public function index(Request $request)
{
    // Start query with relationships
    $query = Service::with('midCategory.topCategory.gender');

    // Apply filters based on request input
    if ($request->filled('gender_id')) {
        $query->whereHas('midCategory.topCategory.gender', function ($q) use ($request) {
            $q->where('id', $request->gender_id);
        });
    }

    if ($request->filled('top_category_id')) {
        $query->whereHas('midCategory.topCategory', function ($q) use ($request) {
            $q->where('id', $request->top_category_id);
        });
    }

    if ($request->filled('mid_category_id')) {
        $query->whereHas('midCategory', function ($q) use ($request) {
            $q->where('id', $request->mid_category_id);
        });
    }

    // Get filtered services
    $services = $query->get();

    // Fetch dropdown data
    $topCategories = TopCategory::with('gender')->get();
    $midCategories = MidCategory::all();
    $genders = \App\Models\Gender::all();

    return view('admin.services.index', compact('services', 'topCategories', 'midCategories', 'genders'));
}


    public function create()
    {
        $topCategories = TopCategory::all();
        return view('admin.services.create', compact('topCategories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'mid_category_id' => 'required|exists:mid_categories,id',
            'name' => 'required|string|max:255',
            'price' => 'nullable|numeric',
            'rating' => 'nullable|numeric|max:5',
            'duration' => 'nullable|string',
            'image' => 'nullable|image',
            'video' => 'nullable|file|mimes:mp4,mov,avi,wmv',
            'highlight_points' => 'nullable|string',
            'overview' => 'nullable|string',
            'how_it_works_titles' => 'nullable|array',
            'how_it_works_images.*' => 'nullable|image',
            'faq_questions' => 'nullable|array',
            'faq_answers' => 'nullable|array',
        ]);

        // 🛠 Ensure manually: These might be missed if only checked but not added
        $validated['mid_category_id'] = $request->input('mid_category_id');

        // ✅ Handle Image
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('services/images', 'public');
            $validated['image'] = basename($path);
        }

        // ✅ Handle Video
        if ($request->hasFile('video')) {
            $path = $request->file('video')->store('services/videos', 'public');
            $validated['video'] = basename($path);
        }

        // ✅ How It Works (array of title/image)
        $howItWorks = [];
        if ($request->has('how_it_works_titles')) {
            foreach ($request->how_it_works_titles as $index => $title) {
                $img = null;
                if ($request->hasFile("how_it_works_images.$index")) {
                    $imgPath = $request->file("how_it_works_images.$index")->store('services/how_it_works', 'public');
                    $img = basename($imgPath);
                }
                $howItWorks[] = ['title' => $title, 'image' => $img];
            }
        }
        $validated['how_it_works'] = $howItWorks;

        // ✅ FAQ Section
        $faqList = [];
        if ($request->has('faq_questions')) {
            foreach ($request->faq_questions as $index => $q) {
                $faqList[] = [
                    'question' => $q,
                    'answer' => $request->faq_answers[$index] ?? ''
                ];
            }
        }
        $validated['faqs'] = $faqList; 

        // ✅ Default status (optional)
        $validated['action'] = 'active';

        // ✅ Final Create
        Service::create($validated);

        return redirect()->route('services.index')->with('success', 'Service created successfully.');
    }


   public function edit(Service $service)
{
    // Load relationships
    $service->load('midCategory.topCategory.gender');

    // ✅ Decode JSON columns
   $service->load('midCategory.topCategory.gender'); // this is fine


    // All top categories (for dropdown)
    $topCategories = TopCategory::all();

    return view('admin.services.edit', compact('service', 'topCategories'));
}


    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'mid_category_id' => 'required|exists:mid_categories,id',
            'name' => 'required|string|max:255',
            'price' => 'nullable|numeric',
            'rating' => 'nullable|numeric|max:5',
            'duration' => 'nullable|string',
            'image' => 'nullable|image',
            'video' => 'nullable|file|mimes:mp4,mov,avi,wmv',
            'highlight_points' => 'nullable|string',
            'overview' => 'nullable|string',
        ]);

        // ✅ Image upload
        if ($request->hasFile('image')) {
            if ($service->image) {
                Storage::disk('public')->delete('services/images/' . $service->image);
            }
            $validated['image'] = $request->file('image')->store('services/images', 'public');
            $validated['image'] = basename($validated['image']);
        }

        // ✅ Video upload
        if ($request->hasFile('video')) {
            if ($service->video) {
                Storage::disk('public')->delete('services/videos/' . $service->video);
            }
            $validated['video'] = $request->file('video')->store('services/videos', 'public');
            $validated['video'] = basename($validated['video']);
        }

        // ✅ How It Works
        $howItWorks = [];
        $titles = $request->how_it_works_titles ?? [];
        $images = $request->file('how_it_works_images', []);
        foreach ($titles as $index => $title) {
            $imgPath = null;
            if (!empty($images[$index])) {
                $imgPath = $images[$index]->store('services/how_it_works', 'public');
                $imgPath = basename($imgPath);
            }
            $howItWorks[] = ['title' => $title, 'image' => $imgPath];
        }
     $validated['how_it_works'] = $howItWorks; 

        // ✅ FAQ Section
        $faqs = [];
        $questions = $request->faq_questions ?? [];
        $answers = $request->faq_answers ?? [];
        foreach ($questions as $index => $q) {
            $faqs[] = ['question' => $q, 'answer' => $answers[$index] ?? ''];
        }
  $validated['faqs'] = $faqs; 

        // ✅ Update only allowed fields
        $service->update($validated);

        return redirect()->route('services.index')->with('success', 'Service updated successfully.');
    }



    public function destroy(Service $service)
    {
        if ($service->image) Storage::disk('public')->delete($service->image);
        if ($service->video) Storage::disk('public')->delete($service->video);

        $service->delete();
        return redirect()->route('services.index')->with('success', 'Service deleted successfully.');
    }

    public function toggleStatus($id)
    {
        $service = Service::findOrFail($id);
        $service->action = $service->action === 'active' ? 'inactive' : 'active';
        $service->save();

        return response()->json([
            'status' => 'success',
            'action' => $service->action
        ]);
    }



    //frontend
        

public function services($gender, $midSlug)
{
    // Find MidCategory by Slug
   $midCategory = MidCategory::whereRaw('LOWER(REPLACE(name, " ", "-")) = ?', [$midSlug])
    ->whereHas('topCategory.gender', function ($query) use ($gender) {
        $query->whereRaw('LOWER(name) = ?', [strtolower($gender)]);
    })
    ->with('topCategory.gender')
    ->first();



    if (!$midCategory) {
        abort(404, 'Mid Category not found');
    }
  
    // Check gender match
    if (
        !$midCategory->topCategory ||
        !$midCategory->topCategory->gender ||
        strtolower($midCategory->topCategory->gender->name) !== strtolower($gender)
    ) 
    {  
        abort(404, 'Gender mismatch for Mid Category');
    }

    // Get all services under this MidCategory
    $services = Service::where('mid_category_id', $midCategory->id)->get();
    
    return view('services-list', compact('services', 'midCategory'));
}



   public function serviceDetail($slug)
    {
        $service = Service::get()->first(function ($item) use ($slug) {
            return Str::slug($item->name) === $slug;
        });

        if (!$service) {
            abort(404, 'Service not found');
        }

        return view('service-detail', compact('service'));
    }


    
 
    
}