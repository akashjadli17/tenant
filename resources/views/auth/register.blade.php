@extends('layouts.master')

@section('title', 'Register | Myraluxa')

@section('content')

<main class="main">

    <div class="site-breadcrumb" style="background: url({{ asset('assets/img/breadcrumb/01.jpg') }})">
        <div class="container">
            <h2 class="breadcrumb-title">Register</h2>
            <ul class="breadcrumb-menu">
                <li><a href="{{ route('index') }}">Home</a></li>
                <li class="active">Register</li>
            </ul>
        </div>
    </div>

    <div class="login-area py-120">
        <div class="container">
            <div class="col-md-5 mx-auto">
                <div class="login-form">
                    <div class="login-header">
                        <img src="{{ asset('assets/img/logo/logo.png') }}" alt>
                        <p>Create your Myraluxa account</p>
                    </div>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Name -->
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" required placeholder="Your Name">
                            @error('name')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="Your Email">
                            @error('email')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" required placeholder="Your Password">
                            @error('password')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" class="form-control" name="password_confirmation" required placeholder="Confirm Password">
                            @error('password_confirmation')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Terms -->
                        <div class="form-check form-group">
                            <input class="form-check-input" type="checkbox" id="agree" required>
                            <label class="form-check-label" for="agree">
                                I agree with the <a href="#">Terms Of Service</a>.
                            </label>
                        </div>

                        <div class="d-flex align-items-center">
                            <button type="submit" class="theme-btn">
                                <i class="far fa-paper-plane"></i> Register
                            </button>
                        </div>
                    </form>

                    <div class="login-footer">
                        <p>Already have an account? <a href="{{ route('login') }}">Login</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

@endsection
