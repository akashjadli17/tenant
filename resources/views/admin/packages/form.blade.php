<div class="mb-3">
    <label>Name</label>
    <input type="text" name="name" value="{{ old('name', $package->name ?? '') }}" class="form-control" required>
</div>
<div class="mb-3">
    <label>Price</label>
    <input type="number" name="price" value="{{ old('price', $package->price ?? '') }}" class="form-control" required>
</div>

<div class="mb-3">
    <label>Max Data (MB)</label>
    <input type="number" name="max_data_mb" value="{{ old('max_data_mb', $package->max_data_mb ?? '') }}" class="form-control" required>
</div>
<div class="mb-3">
    <label>Max Properties</label>
    <input type="number" name="max_properties" value="{{ old('max_properties', $package->max_properties ?? '') }}" class="form-control" required>
</div>
<div class="mb-3">
    <label>Duration (months)</label>
    <input type="number" name="duration_months" value="{{ old('duration_months', $package->duration_months ?? '') }}" class="form-control" required>
</div>
