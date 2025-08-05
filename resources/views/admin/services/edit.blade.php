@extends('layouts.adminmaster')

@section('title', 'Edit Service | Tenants Management')

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <!-- Page Title -->
                <div class="row mb-4">
                    <div class="col-12">
                        <h4 class="mb-0">Edit Service</h4>
                    </div>
                </div>

                <form action="{{ route('services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Gender Selection -->
                    <div class="row mb-3">
                        <label class="form-label">Select Gender:</label>
                        <div class="col-md-2">
                            <input type="radio" name="gender_id" value="1"
                                {{ optional(optional($service->midCategory->topCategory)->gender)->id == 1 ? 'checked' : '' }}>
                            Men
                        </div>
                        <div class="col-md-2">
                            <input type="radio" name="gender_id" value="2"
                                {{ optional(optional($service->midCategory->topCategory)->gender)->id == 2 ? 'checked' : '' }}>
                            Women
                        </div>
                    </div>



                    <!-- Category Dropdowns -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Top Level Category</label>
                            <select name="top_category_id" id="top_category" class="form-control" required>
                                <option value="">-- Select Top Category --</option>
                                @foreach ($topCategories as $top)
                                    <option value="{{ $top->id }}"
                                        {{ $top->id == optional($service->midCategory->topCategory)->id ? 'selected' : '' }}>
                                        {{ $top->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Mid Level Category</label>
                            <select name="mid_category_id" id="mid_category" class="form-control" required>
                                <option value="">-- Select Mid Category --</option>

                                @if ($service->midCategory && $service->midCategory->top_category_id == optional($service->midCategory->topCategory)->id)
                                    <option value="{{ $service->midCategory->id }}" selected>
                                        {{ $service->midCategory->name }}
                                    </option>
                                @endif
                            </select>
                        </div>
                    </div>


                    <!-- Service Details -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Service Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $service->name }}" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Price</label>
                            <input type="number" name="price" step="0.01" class="form-control"
                                value="{{ $service->price }}">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Rating</label>
                            <input type="number" name="rating" step="0.1" max="5" min="0"
                                class="form-control" value="{{ $service->rating }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Duration (in min)</label>
                            <input type="text" name="duration" class="form-control" value="{{ $service->duration }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Services Image</label>
                            <input type="file" name="image" class="form-control" accept="image/*"
                                onchange="previewImage(event)">

                            {{-- Old image shown by default --}}
                            <div id="image-preview-wrapper" class="mt-2">
                                @if ($service->image)
                                    <img src="{{ asset('storage/services/images/' . $service->image) }}" id="image-preview"
                                        width="80">
                                @else
                                    <img id="image-preview" src="#" style="display: none;" width="80">
                                @endif
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Services Video</label>
                            <input type="file" name="video" class="form-control" accept="video/*">
                            @if ($service->video)
                                <video width="100" controls class="mt-2">
                                    <source src="{{ asset('storage/services/videos/' . $service->video) }}">
                                </video>
                            @endif
                        </div>

                    </div>

                    <div class="mb-3">
                        <label class="form-label">Service Highlight Points</label>
                        <textarea name="highlight_points" id="highlight_points" class="form-control" rows="2">{{ $service->highlight_points }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Service Overview</label>
                        <textarea name="overview" id="overview" class="form-control" rows="4">{{ $service->overview }}</textarea>
                    </div>


                    <!-- How It Works -->
                    <div class="mb-3">
                        <label class="form-label">How It Works</label>
                        <div id="how-it-works-wrapper">
                            @foreach ($service->how_it_works as $index => $item)
                                <div class="row how-it-works-item mb-3">
                                    <div class="col-md-5">
                                        <input type="file" name="how_it_works_images[]"
                                            class="form-control how-it-works-image-input"
                                            data-preview-id="how-it-works-preview-{{ $index }}">
                                        @if (!empty($item['image']))
                                            <div class="mt-2">
                                                <p class="mb-1">Preview:</p>
                                                <img src="{{ asset('storage/services/how_it_works/' . $item['image']) }}"
                                                    id="how-it-works-preview-{{ $index }}" width="50">
                                            </div>
                                            <input type="hidden" name="how_it_works_old_images[]"
                                                value="{{ $item['image'] }}">
                                        @else
                                            <img id="how-it-works-preview-{{ $index }}" width="50"
                                                style="display: none;">
                                        @endif
                                    </div>

                                    <div class="col-md-5">
                                        <input type="text" name="how_it_works_titles[]" class="form-control"
                                            placeholder="Image Title" value="{{ $item['title'] ?? '' }}">
                                    </div>

                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-danger remove-how-it-works">Remove</button>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        <button type="button" class="btn btn-info mt-2" id="add-how-it-works">+ Add More</button>
                    </div>

                    <!-- FAQ Section -->
                    <div class="mb-3">
                        <label class="form-label">FAQ Section</label>
                        <div id="faq-wrapper">
                            @if (!empty($service->faqs))
                                @foreach ($service->faqs as $faq)
                                    <div class="row faq-item mb-2">
                                        <div class="col-md-5">
                                            <input type="text" name="faq_questions[]" class="form-control"
                                                placeholder="Enter Question" value="{{ $faq['question'] ?? '' }}">
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" name="faq_answers[]" class="form-control"
                                                placeholder="Enter Answer" value="{{ $faq['answer'] ?? '' }}">
                                        </div>
                                        <div class="col-md-2">
                                            <button type="button" class="btn btn-danger remove-faq">Remove</button>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <button type="button" class="btn btn-warning mt-2" id="add-faq">+ Add FAQ</button>
                    </div>



                    <!-- Submit -->
                    <div class="text-center mt-4 mb-4">
                        <button type="submit" class="btn btn-success btn-lg me-3">Update Service</button>
                        <a href="{{ route('services.index') }}" class="btn btn-primary btn-lg">Back to Services</a>
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- CKEditor CDN -->
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
    <script>
        // Initialize CKEditor on both textareas
        CKEDITOR.replace('highlight_points');
        CKEDITOR.replace('overview');
    </script>
    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const preview = document.getElementById('image-preview');
                preview.src = reader.result;
                preview.style.display = 'block';
            };
            if (event.target.files[0]) {
                reader.readAsDataURL(event.target.files[0]);
            }
        }
    </script>

    <script>
        // Preview for dynamically changing images
        $(document).on('change', '.how-it-works-image-input', function(event) {
            const previewId = $(this).data('preview-id');
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById(previewId);
                output.src = reader.result;
                output.style.display = 'block';
            };
            if (event.target.files[0]) {
                reader.readAsDataURL(event.target.files[0]);
            }
        });

        // Add new item dynamically with preview ID
        let howItWorksIndex = {{ count($service->how_it_works) }};

        $('#add-how-it-works').click(function() {
            const newItem = `
                <div class="row how-it-works-item mb-3">
                    <div class="col-md-5">
                        <input type="file" name="how_it_works_images[]" class="form-control how-it-works-image-input" data-preview-id="how-it-works-preview-${howItWorksIndex}">
                        <img id="how-it-works-preview-${howItWorksIndex}" width="80" style="display: none;" class="mt-2">
                    </div>
                    <div class="col-md-5">
                        <input type="text" name="how_it_works_titles[]" class="form-control" placeholder="Image Title">
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-danger remove-how-it-works">Remove</button>
                    </div>
                </div>
            `;
            $('#how-it-works-wrapper').append(newItem);
            howItWorksIndex++;
        });

        $(document).on('click', '.remove-how-it-works', function() {
            $(this).closest('.how-it-works-item').remove();
        });
    </script>
    <script>
        $(document).ready(function() {
            // Add FAQ
            $('#add-faq').click(function() {
                $('#faq-wrapper').append(`
            <div class="row faq-item mb-2">
                <div class="col-md-5">
                    <input type="text" name="faq_questions[]" class="form-control" placeholder="Enter Question">
                </div>
                <div class="col-md-5">
                    <input type="text" name="faq_answers[]" class="form-control" placeholder="Enter Answer">
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-danger remove-faq">Remove</button>
                </div>
            </div>
        `);
            });

            $(document).on('click', '.remove-faq', function() {
                $(this).closest('.faq-item').remove();
            });
        });
    </script>



    <script>
        $(document).ready(function() {

            // Mid Category Loading Logic
            const currentMidCategoryId = '{{ $service->mid_category_id }}';
            const currentTopCategoryId = '{{ $service->top_category_id }}';

            function loadMidCategories(topId, selectedMidId = null) {
                fetch(`/admin/get-mid-categories/${topId}`)
                    .then(res => res.json())
                    .then(data => {
                        let options = '<option value="">-- Select Mid Category --</option>';
                        data.forEach(cat => {
                            const selected = (cat.id == selectedMidId) ? 'selected' : '';
                            options += `<option value="${cat.id}" ${selected}>${cat.name}</option>`;
                        });
                        $('#mid_category').html(options);
                    });
            }

            // On top category change
            $('#top_category').on('change', function() {
                const topId = $(this).val();
                loadMidCategories(topId);
            });

            // Initial load
            loadMidCategories(currentTopCategoryId, currentMidCategoryId);
        });
        const currentMidCategoryId = '{{ $service->mid_category_id }}';
        const currentTopCategoryId = '{{ optional($service->midCategory->topCategory)->id }}';
    </script>
@endpush
