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
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <!-- Dashboard Stat Cards -->
                <div class="row">
                    <!-- Total Property -->
                    <div class="col-md-3">
                        <div class="card mini-stats-wid">
                            <div class="card-body d-flex align-items-center">
                                <div class="flex-shrink-0 avatar-sm me-3">
                                    <span class="avatar-title bg-soft-success rounded-circle">
                                        <i class="mdi mdi-office-building text-success fs-4"></i>
                                    </span>
                                </div>
                                <div class="flex-grow-1">
                                    <p class="text-muted mb-1">Total Property</p>
                                    <h5 class="mb-0">{{ $totalProperties ?? 0 }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Total Unit -->
                    <div class="col-md-3">
                        <div class="card mini-stats-wid">
                            <div class="card-body d-flex align-items-center">
                                <div class="flex-shrink-0 avatar-sm me-3">
                                    <span class="avatar-title bg-soft-warning rounded-circle">
                                        <i class="mdi mdi-home-group text-warning fs-4"></i>
                                    </span>
                                </div>
                                <div class="flex-grow-1">
                                    <p class="text-muted mb-1">Total Unit</p>
                                    <h5 class="mb-0">{{ $totalUnits ?? 0 }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Total Invoice -->
                    <div class="col-md-3">
                        <div class="card mini-stats-wid">
                            <div class="card-body d-flex align-items-center">
                                <div class="flex-shrink-0 avatar-sm me-3">
                                    <span class="avatar-title bg-soft-secondary rounded-circle">
                                        <i class="mdi mdi-file-document text-secondary fs-4"></i>
                                    </span>
                                </div>
                                <div class="flex-grow-1">
                                    <p class="text-muted mb-1">Total Invoice</p>
                                    <h5 class="mb-0">${{ $totalInvoice ?? 0 }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Total Expense -->
                    <div class="col-md-3">
                        <div class="card mini-stats-wid">
                            <div class="card-body d-flex align-items-center">
                                <div class="flex-shrink-0 avatar-sm me-3">
                                    <span class="avatar-title bg-soft-danger rounded-circle">
                                        <i class="mdi mdi-cash-multiple text-danger fs-4"></i>
                                    </span>
                                </div>
                                <div class="flex-grow-1">
                                    <p class="text-muted mb-1">Total Expense</p>
                                    <h5 class="mb-0">${{ $totalExpense ?? 0 }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Dashboard Stat Cards -->

                <!-- Packages Section -->
                <h2 class="mt-4">Choose a Package</h2>
                <div class="row">
                    @foreach ($packages as $package)
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
