@extends('layouts.master')

@section('title', 'Myraluxa Aesthetic Pvt Ltd')

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

    /* ==== Header ==== */
    .login-header {
        text-align: center;
        margin-bottom: 20px;
    }

    .login-header img {
    
        height: 90px;
        width: 250px;
        padding: 5px;
        border-radius: 4%;
        margin-bottom: 10px;
    }

    .login-header h2 {
        font-size: 15px;
        font-weight: 600;
        margin-bottom: 10px;
    }

    /* ==== Photo Upload ==== */
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

    /* ==== Form Groups ==== */
    .form-group {
        position: relative;
        margin-bottom: 18px;
        width: 100%;
        /* max-width: 250px; */
    }

    .form-group label {
        display: block;
        font-weight: 600;
        font-size: 14px;
        margin-bottom: 6px;
    }

    .form-group input {
        width: 100%;
        padding: 10px 40px 10px 14px;
        border-radius: 6px;
        border: 1px solid #ccc;
        font-size: 15px;
        box-sizing: border-box;
    }

    /* ==== Toggle Password Icon ==== */
    .toggle-password {
        position: absolute;
        top: 72%;
        right: 12px;
        transform: translateY(-50%);
        cursor: pointer;
        font-size: 14px;
        color: #333;
    }

    /* ==== Gender Selection ==== */
    .gender-group {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        max-width: 250px;
    }

    .gender-option {
        flex: 1 1 calc(50% - 10px);
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

    /* ==== Submit Button ==== */
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

    /* ==== Fade Gallery Slider ==== */
    .fade-gallery-wrapper {
        position: relative;
        width: 100%;
        height: 680px;
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

    /* ==== Responsive ==== */
    @media (max-width: 767px) {
        .fade-gallery-wrapper {
            display: none;
            /* Hide gallery on mobile */
        }

        .gender-group {
            flex-wrap: nowrap;
            gap: 10px;
            max-width: 250px;
            overflow-x: auto;
        }

        .gender-option {
            flex: 0 0 auto;
            min-width: 110px;
        }

        .form-group {
            width: 100%;
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

            <!-- Login Form Section -->
            <div class="col-lg-6 col-md-12">
                <div class="profile-form-container">
                    <div class="login-header">
                        <img src="{{ asset('assets/img/logo/logo.png') }}" alt="Logo">
                        <h2>PERSONALIZED AND HIGH PERFORMANCE SKINCARE <br> TREATMENTS AT HOME</h2>
                    </div>

                    <!-- Laravel Breeze Auth Login Form -->
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email -->
                        <div class="form-group">
                            <label>Email*</label>
                            <input type="email" name="email" placeholder="johndoe@gmail.com" value="{{ old('email') }}" required autofocus>
                            @error('email')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="form-group">
                            <label>Password*</label>
                            <input type="password" id="password" name="password" placeholder="Your password" required>
                            <i class="fa fa-eye toggle-password" onclick="togglePassword(this)"></i>
                            @error('password')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Remember Me & Forgot Password -->
                        <div class="d-flex justify-content-between mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                <label class="form-check-label" for="remember">Remember Me</label>
                            </div>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" style="color: black;">Forgot Password?</a>
                            @endif
                        </div>

                        <!-- Terms -->
                        <div class="login-header">
                            <h2>I accept the <a href="#" style="color: black;">TERMS & CONDITIONS</a> and <a href="#" style="color: black;">PRIVACY POLICY</a></h2>
                        </div>

                        <button type="submit" class="continue-btn">SUBMIT</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</main>

 
@endsection
