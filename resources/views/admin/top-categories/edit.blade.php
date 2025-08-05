@extends('layouts.adminmaster')

@section('title', 'Edit Top Category | Tenants Management')

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <!-- Page Title -->
                <div class="row mb-4">
                    <div class="col-12">
                        <h4 class="mb-0">Edit Top Category</h4>
                    </div>
                </div>

                <!-- Edit Form -->
                <form action="{{ route('top-categories.update', $topCategory->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Gender Selection -->
                    <div class="row mb-3">
                        <label class="form-label">Select Gender:</label>
                        <div class="col-md-2">
                            <input type="radio" name="gender_id" value="1"
                                {{ $topCategory->gender_id == 1 ? 'checked' : '' }} required> Men
                        </div>
                        <div class="col-md-2">
                            <input type="radio" name="gender_id" value="2"
                                {{ $topCategory->gender_id == 2 ? 'checked' : '' }}> Women
                        </div>
                    </div>

                    <!-- Category Name -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Category Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $topCategory->name }}"
                                required>
                        </div>
                    </div>

                    <!-- Submit Buttons -->
                    <div class="text-center mt-4 mb-4">
                        <button type="submit" class="btn btn-success btn-lg me-3">Update</button>
                        <a href="{{ route('top-categories.index') }}" class="btn btn-secondary btn-lg">Back</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
