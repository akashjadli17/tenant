@extends('layouts.adminmaster')

@section('title', 'Tenant Pvt Ltd')

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

            <!-- Dashboard Stat Cards -->
            <div class="row g-4">
                <!-- Total Property -->
                <div class="col-md-3">
                    <div class="card mini-stats-wid shadow-sm border-0">
                        <div class="card-body d-flex align-items-center">
                            <div class="flex-shrink-0 avatar-sm me-3">
                                <span class="avatar-title bg-soft-success rounded-circle">
                                    <i class="mdi mdi-office-building text-success fs-4"></i>
                                </span>
                            </div>
                            <div class="flex-grow-1">
                                <p class="text-muted mb-1">Total Property</p>
                                <h5 class="mb-1">{{ $totalProperties ?? 0 }}</h5>
                                <span class="badge bg-success-subtle text-success">
                                    <i class="mdi mdi-trending-up me-1"></i> +5% this month
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Unit -->
                <div class="col-md-3">
                    <div class="card mini-stats-wid shadow-sm border-0">
                        <div class="card-body d-flex align-items-center">
                            <div class="flex-shrink-0 avatar-sm me-3">
                                <span class="avatar-title bg-soft-warning rounded-circle">
                                    <i class="mdi mdi-home-group text-warning fs-4"></i>
                                </span>
                            </div>
                            <div class="flex-grow-1">
                                <p class="text-muted mb-1">Total Unit</p>
                                <h5 class="mb-1">{{ $totalUnits ?? 0 }}</h5>
                                <span class="badge bg-warning-subtle text-warning">
                                    <i class="mdi mdi-trending-down me-1"></i> -2% vs last week
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Invoice -->
                <div class="col-md-3">
                    <div class="card mini-stats-wid shadow-sm border-0">
                        <div class="card-body d-flex align-items-center">
                            <div class="flex-shrink-0 avatar-sm me-3">
                                <span class="avatar-title bg-soft-secondary rounded-circle">
                                    <i class="mdi mdi-file-document text-secondary fs-4"></i>
                                </span>
                            </div>
                            <div class="flex-grow-1">
                                <p class="text-muted mb-1">Total Invoice</p>
                                <h5 class="mb-1">${{ $totalInvoice ?? 0 }}</h5>
                                <span class="badge bg-secondary-subtle text-secondary">
                                    <i class="mdi mdi-information-outline me-1"></i> Pending approvals
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Expense -->
                <div class="col-md-3">
                    <div class="card mini-stats-wid shadow-sm border-0">
                        <div class="card-body d-flex align-items-center">
                            <div class="flex-shrink-0 avatar-sm me-3">
                                <span class="avatar-title bg-soft-danger rounded-circle">
                                    <i class="mdi mdi-cash-multiple text-danger fs-4"></i>
                                </span>
                            </div>
                            <div class="flex-grow-1">
                                <p class="text-muted mb-1">Total Expense</p>
                                <h5 class="mb-1">${{ $totalExpense ?? 0 }}</h5>
                                <span class="badge bg-danger-subtle text-danger">
                                    <i class="mdi mdi-alert-circle-outline me-1"></i> Over budget 10%
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Dashboard Stat Cards -->

        </div>
    </div>
</div>

<style>
    .avatar-title {
    background-color: #f8f8fb !important;
}

</style>
@endsection
