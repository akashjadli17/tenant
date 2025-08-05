@extends('layouts.adminmaster')
@section('title', 'Tenant Details')

@section('content')
<div class="main-content p-4">
    <div class="page-content">
        <div class="container-fluid">
            <div class="mb-3">
                <h4 class="mb-0">Tenant Details</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('tenants.index') }}">Tenant</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Details</li>
                    </ol>
                </nav>
            </div>

            <div class="row">
                <!-- Left Info -->
                <div class="col-md-4">
                    <div class="card p-3">
                        <div class="text-center">
                            <img src="{{ $tenant->profile ? asset('storage/' . $tenant->profile) : 'https://via.placeholder.com/100' }}"
                                class="rounded-circle mb-2" width="100" height="100" alt="Tenant Image">
                            <h5>{{ $tenant->first_name }} {{ $tenant->last_name }}</h5>
                            @if(now()->gt($tenant->lease_end_date))
                            <p class="text-danger">Lease has ended</p>
                            @else
                            <p class="text-success">Lease is active</p>
                            @endif
                        </div>

                        <div class="mt-3">
                            <p><strong>Email:</strong> {{ $tenant->email }}</p>
                            <p><strong>Phone:</strong> {{ $tenant->phone_number ?? '-' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Right Info -->
                <div class="col-md-8">
                    <div class="card p-3">
                        <h5>Additional Information</h5>
                        <hr>
                        <div class="row mb-2">
                            <div class="col-md-5">Total Family Member:</div>
                            <div class="col-md-7">{{ $tenant->total_family_member ?? '-' }}</div>

                            <div class="col-md-5">Country:</div>
                            <div class="col-md-7">{{ $tenant->country }}</div>

                            <div class="col-md-5">State:</div>
                            <div class="col-md-7">{{ $tenant->state }}</div>

                            <div class="col-md-5">City:</div>
                            <div class="col-md-7">{{ $tenant->city }}</div>

                            <div class="col-md-5">Zip Code:</div>
                            <div class="col-md-7">{{ $tenant->zip_code }}</div>

                            <div class="col-md-5">Property:</div>
                            <div class="col-md-7">{{ $tenant->property->name ?? '-' }}</div>

                            <div class="col-md-5">Unit:</div>
                            <div class="col-md-7">{{ $tenant->unit->name ?? '-' }}</div>

                            <div class="col-md-5">Lease Start Date:</div>
                            <div class="col-md-7">
                                {{ \Carbon\Carbon::parse($tenant->lease_start_date)->format('M d, Y') }}</div>

                            <div class="col-md-5">Lease End Date:</div>
                            <div class="col-md-7">{{ \Carbon\Carbon::parse($tenant->lease_end_date)->format('M d, Y') }}
                            </div>

                            <div class="col-md-5">Address:</div>
                            <div class="col-md-7">{{ $tenant->address }}</div>
                        </div>

                        <hr>

                        <h5>Documents</h5>
                        @if($tenant->documents && $tenant->documents->count())
                        <ul class="list-group">
                            @foreach($tenant->documents as $doc)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $doc->filename }}
                                <a href="{{ asset('storage/' . $doc->path) }}" class="btn btn-sm btn-primary"
                                    target="_blank">View</a>
                            </li>
                            @endforeach
                        </ul>
                        @else
                        <p>No documents uploaded.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection