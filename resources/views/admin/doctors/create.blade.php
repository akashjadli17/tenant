@extends('layouts.adminmaster')

@section('title', 'Add Doctor | Tenants Management')

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <!-- Page Title -->
                <div class="row mb-4">
                    <div class="col-12">
                        <h4 class="mb-0">Add New Doctor</h4>
                    </div>
                </div>

                <!-- Doctor Form -->
                <form action="{{ route('doctor_details.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Doctor Name & Speciality -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Doctor Name <span class="text-danger">*</span></label>
                            <input type="text" name="dr_name" class="form-control" placeholder="Enter doctor's name"
                                value="{{ old('dr_name') }}" required>
                            @error('dr_name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Speciality</label>
                            <input type="text" name="speciality" class="form-control"
                                placeholder="e.g., Cardiology Specialist" value="{{ old('speciality') }}">
                            @error('speciality')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <!-- Image Upload -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Doctor Image</label>
                            <input type="file" name="image" id="imageInput" class="form-control" accept="image/*">
                            <img id="imagePreview" class="mt-2 rounded border" style="max-height: 150px; display: none;"
                                alt="Image Preview">
                            @error('image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <!-- Degree -->
                        <div class="col-md-6">
                            <label class="form-label">Degree</label>
                            <input type="text" name="degree" class="form-control" placeholder="MD of Cardiology"
                                value="{{ old('degree') }}">
                            @error('degree')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <!-- Optional Fields -->
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Phone</label>
                            <input type="text" name="phone" class="form-control" placeholder="+91 1234567890"
                                value="{{ old('phone') }}">
                            @error('phone')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="doctor@example.com"
                                value="{{ old('email') }}">
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Experience</label>
                            <input type="text" name="experience" class="form-control" placeholder="15 Years"
                                value="{{ old('experience') }}">
                            @error('experience')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <!-- Doctor Introduction (CKEditor) -->
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label class="form-label">Doctor Introduction</label>
                            <textarea name="dr_introduction" id="drIntroductionEditor" rows="4" class="form-control"
                                placeholder="Write a short bio/introduction...">{{ old('dr_introduction') }}</textarea>
                            @error('dr_introduction')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>



                    <!-- Submit Buttons -->
                    <div class="text-start mt-4 mb-4">
                        <button type="submit" class="btn btn-success btn-lg me-3">Save Doctor</button>
                        <a href="{{ route('doctor_details.index') }}" class="btn btn-primary btn-lg">View All Doctors</a>
                    </div>

                </form>

            </div>
        </div>
    </div>

    <!-- CKEditor -->
    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize CKEditor
            if (document.getElementById('drIntroductionEditor')) {
                CKEDITOR.replace('drIntroductionEditor');
            }

            // Image preview
            const imageInput = document.getElementById('imageInput');
            const imagePreview = document.getElementById('imagePreview');

            imageInput.addEventListener('change', function(event) {
                const file = event.target.files[0];
                if (file && file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        imagePreview.src = e.target.result;
                        imagePreview.style.display = 'block';
                    };
                    reader.readAsDataURL(file);
                } else {
                    imagePreview.src = '';
                    imagePreview.style.display = 'none';
                }
            });
        });
    </script>
@endsection
