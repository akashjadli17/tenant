@extends('layouts.adminmaster')

@section('title', 'Edit Low Category | Myraluxa Aesthetic Pvt Ltd')

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- Page Title -->
            <div class="row mb-4">
                <div class="col-12">
                    <h4 class="mb-0">Edit Low Category</h4>
                </div>
            </div>

            <!-- Form -->
            <form action="{{ route('low-categories.update', $lowCategory->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Gender Selection -->
                <div class="row mb-3">
                    <label class="form-label">Select Gender:</label>
                    <div class="col-md-2">
                        <input type="radio" name="gender_id" value="1"
                            {{ $lowCategory->midCategory->topCategory->gender_id == 1 ? 'checked' : '' }}> Men
                    </div>
                    <div class="col-md-2">
                        <input type="radio" name="gender_id" value="2"
                            {{ $lowCategory->midCategory->topCategory->gender_id == 2 ? 'checked' : '' }}> Women
                    </div>
                </div>

                <!-- Top Category Selection -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Select Top Category</label>
                        <select name="top_category_id" id="top_category_select" class="form-control" required>
                            <option value="">-- Select Top Category --</option>
                        </select>
                    </div>
                </div>

                <!-- Mid Category Selection -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Select Mid Category</label>
                        <select name="mid_category_id" id="mid_category_select" class="form-control" required>
                            <option value="">-- Select Mid Category --</option>
                        </select>
                    </div>
                </div>

                <!-- Low Category Name -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Low Category Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $lowCategory->name }}"
                            placeholder="Enter low-level category name" required>
                    </div>
                </div>

                <!-- Submit & View Buttons -->
                <div class="text-start mt-4 mb-4">
                    <button type="submit" class="btn btn-success btn-lg me-3">Update Low Category</button>
                    <a href="{{ route('low-categories.index') }}" class="btn btn-primary btn-lg">View Low Categories</a>
                </div>
            </form>

        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const genderInputs = document.querySelectorAll('input[name="gender_id"]');
        const topCategorySelect = document.getElementById('top_category_select');
        const midCategorySelect = document.getElementById('mid_category_select');

        const selectedTopId = "{{ $lowCategory->midCategory->top_category_id }}";
        const selectedMidId = "{{ $lowCategory->mid_category_id }}";

        genderInputs.forEach(input => {
            input.addEventListener('change', function () {
                const genderId = this.value;
                topCategorySelect.innerHTML = '<option value="">Loading...</option>';
                midCategorySelect.innerHTML = '<option value="">-- Select Mid Category --</option>';

                fetch(`/admin/get-top-categories/${genderId}`)
                    .then(res => res.json())
                    .then(data => {
                        topCategorySelect.innerHTML = '<option value="">-- Select Top Category --</option>';
                        data.forEach(category => {
                            const option = document.createElement('option');
                            option.value = category.id;
                            option.textContent = category.name;
                            if (category.id == selectedTopId) {
                                option.selected = true;
                            }
                            topCategorySelect.appendChild(option);
                        });

                        if (selectedTopId) {
                            loadMidCategories(selectedTopId);
                        }
                    });
            });

            // Auto trigger for pre-selected gender
            if (input.checked) {
                input.dispatchEvent(new Event('change'));
            }
        });

        // When Top Category changes, load mid categories
        topCategorySelect.addEventListener('change', function () {
            const topId = this.value;
            loadMidCategories(topId);
        });

        function loadMidCategories(topCategoryId) {
            midCategorySelect.innerHTML = '<option value="">Loading...</option>';

            fetch(`/admin/get-mid-categories/${topCategoryId}`)
                .then(res => res.json())
                .then(data => {
                    midCategorySelect.innerHTML = '<option value="">-- Select Mid Category --</option>';
                    data.forEach(mid => {
                        const option = document.createElement('option');
                        option.value = mid.id;
                        option.textContent = mid.name;
                        if (mid.id == selectedMidId) {
                            option.selected = true;
                        }
                        midCategorySelect.appendChild(option);
                    });
                })
                .catch(() => {
                    midCategorySelect.innerHTML = '<option value="">Failed to load mid categories</option>';
                });
        }
    });
</script>
@endsection
