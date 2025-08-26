@extends('layouts.adminmaster')

@section('title', 'Tenant Aesthetic Pvt Ltd')

@section('content')


   {{-- Notifications --}}
    @auth
        @foreach(auth()->user()->unreadNotifications as $notif)
            <div class="alert alert-warning py-2 mb-2">
                <strong>{{ $notif->data['title'] }}</strong> –
                {{ $notif->data['message'] }}
                <a href="{{ $notif->data['action_url'] ?? '#' }}" class="ms-2">Renew</a>
            </div>
        @endforeach
    @endauth


    @if(!is_null($daysLeft) && $daysLeft <= 10 && $daysLeft> 0)

        <div class="alert alert-warning d-flex align-items-center" role="alert">
            <i class="mdi mdi-alert-circle-outline me-2"></i>
            Your plan expires in <strong class="ms-1">{{ $daysLeft }}</strong> day{{ $daysLeft == 1 ? '' : 's' }}.
            Consider renewing to avoid interruptions.
        </div>
        
    @endif 

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
                 
                <div class="row"> 
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

                {{-- Packages Section --}}
                @if($showPackages)
                <h2 class="mt-4">
                    Choose a Package
                    @if(!is_null($daysLeft))
                    <small class="text-muted">
                        ({{ $daysLeft <= 0 ? 'Expired' : $daysLeft.' days left' }})
                    </small>
                    @endif
                </h2>

                <!-- Dashboard Stat Cards -->
                <div class="row">
                    @forelse ($packages as $package)
                    <div class="col-md-4">
                        <div class="card mb-3 h-100">
                            <div class="card-body d-flex flex-column">
                                <h5 class="text-capitalize mb-1">{{ $package->package_type }}</h5>

                                @php
                                $currency = strtoupper($package->currency ?? 'INR');
                                $symbol = $currency === 'INR' ? '₹' : ($currency === 'USD' ? '$' : $currency.' ');
                                @endphp

                                <div class="mb-2">
                                    <span
                                        class="fw-semibold">{{ $symbol }}{{ number_format($package->price, 2) }}</span>
                                    <small class="text-muted">/ {{ $package->billing_cycle }}</small>
                                </div>

                                @if(is_array($package->features))
                                <ul class="list-unstyled small mb-3">
                                    @foreach($package->features as $feat)
                                    <li class="mb-1">
                                        @if(($feat['checked'] ?? '0') == '1')
                                        ✅ {{ $feat['name'] ?? '' }}
                                        @else
                                        ❌ <span class="text-muted">{{ $feat['name'] ?? '' }}</span>
                                        @endif
                                    </li>
                                    @endforeach
                                </ul>
                                @endif

                                <form action="{{ route('choose.package', $package->id) }}" method="POST"
                                    class="mt-auto">
                                    @csrf
                                    <button class="btn btn-primary w-100">Choose Package</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12">
                        <div class="alert alert-info">No active packages available right now.</div>
                    </div>
                    @endforelse
                </div>
                @endif

            </div>
        </div>
    </div>

@endsection
