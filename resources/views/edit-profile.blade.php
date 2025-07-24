@extends('layouts.master')

@section('title', 'Edit Profile')

@section('content')
<style>
/* ==== General Styles ==== */

.profile-form-container {
    background: #fff;
    border-radius: 10px;
    padding: 30px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    margin: 20px 0;
}

.login-header {
    text-align: center;
    margin-bottom: 20px;
}

.login-header img {
      
    height: 90px;
    width: 250px;
    line-height: 91px;
    margin-bottom: 10px;
    padding: 5px;
    border-radius: 4%;
}

.login-header h2 {
    font-size: 20px;
    font-weight: 600;
    margin-bottom: 10px;
}

.upload-photo {
    text-align: center;
    margin-bottom: 25px;
}

.upload-icon {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    background: #f3f3f3;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 10px;
    font-size: 30px;
    color: #c2c2c2;
}

.upload-link {
    color: #c62828;
    font-size: 14px;
    font-weight: bold;
    cursor: pointer;
    text-decoration: underline;
}

.form-group {
    margin-bottom: 18px;
}

.form-group label {
    display: block;
    font-weight: 600;
    font-size: 14px;
    margin-bottom: 6px;
}

.form-group input {
    width: 100%;
    padding: 10px 14px;
    border-radius: 6px;
    border: 1px solid #ccc;
    font-size: 15px;
}

/* ==== Gender Selection ==== */

.gender-group {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
}

.gender-option {
    flex: 1;
    margin: 5px;
    padding: 10px;
    text-align: center;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-weight: 600;
    cursor: pointer;
    transition: 0.2s;
}

.gender-option input {
    display: none;
}

.gender-option.active {
    border-color: #151926;
    background-color: #fff5f5;
    color: #151926;
}

/* ==== Button ==== */

.continue-btn {
    margin-top: 25px;
    width: 100%;
    background: #151926;
    color: #fff;
    border: none;
    padding: 12px;
    font-size: 16px;
    font-weight: 600;
    border-radius: 6px;
    cursor: pointer;
}

/* ==== Carousel Image ==== */


/* ==== Fade Gallery Slider ==== */

.fade-gallery-wrapper {
    position: relative;
    width: 100%;
    height: 845px;
    overflow: hidden;
    border-radius: 8px;
}

.fade-gallery-slider {
    position: relative;
    width: 100%;
    height: 100%;
}

.fade-gallery-img {
    position: absolute;
    width: 100%;
    height: 100%;
    object-fit: cover;
    top: 0;
    left: 0;
    opacity: 0;
    transition: opacity 1s ease-in-out;
    z-index: 0;
}

.fade-gallery-img.active {
    opacity: 1;
    z-index: 1;
}

/* ==== Responsive Adjustments ==== */

@media (max-width: 767px) {

   

    .gender-option {
        flex: 1 1 100%;
        margin: 5px 0;
    }

    .fade-gallery-wrapper {
        display: none; /* Hide the image slider on mobile */
    }
    .gender-group {
    display: flex;
    gap: 20px;
    width: 100px;
    justify-content: space-between;
    flex-wrap: nowrap;
}
}

</style>


<main class="main">

    <div class="container py-5">
        <div class="row align-items-center">
            <!-- Carousel Section -->
            <div class="col-lg-6">
                <div class="fade-gallery-wrapper">
                    <div class="fade-gallery-slider">
                        <img src="{{ asset('assets/img/slider/edit_slider.png') }}" class="fade-gallery-img active" alt="gallery">
                        <img src="{{ asset('assets/img/slider/edit_slider1.webp') }}" class="fade-gallery-img" alt="gallery">
                    </div>
                </div>
            </div>

            <!-- Profile Form Section -->
            <div class="col-lg-6 col-md-12">
                <div class="profile-form-container">
                    <div class="login-header">
                        <img src="{{ asset('assets/img/logo/logo.png') }}" alt="Logo">
                        <h2>Complete Your Profile</h2>
                    </div>

                    <!-- Upload Section -->
                    <div class="upload-photo">
                        <label for="uploadInput" class="upload-icon" id="previewContainer">
                            <i class="fa fa-user" id="defaultIcon" style="{{ auth()->user()->profile_image ? 'display: none;' : '' }}"></i>
                            <img id="profilePreview" 
                                 src="{{ auth()->user()->profile_image ? asset('storage/' . auth()->user()->profile_image) : '#' }}" 
                                 alt="Profile Preview" 
                                 style="{{ auth()->user()->profile_image ? '' : 'display: none;' }}" />
                        </label>
                        <input type="file" id="uploadInput" name="profile_image" accept="image/*" form="profileForm" style="display: none;" />
                        <div class="upload-link">UPLOAD PHOTO</div>
                    </div>

                    <form id="profileForm" method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <!-- Full Name -->
                        <div class="form-group">
                            <label>Full Name*</label>
                            <input type="text" name="name" placeholder="John Doe" value="{{ old('name', auth()->user()->name) }}"
                                   oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '')">
                            @error('name')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Phone -->
                        <div class="form-group">
                            <label>Phone Number*</label>
                            <input type="tel" name="phone" placeholder="9876*****" maxlength="10"
                                   value="{{ old('phone', auth()->user()->phone) }}"
                                   oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                            @error('phone')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="form-group">
                            <label>Email*</label>
                            <input type="email" name="email" placeholder="johndoe@gmail.com" value="{{ old('email', auth()->user()->email) }}">
                            @error('email')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Gender -->
                        <div class="form-group">
                            <label>Gender</label>
                            <div class="gender-group">
                                @php $gender = old('gender', auth()->user()->gender); @endphp
                                <label class="gender-option {{ $gender === 'male' ? 'active' : '' }}">
                                    <input type="radio" name="gender" value="male" {{ $gender === 'male' ? 'checked' : '' }}>
                                    ♂ Male
                                </label>
                                <label class="gender-option {{ $gender === 'female' ? 'active' : '' }}">
                                    <input type="radio" name="gender" value="female" {{ $gender === 'female' ? 'checked' : '' }}>
                                    ♀ Female
                                </label>
                                <label class="gender-option {{ $gender === 'other' ? 'active' : '' }}">
                                    <input type="radio" name="gender" value="other" {{ $gender === 'other' ? 'checked' : '' }}>
                                    ⚧ Others
                                </label>
                            </div>
                            @error('gender')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <a href="{route('password.change')}}" class="">Change Password</a>

                        <button type="submit" class="continue-btn">CONTINUE</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</main>

<script>
    // Toggle gender selection
    document.querySelectorAll('.gender-option').forEach(option => {
        option.addEventListener('click', () => {
            document.querySelectorAll('.gender-option').forEach(el => el.classList.remove('active'));
            option.classList.add('active');
        });
    });

    const uploadInput = document.getElementById('uploadInput');
    const profilePreview = document.getElementById('profilePreview');
    const defaultIcon = document.getElementById('defaultIcon');

    uploadInput.addEventListener('change', function () {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                profilePreview.setAttribute('src', e.target.result);
                profilePreview.style.display = 'block';
                defaultIcon.style.display = 'none';
            };
            reader.readAsDataURL(file);
        }
    });

    let current = 0;
    const slides = document.querySelectorAll('.fade-gallery-img');
    setInterval(() => {
        slides[current].classList.remove('active');
        current = (current + 1) % slides.length;
        slides[current].classList.add('active');
    }, 3000);
</script>
@endsection
