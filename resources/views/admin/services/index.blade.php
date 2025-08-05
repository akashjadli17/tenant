@extends('layouts.adminmaster')

@section('title', 'Tenants Management')

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <!-- Page Title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">View Services</h4>
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
                                        <h4 class="card-title">All Services</h4>
                                    </div>
                                    <div class="col-md-6 text-end">
                                        <a href="{{ route('services.create') }}" class="btn btn-success btn-rounded">
                                            <i class="mdi mdi-plus me-1"></i> Add New Service
                                        </a>
                                    </div>
                                </div>

                                <!-- Filter Section -->
                                <form method="GET" action="{{ route('services.index') }}">
                                    <div class="row g-2 align-items-end mb-3">
                                        <!-- Gender Dropdown -->
                                        <div class="col-md-3">
                                            <label class="form-label">Select Gender</label>
                                            <select name="gender_id" class="form-select" id="gender-select">
                                                <option value="">All</option>
                                                @foreach ($genders as $gender)
                                                    <option value="{{ $gender->id }}"
                                                        {{ request('gender_id') == $gender->id ? 'selected' : '' }}>
                                                        {{ $gender->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <!-- Top Category Dropdown -->
                                        <div class="col-md-3">
                                            <label class="form-label">Top Category</label>
                                            <select name="top_category_id" class="form-select" id="top-category-select">
                                                <option value="">All</option>
                                                {{-- will be filled dynamically via JS --}}
                                            </select>

                                        </div>

                                        <!-- Mid Category Dropdown -->
                                        <div class="col-md-3">
                                            <label class="form-label">Mid Category</label>
                                            <select name="mid_category_id" class="form-select" id="mid-category-select">
                                                <option value="">All</option>
                                                @foreach ($midCategories as $mid)
                                                    <option value="{{ $mid->id }}"
                                                        {{ request('mid_category_id') == $mid->id ? 'selected' : '' }}>
                                                        {{ $mid->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <!-- Submit Button -->
                                        <div class="col-md-3">
                                            <button type="submit" class="btn btn-primary w-100">Filter</button>
                                        </div>
                                    </div>
                                </form>


                                <!-- Table -->
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover align-middle">
                                        <thead class="table-light">
                                            <tr>
                                                <th>ID</th>
                                                <th>Service For</th>
                                                <th>Top Category</th>
                                                <th>Mid Category</th>
                                                <th>Service Name</th>
                                                <th>Image / Video</th>
                                                <th>Price</th>
                                                <th>Duration</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($services as $service)
                                                <tr id="service-row-{{ $service->id }}">
                                                    <td>{{ $service->id }}</td>

                                                    <!-- Gender -->
                                                    <td>
                                                        {{ optional($service->midCategory->topCategory->gender)->name ?? 'N/A' }}
                                                    </td>

                                                    <!-- Top Category -->
                                                    <td>{{ $service->midCategory->topCategory->name ?? 'N/A' }}</td>

                                                    <!-- Mid Category -->
                                                    <td>{{ $service->midCategory->name ?? 'N/A' }}</td>

                                                    <!-- Service Name -->
                                                    <td>{{ $service->name }}</td>

                                                    <!-- Media -->
                                                    <td>
                                                        @if ($service->image)
                                                            <img src="{{ asset('storage/services/images/' . $service->image) }}"
                                                                alt="Image" width="60">
                                                        @elseif ($service->video)
                                                            <video width="80" controls>
                                                                <source
                                                                    src="{{ asset('storage/services/videos/' . $service->video) }}"
                                                                    type="video/mp4">
                                                            </video>
                                                        @else
                                                            N/A
                                                        @endif
                                                    </td>

                                                    <td>₹{{ number_format($service->price ?? 0, 2) }}</td>
                                                    <td>{{ $service->duration ?? 'N/A' }} mins</td>

                                                    <!-- Status Toggle -->
                                                    <td>
                                                        <button
                                                            class="btn btn-sm toggle-status-btn {{ $service->action === 'active' ? 'btn-success' : 'btn-secondary' }}"
                                                            data-id="{{ $service->id }}">
                                                            {{ ucfirst($service->action) }}
                                                        </button>
                                                    </td>

                                                    <!-- Actions -->
                                                    <td class="d-flex gap-2">
                                                        <a href="{{ route('services.edit', $service->id) }}"
                                                            class="btn btn-sm btn-primary">Edit</a>
                                                        <form action="{{ route('services.destroy', $service->id) }}"
                                                            method="POST"
                                                            onsubmit="return confirm('Are you sure you want to delete this service?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-sm btn-danger">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="10" class="text-center text-muted">No services found.
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
                    const serviceId = this.dataset.id;
                    const btn = this;

                    fetch(`/admin/services/toggle-status/${serviceId}`, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Accept': 'application/json',
                                'Content-Type': 'application/json',
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.status === 'success') {
                                btn.textContent = data.action.charAt(0).toUpperCase() + data
                                    .action.slice(1);
                                btn.classList.toggle('btn-success', data.action === 'active');
                                btn.classList.toggle('btn-secondary', data.action ===
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
    document.addEventListener('DOMContentLoaded', function () {
        const genderSelect = document.getElementById('gender-select');
        const topCategorySelect = document.getElementById('top-category-select');
        const midCategorySelect = document.getElementById('mid-category-select');

        const selectedGenderId = "{{ request('gender_id') }}";
        const selectedTopCategoryId = "{{ request('top_category_id') }}";
        const selectedMidCategoryId = "{{ request('mid_category_id') }}";

        function loadTopCategories(genderId, callback = null) {
            topCategorySelect.innerHTML = '<option value="">All</option>';
            midCategorySelect.innerHTML = '<option value="">All</option>'; // reset mids

            if (!genderId) return;

            fetch(`/admin/get-top-categories/${genderId}`)
                .then(res => res.json())
                .then(data => {
                    data.forEach(top => {
                        const selected = (top.id == selectedTopCategoryId) ? 'selected' : '';
                        topCategorySelect.innerHTML += `<option value="${top.id}" ${selected}>${top.name}</option>`;
                    });

                    if (callback && typeof callback === 'function') {
                        callback();
                    }
                });
        }

        function loadMidCategories(topCategoryId) {
            midCategorySelect.innerHTML = '<option value="">All</option>';

            if (!topCategoryId) return;

            fetch(`/admin/get-mid-categories/${topCategoryId}`)
                .then(res => res.json())
                .then(data => {
                    data.forEach(mid => {
                        const selected = (mid.id == selectedMidCategoryId) ? 'selected' : '';
                        midCategorySelect.innerHTML += `<option value="${mid.id}" ${selected}>${mid.name}</option>`;
                    });
                });
        }

        // Event: Gender Changed
        genderSelect.addEventListener('change', function () {
            const genderId = this.value;
            loadTopCategories(genderId);
        });

        // Event: Top Category Changed
        topCategorySelect.addEventListener('change', function () {
            const topCategoryId = this.value;
            loadMidCategories(topCategoryId);
        });

        // 🔄 Auto load on page load if gender is pre-selected
        if (selectedGenderId) {
            loadTopCategories(selectedGenderId, function () {
                if (selectedTopCategoryId) {
                    loadMidCategories(selectedTopCategoryId);
                }
            });
        }
    });
</script>





@endsection
