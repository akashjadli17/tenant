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
                                // Remove duplicates based on package_type
                                $uniquePackages = $packages->unique('package_type');

                                // Count how many times each feature appears
                                $featureCount = [];
                                foreach ($uniquePackages as $pkg) {
                                    $features = json_decode($pkg->features, true) ?? [];
                                    foreach ($features as $f) {
                                        $featureCount[$f] = ($featureCount[$f] ?? 0) + 1;
                                    }
                                }

                                // Sort by occurrence (most popular first)
                                arsort($featureCount);

                                // Take only top 8 features
                                $topFeatures = array_slice(array_keys($featureCount), 0, 8);
                            @endphp

                            <table class="table table-bordered text-center align-middle mb-0">
                                <thead>
                                    <tr>
                                        <th class="bg-light text-uppercase fw-bold">Features</th>
                                        @foreach ($uniquePackages as $package)
                                            <th class="bg-light text-uppercase fw-bold">
                                                {{ $package->package_type }}
                                            </th>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <th></th>
                                        @foreach ($uniquePackages as $package)
                                            <th>
                                                <span class="fw-bold">
                                                    {{ $package->currency ?? 'USD' }} {{ $package->price }}
                                                </span>
                                                <span class="text-muted">
                                                    / {{ ($package->billing_cycle) }}
                                                </span>
                                            </th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($topFeatures as $feature)
                                        <tr>
                                            <td class="fw-semibold">{{ $feature }}</td>
                                            @foreach ($uniquePackages as $package)
                                                @php
                                                    $pkgFeatures = json_decode($package->features, true) ?? [];
                                                @endphp
                                                <td>
                                                    @if (in_array($feature, $pkgFeatures))
                                                        <i class="fas fa-check text-success fs-5"></i>
                                                    @else
                                                        <i class="fas fa-times text-danger fs-5"></i>
                                                    @endif
                                                </td>
                                            @endforeach
                                        </tr>
                                    @endforeach

                                    {{-- Action Buttons Row --}}
                                    <tr>
                                        <td></td>
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

    {{-- JS to Handle Modal for Create/Edit --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const createBtn = document.getElementById('createPackageBtn');
            const editBtns = document.querySelectorAll('.editPackageBtn');
            const modalTitle = document.getElementById('packageModalLabel');
            const form = document.getElementById('packageForm');
            const methodInput = document.getElementById('_method');

            // Create Button Click
            createBtn.addEventListener('click', function() {
                form.reset();
                methodInput.value = "POST";
                form.action = "{{ route('admin.packages.store') }}";
                modalTitle.textContent = "Create Package";
                new bootstrap.Modal(document.getElementById('packageModal')).show();
            });

            // Edit Button Click
            editBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    const packageData = JSON.parse(this.getAttribute('data-package'));
                    form.reset();
                    methodInput.value = "PUT";
                    form.action = `/admin/packages/${packageData.id}`;
                    modalTitle.textContent = "Edit Package";

                    // Fill fields
                    document.getElementById('package_type').value = packageData.package_type;
                    document.getElementById('price').value = packageData.price;
                    document.getElementById('currency').value = packageData.currency;
                    document.getElementById('billing_cycle').value = packageData.billing_cycle;
                    document.getElementById('features').value = packageData.features;

                    new bootstrap.Modal(document.getElementById('packageModal')).show();
                });
            });
        });
    </script>
@endsection
