@extends('layouts.adminmaster')

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                {{-- Breadcrumb --}}
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h4>Pricing Packages List</h4>
                    </div>
                    <!-- Create Button -->
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createPackageModal">
                        <i class="fas fa-plus"></i> Create Package
                    </button>
                </div>

                <!-- Include Create Modal -->
                @include('admin.packages.form', ['package' => null])

                {{-- Pricing Table --}}
                <div class="card">
                    <div class="card-body">
                        @if ($packages->count())
                            @php
                                $uniquePackages = $packages->unique('package_type');
                            @endphp

                            <table class="table table-bordered text-center align-middle mb-0">
                                <thead>
                                    <tr>
                                        @foreach ($uniquePackages as $package)
                                            <th class="bg-light text-uppercase fw-bold">
                                                {{ ucfirst($package->package_type) }}
                                            </th>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        @foreach ($uniquePackages as $package)
                                            <th>
                                                <span class="fw-bold">
                                                    {{ $package->currency ?? 'USD' }} {{ $package->price }}
                                                </span>
                                                <span class="text-muted">
                                                    / {{ $package->billing_cycle }}
                                                </span>
                                            </th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ($uniquePackages as $package)
                                            @php
                                                $raw = $package->features ?? [];
                                                $pkgFeatures = is_string($raw) ? json_decode($raw, true) : $raw;
                                                if (!is_array($pkgFeatures)) {
                                                    $pkgFeatures = [];
                                                }
                                            @endphp
                                            <td class="text-start">
                                                <ul class="list-unstyled mb-0">
                                                    @foreach ($pkgFeatures as $f)
                                                        @php
                                                            $name = is_array($f) ? $f['name'] ?? '' : $f;
                                                            $checked = is_array($f) ? $f['checked'] ?? false : true;
                                                        @endphp
                                                        <li
                                                            class="d-flex justify-content-between align-items-center border-bottom py-1">
                                                            <span>{{ $name }}</span>
                                                            @if ($checked)
                                                                <i class="fas fa-check text-success"></i>
                                                            @else
                                                                <i class="fas fa-times text-danger"></i>
                                                            @endif
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                        @endforeach

                                    </tr>

                                    {{-- Action Buttons Row --}}
                                    <tr>
                                        @foreach ($uniquePackages as $package)
                                            <td>
                                                <!-- Edit button triggers unique modal -->
                                                <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal"
                                                    data-bs-target="#editPackageModal{{ $package->id }}">
                                                    <i class="fas fa-edit"></i>
                                                </button>

                                                <!-- Include Edit Modal -->
                                                @include('admin.packages.form', ['package' => $package])

                                                <form action="{{ route('admin.packages.destroy', $package->id) }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-link text-danger p-0 m-0"
                                                        onclick="return confirm('Are you sure?')">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        @else
                            <p class="text-center text-muted">No packages found.</p>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
