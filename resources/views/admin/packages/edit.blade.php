 
@extends('layouts.adminmaster')

@section('content')
<div class="container">
    <h2>Edit Package</h2>
    <form action="{{ route('admin.packages.update', $package->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label>Package Type</label>
            <input type="text" name="package_type" class="form-control" 
                   value="{{ old('package_type', $package->package_type) }}" required>
        </div>

        <div class="form-group mb-3">
            <label>Billing Cycle</label>
            <select name="billing_cycle" class="form-control" required>
                <option value="Monthly" {{ old('billing_cycle', $package->billing_cycle) == 'Monthly' ? 'selected' : '' }}>Monthly</option>
                <option value="Quarterly" {{ old('billing_cycle', $package->billing_cycle) == 'Quarterly' ? 'selected' : '' }}>Quarterly</option>
                <option value="Yearly" {{ old('billing_cycle', $package->billing_cycle) == 'Yearly' ? 'selected' : '' }}>Yearly</option>
                <option value="Unlimited" {{ old('billing_cycle', $package->billing_cycle) == 'Unlimited' ? 'selected' : '' }}>Unlimited</option>
            </select>
        </div>

        <div class="form-group mb-3">
            <label>Price</label>
            <input type="number" step="0.01" name="price" class="form-control" 
                   value="{{ old('price', $package->price) }}" required>
        </div>

        <div class="form-group mb-3">
            <label>Currency</label>
            <input type="text" name="currency" class="form-control" 
                   value="{{ old('currency', $package->currency) }}">
        </div>

        <div class="form-group mb-3">
            <label>Features</label>
            @php
                $features = old('features', json_decode($package->features, true) ?? []);
            @endphp
            @foreach($features as $feature)
                <input type="text" name="features[]" value="{{ $feature }}" class="form-control mb-2">
            @endforeach
            <input type="text" name="features[]" class="form-control" placeholder="Add new feature">
        </div>

        <div class="form-group mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="active" {{ old('status', $package->status) == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ old('status', $package->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Package</button>
        <a href="{{ route('admin.packages.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection

