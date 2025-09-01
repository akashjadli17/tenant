@extends('layouts.adminmaster')

@section('title', 'Edit Blog | Tenants Management')

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- Page Title -->
            <div class="row mb-4">
                <div class="col-12">
                    <h4 class="mb-0">Edit Blog</h4>
                </div>
            </div>

            <!-- Blog Edit Form -->
            <form action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Blog Title -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Blog Title</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title', $blog->title) }}" required>
                        @error('title') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>

                <!-- Blog Image -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Current Image</label><br>
                        @if($blog->image)
                            <img src="{{ asset('storage/blogs/' . $blog->image) }}" height="80" class="mb-2 rounded border" id="currentImage" alt="Current Blog Image">
                        @else
                            <p class="text-muted">No image uploaded</p>
                        @endif

                        <label class="form-label mt-2">Change Image</label>
                        <input type="file" name="image" id="imageInput" class="form-control mt-1" accept="image/*">
                        <img id="imagePreview" class="mt-2 rounded border" style="max-height: 150px; display: none;" alt="Image Preview">
                        @error('image') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>

                <!-- Blog Content -->
                <div class="row mb-3">
                    <div class="col-md-10">
                        <label class="form-label">Blog Content</label>
                        <textarea name="content" id="contentEditor" rows="6" class="form-control" required>{{ old('content', $blog->content) }}</textarea>
                        @error('content') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>

                <!-- Submit Buttons -->
                <div class="text-start mt-4 mb-4">
                    <button type="submit" class="btn btn-success btn-lg me-3">Update Blog</button>
                    <a href="{{ route('blogs.index') }}" class="btn btn-primary btn-lg">Back to Blogs</a>
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

        // Image preview
        const imageInput = document.getElementById('imageInput');
        const imagePreview = document.getElementById('imagePreview');
        const currentImage = document.getElementById('currentImage');

        if (imageInput && imagePreview) {
            imageInput.addEventListener('change', function (event) {
                const file = event.target.files[0];
                if (file && file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
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
