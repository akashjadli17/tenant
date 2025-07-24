@extends('layouts.adminmaster')

@section('title', 'Add Low Category | Myraluxa Aesthetic Pvt Ltd')

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- Page Title -->
            <div class="row mb-4">
                <div class="col-12">
                    <h4 class="mb-0">Add New Low Category</h4>
                </div>
            </div>

            <!-- Form -->
            <form action="{{ route('low-categories.store') }}" method="POST">
                @csrf

                <!-- Gender Selection -->
                <div class="row mb-3">
                    <label class="form-label">Select Gender:</label>
                    <div class="col-md-2">
                        <input type="radio" name="gender_id" value="1" required> Men
                    </div>
                    <div class="col-md-2">
                        <input type="radio" name="gender_id" value="2"> Women
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
                        <input type="text" name="name" class="form-control" placeholder="Enter low-level category name" required>
                    </div>
                </div>

                <!-- Submit & View Buttons -->
                <div class="text-start mt-4 mb-4">
                    <button type="submit" class="btn btn-success btn-lg me-3">Save Low Category</button>
                    <a href="{{ route('low-categories.index') }}" class="btn btn-primary btn-lg">View Low Categories</a>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- Scripts -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const genderInputs = document.querySelectorAll('input[name="gender_id"]');
        const topCategorySelect = document.getElementById('top_category_select');
        const midCategorySelect = document.getElementById('mid_category_select');

        // Gender to Top Categories
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
                            topCategorySelect.appendChild(option);
                        });
                    })
                    .catch(() => {
                        topCategorySelect.innerHTML = '<option value="">Failed to load categories</option>';
                    });
            });
        });

        // Top Category to Mid Categories
        topCategorySelect.addEventListener('change', function () {
            const topCategoryId = this.value;
            midCategorySelect.innerHTML = '<option value="">Loading...</option>';

            fetch(`/admin/get-mid-categories/${topCategoryId}`)
                .then(res => res.json())
                .then(data => {
                    midCategorySelect.innerHTML = '<option value="">-- Select Mid Category --</option>';
                    data.forEach(category => {
                        const option = document.createElement('option');
                        option.value = category.id;
                        option.textContent = category.name;
                        midCategorySelect.appendChild(option);
                    });
                })
                .catch(() => {
                    midCategorySelect.innerHTML = '<option value="">Failed to load mid categories</option>';
                });
        });
    });
</script>
@endsection
