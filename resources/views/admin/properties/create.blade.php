@extends('layouts.adminmaster')
@section('title', 'Tenant Pvt Ltd')
@section('content')
    <script src="https://cdn.tailwindcss.com"></script>

    <div class="main-content">
        <div class="page-content">
            <div class="container bg-white p-4 rounded shadow">
                <h4 class="mb-4 font-semibold">Property Create</h4>

                <!-- Success -->
                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                        role="alert">
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

                <form action="{{ route('admin.properties.store') }}" method="POST" enctype="multipart/form-data"
                    class="grid grid-cols-1 gap-4">
                    @csrf

                    <ul class="nav nav-tabs mb-4" id="propertyTab" role="tablist">
                        <li class="nav-item">
                            <button type="button" class="nav-link active" data-bs-toggle="tab"
                                data-bs-target="#details">Property Details</button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="nav-link" data-bs-toggle="tab" data-bs-target="#images">Property
                                Images</button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="nav-link" data-bs-toggle="tab"
                                data-bs-target="#unit">Unit</button>
                        </li>
                    </ul>

                    <div class="tab-content">

                        <!-- Property Details -->
                        <div class="tab-pane fade show active" id="details">
                            <div class="grid grid-cols-1 md:grid-cols-4 mb-3 gap-4">

                                @if (auth()->user()->isAdmin())
                                    <div class="mb-3">
                                        <label class="form-label">Owner</label>
                                        <select name="owner_id" class="form-select" required>
                                            <option value="">— Select Owner —</option>
                                            @foreach (\App\Models\User::orderBy('name')->get() as $u)
                                                <option value="{{ $u->id }}" @selected(old('owner_id', $property->owner_id ?? null) == $u->id)>
                                                    {{ $u->name }} ({{ $u->email }})
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                @else
                                    <input type="hidden" name="owner_id" value="{{ auth()->id() }}">
                                @endif

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
                                    <input type="text" class="form-control" name="name"
                                        placeholder="Enter Property Name" required>
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
                            <div class="p-3 bg-white rounded shadow">

                                <!-- Units Preview (moved above form) -->
                                <div id="unitList" class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4"></div>
                                <input type="hidden" name="units_data" id="units_data">

                                <h5 class="mb-3 font-semibold">Add Unit</h5>

                                <!-- Unit Type Tabs -->
                                <div class="mb-4">
                                    <label class="block font-semibold mb-2">Unit Type</label>
                                    <ul class="nav nav-pills gap-2" id="unitTypeTabs">
                                        <li><button type="button" class="btn btn-outline-primary active"
                                                data-type="residential">Residential</button></li>
                                        <li><button type="button" class="btn btn-outline-primary"
                                                data-type="commercial">Commercial</button></li>
                                        <li><button type="button" class="btn btn-outline-primary"
                                                data-type="other">Other</button></li>
                                    </ul>
                                </div>

                                <!-- Form fields (unchanged from your code) -->
                                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                                    <div>
                                        <label>Unit Name</label>
                                        <input type="text" class="form-control" id="unit_name">
                                    </div>
                                    <div class="residential-field">
                                        <label>Bedroom</label>
                                        <input type="number" class="form-control" id="bedroom">
                                    </div>
                                    <div class="residential-field">
                                        <label>Kitchen</label>
                                        <input type="number" class="form-control" id="kitchen">
                                    </div>
                                    <div class="residential-field">
                                        <label>Bath</label>
                                        <input type="number" class="form-control" id="bath">
                                    </div>

                                    <div class="commercial-field hidden">
                                        <label>Cabins</label>
                                        <input type="number" class="form-control" id="cabins">
                                    </div>
                                    <div class="commercial-field hidden">
                                        <label>Capacity</label>
                                        <input type="number" class="form-control" id="capacity">
                                    </div>
                                    <div class="commercial-field hidden">
                                        <label>Size (sq.ft)</label>
                                        <input type="number" class="form-control" id="size_sqft">
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-4">
                                    <div>
                                        <label>Rent</label>
                                        <input type="text" class="form-control" id="rent">
                                    </div>
                                    <div>
                                        <label>Rent Type</label>
                                        <select class="form-select" id="rent_type">
                                            <option value="monthly">Monthly</option>
                                            <option value="weekly">Weekly</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label>Rent Duration</label>
                                        <input type="number" class="form-control" id="rent_duration">
                                    </div>
                                    <div>
                                        <label>Deposit Type</label>
                                        <select class="form-select" id="deposit_type">
                                            <option value="fixed">Fixed</option>
                                            <option value="percentage">Percentage</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-4">
                                    <div>
                                        <label>Deposit Amount</label>
                                        <input type="number" class="form-control" id="deposit_amount">
                                    </div>
                                    <div>
                                        <label>Late Fee Type</label>
                                        <select class="form-select" id="late_fee_type">
                                            <option value="fixed">Fixed</option>
                                            <option value="percentage">Percentage</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label>Late Fee Amount</label>
                                        <input type="number" class="form-control" id="late_fee_amount">
                                    </div>
                                    <div>
                                        <label>Incident Receipt Amount</label>
                                        <input type="number" class="form-control" id="incident_receipt_amount">
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <label>Notes</label>
                                    <textarea class="form-control" id="notes"></textarea>
                                </div>

                           
                                <!-- Add Unit Button -->
                                <div class="text-end mt-4">
                                    <button type="button" class="btn btn-primary" id="addUnitBtn">+ Add Unit</button>
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

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const buttons = document.querySelectorAll("#unitTypeTabs button");
            const resFields = document.querySelectorAll(".residential-field");
            const comFields = document.querySelectorAll(".commercial-field");
            let currentType = "residential";
            let units = [];
            let editIndex = null; // Track which unit is being edited

            // Tab switching logic
            buttons.forEach(btn => {
                btn.addEventListener("click", function() {
                    buttons.forEach(b => b.classList.remove("active"));
                    this.classList.add("active");
                    currentType = this.dataset.type;

                    if (currentType === "residential") {
                        resFields.forEach(f => f.classList.remove("hidden"));
                        comFields.forEach(f => f.classList.add("hidden"));
                    } else if (currentType === "commercial") {
                        resFields.forEach(f => f.classList.add("hidden"));
                        comFields.forEach(f => f.classList.remove("hidden"));
                    } else {
                        resFields.forEach(f => f.classList.add("hidden"));
                        comFields.forEach(f => f.classList.add("hidden"));
                    }
                });
            });

            // Add / Update Unit
            document.getElementById("addUnitBtn").addEventListener("click", function() {
                let unit = {
                    type: currentType,
                    name: document.getElementById("unit_name").value,
                    bedroom: document.getElementById("bedroom")?.value || null,
                    kitchen: document.getElementById("kitchen")?.value || null,
                    bath: document.getElementById("bath")?.value || null,
                    cabins: document.getElementById("cabins")?.value || null,
                    capacity: document.getElementById("capacity")?.value || null,
                    size_sqft: document.getElementById("size_sqft")?.value || null,
                    rent: document.getElementById("rent").value,
                    rent_type: document.getElementById("rent_type").value,
                    rent_duration: document.getElementById("rent_duration").value,
                    deposit_type: document.getElementById("deposit_type").value,
                    deposit_amount: document.getElementById("deposit_amount").value,
                    late_fee_type: document.getElementById("late_fee_type").value,
                    late_fee_amount: document.getElementById("late_fee_amount").value,
                    incident_receipt_amount: document.getElementById("incident_receipt_amount").value,
                    notes: document.getElementById("notes").value,
                };

                if (editIndex !== null) {
                    // Update existing
                    units[editIndex] = unit;
                    refreshUnits();
                    editIndex = null;
                    this.textContent = "+ Add Unit"; // reset button
                } else {
                    // Add new
                    units.push(unit);
                    appendCard(unit, units.length - 1);
                }

                document.getElementById("units_data").value = JSON.stringify(units);
                clearForm();
            });

            function appendCard(unit, index) {
                let card = `
            <div class="p-3 border rounded shadow relative unit-card" data-index="${index}">
                <div class="absolute top-2 right-2 dropdown">
                    <button class="btn btn-light btn-sm dropdown-toggle" data-bs-toggle="dropdown">⋮</button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item edit-unit" data-index="${index}" href="#">Edit Unit</a></li>
                        <li><a class="dropdown-item view-unit" data-index="${index}" href="#">View Unit</a></li>
                        <li><a class="dropdown-item text-danger delete-unit" data-index="${index}" href="#">Delete Unit</a></li>
                    </ul>
                </div>
                <h6 class="font-bold">${unit.name} (${unit.type})</h6>
                <p>Rent: ${unit.rent} (${unit.rent_type})</p>
                <p>Notes: ${unit.notes}</p>
            </div>`;
                document.getElementById("unitList").insertAdjacentHTML("beforeend", card);
            }

            function refreshUnits() {
                document.getElementById("unitList").innerHTML = "";
                units.forEach((u, i) => appendCard(u, i));
                document.getElementById("units_data").value = JSON.stringify(units);
            }

            function clearForm() {
                document.querySelectorAll("#unit input, #unit textarea, #unit select").forEach(el => el.value = "");
            }

            // Handle card actions
            document.addEventListener("click", function(e) {
                // DELETE
                if (e.target.classList.contains("delete-unit")) {
                    e.preventDefault();
                    let index = e.target.dataset.index;
                    if (confirm("Do you really want to delete this unit?")) {
                        units.splice(index, 1);
                        refreshUnits();
                    }
                }

                // EDIT
                if (e.target.classList.contains("edit-unit")) {
                    e.preventDefault();
                    editIndex = e.target.dataset.index;
                    let u = units[editIndex];

                    // Fill form fields
                    document.getElementById("unit_name").value = u.name;
                    document.getElementById("bedroom").value = u.bedroom || "";
                    document.getElementById("kitchen").value = u.kitchen || "";
                    document.getElementById("bath").value = u.bath || "";
                    document.getElementById("cabins").value = u.cabins || "";
                    document.getElementById("capacity").value = u.capacity || "";
                    document.getElementById("size_sqft").value = u.size_sqft || "";
                    document.getElementById("rent").value = u.rent;
                    document.getElementById("rent_type").value = u.rent_type;
                    document.getElementById("rent_duration").value = u.rent_duration;
                    document.getElementById("deposit_type").value = u.deposit_type;
                    document.getElementById("deposit_amount").value = u.deposit_amount;
                    document.getElementById("late_fee_type").value = u.late_fee_type;
                    document.getElementById("late_fee_amount").value = u.late_fee_amount;
                    document.getElementById("incident_receipt_amount").value = u.incident_receipt_amount;
                    document.getElementById("notes").value = u.notes;

                    // Set type & tab
                    currentType = u.type;
                    buttons.forEach(b => {
                        b.classList.remove("active");
                        if (b.dataset.type === u.type) b.classList.add("active");
                    });

                    // Show correct fields
                    if (u.type === "residential") {
                        resFields.forEach(f => f.classList.remove("hidden"));
                        comFields.forEach(f => f.classList.add("hidden"));
                    } else if (u.type === "commercial") {
                        resFields.forEach(f => f.classList.add("hidden"));
                        comFields.forEach(f => f.classList.remove("hidden"));
                    } else {
                        resFields.forEach(f => f.classList.add("hidden"));
                        comFields.forEach(f => f.classList.add("hidden"));
                    }

                    document.getElementById("addUnitBtn").textContent = "Update Unit";
                }

                // VIEW
                if (e.target.classList.contains("view-unit")) {
                    e.preventDefault();
                    let index = e.target.dataset.index;
                    let u = units[index];

                    let details = `
                <strong>${u.name} (${u.type})</strong><br>
                Rent: ${u.rent} (${u.rent_type})<br>
                Bedrooms: ${u.bedroom || "-"}, Kitchen: ${u.kitchen || "-"}, Bath: ${u.bath || "-"}<br>
                Cabins: ${u.cabins || "-"}, Capacity: ${u.capacity || "-"}, Size: ${u.size_sqft || "-"} sq.ft<br>
                Deposit: ${u.deposit_amount} (${u.deposit_type})<br>
                Late Fee: ${u.late_fee_amount} (${u.late_fee_type})<br>
                Incident Receipt: ${u.incident_receipt_amount}<br>
                Notes: ${u.notes}
            `;

                    // Simple alert for now - you can replace with Bootstrap modal
                    alert(details);
                }
            });
        });
    </script>

@endsection
