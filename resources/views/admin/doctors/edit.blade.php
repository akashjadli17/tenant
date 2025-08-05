@extends('layouts.adminmaster')

@section('title', 'Edit Doctor | Tenants Management')

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <!-- Page Title -->
                <div class="row mb-4">
                    <div class="col-12">
                        <h4 class="mb-0">Edit Doctor</h4>
                    </div>
                </div>

                <!-- Doctor Edit Form -->
                <form action="{{ route('doctor_details.update', $doctor->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Doctor Name & Speciality -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Doctor Name</label>
                            <input type="text" name="dr_name" class="form-control"
                                value="{{ old('dr_name', $doctor->dr_name) }}" required>
                            @error('dr_name') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Speciality</label>
                            <input type="text" name="speciality" class="form-control"
                                value="{{ old('speciality', $doctor->speciality) }}">
                            @error('speciality') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>

                    <!-- Image Upload -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Current Image</label><br>
                            @if ($doctor->image)
                                <img src="{{ asset('storage/doctors/' . $doctor->image) }}" height="80"
                                    class="mb-2 rounded border" id="currentImage" alt="Doctor Image">
                            @else
                                <p class="text-muted">No image uploaded</p>
                            @endif

                            <label class="form-label mt-2">Change Image</label>
                            <input type="file" name="image" id="imageInput" class="form-control mt-1" accept="image/*">
                            <img id="imagePreview" class="mt-2 rounded border" style="max-height: 150px; display: none;"
                                alt="Image Preview">
                            @error('image') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Degree</label>
                            <input type="text" name="degree" class="form-control"
                                value="{{ old('degree', $doctor->degree) }}">
                            @error('degree') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>

                    <!-- Contact & Experience -->
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Phone</label>
                            <input type="text" name="phone" class="form-control"
                                value="{{ old('phone', $doctor->phone) }}">
                            @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control"
                                value="{{ old('email', $doctor->email) }}">
                            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Experience</label>
                            <input type="text" name="experience" class="form-control"
                                value="{{ old('experience', $doctor->experience) }}">
                            @error('experience') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>

                    <!-- Introduction -->
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label class="form-label">Doctor Introduction</label>
                            <textarea name="dr_introduction" id="drIntroductionEditor" rows="4" class="form-control">{{ old('dr_introduction', $doctor->dr_introduction) }}</textarea>
                            @error('dr_introduction') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>

                    <!-- Submit Buttons -->
                    <div class="text-start mt-4 mb-4">
                        <button type="submit" class="btn btn-success btn-lg me-3">Update Doctor</button>
                        <a href="{{ route('doctor_details.index') }}" class="btn btn-primary btn-lg">Back to Doctors</a>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- CKEditor & Image Preview -->
    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize CKEditor
            if (document.getElementById('drIntroductionEditor')) {
                CKEDITOR.replace('drIntroductionEditor');
            }

            // Image Preview
            const imageInput = document.getElementById('imageInput');
            const imagePreview = document.getElementById('imagePreview');
            const currentImage = document.getElementById('currentImage');

            if (imageInput && imagePreview) {
                imageInput.addEventListener('change', function(event) {
                    const file = event.target.files[0];
                    if (file && file.type.startsWith('image/')) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            imagePreview.src = e.target.result;
                            imagePreview.style.display = 'block';
                            if (currentImage) currentImage.style.display = 'none';
                        };
                        reader.readAsDataURL(file);
                    } else {
                        imagePreview.src = '';
                        imagePreview.style.display = 'none';
                        if (currentImage) currentImage.style.display = 'block';
                    }
                });
            }
        });
    </script>
@endsection
