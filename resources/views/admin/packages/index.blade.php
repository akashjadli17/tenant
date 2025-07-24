@extends('layouts.adminmaster')

@section('title', 'Myraluxa Aesthetic Pvt Ltd')

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <!-- Page Title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">View Packages</h4>
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
                                        <h4 class="card-title">All Packages</h4>
                                    </div>
                                    <div class="col-md-6 text-end">
                                        <a href="{{ route('packages.create') }}" class="btn btn-success btn-rounded">
                                            <i class="mdi mdi-plus me-1"></i> Add New Package
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
                                                <th>Package Type</th>
                                                <th>Title</th>
                                                <th>Original Price</th>
                                                <th>Discounted Price</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($packages as $index => $package)
                                                <tr id="package-row-{{ $package->id }}">
                                                    <td>{{ $index + 1 }}</td>

                                                    <td>
                                                        <label style="cursor: pointer">
                                                            <img src="{{ $package->package_image ? asset('storage/' . $package->package_image) : asset('images/default-package.png') }}"
                                                                width="70" class="img-thumbnail"
                                                                id="img-preview-{{ $package->id }}">
                                                            <input type="file" accept="image/*" style="display: none"
                                                                onchange="uploadPackageImage(this, {{ $package->id }})">
                                                        </label>
                                                    </td>



                                                    <td>{{ $package->package_type }}</td>
                                                    <td>{{ $package->title }}</td>
                                                    <td>₹{{ number_format($package->original_price, 2) }}</td>
                                                    <td>₹{{ number_format($package->discounted_price, 2) }}</td>

                                                    <!-- Toggle Button -->
                                                    <td>
                                                        <button
                                                            class="btn btn-sm toggle-status-btn {{ $package->status === 'active' ? 'btn-success' : 'btn-secondary' }}"
                                                            data-id="{{ $package->id }}">
                                                            {{ ucfirst($package->status) }}
                                                        </button>
                                                    </td>

                                                    <!-- Actions -->
                                                    <td class="d-flex gap-2">
                                                        <a href="{{ route('packages.edit', $package->id) }}"
                                                            class="btn btn-sm btn-primary">Edit</a>
                                                        <form action="{{ route('packages.destroy', $package->id) }}"
                                                            method="POST"
                                                            onsubmit="return confirm('Are you sure you want to delete this package?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-sm btn-danger">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="8" class="text-center text-muted">No packages found.
                                                    </td>
                                                </tr>
                                            @endforelse
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

    <!-- Toggle Status Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.toggle-status-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const packageId = this.dataset.id;
                    const btn = this;

                    fetch(`/admin/packages/toggle-status/${packageId}`, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Accept': 'application/json',
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.status === 'success') {
                                btn.textContent = data.new_status.charAt(0).toUpperCase() + data
                                    .new_status.slice(1);
                                btn.classList.toggle('btn-success', data.new_status ===
                                    'active');
                                btn.classList.toggle('btn-secondary', data.new_status ===
                                    'inactive');
                            } else {
                                alert('Failed to update status.');
                            }
                        })
                        .catch(() => alert('Something went wrong.'));
                });
            });
        });
    </script>
    <script>
        function uploadPackageImage(input, packageId) {
            const file = input.files[0];
            if (!file) return;

            const formData = new FormData();
            formData.append('package_image', file);
            formData.append('_method', 'POST');
            formData.append('_token', '{{ csrf_token() }}');

            fetch(`/admin/packages/${packageId}/upload-image`, {
                    method: 'POST',
                    body: formData
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        const imgTag = document.getElementById('img-preview-' + packageId);
                        imgTag.src = data.image_url + '?' + new Date().getTime(); // Force refresh
                    } else {
                        alert('Image upload failed.');
                    }
                })
                .catch(() => {
                    alert('Something went wrong. Please try again.');
                });
        }
    </script>

@endsection
