<!-- Create Unit Modal -->
<div class="modal fade" id="createUnitModal" tabindex="-1" aria-labelledby="createUnitLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createUnitLabel">Create Unit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('units.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Unit Name -->
                        <div>
                            <label class="form-label">Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Property -->
                        <div>
                            <label class="form-label">Property <span class="text-danger">*</span></label>
                            <select name="property_id" class="form-select" required>
                                <option value="">Select Property</option>
                                @foreach($properties as $p)
                                    <option value="{{ $p->id }}" {{ old('property_id', $propertyId ?? '') == $p->id ? 'selected' : '' }}>
                                        {{ $p->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('property_id') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Bedroom -->
                        <div>
                            <label class="form-label">Bedroom</label>
                            <input type="number" name="bedroom" class="form-control" value="{{ old('bedroom') }}">
                            @error('bedroom') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Kitchen -->
                        <div>
                            <label class="form-label">Kitchen</label>
                            <input type="number" name="kitchen" class="form-control" value="{{ old('kitchen') }}">
                            @error('kitchen') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Bath -->
                        <div>
                            <label class="form-label">Bath</label>
                            <input type="number" name="bath" class="form-control" value="{{ old('bath') }}">
                            @error('bath') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Rent -->
                        <div>
                            <label class="form-label">Rent <span class="text-danger">*</span></label>
                            <input type="text" name="rent" class="form-control" value="{{ old('rent') }}" required>
                            @error('rent') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Rent Type -->
                        <div>
                            <label class="form-label">Rent Type <span class="text-danger">*</span></label>
                            <select name="rent_type" class="form-select" required>
                                <option value="">Select Type</option>
                                <option value="monthly" {{ old('rent_type') == 'monthly' ? 'selected' : '' }}>Monthly</option>
                                <option value="weekly" {{ old('rent_type') == 'weekly' ? 'selected' : '' }}>Weekly</option>
                            </select>
                            @error('rent_type') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Rent Duration -->
                        <div class="col-md-12">
                            <label class="form-label">Rent Duration (Day of Month)</label>
                            <input type="number" name="rent_duration" class="form-control" value="{{ old('rent_duration') }}" placeholder="Enter day of month between 1 to 30">
                            @error('rent_duration') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Deposit Type -->
                        <div>
                            <label class="form-label">Deposit Type <span class="text-danger">*</span></label>
                            <select name="deposit_type" class="form-select" required>
                                <option value="">Select Type</option>
                                <option value="fixed" {{ old('deposit_type') == 'fixed' ? 'selected' : '' }}>Fixed</option>
                                <option value="percentage" {{ old('deposit_type') == 'percentage' ? 'selected' : '' }}>Percentage</option>
                            </select>
                            @error('deposit_type') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Deposit Amount -->
                        <div>
                            <label class="form-label">Deposit Amount <span class="text-danger">*</span></label>
                            <input type="number" name="deposit_amount" class="form-control" value="{{ old('deposit_amount') }}" required>
                            @error('deposit_amount') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Late Fee Type -->
                        <div>
                            <label class="form-label">Late Fee Type <span class="text-danger">*</span></label>
                            <select name="late_fee_type" class="form-select" required>
                                <option value="">Select Type</option>
                                <option value="fixed" {{ old('late_fee_type') == 'fixed' ? 'selected' : '' }}>Fixed</option>
                                <option value="percentage" {{ old('late_fee_type') == 'percentage' ? 'selected' : '' }}>Percentage</option>
                            </select>
                            @error('late_fee_type') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Late Fee Amount -->
                        <div>
                            <label class="form-label">Late Fee Amount <span class="text-danger">*</span></label>
                            <input type="number" name="late_fee_amount" class="form-control" value="{{ old('late_fee_amount') }}" required>
                            @error('late_fee_amount') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Incident Receipt Amount -->
                        <div class="col-md-12">
                            <label class="form-label">Incident Receipt Amount</label>
                            <input type="number" name="incident_receipt_amount" class="form-control" value="{{ old('incident_receipt_amount') }}">
                            @error('incident_receipt_amount') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Notes -->
                        <div class="col-md-12">
                            <label class="form-label">Notes</label>
                            <textarea name="notes" class="form-control" rows="3">{{ old('notes') }}</textarea>
                            @error('notes') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Auto-Open Modal if Validation Errors Exist -->
@if ($errors->any())
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const modal = new bootstrap.Modal(document.getElementById('createUnitModal'));
        modal.show();
    });
</script>
@endif
