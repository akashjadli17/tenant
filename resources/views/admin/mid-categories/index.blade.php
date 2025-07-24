@extends('layouts.adminmaster')

@section('title', 'View Mid Level Categories | Myraluxa Aesthetic Pvt Ltd')

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- Page Title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">View Mid Level Categories</h4>
                    </div>
                </div>
            </div>

            <!-- Table Row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <!-- Header -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <h4 class="card-title">All Mid Level Categories</h4>
                                </div>
                                <div class="col-md-6 text-end">
                                    <a href="{{ route('mid-categories.create') }}" class="btn btn-success btn-rounded">
                                        <i class="mdi mdi-plus me-1"></i> Add New Mid Category
                                    </a>
                                </div>
                            </div>

                            <!-- Table -->
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover align-middle">
                                    <thead class="table-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Gender</th>
                                            <th>Top Category Name</th>
                                            <th>Mid Category Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($midCategories as $category)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                               <td>
                                                    <label style="cursor:pointer">
                                                        <img src="{{ asset('storage/uploads/mid_categories/' . $category->image) }}"
                                                            height="50" 
                                                            id="img-preview-{{ $category->id }}">
                                                        <input type="file"
                                                            name="image"
                                                            accept="image/*"
                                                            style="display: none"
                                                            onchange="uploadMidCategoryImage(this, {{ $category->id }})">
                                                    </label>
                                                </td>

                                                <td>
                                                    @php
                                                        $genderId = $category->topCategory->gender_id ?? null;
                                                    @endphp
                                                    {{ $genderId == 1 ? 'Men' : ($genderId == 2 ? 'Women' : 'N/A') }}
                                                </td>
                                                <td>{{ $category->topCategory->name ?? 'N/A' }}</td>
                                                <td>{{ $category->name }}</td>
                                                <td class="d-flex gap-2">
                                                    <a href="{{ route('mid-categories.edit', $category->id) }}"
                                                       class="btn btn-sm btn-primary">Edit</a>
                                                    <form action="{{ route('mid-categories.destroy', $category->id) }}"
                                                          method="POST"
                                                          onsubmit="return confirm('Are you sure you want to delete this mid category?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach

                                        @if ($midCategories->isEmpty())
                                            <tr>
                                                <td colspan="5" class="text-center text-muted">No mid categories found.</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>

                        </div> <!-- card-body -->
                    </div> <!-- card -->
                </div> <!-- col -->
            </div> <!-- row -->

        </div> <!-- container-fluid -->
    </div>
</div>

<script>
    function uploadMidCategoryImage(input, id) {
        const file = input.files[0];
        if (!file) return;

        const formData = new FormData();
        formData.append('image', file);
        formData.append('_method', 'POST');
        formData.append('_token', '{{ csrf_token() }}');

        fetch(`/admin/mid-categories/${id}/upload-image`, {
            method: 'POST',
            body: formData
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                const imgTag = document.getElementById('img-preview-' + id);
                imgTag.src = data.image_url + '?' + new Date().getTime(); // Cache bust
            } else {
                alert('Image upload failed');
            }
        })
        .catch(() => {
            alert('Upload failed. Please try again.');
        });
    }
</script>
@endsection