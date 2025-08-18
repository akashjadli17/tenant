<!-- Bootstrap Modal -->
<div class="modal fade" 
     id="{{ isset($package) ? 'editPackageModal'.$package->id : 'createPackageModal' }}" 
     tabindex="-1" aria-labelledby="packageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title" id="packageModalLabel">
                    {{ isset($package) ? 'Edit Package' : 'Create Package' }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <form action="{{ isset($package) ? route('admin.packages.update', $package->id) : route('admin.packages.store') }}" 
                      method="POST">
                    @csrf
                    @if(isset($package))
                        @method('PUT')
                    @endif

                    <!-- Package Type & Billing Cycle -->
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <label class="form-label">Package Type</label>
                            <select name="package_type" 
                                    id="packageSelect{{ isset($package) ? $package->id : '' }}" 
                                    class="form-select package-select" 
                                    data-target="{{ isset($package) ? $package->id : '' }}" required>
                                <option value="">-- Select Package --</option>
                                <option value="basic" {{ isset($package) && $package->package_type == 'basic' ? 'selected' : '' }}>Basic</option>
                                <option value="standard" {{ isset($package) && $package->package_type == 'standard' ? 'selected' : '' }}>Standard</option>
                                <option value="premium" {{ isset($package) && $package->package_type == 'premium' ? 'selected' : '' }}>Premium</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Billing Cycle</label>
                            <select name="billing_cycle" class="form-select" required>
                                <option value="Monthly" {{ isset($package) && $package->billing_cycle == 'Monthly' ? 'selected' : '' }}>Monthly</option>
                                <option value="Quarterly" {{ isset($package) && $package->billing_cycle == 'Quarterly' ? 'selected' : '' }}>Quarterly</option>
                                <option value="Yearly" {{ isset($package) && $package->billing_cycle == 'Yearly' ? 'selected' : '' }}>Yearly</option>
                            </select>
                        </div>
                    </div>

                    <!-- Price & Currency -->
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <label class="form-label">Price</label>
                            <input type="number" step="0.01" name="price" class="form-control"
                                   placeholder="Enter price" value="{{ $package->price ?? '' }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Currency</label>
                            <select name="currency" class="form-select" required>
                                <option value="INR" {{ isset($package) && $package->currency == 'INR' ? 'selected' : '' }}>INR</option>
                                <option value="USD" {{ isset($package) && $package->currency == 'USD' ? 'selected' : '' }}>USD</option>
                            </select>
                        </div>
                    </div>

                    <!-- Features -->
                    <div class="mb-3">
                        <label class="form-label">Features</label>
                        <div id="featureListContainer{{ isset($package) ? $package->id : '' }}">
                            <!-- Dynamic rows -->
                        </div>
                        <button type="button" class="btn btn-sm btn-primary mt-2 add-feature-btn" 
                                data-target="{{ isset($package) ? $package->id : '' }}">
                            + Add Feature
                        </button>
                    </div>

                    <!-- Status -->
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select">
                            <option value="active" {{ isset($package) && $package->status == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ isset($package) && $package->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>

                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">
                            {{ isset($package) ? 'Update' : 'Create' }}
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- JS for dynamic features -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    function createFeatureRow(containerId, featureName = "", isChecked = false) {
        const container = document.getElementById("featureListContainer" + containerId);
        const index = container.children.length;

        const row = document.createElement("div");
        row.classList.add("row", "align-items-center", "mb-2");

        row.innerHTML = `
            <div class="col-8">
                <input type="text" name="features[${index}][name]" 
                       class="form-control" placeholder="Enter feature" 
                       value="${featureName}">
            </div>
            <div class="col-2 text-center">
                <input type="hidden" name="features[${index}][checked]" value="0">
                <input type="checkbox" class="form-check-input" 
                       name="features[${index}][checked]" value="1" 
                       ${isChecked ? "checked" : ""}>
            </div>
            <div class="col-2 text-center">
                <button type="button" class="btn btn-sm btn-danger remove-feature">&times;</button>
            </div>
        `;

        row.querySelector(".remove-feature").addEventListener("click", function () {
            row.remove();
        });

        container.appendChild(row);
    }

    // Add feature button
    document.querySelectorAll(".add-feature-btn").forEach(btn => {
        btn.addEventListener("click", function () {
            createFeatureRow(this.dataset.target);
        });
    });

    // Load existing features if editing
    @if(isset($package) && $package->features)
        const existingFeatures = @json(json_decode($package->features, true));
        if (Array.isArray(existingFeatures)) {
            existingFeatures.forEach(f => {
                const name = typeof f === "object" ? (f.name || "") : f;
                const checked = typeof f === "object" ? (f.checked || false) : true;
                createFeatureRow("{{ $package->id ?? '' }}", name, checked);
            });
        }
    @endif
});
</script>
