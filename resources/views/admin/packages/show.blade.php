@extends('layouts.adminmaster')

@section('content')
<div class="container">
    <h2>{{ $package->name }}</h2>
    <ul>
        <li>Price: ₹{{ $package->price }}</li>
        <li>Max Data: {{ $package->max_data_mb }} MB</li>
        <li>Max Properties: {{ $package->max_properties }}</li>
        <li>Duration: {{ $package->duration_months }} months</li>
    </ul>
    <a href="{{ route('admin.packages.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
