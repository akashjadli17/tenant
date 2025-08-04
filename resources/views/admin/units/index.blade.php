@extends('layouts.adminmaster')

@section('title', 'Units - Tenant Aesthetic Pvt Ltd')

@section('content')
<script src="https://cdn.tailwindcss.com"></script>

<div class="main-content  p-4">
    <div class="page-content">

        <div class="bg-white p-6 rounded shadow">
            <div class="flex justify-between items-center mb-4">
              <h4 class="text-lg font-bold">Units for Property: {{ $selectedProperty?->name ?? 'N/A' }}</h4>

                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createUnitModal">
                    + Add Unit
                </button>
            </div>

            @if($units->count() > 0)
            <div class="overflow-auto">
                <table class="min-w-full border text-sm text-left">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2">Unit Name</th>
                            <th class="px-4 py-2">Bedroom</th>
                            <th class="px-4 py-2">Kitchen</th>
                            <th class="px-4 py-2">Bath</th>
                            <th class="px-4 py-2">Rent</th>
                            <th class="px-4 py-2">Deposit</th>
                            <th class="px-4 py-2">Late Fee</th>
                            <th class="px-4 py-2">Notes</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($units as $unit)
                        <tr class="border-b">
                            <td class="px-4 py-2">{{ $unit->name }}</td>
                            <td class="px-4 py-2">{{ $unit->bedroom }}</td>
                            <td class="px-4 py-2">{{ $unit->kitchen }}</td>
                            <td class="px-4 py-2">{{ $unit->bath }}</td>
                            <td class="px-4 py-2">{{ $unit->rent }} ({{ ucfirst($unit->rent_type) }})</td>
                            <td class="px-4 py-2">{{ $unit->deposit_amount }} ({{ $unit->deposit_type }})</td>
                            <td class="px-4 py-2">{{ $unit->late_fee_amount }} ({{ $unit->late_fee_type }})</td>
                            <td class="px-4 py-2">{{ $unit->notes }}</td>
                            @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <p class="text-gray-600">No units found for this property.</p>
            @endif
        </div>

        {{-- Include your modal here --}}
        @include('admin.units.create_modal')
    </div>

</div>
@endsection