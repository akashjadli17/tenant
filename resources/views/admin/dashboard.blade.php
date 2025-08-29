@extends('layouts.adminmaster')

@section('title', 'Tenant Pvt Ltd')

@section('content')

    {{-- Notifications --}}
    @auth
        @foreach (auth()->user()->unreadNotifications as $notif)
            <div class="alert alert-warning py-2 mb-2">
                <strong>{{ $notif->data['title'] }}</strong> –
                {{ $notif->data['message'] }}
                <a href="{{ $notif->data['action_url'] ?? '#' }}" class="ms-2">Renew</a>
            </div>
        @endforeach
    @endauth

    {{-- Show expiry warning only for admins --}}
    @if (auth()->user()->user_type === 'admin' && !is_null($daysLeft) && $daysLeft <= 10 && $daysLeft > 0)
        <div class="alert alert-warning d-flex align-items-center" role="alert">
            <i class="mdi mdi-alert-circle-outline me-2"></i>
            Your plan expires in <strong class="ms-1">{{ $daysLeft }}</strong> day{{ $daysLeft == 1 ? '' : 's' }}.
            Consider renewing to avoid interruptions.
        </div>
    @endif

    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <!-- Page Title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Dashboard</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ================= ADMIN DASHBOARD ================= --}}
                @if (auth()->user()->user_type === 'admin')
                    <div class="row">
                        <!-- Total Properties -->
                        <div class="col-md-3">
                            <div class="card mini-stats-wid">
                                <div class="card-body d-flex align-items-center">
                                    <div class="flex-shrink-0 avatar-sm me-3">
                                        <span class="avatar-title bg-soft-success rounded-circle">
                                            <i class="mdi mdi-office-building text-success fs-4"></i>
                                        </span>
                                    </div>
                                    <div class="flex-grow-1">
                                        <p class="text-muted mb-1">Total Properties</p>
                                        <h5 class="mb-0">{{ $totalProperties ?? 0 }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Total Units -->
                        <div class="col-md-3">
                            <div class="card mini-stats-wid">
                                <div class="card-body d-flex align-items-center">
                                    <div class="flex-shrink-0 avatar-sm me-3">
                                        <span class="avatar-title bg-soft-warning rounded-circle">
                                            <i class="mdi mdi-home-group text-warning fs-4"></i>
                                        </span>
                                    </div>
                                    <div class="flex-grow-1">
                                        <p class="text-muted mb-1">Total Units</p>
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

                    {{-- Packages Section --}}
                    @if ($showPackages)
                        <h2 class="mt-4">
                            Choose a Package
                            @if (!is_null($daysLeft))
                                <small class="text-muted">
                                    ({{ $daysLeft <= 0 ? 'Expired' : $daysLeft . ' days left' }})
                                </small>
                            @endif
                        </h2>

                        <div class="row">
                            @forelse ($packages as $package)
                                <div class="col-md-4">
                                    <div class="card mb-3 h-100">
                                        <div class="card-body d-flex flex-column">
                                            <h5 class="text-capitalize mb-1">{{ $package->package_type }}</h5>

                                            @php
                                                $currency = strtoupper($package->currency ?? 'INR');
                                                $symbol =
                                                    $currency === 'INR'
                                                        ? '₹'
                                                        : ($currency === 'USD'
                                                            ? '$'
                                                            : $currency . ' ');
                                            @endphp

                                            <div class="mb-2">
                                                <span
                                                    class="fw-semibold">{{ $symbol }}{{ number_format($package->price, 2) }}</span>
                                                <small class="text-muted">/ {{ $package->billing_cycle }}</small>
                                            </div>

                                            @if (is_array($package->features))
                                                <ul class="list-unstyled small mb-3">
                                                    @foreach ($package->features as $feat)
                                                        <li class="mb-1">
                                                            @if (($feat['checked'] ?? '0') == '1')
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
                @endif
                {{-- ================= END ADMIN DASHBOARD ================= --}}

                {{-- ================= OWNER DASHBOARD ================= --}}
                @if (auth()->user()->user_type === 'owner')
                    <div class="row">
                        <!-- Total Properties -->
                        <div class="col-md-3">
                            <div class="card mini-stats-wid">
                                <div class="card-body d-flex align-items-center">
                                    <div class="flex-shrink-0 avatar-sm me-3">
                                        <span class="avatar-title bg-soft-success rounded-circle">
                                            <i class="mdi mdi-office-building text-success fs-4"></i>
                                        </span>
                                    </div>
                                    <div class="flex-grow-1">
                                        <p class="text-muted mb-1">Total Properties</p>
                                        <h5 class="mb-0">{{ $totalProperties ?? 0 }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Total Units -->
                        <div class="col-md-3">
                            <div class="card mini-stats-wid">
                                <div class="card-body d-flex align-items-center">
                                    <div class="flex-shrink-0 avatar-sm me-3">
                                        <span class="avatar-title bg-soft-warning rounded-circle">
                                            <i class="mdi mdi-home-group text-warning fs-4"></i>
                                        </span>
                                    </div>
                                    <div class="flex-grow-1">
                                        <p class="text-muted mb-1">Total Units</p>
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
                @endif
                {{-- ================= END OWNER DASHBOARD ================= --}}

                {{-- ================= TENANT DASHBOARD ================= --}}
                @if (auth()->user()->user_type === 'tenant')
                    <div class="row">
                        <div class="col-12">
                            <!-- Total Units -->
                            <div class="col-md-3">
                                <div class="card mini-stats-wid">
                                    <div class="card-body d-flex align-items-center">
                                        <div class="flex-shrink-0 avatar-sm me-3">
                                            <span class="avatar-title bg-soft-warning rounded-circle">
                                                <i class="mdi mdi-home-group text-warning fs-4"></i>
                                            </span>
                                        </div>
                                        <div class="flex-grow-1">
                                            <p class="text-muted mb-1">Total Units</p>
                                            <h5 class="mb-0">{{ $totalUnits ?? 0 }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @if ($unit)
                                <p><strong>{{ $unit->unit_name }}</strong> in property:
                                    {{ $unit->property->name ?? 'N/A' }}</p>
                                <p>Status: {{ ucfirst($unit->status) }}</p>
                            @else
                                <p>You are not assigned to any unit yet.</p>
                            @endif
                        </div>
                    </div>
                @endif
                {{-- ================= END TENANT DASHBOARD ================= --}}

            </div>
        </div>
    </div>

@endsection
