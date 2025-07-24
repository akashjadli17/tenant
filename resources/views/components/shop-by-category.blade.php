@php
use Illuminate\Support\Str;

$categorySlug = Str::slug($top_category); // e.g., 'skin-concern'

// Get female and male mid categories
$femaleMid = \App\Models\MidCategory::whereHas('topCategory', function($query) use ($top_category) {
$query->where('name', $top_category)->whereHas('gender', fn($q) => $q->where('name', 'Women'));
})->get();

$maleMid = \App\Models\MidCategory::whereHas('topCategory', function($query) use ($top_category) {
$query->where('name', $top_category)->whereHas('gender', fn($q) => $q->where('name', 'Men'));
})->get();
@endphp

@if($femaleMid->count() || $maleMid->count())
<section class="bg py-5">
    <div class="container">
        <div class="text-center mb-4">
            <h2 class="site-title pt-3">SHOP BY {{ strtoupper($top_category) }}</h2>
        </div>

        <!-- Nav Pills -->
        <ul class="nav nav-pills justify-content-center mb-4" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="{{ $categorySlug }}-female-tab" data-bs-toggle="pill"
                    data-bs-target="#{{ $categorySlug }}-female" type="button" role="tab" aria-selected="true"
                    style="font-family: rubik, sans-serif;font-weight: 500;color:#000000;font-size:16px;">
                    Female
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="{{ $categorySlug }}-male-tab" data-bs-toggle="pill"
                    data-bs-target="#{{ $categorySlug }}-male" type="button" role="tab" aria-selected="false"
                    tabindex="-1" style="font-family: rubik, sans-serif;font-weight: 400;color:#000000;font-size:16px;">
                    Male
                </button>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content">
            <!-- Female Tab -->
            <div class="tab-pane fade show active" id="{{ $categorySlug }}-female" role="tabpanel"
                aria-labelledby="{{ $categorySlug }}-female-tab">
                <div class="row">
                    @foreach($femaleMid as $mid)


                    <div class="col-6 col-md-6 col-lg-2 mb-4">
                        <a  href="{{ route('services', ['gender' => strtolower($mid->topCategory->gender->name), 'mid' => Str::slug($mid->name)]) }}">

                            <div class="card h-100 text-center">
                                <img src="{{ asset('storage/uploads/mid_categories/' . $mid->image) }}"
                                    class="card-img-top" alt="">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $mid->name }}</h5>
                                </div>
                            </div>
                        </a>
                    </div>

                    @endforeach
                </div>
            </div>

            <!-- Male Tab -->
            <div class="tab-pane fade" id="{{ $categorySlug }}-male" role="tabpanel"
                aria-labelledby="{{ $categorySlug }}-male-tab">
                <div class="row">
                    @foreach($maleMid as $mid)

                    <div class="col-6 col-md-6 col-lg-2 mb-4">
                        <a  href="{{ route('services', ['gender' => strtolower($mid->topCategory->gender->name), 'mid' => Str::slug($mid->name)]) }}">

                            <div class="card h-100 text-center">
                                <img src="{{ asset('storage/uploads/mid_categories/' . $mid->image) }}"
                                    class="card-img-top" alt="">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $mid->name }}</h5>
                                </div>
                            </div>
                        </a>

                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endif