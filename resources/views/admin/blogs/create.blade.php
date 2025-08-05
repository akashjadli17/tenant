@extends('layouts.adminmaster')

@section('title', 'Add Blog | Tenants Management')

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- Page Title -->
            <div class="row mb-4">
                <div class="col-12">
                    <h4 class="mb-0">Add New Blog</h4>
                </div>
            </div>

            <!-- Blog Form -->
            <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Blog Title -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Blog Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Enter blog title" value="{{ old('title') }}" required>
                        @error('title') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>

                <!-- Blog Image Upload with Preview -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Upload Blog Image</label>
                        <input type="file" name="image" id="imageInput" class="form-control" accept="image/*">
                        <img id="imagePreview" class="mt-2 rounded border" style="max-height: 150px; display: none;" alt="Image Preview">
                        @error('image') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>

                <!-- Blog Content (CKEditor) -->
                <div class="row mb-3">
                    <div class="col-md-10">
                        <label class="form-label">Blog Content</label>
                        <textarea name="content" id="contentEditor" rows="6" class="form-control" placeholder="Enter blog content..." required>{{ old('content') }}</textarea>
                        @error('content') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>

                <!-- Submit Buttons -->
                <div class="text-start mt-4 mb-4">
                    <button type="submit" class="btn btn-success btn-lg me-3">Save Blog</button>
                    <a href="{{ route('blogs.index') }}" class="btn btn-primary btn-lg">View All Blogs</a>
                </div>

            </form>

        </div>
    </div>
</div>

<!-- CKEditor -->
<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Initialize CKEditor
        if (document.getElementById('contentEditor')) {
            CKEDITOR.replace('contentEditor');
        }

        // Image preview logic
        const imageInput = document.getElementById('imageInput');
        const imagePreview = document.getElementById('imagePreview');

        if (imageInput && imagePreview) {
            imageInput.addEventListener('change', function (event) {
                const file = event.target.files[0];
                if (file && file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        imagePreview.src = e.target.result;
                        imagePreview.style.display = 'block';
                    };
                    reader.readAsDataURL(file);
                } else {
                    imagePreview.src = '';
                    imagePreview.style.display = 'none';
                }
            });
        }
    });
</script>
@endsection
