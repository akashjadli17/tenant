@extends('layouts.master')

@section('title', 'Register | Tenant')

@section('content')

    <style>
        .register-container {
            display: flex;
            flex-wrap: wrap;
            align-items: stretch;
            background-color: #f9f9f9;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.08);
            margin: 50px 0;
        }

        .register-image {
            flex: 1 1 50%;
            background: url('{{ asset('assets/img/hero/login_logo.png') }}') no-repeat center center;
            background-size: cover;
            min-height: 500px;
        }

        .register-form-wrapper {
            flex: 1 1 50%;
            padding: 40px;
            background-color: #fff;
        }

        .login-header {
            text-align: center;
            margin-bottom: 10px;
        }

        .login-header img {
            height: 80px;
            margin-bottom: 10px;
        }

        .form-group {
            position: relative;
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: 600;
            margin-bottom: 6px;
            display: block;
        }

        .form-group input {
            width: 100%;
            padding: 10px 40px 10px 14px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 15px;
            box-sizing: border-box;
        }

        .toggle-password {
            position: absolute;
            top: 36px;
            right: 12px;
            cursor: pointer;
            color: #999;
        }

        .theme-btn {
            background: #151926;
            color: #fff;
            border: none;
            padding: 12px 20px;
            font-size: 16px;
            font-weight: 600;
            border-radius: 6px;
            cursor: pointer;
            width: 100%;
        }

        .login-footer {
            margin-top: 20px;
            text-align: center;
        }

        @media (max-width: 767px) {
            .register-container {
                flex-direction: column;
            }

            .register-image {
                min-height: 250px;
            }

            .register-form-wrapper {
                padding: 20px;
            }
        }
    </style>

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

        <div class="container">
            <div class="register-container">
                <!-- Left Image -->
                <div class="register-image"></div>

                <!-- Right Form -->
                <div class="register-form-wrapper">
                    <div class="login-header text-center">
                        <img src="{{ asset('assets/img/logo/logo.png') }}" alt="Logo">
                        <p>Sign up for your Tanent account</p>
                    </div>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- User Type Selection -->
                        <div class="form-group text-center">
                            <p class="d-block mb-2">Please specify your role</p>
                            <div class="btn-group" role="group">
                                <input type="radio" class="btn-check" name="user_type" id="owner" value="owner"
                                    autocomplete="off" required>
                                <label class="btn btn-outline-dark" for="owner">Owner</label>

                                <input type="radio" class="btn-check" name="user_type" id="tenant" value="tenant"
                                    autocomplete="off" required>
                                <label class="btn btn-outline-dark" for="tenant">Tenant</label>
                            </div>
                            @error('user_type')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Full Name -->
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" name="name" value="{{ old('name') }}" required
                                placeholder="Your Name">
                            @error('name')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" name="email" value="{{ old('email') }}" required
                                placeholder="Your Email">
                            @error('email')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="form-group position-relative">
                            <label>Password</label>
                            <input type="password" id="password" name="password" required placeholder="Your Password">
                            <i class="fa fa-eye-slash toggle-password" onclick="togglePassword('password')"
                                style="position: absolute; right: 10px; top: 52px; cursor: pointer;"></i>
                            @error('password')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div class="form-group position-relative">
                            <label>Confirm Password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" required
                                placeholder="Confirm Password">
                            <i class="fa fa-eye-slash toggle-password" onclick="togglePassword('password_confirmation')"
                                style="position: absolute; right: 10px; top: 52px; cursor: pointer;"></i>
                            @error('password_confirmation')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Terms -->
                        <div class="form-check mb-3">
                            <input type="checkbox" class="form-check-input" id="terms" required>
                            <label class="form-check-label" for="terms">
                                I accept the
                                <a href="{{ url('/terms') }}" target="_blank" style="color: black;">Terms & Conditions</a>
                                and
                                <a href="{{ url('/privacy-policies') }}" target="_blank" style="color: black;">Privacy
                                    Policy</a>
                            </label>
                        </div>

                        <button type="submit" class="theme-btn">
                            <i class="far fa-paper-plane"></i> Register
                        </button>
                    </form>

                    <div class="d-flex justify-content-center align-items-center mt-3">
                        <a href="{{ route('login') }}" class="text-dark">
                            Already have an account? <strong>Login</strong>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        </div>

        <script>
            // Show form only after selecting user type
            document.querySelectorAll("input[name='user_type']").forEach(el => {
                el.addEventListener("change", function() {
                    document.getElementById("remaining-form").style.display = "block";
                });
            });
        </script>


    </main>

    <script>
        function togglePassword(fieldId) {
            const input = document.getElementById(fieldId);
            const icon = event.target;
            if (input.type === "password") {
                input.type = "text";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            } else {
                input.type = "password";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            }
        }
    </script>

@endsection
