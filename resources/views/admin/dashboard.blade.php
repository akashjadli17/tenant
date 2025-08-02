@extends('layouts.adminmaster')

@section('title', 'Tenant Aesthetic Pvt Ltd')

@section('content')



<!-- Start right Content here -->
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Dashboard</h4>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <h2>Choose a Package</h2>
            <div class="row">
                @foreach($packages as $package)
                <div class="col-md-4">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5>{{ $package->name }}</h5>
                            <p>₹{{ $package->price }}</p>
                            <ul>
                                <li>Data: {{ $package->max_data_mb }}MB</li>
                                <li>Properties: {{ $package->max_properties }}</li>
                                <li>Duration: {{ $package->duration_months }} months</li>
                            </ul>
                            <form method="POST" action="{{ route('choose.package', $package->id) }}">
                                @csrf
                                <button class="btn btn-primary">Choose Package</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
</div>

    @endsection