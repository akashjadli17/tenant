@extends('layouts.adminmaster')
@section('title', 'Tenant List')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<div class="main-content  p-4">
    <div class="page-content">


        <div class="container-fluid py-4">
            <div class="d-flex justify-content-between mb-4">
                <h2>Tenant List</h2>
                <a href="{{ route('tenants.create') }}" class="btn btn-success">+ Create Tenant</a>
            </div>

            @if(session('success'))
            <div class="alert alert-success mb-3">{{ session('success') }}</div>
            @endif

            <div class="row">
                @foreach($tenants as $tenant)
                <div class="col-md-3 mb-4">
                    <div class="card shadow p-3">
                        <td>
                            <div class="dropdown text-end">
                                <button class="btn btn-light btn-sm" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="bi bi-three-dots-vertical"> </i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a href="{{ route('tenants.show', $tenant->id) }}" class="dropdown-item">
                                            <i class="bi bi-eye me-2"></i> View
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('tenants.edit', $tenant->id) }}" class="dropdown-item">
                                            <i class="bi bi-pencil me-2"></i> Edit
                                        </a>
                                    </li>
                                    <li>
                                        <form action="{{ route('tenants.destroy', $tenant->id) }}" method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this tenant?');">
                                            @csrf
                                            @method('DELETE')
                                            <button class="dropdown-item text-danger" type="submit">
                                                <i class="bi bi-trash me-2"></i> Delete
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </td>

                        <img src="{{ $tenant->profile ? asset('storage/' . $tenant->profile) : 'https://via.placeholder.com/100' }}"
                            class="w-25 h-25 mx-auto rounded-circle mb-2" />
                        <h5 class="text-center">{{ $tenant->first_name }} {{ $tenant->last_name }}</h5>
                        <p class="text-center text-sm text-muted">{{ $tenant->email }}</p>
                        <p class="text-center text-sm">{{ $tenant->address }}</p>
                        <div class="text-sm mt-2">
                            <p><strong>Phone:</strong> {{ $tenant->phone_number }}</p>
                            <p><strong>Family:</strong> {{ $tenant->total_family_member }}</p>
                            <p><strong>Property:</strong> {{ $tenant->property->name }}</p>
                            <p><strong>Unit:</strong> {{ $tenant->unit->name }}</p>
                            <p><strong>Start:</strong> {{ $tenant->lease_start_date->format('M d, Y') }}</p>
                            <p><strong>End:</strong> {{ $tenant->lease_end_date->format('M d, Y') }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>
</div>
@endsection