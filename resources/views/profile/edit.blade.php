@extends('layouts.adminmaster')

@section('title', 'Edit Profile')

@section('content')
    <main class="main">
        <div class="container py-5">
            <div class="row justify-content-center py-5">
                <div class="col-lg-6 col-md-8">

                    <div class="card shadow-lg border-0 rounded-lg mt-2">
                        <div class="card-header bg-primary text-white text-center py-2">
                            <h3 class="mb-0">My Profile</h3>
                        </div>

                        <div class="card-body p-4">
                            @if (session('success'))
                                <div class="alert alert-success mb-3">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')

                                <div class="row">
                                    {{-- Name --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Name</label>
                                        <input type="text" name="name" value="{{ old('name', $user->name) }}"
                                            class="form-control">
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Email --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" value="{{ $user->email }}" class="form-control bg-light"
                                            disabled>
                                    </div>
                                </div>


                                <div class="row">
                                    {{-- Phone --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Phone</label>
                                        <input type="text" name="phone" value="{{ old('phone', $user->phone) }}"
                                            class="form-control">
                                        @error('phone')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Gender --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Gender</label>
                                        <select name="gender" class="form-select">
                                            <option value="">-- Select --</option>
                                            <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>Male
                                            </option>
                                            <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>Female
                                            </option>
                                            <option value="other" {{ $user->gender == 'other' ? 'selected' : '' }}>Other
                                            </option>
                                        </select>
                                        @error('gender')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Profile Image --}}
                                <div class="mb-3 text-center">
                                    <label class="form-label d-block">Profile Image</label>
                                    @if ($user->profile_image)
                                        <img src="{{ asset('storage/profiles/' . $user->profile_image) }}"
                                            alt="Profile Image" class="rounded-circle border shadow-sm mb-3"
                                            style="height:150px; width:150px; object-fit:cover;">
                                    @else
                                        <img src="{{ asset('images/default-profile.png') }}" alt="Default Image"
                                            class="rounded-circle border shadow-sm mb-3"
                                            style="height:150px; width:150px; object-fit:cover;">
                                    @endif
                                    <input type="file" name="profile_image" class="form-control">
                                    @error('profile_image')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                {{-- Submit Button --}}
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary px-4">Update Profile</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>
@endsection
