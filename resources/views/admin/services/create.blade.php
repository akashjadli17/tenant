@extends('layouts.adminmaster')

@section('title', 'Add Service | Tenants Management')

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <!-- Page Title -->
                <div class="row mb-4">
                    <div class="col-12">
                        <h4 class="mb-0">Add New Service</h4>
                    </div>
                </div>

                <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Gender Selection -->
                    <div class="row mb-3">
                        <label class="form-label">Select Gender:</label>
                        <div class="col-md-2">
                            <input type="radio" name="gender_id" value="1" required> Men
                        </div>
                        <div class="col-md-2">
                            <input type="radio" name="gender_id" value="2"> Women
                        </div>
                    </div>

                    <!-- Category Dropdowns -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Top Level Category</label>
                            <select name="top_category_id" id="top_category" class="form-control" required>
                                <option value="">-- Select Top Category --</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Mid Level Category</label>
                            <select name="mid_category_id" id="mid_category" class="form-control" required>
                                <option value="">-- Select Mid Category --</option>
                                <!-- Options dynamically populated -->
                            </select>

                        </div>
                    </div>

                    <!-- Service Details -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Service Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Price</label>
                            <input type="number" name="price" step="0.01" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Rating</label>
                            <input type="number" name="rating" step="0.1" max="5" min="0"
                                class="form-control">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Duration</label>
                            <input type="text" name="duration" class="form-control" placeholder="e.g. 30 minutes">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Image (optional)</label>
                            <input type="file" name="image" class="form-control" accept="image/*"
                                onchange="previewImage(event)">
                            <div id="image-preview-wrapper" class="mt-2">
                                <img id="image-preview" src="#" style="display: none;" width="100">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Video (optional)</label>
                            <input type="file" name="video" class="form-control" accept="video/*"
                                onchange="previewVideo(event)">
                            <div id="video-preview-wrapper" class="mt-2">
                                <video id="video-preview" width="200" controls style="display: none;"></video>
                            </div>
                        </div>

                    </div>

                    <div class="mb-3">
                        <label class="form-label">Service Highlight Points</label>
                        <textarea name="highlight_points" id="highlight_points" class="form-control" rows="2"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Service Overview</label>
                        <textarea name="overview" id="overview" class="form-control" rows="4"></textarea>
                    </div>


                    <!-- How It Works -->
                    <div class="mb-3">
                        <label class="form-label">How It Works</label>
                        <div id="how-it-works-wrapper">
                            <div class="row how-it-works-item mb-2">
                                <div class="col-md-5">
                                    <input type="file" name="how_it_works_images[]"
                                        class="form-control how-it-works-image-input"
                                        data-preview-id="how-it-works-preview-0" required>
                                    <img id="how-it-works-preview-0" width="80" style="display: none;"
                                        class="mt-2">
                                </div>
                                <div class="col-md-5">
                                    <input type="text" name="how_it_works_titles[]" class="form-control"
                                        placeholder="Image Title" required>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-danger remove-how-it-works">Remove</button>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-info mt-2" id="add-how-it-works">+ Add More</button>
                    </div>


                    <!-- FAQ Section -->
                    <div class="mb-3">
                        <label class="form-label">FAQ Section</label>
                        <div id="faq-wrapper">
                            <div class="row faq-item mb-2">
                                <div class="col-md-5">
                                    <input type="text" name="faq_questions[]" class="form-control"
                                        placeholder="Enter Question" required>
                                </div>
                                <div class="col-md-5">
                                    <input type="text" name="faq_answers[]" class="form-control"
                                        placeholder="Enter Answer" required>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-danger remove-faq">Remove</button>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-warning mt-2" id="add-faq">+ Add FAQ</button>
                    </div>

                    <div class="text-center mt-4 mb-4">
                        <button type="submit" class="btn btn-success btn-lg me-3">Save Service</button>
                        <a href="{{ route('services.index') }}" class="btn btn-primary btn-lg">View Services</a>
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
        // Initialize CKEditor on both fields
        CKEDITOR.replace('highlight_points');
        CKEDITOR.replace('overview');
    </script>
    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById('image-preview');
                output.src = reader.result;
                output.style.display = 'block';
            };
            if (event.target.files[0]) {
                reader.readAsDataURL(event.target.files[0]);
            }
        }

        function previewVideo(event) {
            const video = document.getElementById('video-preview');
            const file = event.target.files[0];
            if (file) {
                const url = URL.createObjectURL(file);
                video.src = url;
                video.style.display = 'block';
            }
        }
    </script>

    <script>
        $(document).ready(function() {
            // Gender -> Top Category
            $('input[name="gender_id"]').change(function() {
                let genderId = $(this).val();
                $('#top_category').html('<option>Loading...</option>');
                $('#mid_category').html('<option>-- Select Mid Category --</option>');

                $.get(`/admin/get-top-categories/${genderId}`, function(data) {
                    let opts = '<option value="">-- Select Top Category --</option>';
                    data.forEach(c => opts += `<option value="${c.id}">${c.name}</option>`);
                    $('#top_category').html(opts);
                }).fail(() => {
                    $('#top_category').html('<option value="">-- Error --</option>');
                });
            });

            // Top -> Mid Category
            $('#top_category').change(function() {
                let id = $(this).val();
                $('#mid_category').html('<option>Loading...</option>');

                $.get(`/admin/get-mid-categories/${id}`, function(data) {
                    let opts = '<option value="">-- Select Mid Category --</option>';
                    data.forEach(c => opts += `<option value="${c.id}">${c.name}</option>`);
                    $('#mid_category').html(opts);
                }).fail(() => {
                    $('#mid_category').html('<option value="">-- Error --</option>');
                });
            });


            // Add/Remove FAQ
            $('#add-faq').click(function() {
                $('#faq-wrapper').append(`
      <div class="row faq-item mb-2">
        <div class="col-md-5">
          <input type="text" name="faq_questions[]" class="form-control" placeholder="Enter Question" required>
        </div>
        <div class="col-md-5">
          <input type="text" name="faq_answers[]" class="form-control" placeholder="Enter Answer" required>
        </div>
        <div class="col-md-2">
          <button type="button" class="btn btn-danger remove-faq">Remove</button>
        </div>
      </div>`);
            });
            $(document).on('click', '.remove-faq', function() {
                $(this).closest('.faq-item').remove();
            });
        });
    </script>
    <script>
        let howItWorksIndex = 1;

        // Preview uploaded image
        $(document).on('change', '.how-it-works-image-input', function(event) {
            const previewId = $(this).data('preview-id');
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function() {
                    const output = document.getElementById(previewId);
                    output.src = reader.result;
                    output.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        });

        // Add new How It Works row with preview
        $('#add-how-it-works').click(function() {
            const newItem = `
            <div class="row how-it-works-item mb-2">
                <div class="col-md-5">
                    <input type="file" name="how_it_works_images[]" class="form-control how-it-works-image-input" data-preview-id="how-it-works-preview-${howItWorksIndex}" required>
                    <img id="how-it-works-preview-${howItWorksIndex}" width="80" style="display: none;" class="mt-2">
                </div>
                <div class="col-md-5">
                    <input type="text" name="how_it_works_titles[]" class="form-control" placeholder="Image Title" required>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-danger remove-how-it-works">Remove</button>
                </div>
            </div>`;
            $('#how-it-works-wrapper').append(newItem);
            howItWorksIndex++;
        });

        // Remove row
        $(document).on('click', '.remove-how-it-works', function() {
            $(this).closest('.how-it-works-item').remove();
        });
    </script>
@endpush
