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

            <!-- Blog Form -->
            <form action="{{ route('admin.blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Heading & Slug -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Blog Heading</label>
                        <input type="text" name="heading" id="headingInput" class="form-control"
                            value="{{ old('heading', $blog->heading) }}" required>
                        @error('heading')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Slug</label>
                        <input type="text" name="slug" id="slugInput" class="form-control"
                            value="{{ old('slug', $blog->slug) }}">
                        @error('slug')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <!-- Image & Short Description -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Upload Blog Image</label>
                        <input type="file" name="image" id="imageInput" class="form-control" accept="image/*">

                        <!-- Current Image -->
                        @if($blog->image)
                            <div class="mt-2">
                                <p>Current Image:</p>
                                <img src="{{ asset('storage/blogs/' . $blog->image) }}" class="rounded border" style="max-height: 150px;" alt="Current Blog Image">
                            </div>
                        @endif

                        <!-- New Preview -->
                        <img id="imagePreview" class="mt-2 rounded border" style="max-height: 150px; display: none;" alt="New Image Preview">

                        @error('image')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Short Description</label>
                        <textarea name="short_description" rows="3" class="form-control" placeholder="Enter short summary...">{{ old('short_description', $blog->short_description) }}</textarea>
                        @error('short_description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <!-- Full Content -->
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label class="form-label">Full Blog Content</label>
                        <textarea name="description" id="contentEditor" rows="6" class="form-control" required>{{ old('description', $blog->description) }}</textarea>
                        @error('description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <!-- SEO Fields -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Meta Title</label>
                        <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title', $blog->meta_title) }}" placeholder="SEO meta title">
                        @error('meta_title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Meta Keywords</label>
                        <input type="text" name="meta_keywords" class="form-control" value="{{ old('meta_keywords', $blog->meta_keywords) }}" placeholder="keyword1, keyword2, keyword3">
                        @error('meta_keywords')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <label class="form-label">Meta Description</label>
                        <textarea name="meta_description" rows="3" class="form-control" placeholder="SEO meta description">{{ old('meta_description', $blog->meta_description) }}</textarea>
                        @error('meta_description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <!-- Submit Buttons -->
                <div class="text-start mt-4 mb-4">
                    <button type="submit" class="btn btn-success btn-lg me-3">Update Blog</button>
                    <a href="{{ route('admin.blogs.index') }}" class="btn btn-primary btn-lg">Back to Blogs</a>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- CKEditor -->
<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {

    // CKEditor
    if (document.getElementById('contentEditor')) {
        CKEDITOR.replace('contentEditor');
    }

    // Image preview
    const imageInput = document.getElementById('imageInput');
    const imagePreview = document.getElementById('imagePreview');
    if (imageInput && imagePreview) {
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
    }

    // Auto-generate slug
    const headingInput = document.getElementById('headingInput');
    const slugInput = document.getElementById('slugInput');
    slugInput.dataset.previous = slugInput.value;

    headingInput.addEventListener('input', function() {
        if (!slugInput.dataset.manual || slugInput.value === '' || slugInput.value === slugInput.dataset.previous) {
            let slug = this.value.toLowerCase()
                .trim()
                .replace(/[^a-z0-9\s-]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-');
            slugInput.value = slug;
            slugInput.dataset.previous = slug;
        }
    });

    slugInput.addEventListener('input', function() {
        slugInput.dataset.manual = true;
    });

});
</script>
@endsection
