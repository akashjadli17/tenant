@extends('layouts.adminmaster')
@section('title', 'Create Tenant')

@section('content')
<div class="main-content p-4">
    <div class="page-content">
        <div class="container-fluid py-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Create Tenant</h2>
                <a href="{{ route('tenants.index') }}" class="btn btn-secondary">← Back</a>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0 mt-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form id="tenantForm" method="POST" action="{{ route('tenants.store') }}" enctype="multipart/form-data">
                @csrf

                <!-- Progressbar -->
                <ul class="progressbar d-flex list-unstyled justify-content-between mb-4">
                    <li class="active">Personal</li>
                    <li>Address</li>
                    <li>Property</li>
                    <li>Documents</li>
                </ul>

                <!-- Step 1 -->
                <fieldset class="step">
                    <h5>Step 1: Personal Details</h5>
                    <div class="row mt-3">
                        <div class="col-md-6 mb-2">
                            <label>First Name</label>
                            <input type="text" name="first_name" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label>Last Name</label>
                            <input type="text" name="last_name" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label>Phone Number</label>
                            <input type="text" name="phone_number" class="form-control">
                        </div>
                        <div class="col-md-6 mb-2">
                            <label>Total Family Members</label>
                            <input type="number" name="total_family_member" class="form-control">
                        </div>
                        <div class="col-md-12 mb-2">
                            <label>Profile Picture</label>
                            <input type="file" name="profile" class="form-control">
                        </div>
                    </div>
                    <button type="button" class="next btn btn-primary float-end">Next</button>
                </fieldset>

                <!-- Step 2 -->
                <fieldset class="step d-none">
                    <h5>Step 2: Address Details</h5>
                    <div class="row mt-3">
                        <div class="col-md-6 mb-2">
                            <label>Country</label>
                            <input type="text" name="country" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label>State</label>
                            <input type="text" name="state" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label>City</label>
                            <input type="text" name="city" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label>Zip Code</label>
                            <input type="text" name="zip_code" class="form-control" required>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label>Full Address</label>
                            <textarea name="address" class="form-control" rows="3" required></textarea>
                        </div>
                    </div>
                    <button type="button" class="prev btn btn-secondary">Back</button>
                    <button type="button" class="next btn btn-primary float-end">Next</button>
                </fieldset>

                <!-- Step 3 -->
                <fieldset class="step d-none">
                    <h5>Step 3: Property Details</h5>
                    <div class="row mt-3">
                        <div class="col-md-6 mb-2">
                            <label>Property</label>
                            <select name="property_id" class="form-select" required>
                                <option value="">Select Property</option>
                                @foreach($properties as $property)
                                    <option value="{{ $property->id }}">{{ $property->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label>Unit</label>
                            <select name="unit_id" class="form-select" required>
                                <option value="">Select Unit</option>
                                @foreach($units as $unit)
                                    <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label>Lease Start Date</label>
                            <input type="date" name="lease_start_date" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label>Lease End Date</label>
                            <input type="date" name="lease_end_date" class="form-control" required>
                        </div>
                    </div>
                    <button type="button" class="prev btn btn-secondary">Back</button>
                    <button type="button" class="next btn btn-primary float-end">Next</button>
                </fieldset>

                <!-- Step 4 -->
                <fieldset class="step d-none">
                    <h5>Step 4: Upload Documents</h5>
                    <div class="mb-4 mt-3">
                        <label class="form-label">Upload Files</label>
                        <input type="file" name="documents[]" multiple class="form-control">
                    </div>
                    <button type="button" class="prev btn btn-secondary">Back</button>
                    <button type="submit" class="btn btn-success float-end">Submit</button>
                </fieldset>
            </form>
        </div>
    </div>
</div>

<style>
    .progressbar li {
        width: 25%;
        text-align: center;
        position: relative;
        font-weight: 600;
        color: #999;
    }
    .progressbar li::before {
        content: '●';
        display: block;
        margin: auto;
        font-size: 22px;
        color: #999;
    }
    .progressbar li.active::before,
    .progressbar li.active {
        color: #28a745;
    }
    .progressbar li::after {
        content: '';
        position: absolute;
        width: 100%;
        height: 3px;
        background: #ccc;
        top: 10px;
        left: -50%;
        z-index: -1;
    }
    .progressbar li:first-child::after {
        content: none;
    }
    .progressbar li.active + li::after {
        background: #28a745;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const steps = document.querySelectorAll('.step');
        const progressItems = document.querySelectorAll('.progressbar li');
        let currentStep = 0;

        function showStep(index) {
            steps.forEach((s, i) => s.classList.toggle('d-none', i !== index));
            progressItems.forEach((li, i) => li.classList.toggle('active', i <= index));
        }

        document.querySelectorAll('.next').forEach(btn => {
            btn.addEventListener('click', () => {
                if (currentStep < steps.length - 1) {
                    currentStep++;
                    showStep(currentStep);
                }
            });
        });

        document.querySelectorAll('.prev').forEach(btn => {
            btn.addEventListener('click', () => {
                if (currentStep > 0) {
                    currentStep--;
                    showStep(currentStep);
                }
            });
        });

        showStep(currentStep);
    });
</script>
@endsection
