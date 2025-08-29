@extends('layouts.adminmaster')
@section('title', 'Tenant Pvt Ltd')
@section('content')
    <script src="https://cdn.tailwindcss.com"></script>

    <div class="main-content">
        <div class="page-content">
            <div class="container bg-white p-4 rounded shadow">
                <h4 class="mb-4 font-semibold">Edit Property</h4>

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

                <form action="{{ route('admin.properties.update', $property->id) }}" method="POST" enctype="multipart/form-data"
                    class="grid grid-cols-1 gap-4">
                    @csrf
                    @method('PUT')

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
                                                <option value="{{ $u->id }}" @selected(old('owner_id', $property->owner_id) == $u->id)>
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
                                        <option value="lease" @selected($property->type == 'lease')>Lease Property</option>
                                        <option value="own" @selected($property->type == 'own')>Own Property</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name"
                                        value="{{ old('name', $property->name) }}" required>
                                </div>
                                <div>
                                    <label class="form-label">Thumbnail Image</label>
                                    <input type="file" class="form-control" name="thumbnail">
                                    @if ($property->thumbnail)
                                        <img src="{{ asset('storage/' . $property->thumbnail) }}" class="mt-2 h-16 rounded">
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" name="description">{{ old('description', $property->description) }}</textarea>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-3">
                                <div>
                                    <label class="form-label">Country</label>
                                    <input type="text" name="country" class="form-control"
                                        value="{{ old('country', $property->country) }}" required>
                                </div>
                                <div>
                                    <label class="form-label">State</label>
                                    <input type="text" name="state" class="form-control"
                                        value="{{ old('state', $property->state) }}" required>
                                </div>
                                <div>
                                    <label class="form-label">City</label>
                                    <input type="text" name="city" class="form-control"
                                        value="{{ old('city', $property->city) }}" required>
                                </div>
                                <div>
                                    <label class="form-label">Zip Code</label>
                                    <input type="text" name="zip_code" class="form-control"
                                        value="{{ old('zip_code', $property->zip_code) }}" required>
                                </div>
                            </div>

                            <div>
                                <label class="form-label">Address</label>
                                <textarea class="form-control" name="address" required>{{ old('address', $property->address) }}</textarea>
                            </div>
                        </div>

                        <!-- Property Images -->
                        <div class="tab-pane fade" id="images">
                            <div class="border-dashed border-2 border-gray-400 p-4 text-center rounded mt-3">
                                <p class="text-gray-600">Upload new images (optional).</p>
                                <input type="file" name="images[]" class="form-control mt-2" multiple>

                                @if ($property->images->count())
                                    <div class="grid grid-cols-4 gap-3 mt-3">
                                        @foreach ($property->images as $img)
                                            <div class="relative">
                                                <img src="{{ asset('storage/' . $img->image) }}" class="rounded h-24 w-full object-cover">
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Units -->
                        <div class="tab-pane fade" id="unit">
                            <div class="p-3 bg-white rounded shadow">
                                <p class="text-gray-600">Unit editing is handled separately.</p>
                                <a href="{{ route('admin.properties.units.create', $property->id) }}"
                                    class="btn btn-sm btn-primary mt-2">Manage Units</a>
                            </div>
                        </div>
                    </div>

                    <!-- Submit -->
                    <div class="text-end mt-4">
                        <button type="submit" class="btn btn-success">Update Property</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
