@extends('layouts.adminmaster')
@section('title', 'Tenant Aesthetic Pvt Ltd')
@section('content')
<script src="https://cdn.tailwindcss.com"></script>

<div class="main-content">
    <div class="page-content">
        <div class="container bg-white p-4 rounded shadow">

            <div class="d-flex mb-4  justify-content-between align-items-center">

                <h4 class="font-semibold">Properties</h4>

                <a class="btn btn-primary" href="{{route('properties.create')}}">Add Property</a>

            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($properties as $property)
                @php
                $unitCount = $property->units->count();
                $roomCount = $property->units->sum(fn($unit) => $unit->bedroom + $unit->kitchen + $unit->bath);
                @endphp

                <div class="relative bg-white rounded-lg shadow-md overflow-hidden">
                    <!-- Property image -->
                   <img src="{{ $property->thumbnail ? asset('storage/' . $property->thumbnail) : asset('assets/img/default.jpg') }}" 
                        alt="{{ $property->name }}" 
                        class="w-full h-48 object-cover">

  
                    <div class="absolute top-2 right-2 z-20">
                        <div class="dropdown">
                            <button class="text-gray-700 bg-white p-2 rounded" data-bs-toggle="dropdown">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end shadow text-sm bg-white rounded-lg z-50 p-2">
                                <li>
                                    <a href="{{ route('units.index', ['property_id' => $property->id]) }}"
                                        class="dropdown-item px-3 py-2 d-block">
                                        <i class="fas fa-pen mr-2"></i> Add Unit
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item px-3 py-2 d-block">
                                        <i class="fas fa-eye mr-2"></i> View Property
                                    </a>
                                </li>
                                <li>
                                    <form action="#" method="POST">
                                        <button type="submit"
                                            class="dropdown-item px-3 py-2 text-red-600 w-full text-left">
                                            <i class="fas fa-trash mr-2"></i> Delete Property
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>


                    <!-- Property content -->
                    <div class="p-4 mt-2">
                        <h5 class="font-bold text-lg mb-2">{{ $property->name }}</h5>
                        <div class="flex items-center gap-4 mb-2">
                            <div class="bg-green-100 text-green-700 px-3 py-1 rounded text-sm">
                                {{ $property->units->count() }} Unit
                            </div>
                            <div class="bg-green-100 text-green-700 px-3 py-1 rounded text-sm">
                                {{ $property->units->sum(fn($unit) => $unit->bedroom + $unit->kitchen + $unit->bath) }}
                                Rooms
                            </div>
                        </div>
                        <p class="text-gray-600 text-sm mb-3">{{ Str::limit($property->description, 100) }}</p>
                        <span
                            class="inline-block px-3 py-1 rounded-full text-xs font-semibold {{ $property->type == 'own' ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800' }}">
                            {{ ucfirst($property->type) }} Property
                        </span>
                    </div>
                </div>

                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection