@extends('layouts.adminmaster')

@section('title', 'Edit Package | Myraluxa Aesthetic Pvt Ltd')

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <div class="row mb-4">
                <div class="col-12">
                    <h4 class="mb-0">Edit Package</h4>
                </div>
            </div>

            <form id="packageForm" action="{{ route('packages.update', $package->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Image Upload -->
                <div class="mb-3">
                    <label class="form-label">Package Image</label>
                    <input type="file" name="package_image" class="form-control" accept="image/*" onchange="previewImage(event)">
                    <div class="mt-2">
                        <img id="imagePreview"
                             src="{{ $package->package_image ? asset('storage/' . $package->package_image) : '#' }}"
                             alt="Preview"
                             style="{{ $package->package_image ? '' : 'display:none;' }} max-height: 150px;">
                    </div>
                </div>

                <!-- Package Type & Title -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Package Type</label>
                        <input type="text" name="package_type" class="form-control"
                               value="{{ old('package_type', $package->package_type) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Package Title</label>
                        <input type="text" name="title" class="form-control"
                               value="{{ old('title', $package->title) }}" required>
                    </div>
                </div>

                <!-- Prices -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Original Price (₹)</label>
                        <input type="number" name="original_price" class="form-control" step="0.01"
                               value="{{ old('original_price', $package->original_price) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Discounted Price (₹)</label>
                        <input type="number" name="discounted_price" class="form-control" step="0.01"
                               value="{{ old('discounted_price', $package->discounted_price) }}" required>
                    </div>
                </div>

                <!-- Features -->
                <div class="mb-3">
                    <label class="form-label">Features</label>
                    <div id="features-wrapper">
                        @php $features = is_array($package->features) ? $package->features : json_decode($package->features, true); @endphp

                        @if(is_array($features))
                            @foreach($features as $feature)
                                <div class="input-group mb-2 feature-item">
                                    <input type="text" class="form-control feature-input" value="{{ $feature }}">
                                    <button type="button" class="btn btn-danger remove-feature">Remove</button>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <button type="button" id="add-feature" class="btn btn-info btn-sm mb-2">+ Add Feature</button>

                    <!-- Hidden input to hold JSON array -->
                    <input type="hidden" name="features" id="features-json" required>
                </div>

                <!-- Submit -->
                <div class="text-center mt-4 mb-4">
                    <button type="submit" class="btn btn-success btn-lg me-3">Update Package</button>
                    <a href="{{ route('packages.index') }}" class="btn btn-primary btn-lg">View Packages</a>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function previewImage(event) {
        const image = document.getElementById('imagePreview');
        image.src = URL.createObjectURL(event.target.files[0]);
        image.style.display = 'block';
    }

    document.addEventListener('DOMContentLoaded', function () {
        const addBtn = document.getElementById('add-feature');
        const wrapper = document.getElementById('features-wrapper');
        const hiddenField = document.getElementById('features-json');
        const form = document.getElementById('packageForm');

        addBtn.addEventListener('click', function () {
            const div = document.createElement('div');
            div.className = 'input-group mb-2 feature-item';
            div.innerHTML = `
                <input type="text" class="form-control feature-input" placeholder="Enter a feature">
                <button type="button" class="btn btn-danger remove-feature">Remove</button>
            `;
            wrapper.appendChild(div);
        });

        wrapper.addEventListener('click', function (e) {
            if (e.target.classList.contains('remove-feature')) {
                e.target.closest('.feature-item').remove();
            }
        });

        form.addEventListener('submit', function (e) {
            const inputs = document.querySelectorAll('.feature-input');
            const featuresArray = [];
            inputs.forEach(input => {
                const val = input.value.trim();
                if (val) featuresArray.push(val);
            });

            if (featuresArray.length === 0) {
                e.preventDefault();
                alert("Please enter at least one feature.");
                return;
            }

            hiddenField.value = JSON.stringify(featuresArray);
        });
    });
</script>
@endpush
