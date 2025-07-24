@extends('layouts.master')

@section('title', 'Myraluxa Aesthetic Pvt Ltd')

@section('content')


<main class="main">

    <div class="site-breadcrumb" style="background: url(assets/img/breadcrumb/01.jpg)">
        <div class="container">
            <h2 class="breadcrumb-title">Contact Us</h2>
            <ul class="breadcrumb-menu">
                <li><a href="index-2.html">Home</a></li>
                <li class="active">Contact Us</li>
            </ul>
        </div>
    </div>


    <div class="contact-area py-5">
        <div class="container">
            <div class="contact-wrapper">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="contact-info">
                            <div class="contact-info-icon">
                                <i class="fal fa-map-marker-alt"></i>
                            </div>
                            <div class="contact-info-content">
                                <h5>Office Address</h5>
                                <p>59A, Block A 5B, Possangipur, Janakpuri, New Delhi, Delhi 110058, India</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="contact-info">
                            <div class="contact-info-icon">
                                <i class="fal fa-phone"></i>
                            </div>
                            <div class="contact-info-content">
                                <h5>Call Us</h5>
                                <p>+91 935531766</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="contact-info">
                            <div class="contact-info-icon">
                                <i class="fal fa-envelope"></i>
                            </div>
                            <div class="contact-info-content">
                                <h5>Email Us</h5>
                                <p><a href="">demomyraluxxe@gmail.com</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-lg-3">
                        <div class="contact-info">
                            <div class="contact-info-icon">
                                <i class="fal fa-clock"></i>
                            </div>
                            <div class="contact-info-content">
                                <h5>Office Open</h5>
                                <p>Sun - Fri (08AM - 10PM)</p>
                            </div>
                        </div>
                    </div> -->
                    <div class="col-md-6 align-self-center">
                        <div class="contact-form">
                            <div class="contact-form-header">
                                <h2>Get In Touch</h2>
                                <!-- <p>It is a long established fact that a reader will be distracted by the readable
                                        content of a page when looking at its layout. </p> -->
                            </div>
                            <form method="post" action="" id="contact-form">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="name" placeholder="Your Name"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email"
                                                placeholder="Your Email" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control" name="subject" placeholder="Your Subject"
                                        required>
                                </div>
                                <div class="form-group mb-3">
                                    <textarea name="message" cols="30" rows="5" class="form-control"
                                        placeholder="Write Your Message"></textarea>
                                </div>
                                <button type="submit" class="theme-btn mb-3"> <i class="far fa-paper-plane"></i> Send
                                    Message</button>
                                <div class="col-md-12 mt-3">
                                    <div class="form-messege text-success"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6 align-self-center">
                        <div class="contact-map">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d96708.34194156103!2d-74.03927096447748!3d40.759040329405195!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x4a01c8df6fb3cb8!2sSolomon%20R.%20Guggenheim%20Museum!5e0!3m2!1sen!2sbd!4v1619410634508!5m2!1sen!2s"
                                style="border:0;" allowfullscreen loading="lazy"></iframe>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>



</main>



@endsection