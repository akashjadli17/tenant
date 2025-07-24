@extends('layouts.master')

@section('title', 'Myraluxa Aesthetic Pvt Ltd')

@section('content')
<main class="main">
    <div id="carouselExampleControls" class="carousel slide carousel-fade fade-gallery-wrapper" data-bs-ride="carousel">
        <div class="carousel-inner fade-gallery-slider">
            <div class="carousel-item active">
                <img src="assets/img/hero/slider1.jpg" class="d-block w-100 fade-gallery-img" alt="Slide 1">
            </div>
            <div class="carousel-item">
                <img src="assets/img/hero/slider2.jpg" class="d-block w-100 fade-gallery-img" alt="Slide 2">
            </div>
            <div class="carousel-item">
                <img src="assets/img/hero/slider3.jpg" class="d-block w-100 fade-gallery-img" alt="Slide 3">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- feature area -->
    <div class="feature-area pt-50">
        <div class="container">
            <div class="feature-wrap">
                <div class="row g-4">
                    <div class="col-md-6 col-lg-4">
                        <div class="feature-item">
                            <span class="count">01</span>
                            <div class="feature-icon">
                                <img src="assets/img/icon/money.svg" alt="">
                            </div>
                            <div class="feature-content">
                                <h4>The Best Price</h4>
                                <p>It is a long established fact that a reader will be distracted by the
                                    readable content of the when looking layout.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="feature-item">
                            <span class="count">02</span>
                            <div class="feature-icon">
                                <img src="assets/img/icon/consultation.svg" alt="">
                            </div>
                            <div class="feature-content">
                                <h4>Daily Consultant</h4>
                                <p>It is a long established fact that a reader will be distracted by the
                                    readable content of the when looking layout.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="feature-item">
                            <span class="count">03</span>
                            <div class="feature-icon">
                                <img src="assets/img/icon/design.svg" alt="">
                            </div>
                            <div class="feature-content">
                                <h4>Custom Design</h4>
                                <p>It is a long established fact that a reader will be distracted by the
                                    readable content of the when looking layout.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- feature area end -->


    <!-- about area -->
    <section id="about">
        <div class="about-area py-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="about-left wow fadeInLeft" data-wow-delay=".25s">
                            <div class="about-img">
                                <img class="img-1" src="assets/img/about/about.jpg" alt="">
                                <!-- <img class="img-2" src="assets/img/about/02.jpg" alt=""> -->
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-right wow fadeInUp" data-wow-delay=".25s">
                            <div class="site-heading mb-3">
                                <h4>About Us</h4>
                                <!-- <span class="site-title-tagline">About Us</span> -->
                                <h2 class="site-title">TENANT</h2>
                                <!-- <h2 class="site-title">We Are The <span>Best and Expert</span> For Construction</h2> -->
                            </div>
                            <p class="about-text">We created TENANT with one goal in mind:
                                to make the rental experience easier, fairer, and more transparent
                                for everyone. Whether you're searching for a new place to call home,
                                need help understanding your rights, or want to manage your rental
                                life better, TENANT is here to support you every step of the way.</p>
                            <p class="about-text">Our platform connects tenants with verified rental
                                listings, essential tools, and reliable information — all in one place.
                                We believe that finding a home shouldn’t be stressful, and we’re committed
                                to providing a safe, user-friendly experience backed by responsive support
                                and a community-first approach.</p>
                            <!-- <div class="about-content">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="about-item border-end pe-2">
                                        <div class="icon">
                                            <img src="assets/img/icon/team-2.svg" alt="">
                                        </div>
                                        <div class="content">
                                            <h6>Our Experts Team</h6>
                                            <p>Take a look at our up of the round shows.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="about-item">
                                        <div class="icon">
                                            <img src="assets/img/icon/material.svg" alt="">
                                        </div>
                                        <div class="content">
                                            <h6>Strong Materials</h6>
                                            <p>Take a look at our up of the round shows.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="about.html" class="theme-btn">Discover More<i class="fas fa-arrow-right"></i></a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about area end -->


    <!-- counter area -->
    <div class="counter-area pt-40 pb-40">
        <div class="container">
            <div class="row g-4 justify-content-center">
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="counter-item wow fadeInUp" data-wow-delay=".25s">
                        <div class="icon">
                            <img src="assets/img/icon/construction.svg" alt="">
                        </div>
                        <div class="content">
                            <div class="info">
                                <span class="counter" data-count="+" data-to="150" data-speed="3000">150</span>
                                <span class="unit">k</span>
                            </div>
                            <h6 class="title">Projects Done</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="counter-item wow fadeInDown" data-wow-delay=".25s">
                        <div class="icon">
                            <img src="assets/img/icon/happy.svg" alt="">
                        </div>
                        <div class="content">
                            <div class="info">
                                <span class="counter" data-count="+" data-to="25" data-speed="3000">25</span>
                                <span class="unit">K</span>
                            </div>
                            <h6 class="title">Happy Clients</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="counter-item wow fadeInUp" data-wow-delay=".25s">
                        <div class="icon">
                            <img src="assets/img/icon/team-2.svg" alt="">
                        </div>
                        <div class="content">
                            <div class="info">
                                <span class="counter" data-count="+" data-to="120" data-speed="3000">120</span>
                                <span class="unit">+</span>
                            </div>
                            <h6 class="title">Experts Staff</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="counter-item wow fadeInDown" data-wow-delay=".25s">
                        <div class="icon">
                            <img src="assets/img/icon/award.svg" alt="">
                        </div>
                        <div class="content">
                            <div class="info">
                                <span class="counter" data-count="+" data-to="50" data-speed="3000">50</span>
                                <span class="unit">+</span>
                            </div>
                            <h6 class="title">Win Awards</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- counter area end -->



    <!-- service area -->
    <section id="services">
        <div class="service-area bg py-80">
            <div class="container">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-12">
                        <div class="site-heading text-center mb-0">

                            <h2 class="site-title">Our <span>Services</span> </h2>
                        </div>
                    </div>

                </div>
                <div class="service-slider owl-carousel text-center mt-4">
                    <div class="service-item">

                        <div class="service-img">
                            <img src="assets/img/service/01.jpg" alt="">
                        </div>

                        <div class="service-content">
                            <h4 class="service-title">
                                <a href="#">Building Construction</a>
                            </h4>
                            <p class="service-text">
                                There are many variations of fact by injected humour words first true majority have
                                suffered some form handful of mode believable.
                            </p>
                            <a href="#" class="theme-btn" style="background:green;"><i
                                    class="fab fa-whatsapp"></i> whatsapp</a>
                            <a href="#" class="theme-btn"><i
                                    class="far fa-phone"></i> Call Now</a>
                        </div>
                    </div>
                    <div class="service-item">

                        <div class="service-img">
                            <img src="assets/img/service/01.jpg" alt="">
                        </div>

                        <div class="service-content">
                            <h4 class="service-title">
                                <a href="#">Building Construction</a>
                            </h4>
                            <p class="service-text">
                                There are many variations of fact by injected humour words first true majority have
                                suffered some form handful of mode believable.
                            </p>
                            <a href="#" class="theme-btn" style="background:green;"><i
                                    class="fab fa-whatsapp"></i> whatsapp</a>
                            <a href="#" class="theme-btn"><i
                                    class="far fa-phone"></i> Call Now</a>
                        </div>
                    </div>
                    <div class="service-item">

                        <div class="service-img">
                            <img src="assets/img/service/01.jpg" alt="">
                        </div>

                        <div class="service-content">
                            <h4 class="service-title">
                                <a href="#">Building Construction</a>
                            </h4>
                            <p class="service-text">
                                There are many variations of fact by injected humour words first true majority have
                                suffered some form handful of mode believable.
                            </p>
                            <a href="#" class="theme-btn" style="background:green;"><i
                                    class="fab fa-whatsapp"></i> whatsapp</a>
                            <a href="#" class="theme-btn"><i
                                    class="far fa-phone"></i> Call Now</a>
                        </div>
                    </div>
                    <div class="service-item">

                        <div class="service-img">
                            <img src="assets/img/service/01.jpg" alt="">
                        </div>

                        <div class="service-content">
                            <h4 class="service-title">
                                <a href="#">Building Construction</a>
                            </h4>
                            <p class="service-text">
                                There are many variations of fact by injected humour words first true majority have
                                suffered some form handful of mode believable.
                            </p>
                            <a href="#" class="theme-btn" style="background:green;"><i
                                    class="fab fa-whatsapp"></i> whatsapp</a>
                            <a href="#" class="theme-btn"><i
                                    class="far fa-phone"></i> Call Now</a>
                        </div>
                    </div>
                    <div class="service-item">

                        <div class="service-img">
                            <img src="assets/img/service/01.jpg" alt="">
                        </div>

                        <div class="service-content">
                            <h4 class="service-title">
                                <a href="#">Building Construction</a>
                            </h4>
                            <p class="service-text">
                                There are many variations of fact by injected humour words first true majority have
                                suffered some form handful of mode believable.
                            </p>
                            <a href="#" class="theme-btn" style="background:green;"><i
                                    class="fab fa-whatsapp"></i> whatsapp</a>
                            <a href="#" class="theme-btn"><i
                                    class="far fa-phone"></i> Call Now</a>
                        </div>
                    </div>
                    <div class="service-item">

                        <div class="service-img">
                            <img src="assets/img/service/01.jpg" alt="">
                        </div>

                        <div class="service-content">
                            <h4 class="service-title">
                                <a href="#">Building Construction</a>
                            </h4>
                            <p class="service-text">
                                There are many variations of fact by injected humour words first true majority have
                                suffered some form handful of mode believable.
                            </p>
                            <a href="#" class="theme-btn" style="background:green;"><i
                                    class="fab fa-whatsapp"></i> whatsapp</a>
                            <a href="#" class="theme-btn"><i
                                    class="far fa-phone"></i> Call Now</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <section>
        <!-- skill-area -->
        <div class="skill-area py-80">
            <div class="container">
                <div class="skill-wrap">
                    <div class="row g-4 align-items-center">
                        <div class="col-lg-6">
                            <div class="skill-img wow fadeInLeft" data-wow-delay=".25s">
                                <img src="assets/img/about/phone.webp" alt="thumb">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="skill-content wow fadeInUp" data-wow-delay=".25s">
                                <h3>FindTenant</h3>
                                <!-- <span class="site-title-tagline"><i class="far fa-helmet-safety"></i> FindTenant</span> -->
                                <h2 class="site-title">The Easiest Way to <span>Find the Perfect </span> Tenant</h2>
                                <p class="skill-text">
                                    Finding the right tenant doesn’t have to be difficult.
                                    At TENANT, we make the process simple, fast, and reliable
                                    by providing landlords with all the tools they need to
                                    connect with qualified renters. From creating smart,
                                    detailed listings to accessing verified applications
                                    with background checks, credit scores, and rental
                                    history, we help you make confident decisions every
                                    step of the way. Our platform includes built-in
                                    communication tools, automated screening, and
                                    expert support to ensure a smooth rental experience
                                    from start to finish. Whether you own one property
                                    or manage multiple units, TENANT is the easiest way
                                    to find the perfect tenant — quickly, safely, and hassle-free.
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- skill area end -->
    <!-- choose area -->
    <div class="choose-area bg py-80">
        <div class="container">
            <div class="row g-4 align-items-center justify-content-between">
                <div class="col-lg-6">
                    <div class="site-heading mb-0">

                        <!-- <span class="site-title-tagline"><i class="far fa-helmet-safety"></i> Why Choose Us</span> -->
                        <h2 class="site-title">Why <span>Choose</span> Us</h2>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="choose-content wow fadeInUp" data-wow-delay=".25s">
                        <div class="choose-content-wrap">
                            <div class="choose-item">
                                <div class="choose-item-icon">
                                    <img src="assets/img/icon/money.svg" alt="">
                                </div>
                                <div class="choose-item-info">
                                    <h4>Comprehensive Tenant Screening</h4>
                                    <p>Our thorough tenant screening process
                                        ensures you find reliable and responsible tenants.
                                        We conduct background checks, credit checks, and verify
                                        employment history to give you peace of mind.</p>
                                </div>
                            </div>
                            <div class="choose-item">
                                <div class="choose-item-icon">
                                    <img src="assets/img/icon/team.svg" alt="">
                                </div>
                                <div class="choose-item-info">
                                    <h4>Wide Reach and Exposure</h4>
                                    <p>List your property on FindTenant
                                        and reach thousands of potential
                                        tenants. Our platform is optimized
                                        to attract tenants from all over the
                                        country, ensuring your property gets
                                        maximum visibility.</p>
                                </div>
                            </div>
                            <div class="choose-item">
                                <div class="choose-item-icon">
                                    <img src="assets/img/icon/certified.svg" alt="">
                                </div>
                                <div class="choose-item-info">
                                    <h4>Easy Listing Process</h4>
                                    <p>Creating a listing on FindTenant
                                        is quick and easy. Just provide
                                        the details of your property, upload
                                        high-quality photos, and your listing
                                        will be live in minutes.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="choose-img">
                        <img src="assets/img/choose/01.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- choose area end -->

    <!-- pricing area -->
      <section id="pricing">
    <div class="pricing-area py-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="site-heading text-center wow fadeInDown" data-wow-delay=".25s">

                        <h2 class="site-title">Let's Check Our <span>Pricing</span> Plan For You</h2>
                        <div class="heading-divider"></div>
                    </div>
                </div>
            </div>
            <div class="row g-4 g-lg-5">
                <div class="col-md-6 col-lg-4">
                    <div class="pricing-item active wow fadeInUp" data-wow-delay=".25s">
                        <div class="pricing-header">
                            <h5>Basic</h5>
                        </div>
                        <div class="pricing-price">
                            <div class="pricing-icon">
                                <img src="assets/img/icon/building.svg" alt="">
                            </div>
                            <div class="pricing-amount">
                                <strong>₹359</strong><span class="pricing-amount-type">/Monthly</span>
                            </div>
                        </div>
                        <div class="pricing-btn">
                            <a href="pricing.html" class="theme-btn2">Purchase Now <i
                                    class="fas fa-arrow-right"></i></a>
                        </div>
                        <div class="pricing-feature">
                            <ul>
                                <li><i class="fas fa-check-circle"></i>All Basic Services</li>
                                <li><i class="fas fa-check-circle"></i>Apartment Design</li>
                                <li><i class="fas fa-check-circle"></i>House Planning & Design</li>
                                <li><i class="fas fa-check-circle"></i>Custom House Design</li>
                                <li><i class="fas fa-xmark-circle not-include"></i>Building Maintenance</li>
                                <li><i class="fas fa-xmark-circle not-include"></i>24/7 Customer Support</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="pricing-item active wow fadeInDown" data-wow-delay=".25s">
                        <div class="pricing-header">
                            <h5>Standard</h5>
                        </div>
                        <div class="pricing-price">
                            <div class="pricing-icon">
                                <img src="assets/img/icon/building.svg" alt="">
                            </div>
                            <div class="pricing-amount">
                                <strong>₹559</strong><span class="pricing-amount-type">/Monthly</span>
                            </div>
                        </div>
                        <div class="pricing-btn">
                            <a href="pricing.html" class="theme-btn2">Purchase Now <i
                                    class="fas fa-arrow-right"></i></a>
                        </div>
                        <div class="pricing-feature">
                            <ul>
                                <li><i class="fas fa-check-circle"></i>All Basic Services</li>
                                <li><i class="fas fa-check-circle"></i>Apartment Design</li>
                                <li><i class="fas fa-check-circle"></i>House Planning & Design</li>
                                <li><i class="fas fa-check-circle"></i>Custom House Design</li>
                                <li><i class="fas fa-check-circle"></i>Building Maintenance</li>
                                <li><i class="fas fa-xmark-circle not-include"></i>24/7 Customer Support</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="pricing-item active wow fadeInUp" data-wow-delay=".25s">
                        <div class="pricing-header">
                            <h5>Premium</h5>
                        </div>
                        <div class="pricing-price">
                            <div class="pricing-icon">
                                <img src="assets/img/icon/building.svg" alt="">
                            </div>
                            <div class="pricing-amount">
                                <strong>₹959</strong><span class="pricing-amount-type">/Monthly</span>
                            </div>
                        </div>
                        <div class="pricing-btn">
                            <a href="pricing.html" class="theme-btn2">Purchase Now <i
                                    class="fas fa-arrow-right"></i></a>
                        </div>
                        <div class="pricing-feature">
                            <ul>
                                <li><i class="fas fa-check-circle"></i>All Basic Services</li>
                                <li><i class="fas fa-check-circle"></i>Apartment Design</li>
                                <li><i class="fas fa-check-circle"></i>House Planning & Design</li>
                                <li><i class="fas fa-check-circle"></i>Custom House Design</li>
                                <li><i class="fas fa-check-circle"></i>Building Maintenance</li>
                                <li><i class="fas fa-check-circle"></i>24/7 Customer Support</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- pricing area end -->



    <!-- quote-area -->
     <section id="contact">
    <div class="quote-area" style="background-image: url(assets/img/quote/01.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 ms-auto">
                    <div class="quote-content">
                        <div class="quote-head text-center">
                            <h3 class="site-title">Request<span> A Quote</span></h2>
                                <!-- <h3>Request A Quote</h3> -->
                                <div class="heading-divider"></div>
                                <!-- <p>It is a long established fact that a reader will be distracted by the
                                readable content of majority have suffered alteration page when looking at its
                                layout.</p> -->
                        </div>
                        <div class="quote-form">
                            <form action="#">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <div class="form-icon">
                                                <i class="far fa-user-tie"></i>
                                                <input type="text" class="form-control" placeholder="Your Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <div class="form-icon">
                                                <i class="far fa-envelope"></i>
                                                <input type="email" class="form-control" placeholder="Your Email">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <div class="form-icon">
                                                <i class="far fa-phone"></i>
                                                <input type="text" class="form-control" placeholder="Your Phone">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <div class="form-icon">
                                                <i class="far fa-box"></i>
                                                <select class="select">
                                                    <option value="">Choose Service</option>
                                                    <option value="1">Service One</option>
                                                    <option value="2">Service Two</option>
                                                    <option value="3">Service Three</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="form-icon">
                                                <i class="far fa-comment-lines"></i>
                                                <textarea class="form-control" cols="30" rows="4"
                                                    placeholder="Your Message"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <button type="submit" class="theme-btn">Send Now <i
                                                class="fas fa-arrow-right"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
    <!-- quote-area end -->


    <!-- faq area -->
    <div class="faq-area py-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="faq-content wow fadeInUp" data-wow-delay=".25s">
                        <div class="site-heading mb-3">

                            <h2 class="site-title my-3 text-center">General <span>frequently</span><br> asked questions</h2>
                        </div>


                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="accordion wow fadeInRight" data-wow-delay=".25s" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <span><i class="far fa-question"></i></span> Is FlatMate free to use?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show"
                                aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    FlatMate.in is a free platform that also provides
                                    a premium model for receiving personalized professional
                                    assistance in finding the ideal flatmate.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <span><i class="far fa-question"></i></span> How to delete my account on FlatMate?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    To delete your account from FlatMate.in, go to your
                                    “My Profile” page and click on the “Delete Account” option.
                                    By doing this, your account and all your data will be
                                    permanently removed from our databases.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false"
                                    aria-controls="collapseThree">
                                    <span><i class="far fa-question"></i></span> Where can I download the FlatMate app?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse"
                                aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    You can download our mobile application through
                                    <b>Google Play</b> Store and <b>iOS App Store</b>.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour" aria-expanded="false"
                                    aria-controls="collapseFour">
                                    <span><i class="far fa-question"></i></span> What is the best site to find a roommate in India?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    FlatMate.in is one of the top-rated websites in India for finding roommates and flats.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingfive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapsefive" aria-expanded="false"
                                    aria-controls="collapsefive">
                                    <span><i class="far fa-question"></i></span> How do I report someone on flatmates?
                                </button>
                            </h2>
                            <div id="collapsefive" class="accordion-collapse collapse" aria-labelledby="headingfive"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    If you find any listing that you think is inappropriate,
                                    please report it to us. Just click on the three vertical dots
                                    icon on the listing’s details page and you will see the report menu.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingsix">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapsesix" aria-expanded="false"
                                    aria-controls="collapsesix">
                                    <span><i class="far fa-question"></i></span> What does the term ‘flatmate’ mean in slang?
                                </button>
                            </h2>
                            <div id="collapsesix" class="accordion-collapse collapse" aria-labelledby="headingsix"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    In slang, “flatmate” typically
                                    refers to someone who shares a flat or
                                    apartment with others. It’s a casual term
                                    used to describe a person who lives with you
                                    in the same rented space.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="accordion wow fadeInRight" data-wow-delay=".25s" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingseven">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseseven" aria-expanded="true" aria-controls="collapseseven">
                                    <span><i class="far fa-question"></i></span> Is FlatMate India is secure to use?
                                </button>
                            </h2>
                            <div id="collapseseven" class="accordion-collapse collapse"
                                aria-labelledby="headingseven" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    The FlatMate team ensures that all the listings on
                                    our platform are genuine and accurate. To prevent spam,
                                    we have a rule that allows each user to post only once
                                    for their requirements. We regularly monitor all the
                                    listings to maintain a spam-free environment. Moreover,
                                    we have a feature that allows users to report any suspicious or
                                    broker-posted listings, which helps us maintain the trustworthiness of our platform.

                                    Additionally, we offer useful services to our users, such as
                                    Aadhar validation and criminal case checks for their selected flatmate.
                                    These services enhance safety and security for our users.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingeight">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseeight" aria-expanded="false" aria-controls="collapseeight">
                                    <span><i class="far fa-question"></i></span> How do I post on flatmates?
                                </button>
                            </h2>
                            <div id="collapseeight" class="accordion-collapse collapse" aria-labelledby="headingeight"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Click “Add Listing” on the home screen to post your
                                    requirements. You will see two options: “Need Room/Flat”
                                    and “Need Roommate”. Choose “Need Room/Flat” if you want
                                    a room in an already occupied flat. Fill in your preferred
                                    location and budget. Choose “Need Roommate” if you want a
                                    flatmate for your flat and provide the necessary details.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingnine">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapsenine" aria-expanded="false"
                                    aria-controls="collapsenine">
                                    <span><i class="far fa-question"></i></span> I am facing issue in FlatMate App or Website?
                                </button>
                            </h2>
                            <div id="collapsenine" class="accordion-collapse collapse"
                                aria-labelledby="headingnine" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    If you encounter any problems or need assistance with
                                    a particular feature, feel free to reach out to us via
                                    email at <b>feedback@flatmate.in.</b> To expedite the resolution
                                    process, kindly include a screenshot of the issue in your email.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingten">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseten" aria-expanded="false"
                                    aria-controls="collapseten">
                                    <span><i class="far fa-question"></i></span> Is FlatMate.in Safe?
                                </button>
                            </h2>
                            <div id="collapseten" class="accordion-collapse collapse" aria-labelledby="headingten"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    FlatMate.in is committed to ensuring the safety of our users.
                                    We closely monitor all posts and offer the ability to report any
                                    suspicious profiles. From start to finish, we are dedicated to
                                    providing assistance, including the option to verify Aadhar and
                                    conduct criminal background checks through our ‘Tenant/FlatMate
                                    Verification’ service.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading11">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse11" aria-expanded="false"
                                    aria-controls="collapse11">
                                    <span><i class="far fa-question"></i></span> How do I report someone on flatmates?
                                </button>
                            </h2>
                            <div id="collapse11" class="accordion-collapse collapse" aria-labelledby="heading11"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Users usually take about 3-4 weeks to finish their requirements.
                                    But it’s important to prioritize and speed up the process of closing your requirements.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading12">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse12" aria-expanded="false"
                                    aria-controls="collapse12">
                                    <span><i class="far fa-question"></i></span> What is the best site to find a flatmates in india?
                                </button>
                            </h2>
                            <div id="collapse12" class="accordion-collapse collapse" aria-labelledby="heading12"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    FlatMate is a top website in India for
                                    easily finding your perfect flat or flatmate,
                                    without the help of brokers.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   

</main>

@endsection
