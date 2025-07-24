@extends('layouts.adminmaster')

@section('title', 'All Career Jobs | Myraluxa Aesthetic Pvt Ltd')

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- Page Title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">All Career Listings</h4>
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
                                    <h4 class="card-title">Career Openings</h4>
                                </div>
                                <div class="col-md-6 text-end">
                                    <a href="{{ route('careers.create') }}" class="btn btn-success btn-rounded">
                                        <i class="mdi mdi-plus me-1"></i> Add New Job
                                    </a>
                                </div>
                            </div>

                            <!-- Career Table -->
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover align-middle">
                                    <thead class="table-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Job Profile</th>
                                            <th>Speciality</th>
                                            <th>Experience</th>
                                            <th>Location</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($careers as $career)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $career->job_profile }}</td>
                                                <td>{{ $career->speciality ?? 'N/A' }}</td>
                                                <td>{{ $career->experience ?? 'N/A' }}</td>
                                                <td>{{ $career->location ?? 'N/A' }}</td>
                                                <td>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input toggle-career-status" type="checkbox"
                                                            data-id="{{ $career->id }}"
                                                            {{ $career->status === 'active' ? 'checked' : '' }}>
                                                        <label class="form-check-label">
                                                            {{ ucfirst($career->status) }}
                                                        </label>
                                                    </div>
                                                </td>
                                                <td class="d-flex gap-2">
                                                    <a href="{{ route('careers.edit', $career->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                                    <form action="{{ route('careers.destroy', $career->id) }}" method="POST"
                                                        onsubmit="return confirm('Are you sure to delete this job post?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center text-muted">No job openings found.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            <div class="mt-3">
                                {{ $careers->links() }}
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Status Toggle Script -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const statusToggles = document.querySelectorAll('.toggle-career-status');

        statusToggles.forEach(toggle => {
            toggle.addEventListener('change', function () {
                const careerId = this.dataset.id;
                const newStatus = this.checked ? 'active' : 'inactive';

                fetch(`/admin/careers/toggle-status/${careerId}`, {
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
                        this.checked = !this.checked;
                    }
                })
                .catch(() => {
                    alert('Something went wrong');
                    this.checked = !this.checked;
                });
            });
        });
    });
</script>
@endsection
