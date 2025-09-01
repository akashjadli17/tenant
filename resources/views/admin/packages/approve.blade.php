@extends('layouts.adminmaster')

@section('title', 'Approve Package')

@section('content')
<div class="container py-4">
    <h4 class="mb-3">Approve Package</h4>

    <div class="card">
        <div class="card-body">
            <p class="mb-1"><strong>Owner:</strong> {{ $owner->name }} ({{ $owner->email }})</p>
            <p class="mb-1"><strong>Status:</strong> {{ $owner->package_status ?? '—' }}</p>

            @if($package)
                <p class="mb-1"><strong>Requested Package:</strong> {{ ucfirst($package->package_type) }}</p>
                <p class="mb-3"><strong>Price:</strong> {{ strtoupper($package->currency) }} {{ number_format($package->price,2) }} / {{ $package->billing_cycle }}</p>

                @if(is_array($package->features) && count($package->features))
                    <ul class="mb-3">
                        @foreach($package->features as $feat)
                            <li>
                                @if(($feat['checked'] ?? '0') == '1')
                                    ✅ {{ $feat['name'] ?? '' }}
                                @else
                                    ❌ <span class="text-muted">{{ $feat['name'] ?? '' }}</span>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                @endif
            @else
                <div class="alert alert-warning">No package attached to this owner.</div>
            @endif

            <form id="approve-form" method="POST" action="{{ route('admin.packages.approve', $owner->id) }}">
                @csrf
                <button type="button" class="btn btn-success" onclick="confirmApprove()">Approve & Activate</button>
                <a href="{{ route('admin.packages.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>

{{-- SweetAlert2 confirm --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function confirmApprove(){
    Swal.fire({
        icon: 'question',
        title: 'Approve package?',
        text: 'This will activate the package for {{ $owner->name }}.',
        showCancelButton: true,
        confirmButtonText: 'Yes, approve',
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('approve-form').submit();
        }
    });
}
</script>
@endsection
