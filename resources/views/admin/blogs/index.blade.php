@extends('layouts.adminmaster')

@section('title', 'All Blogs | Tenants Management')

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- Page Title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">All Blogs</h4>
                    </div>
                </div>
            </div>

            <!-- Table Section -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <!-- Header -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <h4 class="card-title">All Blogs</h4>
                                </div>
                                <div class="col-md-6 text-end">
                                    <a href="{{ route('blogs.create') }}" class="btn btn-success btn-rounded">
                                        <i class="mdi mdi-plus me-1"></i> Add New Blog
                                    </a>
                                </div>
                            </div>

                            <!-- Blog Table -->
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover align-middle">
                                    <thead class="table-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Title</th>
                                            <th>Slug</th>
                                            <th>Status</th>
                                            <th>Created</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($blogs as $blog)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    @if($blog->image)
                                                        <img src="{{ asset('storage/blogs/' . $blog->image) }}" height="50">
                                                    @else
                                                        <span class="text-muted">No Image</span>
                                                    @endif
                                                </td>
                                                <td>{{ $blog->title }}</td>
                                                <td>{{ $blog->slug }}</td>
                                                <td>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input toggle-status" type="checkbox"
                                                               data-id="{{ $blog->id }}"
                                                              {{ $blog->status === 'active' ? 'checked' : '' }}
>
                                                        <label class="form-check-label">
                                                            {{ ucfirst($blog->status) }}
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>{{ $blog->created_at->format('d M, Y') }}</td>
                                                <td class="d-flex gap-2">
                                                    <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                                    <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST"
                                                          onsubmit="return confirm('Are you sure to delete this blog?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center text-muted">No blogs found.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            <!-- Pagination -->
                            <div class="mt-3">
                                {{ $blogs->links() }}
                            </div>

                        </div> <!-- card-body -->
                    </div> <!-- card -->
                </div> <!-- col -->
            </div> <!-- row -->
        </div> <!-- container-fluid -->
    </div>
</div>

<script> 
    document.addEventListener('DOMContentLoaded', function () {
        const statusToggles = document.querySelectorAll('.toggle-status');

        statusToggles.forEach(toggle => {
            toggle.addEventListener('change', function () {
                const blogId = this.dataset.id;
                const newStatus = this.checked ? 'active' : 'inactive';  // 🔁 Updated here

                fetch(`/admin/blogs/toggle-status/${blogId}`, { // ✅ Matches your route
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ status: newStatus })
                })
                .then(res => res.json())
                .then(data => {
                    if (!data.success) {
                        alert('Status update failed');
                        this.checked = !this.checked; // revert toggle
                    }
                })
                .catch(() => {
                    alert('Something went wrong');
                    this.checked = !this.checked; // revert toggle
                });
            });
        });
    });
</script>

@endsection
