@extends('layouts.adminmaster')
@section('title', 'Tenant Aesthetic Pvt Ltd')
@section('content')
<script src="https://cdn.tailwindcss.com"></script>

<div class="main-content">
    <div class="page-content">
        <div class="container bg-white p-4 rounded shadow">
            <h4 class="mb-4 font-semibold">Property Create</h4>

            <!-- Success -->
            @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>

            @endif

            <!-- Validation Errors -->
            @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Oops!</strong>
                <ul class="mt-2 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>

            @endif



            <form action="{{ route('properties.store') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 gap-4">
                @csrf

             
                <ul class="nav nav-tabs mb-4" id="propertyTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button type="button" class="nav-link active" data-bs-toggle="tab" data-bs-target="#details">Property Details</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button type="button" class="nav-link" data-bs-toggle="tab" data-bs-target="#images">Property Images</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button type="button" class="nav-link" data-bs-toggle="tab" data-bs-target="#unit">Unit</button>
                    </li>
                </ul>

                <!-- Tab Panes -->
                <div class="tab-content">

                    <!-- Property Details -->
                    <div class="tab-pane fade show active" id="details">
                        <div class="grid grid-cols-1 md:grid-cols-3 mb-3 gap-4">
                            <div>
                                <label class="form-label">Type</label>
                                <select class="form-select" name="type" required>
                                    <option value="">Select Type</option>
                                    <option value="lease">Lease Property</option>
                                    <option value="own">Own Property</option>
                                </select>
                            </div>
                            <div>
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter Property Name" required>
                            </div>
                            <div>
                                <label class="form-label">Thumbnail Image</label>
                                <input type="file" class="form-control" name="thumbnail">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" name="description" placeholder="Enter Property Description"></textarea>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-3">
                            <div>
                                <label class="form-label">Country</label>
                                <input type="text" name="country" class="form-control" required>
                            </div>
                            <div>
                                <label class="form-label">State</label>
                                <input type="text" name="state" class="form-control" required>
                            </div>
                            <div>
                                <label class="form-label">City</label>
                                <input type="text" name="city" class="form-control" required>
                            </div>
                            <div>
                                <label class="form-label">Zip Code</label>
                                <input type="text" name="zip_code" class="form-control" required>
                            </div>
                        </div>

                        <div>
                            <label class="form-label">Address</label>
                            <textarea class="form-control" name="address" placeholder="Enter Property Address" required></textarea>
                        </div>
                    </div>

                    <!-- Property Images -->
                    <div class="tab-pane fade" id="images">
                        <div class="border-dashed border-2 border-gray-400 p-4 text-center rounded mt-3">
                            <p class="text-gray-600">Drop files here or click to upload.</p>
                            <input type="file" name="images[]" class="form-control mt-2" multiple>
                        </div>
                    </div>

                    <!-- Units -->
                    <div class="tab-pane fade" id="unit">
                        <div class="p-3 bg-white rounded shadow mt-3">
                            <h5 class="mb-3 font-semibold">Add Unit</h5>

                            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                                <div>
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="unit_name" placeholder="Enter unit name">
                                </div>
                                <div>
                                    <label>Bedroom</label>
                                    <input type="number" class="form-control" name="bedroom">
                                </div>
                                <div>
                                    <label>Kitchen</label>
                                    <input type="number" class="form-control" name="kitchen">
                                </div>
                                <div>
                                    <label>Bath</label>
                                    <input type="number" class="form-control" name="bath">
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-4">
                                <div>
                                    <label>Rent</label>
                                    <input type="text" class="form-control" name="rent">
                                </div>
                                <div>
                                    <label>Rent Type</label>
                                    <select class="form-select" name="rent_type">
                                        <option value="monthly">Monthly</option>
                                        <option value="weekly">Weekly</option>
                                    </select>
                                </div>
                                <div>
                                    <label>Rent Duration</label>
                                    <input type="number" class="form-control" name="rent_duration">
                                </div>
                                <div>
                                    <label>Deposit Type</label>
                                    <select class="form-select" name="deposit_type">
                                        <option value="fixed">Fixed</option>
                                        <option value="percentage">Percentage</option>
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-4">
                                <div>
                                    <label>Deposit Amount</label>
                                    <input type="number" class="form-control" name="deposit_amount">
                                </div>
                                <div>
                                    <label>Late Fee Type</label>
                                    <select class="form-select" name="late_fee_type">
                                        <option value="fixed">Fixed</option>
                                        <option value="percentage">Percentage</option>
                                    </select>
                                </div>
                                <div>
                                    <label>Late Fee Amount</label>
                                    <input type="number" class="form-control" name="late_fee_amount">
                                </div>
                                <div>
                                    <label>Incident Receipt Amount</label>
                                    <input type="number" class="form-control" name="incident_receipt_amount">
                                </div>
                            </div>

                            <div class="mt-4">
                                <label>Notes</label>
                                <textarea class="form-control" name="notes"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit -->
                <div class="text-end mt-4">
                    <button type="submit" class="btn btn-success">Create Property</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
