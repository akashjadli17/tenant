@extends('layouts.adminmaster')

@section('title', 'Edit Profile')

@section('content')



<main class="main">

    <div class="container py-5">
        <div class="row align-items-center">
            <!-- Carousel Section -->
            <div class="col-lg-6">
                <div class="fade-gallery-wrapper">
                    <div class="fade-gallery-slider">
                        <img src="{{ asset('assets/img/slider/edit_slider.png') }}" class="fade-gallery-img active"
                            alt="gallery">
                        <img src="{{ asset('assets/img/slider/edit_slider1.webp') }}" class="fade-gallery-img"
                            alt="gallery">
                    </div>
                </div>
            </div>


            <div class="container max-w-xl mx-auto p-4">
                <h2 class="text-xl font-bold mb-4">My Profile</h2>

                @if(session('success'))
                <div class="bg-green-100 text-green-700 p-2 rounded mb-3">
                    {{ session('success') }}
                </div>
                @endif

                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data"
                    class="space-y-4">
                    @csrf
                    @method('PATCH')

                    <div>
                        <label class="block font-medium">Name</label>
                        <input type="text" name="name" value="{{ old('name', $user->name) }}"
                            class="border border-gray-300 rounded w-full p-2">
                        @error('name') <span class="text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block font-medium">Email</label>
                        <input type="email" value="{{ $user->email }}" class="bg-gray-100 border rounded w-full p-2"
                            disabled>
                    </div>

                    <div>
                        <label class="block font-medium">Phone</label>
                        <input type="text" name="phone" value="{{ old('phone', $user->phone) }}"
                            class="border border-gray-300 rounded w-full p-2">
                        @error('phone') <span class="text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block font-medium">Gender</label>
                        <select name="gender" class="border border-gray-300 rounded w-full p-2">
                            <option value="">-- Select --</option>
                            <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>Female</option>
                            <option value="other" {{ $user->gender == 'other' ? 'selected' : '' }}>Other</option>
                        </select>
                        @error('gender') <span class="text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block font-medium">Profile Image</label>
                        @if ($user->profile_image)
                        <img src="{{ asset('storage/profiles/' . $user->profile_image) }}" alt="Profile Image"
                            class="w-24 h-24 rounded-full mb-2">
                        @endif
                        <input type="file" name="profile_image" class="block">
                        @error('profile_image') <span class="text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update Profile</button>
                </form>
            </div>

        </div>
    </div>

</main>

@endsection