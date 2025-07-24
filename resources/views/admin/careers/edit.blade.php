@extends('layouts.adminmaster')

@section('title', 'Edit Career Job | Myraluxa Aesthetic Pvt Ltd')

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- Page Title -->
            <div class="row mb-4">
                <div class="col-12">
                    <h4 class="mb-0">Edit Career Opportunity</h4>
                </div>
            </div>

            <!-- Edit Career Form -->
            <form action="{{ route('careers.update', $career->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Job Profile & Speciality -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Job Profile <span class="text-danger">*</span></label>
                        <input type="text" name="job_profile" class="form-control" placeholder="e.g. Senior Dermatologist"
                            value="{{ old('job_profile', $career->job_profile) }}" required>
                        @error('job_profile')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Speciality</label>
                        <input type="text" name="speciality" class="form-control" placeholder="e.g. Aesthetic, Cosmetology"
                            value="{{ old('speciality', $career->speciality) }}">
                        @error('speciality')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <!-- Experience & Location -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Experience</label>
                        <input type="text" name="experience" class="form-control" placeholder="e.g. 3-5 Years"
                            value="{{ old('experience', $career->experience) }}">
                        @error('experience')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Location</label>
                        <input type="text" name="location" class="form-control" placeholder="e.g. Mumbai, Delhi"
                            value="{{ old('location', $career->location) }}">
                        @error('location')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <!-- Job Description -->
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label class="form-label">Job Description</label>
                        <textarea name="job_description" rows="4" class="form-control"
                            placeholder="Describe the job responsibilities, qualifications, etc...">{{ old('job_description', $career->job_description) }}</textarea>
                        @error('job_description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
 

                <!-- Submit Buttons -->
                <div class="mt-4">
                    <button type="submit" class="btn btn-success btn-lg me-3">Update Job</button>
                    <a href="{{ route('careers.index') }}" class="btn btn-primary btn-lg">Back to Jobs</a>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection
