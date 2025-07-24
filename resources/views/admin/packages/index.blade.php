@extends('layouts.adminmaster')

@section('content')

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- Page Title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">View Packages</h4>
                    </div>
                </div>
            </div>
 
                <h2>All Packages</h2>
                <a href="{{ route('admin.packages.create') }}" class="btn btn-success mb-3">+ Add Package</a>

                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>₹ Price</th>
                            <th>Data (MB)</th>
                            <th>Properties</th>
                            <th>Months</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($packages as $package)
                        <tr>
                            <td>{{ $package->name }}</td>
                            <td>₹{{ $package->price }}</td>
                            <td>{{ $package->max_data_mb }}</td>
                            <td>{{ $package->max_properties }}</td>
                            <td>{{ $package->duration_months }}</td>
                            <td>
                                <a href="{{ route('admin.packages.edit', $package) }}"
                                    class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('admin.packages.destroy', $package) }}" method="POST"
                                    class="d-inline" onsubmit="return confirm('Delete this package?');">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </form>
                                <a href="{{ route('admin.packages.show', $package) }}"
                                    class="btn btn-sm btn-info">View</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            
        </div>
    </div>
</div>

@endsection