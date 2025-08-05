@extends('layouts.adminmaster')

@section('title', 'Edit Mid Category | Tenants Management')

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <!-- Page Title -->
                <div class="row mb-4">
                    <div class="col-12">
                        <h4 class="mb-0">Edit Mid Category</h4>
                    </div>
                </div>

                <!-- Form -->
                <form action="{{ route('mid-categories.update', $midCategory->id) }}" method="POST"  enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Gender Selection -->
                    <div class="row mb-3">
                        <label class="form-label">Select Gender:</label>
                        <div class="col-md-2">
                            <input type="radio" name="gender_id" value="1"
                                {{ $midCategory->topCategory->gender_id == 1 ? 'checked' : '' }}> Men
                        </div>
                        <div class="col-md-2">
                            <input type="radio" name="gender_id" value="2"
                                {{ $midCategory->topCategory->gender_id == 2 ? 'checked' : '' }}> Women
                        </div>
                    </div>

                    <!-- Top Category Selection -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Select Top Category</label>
                            <select name="top_category_id" id="top_category_select" class="form-control" required>
                                <option value="">-- Select Top Category --</option>
                                @foreach ($topCategories as $topCategory)
                                    @if ($topCategory->gender_id == $midCategory->topCategory->gender_id)
                                        <option value="{{ $topCategory->id }}"
                                            {{ $topCategory->id == $midCategory->top_category_id ? 'selected' : '' }}>
                                            {{ $topCategory->name }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Mid Category Name -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Mid Category Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $midCategory->name }}"
                                placeholder="Enter mid-level category name" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Upload New Image</label>
                            <input type="file" name="image" class="form-control" accept="image/*">
                            @if($midCategory->image)
                                <img src="{{ asset('storage/uploads/mid_categories/' . $midCategory->image) }}" height="80">
                            @endif
                        </div>
                    </div>

                    


                    <!-- Submit & View Buttons -->
                    <div class="text-start mt-4 mb-4">
                        <button type="submit" class="btn btn-success btn-lg me-3">Update Mid Category</button>
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
            const selectedTopId = "{{ $midCategory->top_category_id }}";

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
                                option.textContent = category.name;
                                if (category.id == selectedTopId) {
                                    option.selected = true;
                                }
                                topCategorySelect.appendChild(option);
                            });
                        })
                        .catch(() => {
                            topCategorySelect.innerHTML =
                                '<option value="">Failed to load categories</option>';
                        });
                });

                // auto-load top categories on page load if gender is preselected
                if (input.checked) {
                    input.dispatchEvent(new Event('change'));
                }
            });
        });
    </script>
@endsection
