@extends('layouts.adminmaster')

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
    <h2>Packages</h2>

    <!-- Button to Open Create Package Modal -->
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createPackageModal">
        <i class="fas fa-plus"></i> Create Package
    </button>

    <!-- Include the form modal -->
    @include('admin.packages.form')

        </div>
    </div>
</div>
@endsection
