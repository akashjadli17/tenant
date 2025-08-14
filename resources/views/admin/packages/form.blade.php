<!-- Bootstrap Modal -->
<div class="modal fade" 
     id="{{ isset($package) ? 'editPackageModal'.$package->id : 'createPackageModal' }}" 
     tabindex="-1" aria-labelledby="packageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
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
                        <div class="row feature-list" id="featureListContainer{{ isset($package) ? $package->id : '' }}">
                            <!-- Features will be populated by JS -->
                        </div>
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

<!-- JS to handle dynamic features -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    const featureSets = {
        basic: [
            {name: "Manage up to 10 Tenants", checked: true},
            {name: "Basic Document Storage", checked: true},
            {name: "Secure Cloud Hosting", checked: true},
            {name: "Limited Email Support", checked: true},
            {name: "Multi-Property Management", checked: false},
            {name: "Custom Notifications", checked: false}
        ],
        standard: [
            {name: "Manage up to 50 Tenants", checked: true},
            {name: "Advanced Document Storage", checked: true},
            {name: "Multi-Property Management", checked: true},
            {name: "SMS & Email Notifications", checked: true},
            {name: "Email + Chat Support", checked: true},
            {name: "Custom Branding", checked: false}
        ],
        premium: [
            {name: "Unlimited Tenants", checked: true},
            {name: "Unlimited Property Management", checked: true},
            {name: "Custom Notifications & Reminders", checked: true},
            {name: "Custom Branding & Logo", checked: true},
            {name: "Priority 24/7 Support", checked: true},
            {name: "Automated PDF Reports", checked: true}
        ]
    };

    function renderFeatures(packageType, containerId) {
        const container = document.getElementById("featureListContainer" + containerId);
        container.innerHTML = "";
        if (featureSets[packageType]) {
            featureSets[packageType].forEach(feature => {
                const col = document.createElement("div");
                col.classList.add("col-12");
                col.innerHTML = `
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="features[]" value="${feature.name}" ${feature.checked ? "checked" : ""}>
                        <label class="form-check-label">${feature.name}</label>
                    </div>
                `;
                container.appendChild(col);
            });
        }
    }

    document.querySelectorAll(".package-select").forEach(select => {
        select.addEventListener("change", function () {
            renderFeatures(this.value, this.dataset.target);
        });

        // Load initial features if editing
        if (select.value) {
            renderFeatures(select.value, select.dataset.target);
        }
    });
});
</script>
