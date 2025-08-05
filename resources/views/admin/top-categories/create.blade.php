@extends('layouts.adminmaster')

@section('title', 'Add Top Category | Tenants Management')

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <!-- Page Title -->
                <div class="row mb-4">
                    <div class="col-12">
                        <h4 class="mb-0">Add New Top Category</h4>
                    </div>
                </div>

                <!-- Form -->
                <form action="{{ route('top-categories.store') }}" method="POST">
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

                    <!-- Category Name -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Category Name</label>
                            <input type="text" name="name" class="form-control"
                                placeholder="Enter top-level category name" required>
                        </div>
                    </div>

                    <!-- Submit & View Buttons -->
                    <div class="text-start mt-4 mb-4">
                        <button type="submit" class="btn btn-success btn-lg me-3">Save Top Category</button>
                        <a href="{{ route('top-categories.index') }}" class="btn btn-primary btn-lg">View Top Categories</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
