@extends('layouts.adminmaster')

@section('title', 'All Doctors | Tenants Management')

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <!-- Page Title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">All Doctors</h4>
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
                                        <h4 class="card-title">Doctors List</h4>
                                    </div>
                                    <div class="col-md-6 text-end">
                                        <a href="{{ route('doctor_details.create') }}" class="btn btn-success btn-rounded">
                                            <i class="mdi mdi-plus me-1"></i> Add New Doctor
                                        </a>
                                    </div>
                                </div>

                                <!-- Doctor Table -->
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover align-middle">
                                        <thead class="table-light">
                                            <tr>
                                                <th>#</th>
                                                <th>Dr. Image</th>
                                                <th>Dr. Name</th>
                                                <th>Dr. Speciality</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($doctors as $doctor)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>
                                                        <label style="cursor: pointer">
                                                            <img src="{{ $doctor->image ? asset('storage/doctors/' . $doctor->image) : asset('images/default-doctor.png') }}"
                                                                width="70" class="img-thumbnail"
                                                                id="img-preview-{{ $doctor->id }}">
                                                            <input type="file" accept="image/*" style="display: none"
                                                                onchange="uploadDoctorImage(this, {{ $doctor->id }})">
                                                        </label>
                                                    </td>


                                                    <td>{{ $doctor->dr_name }}</td>
                                                    <td>{{ $doctor->speciality ?? 'N/A' }}</td>
                                                    <td>
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input toggle-status" type="checkbox"
                                                                data-id="{{ $doctor->id }}"
                                                                {{ $doctor->status === 'active' ? 'checked' : '' }}>
                                                            <label class="form-check-label">
                                                                {{ ucfirst($doctor->status) }}
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td class="d-flex gap-2">
                                                        <a href="{{ route('doctor_details.edit', $doctor->id) }}"
                                                            class="btn btn-sm btn-primary">Edit</a>
                                                        <form action="{{ route('doctor_details.destroy', $doctor->id) }}"
                                                            method="POST"
                                                            onsubmit="return confirm('Are you sure to delete this doctor?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-sm btn-danger">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="6" class="text-center text-muted">No doctors found.</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>

                                <div class="mt-3">
                                    {{ $doctors->links() }}
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const statusToggles = document.querySelectorAll('.toggle-status');

            statusToggles.forEach(toggle => {
                toggle.addEventListener('change', function() {
                    const doctorId = this.dataset.id;
                    const newStatus = this.checked ? 'active' : 'inactive';

                    fetch(`/admin/doctor_details/toggle-status/${doctorId}`, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({
                                status: newStatus
                            })
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
    <script>
    function uploadDoctorImage(input, doctorId) {
        const file = input.files[0];
        if (!file) return;

        const formData = new FormData();
        formData.append('image', file);
        formData.append('_method', 'POST');
        formData.append('_token', '{{ csrf_token() }}');

        fetch(`/admin/doctors/${doctorId}/upload-image`, {
            method: 'POST',
            body: formData
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                const imgTag = document.getElementById('img-preview-' + doctorId);
                imgTag.src = data.image_url + '?' + new Date().getTime(); // Refresh cache
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
