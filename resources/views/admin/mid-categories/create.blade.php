@extends('layouts.adminmaster')

@section('title', 'Add Mid Category | Myraluxa Aesthetic Pvt Ltd')

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <!-- Page Title -->
                <div class="row mb-4">
                    <div class="col-12">
                        <h4 class="mb-0">Add New Mid Category</h4>
                    </div>
                </div>

                <!-- Form -->
                <form action="{{ route('mid-categories.store') }}" method="POST"  enctype="multipart/form-data">
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


                    <!-- Mid Category Name -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Mid Category Name</label>
                            <input type="text" name="name" class="form-control"
                                placeholder="Enter mid-level category name" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Upload Image</label>
                            <input type="file" name="image" class="form-control" accept="image/*">
                        </div>
                    </div>


                    <!-- Submit & View Buttons -->
                    <div class="text-start mt-4 mb-4">
                        <button type="submit" class="btn btn-success btn-lg me-3">Save Mid Category</button>
                        <a href="{{ route('mid-categories.index') }}" class="btn btn-primary btn-lg">View Mid Categories</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
 
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const genderInputs = document.querySelectorAll('input[name="gender_id"]');
            const topCategorySelect = document.getElementById('top_category_select');

            genderInputs.forEach(input => {
                input.addEventListener('change', function() {
                 
                    const genderId = this.value;
                    topCategorySelect.innerHTML = '<option value="">Loading...</option>';

                    fetch(`/admin/get-top-categories/${genderId}`)
                        .then(res => res.json())
                        .then(data => {
                            topCategorySelect.innerHTML =
                                '<option value="">-- Select Top Category --</option>';
                            data.forEach(category => {
                                const option = document.createElement('option');
                                option.value = category.id;
                                option.textContent = `${category.name}`;
                                topCategorySelect.appendChild(option);
                            });
                        })
                        .catch(() => {
                            topCategorySelect.innerHTML =
                                '<option value="">Failed to load categories</option>';
                        });
                });
            });
        });
    </script>
@endsection
