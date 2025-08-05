@extends('layouts.adminmaster')

@section('title', 'View Top Categories | Tenants Management')

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- Page Title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">View Top Categories</h4>
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
                                    <h4 class="card-title">All Top Categories</h4>
                                </div>
                                <div class="col-md-6 text-end">
                                    <a href="{{ route('top-categories.create') }}" class="btn btn-success btn-rounded">
                                        <i class="mdi mdi-plus me-1"></i> Add New Top Category
                                    </a>
                                </div>
                            </div>

                            <!-- Table -->
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover align-middle">
                                    <thead class="table-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Gender</th>
                                            <th>Category Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($topCategories as $category)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>

                                                <td>{{ $category->gender_id == 1 ? 'Men' : 'Women' }}</td>
                                                <td>{{ $category->name }}</td>
                                                <td class="d-flex gap-2">
                                                    <a href="{{ route('top-categories.edit', $category->id) }}"
                                                       class="btn btn-sm btn-primary">Edit</a>
                                                    <form action="{{ route('top-categories.destroy', $category->id) }}"
                                                          method="POST"
                                                          onsubmit="return confirm('Are you sure you want to delete this category?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach

                                        @if ($topCategories->isEmpty())
                                            <tr>
                                                <td colspan="4" class="text-center text-muted">No top categories found.</td>
                                            </tr>
                                        @endif
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
@endsection
