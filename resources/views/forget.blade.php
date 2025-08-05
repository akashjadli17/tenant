@extends('layouts.master')

@section('title', 'Tenants Management')

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
    height: 630px;
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
                        <img src="./assets/img/slider/edit_slider.png" class="fade-gallery-img active" alt="gallery">
                        <img src="./assets/img/slider/edit_slider1.webp" class="fade-gallery-img" alt="gallery">

                    </div>
                </div>
            </div>



            <!-- Profile Form Section -->
            <div class="col-lg-6 col-md-12">
                <div class="profile-form-container">
                    <div class="login-header">
                        <img src="assets/img/logo/logo.png" alt="Logo">
                        <h2>PERSONALIZED AND HIGH PERFORMANCE SKINCARE TREATMENTS AT HOME</h2>
                    </div>




                    <form action="#">
                        <!-- <div class="form-group">
                            <label>Full Name*</label>
                            <input type="text" placeholder="Enter your full name" value="aakash">
                        </div>

                        <div class="form-group">
                            <label>Phone Number*</label>
                            <input type="tel" placeholder="Enter phone number" value="8505920451">
                        </div> -->

                        <div class="form-group">
                            <label>Email*</label>
                            <input type="email" name="email" placeholder="johndoe@gmail.com" value="">
                        </div>
                        <div class="form-group">
                            <label>New Password*</label>
                            <input type="password" id="password" name="password" placeholder="Wthh@12#$$" maxlength="8"
                                pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_])[A-Za-z\d\W_]{8}$"
                                title="Password must contain uppercase, lowercase, number, and special character, and be exactly 8 characters long."
                                required>
                            <i class="fa fa-eye toggle-password" onclick="togglePassword('password', this)"></i>
                        </div>

                        <!-- Confirm Password Field -->
                        <div class="form-group">
                            <label>Confirm Password*</label>
                            <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Wthh@12#$$"
                                maxlength="8" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_])[A-Za-z\d\W_]{8}$"
                                title="Password must contain uppercase, lowercase, number, and special character, and be exactly 8 characters long."
                                required>
                            <i class="fa fa-eye toggle-password" onclick="togglePassword('confirmPassword', this)"></i>
                        </div>



                        <div class="login-header">

                            <h2>I accept the <a href="" style="color: black;"> TERMS & CONDITIONS</a> and <a href=""
                                    style="color: black;">PRIVACY POLICY</a></h2>
                        </div>


                        <button type="submit" class="continue-btn">SUBMIT</button>
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
</script>
<!--password eyes -->
<script>
function togglePassword(inputId, icon) {
    const input = document.getElementById(inputId);
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

<!-- end password eyes -->
<!-- slider -->
<script>
// JavaScript to rotate images every 3 seconds
let current = 0;
const slides = document.querySelectorAll('.fade-gallery-img');

setInterval(() => {
    slides[current].classList.remove('active');
    current = (current + 1) % slides.length;
    slides[current].classList.add('active');
}, 3000);
</script>
<!-- end slider -->


@endsection