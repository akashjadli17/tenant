@extends('layouts.master')

@section('title', 'Tenants Management')

@section('content')


<!-- Main content start -->
    <main class="main">
        <section class="hero-section py-2 bg-light">
            <div class="container">
                <div class="row align-items-center g-4 flex-row-reverse flex-lg-row">
                    <!-- Text & Form Column -->
                    <div class="col-lg-6 order-2 order-lg-1">
                        <h4 class="fw-bold display-6 mb-3 text-center text-lg-start">
                            Simplify Tenant onboarding for your
                            <span id="property-type" style="color: #f65801;">PGs</span>
                        </h4>
                        <p class="mb-2 fs-5 text-muted text-center text-lg-start">India’s #1 secure documentation
                            platform for landlords</p>
                        <p class="fw-semibold text-success mb-3 text-center text-lg-start" style="font-size: 1.1rem;">
                            "Store IDs. Manage tenants. Stay organized — all in one place"
                        </p>

                        <!-- Property Type Selection -->
                        <div class="mb-3">
                            <p class="fw-semibold mb-2 text-center text-lg-start">I manage a</p>
                            <div class="d-flex justify-content-center justify-content-lg-start flex-wrap gap-3"
                                id="property-buttons">
                                <!-- Co-Living -->
                                <button
                                    class="btn btn-outline-primary px-3 py-2 rounded-4 active d-flex flex-column align-items-center gap-1"
                                    data-type="Co-Living" style="width: 100px;">
                                    <img src="https://img.icons8.com/color/48/apartment.png" alt="Co-Living" width="32"
                                        height="32" />
                                    <span class="small">Co-Living</span>
                                </button>

                                <!-- Hostel/PG -->
                                <button
                                    class="btn btn-outline-secondary px-3 py-2 rounded-4 d-flex flex-column align-items-center gap-1"
                                    data-type="Hostel/PG" style="width: 100px;">
                                    <img src="https://img.icons8.com/color/48/bedroom.png" alt="Hostel/PG" width="32"
                                        height="32" />
                                    <span class="small">Hostel/PG</span>
                                </button>

                                <!-- Flat -->
                                <button
                                    class="btn btn-outline-secondary px-3 py-2 rounded-4 d-flex flex-column align-items-center gap-1"
                                    data-type="Flat" style="width: 100px;">
                                    <img src="https://img.icons8.com/color/48/city-buildings.png" alt="Flat" width="32"
                                        height="32" />
                                    <span class="small">Flat</span>
                                </button>

                                <!-- Studio -->
                                <button
                                    class="btn btn-outline-secondary px-3 py-2 rounded-4 d-flex flex-column align-items-center gap-1"
                                    data-type="Studio" style="width: 100px;">
                                    <img src="https://img.icons8.com/color/48/room.png" alt="Studio" width="32"
                                        height="32" />
                                    <span class="small">Studio</span>
                                </button>
                            </div>
                        </div>

                        <!-- Mobile Number Input -->
                        <div class="input-group mt-3 mb-4 mx-auto mx-lg-0" style="max-width: 400px;">
                            <input type="tel" class="form-control" placeholder="Enter mobile number"
                                id="mobile-input" />
                            <button class="btn btn-primary " id="submit-btn">Get Demo →</button>
                        </div>
                    </div>

                    <!-- Image Column (Mobile First) -->
                    <div class="col-lg-6 order-1 order-lg-2 text-center">
                        <img src="https://rentok-marketplace.s3.ap-south-1.amazonaws.com/marketplace-dump/marketing-assets/bae54b74-883b-4cf2-89e1-7b823eb4da5b.webp"
                            alt="App character" class="img-fluid mt-4 mt-lg-0" style="max-width: 100%; height: auto;" />
                    </div>
                </div>
            </div>
        </section>


        <!-- JS: Interactive Property Selection + Typewriter + Submission -->
        <script>
        const buttons = document.querySelectorAll('#property-buttons button');
        let selectedType = "Co-Living";

        buttons.forEach(btn => {
            btn.addEventListener('click', () => {
                buttons.forEach(b => b.classList.remove('active', 'btn-outline-primary'));
                buttons.forEach(b => b.classList.add('btn-outline-secondary'));
                btn.classList.add('active', 'btn-outline-primary');
                btn.classList.remove('btn-outline-secondary');
                selectedType = btn.dataset.type;
            });
        });

        // Typewriter effect
        const dynamicWords = ["PGs", "Co-Living", "Hostels", "Studios", "Flats"];
        let i = 0,
            j = 0,
            word = '',
            isDeleting = false;
        const target = document.getElementById("property-type");

        function typeEffect() {
            word = dynamicWords[i];
            let displayText = isDeleting ? word.substring(0, j--) : word.substring(0, j++);
            target.textContent = displayText;

            if (!isDeleting && j === word.length) {
                isDeleting = true;
                setTimeout(typeEffect, 1200);
            } else if (isDeleting && j === 0) {
                isDeleting = false;
                i = (i + 1) % dynamicWords.length;
                setTimeout(typeEffect, 500);
            } else {
                setTimeout(typeEffect, isDeleting ? 60 : 100);
            }
        }
        typeEffect();

        // Form submission handler
        document.getElementById("submit-btn").addEventListener("click", function() {
            const mobile = document.getElementById("mobile-input").value.trim();
            if (!/^[6-9]\d{9}$/.test(mobile)) {
                alert("Please enter a valid 10-digit mobile number.");
                return;
            }

            // 🔐 Here you would send data to backend via AJAX or store in DB
            alert(`Thanks! A demo for managing ${selectedType} will be sent to ${mobile}.`);
        });
        </script>



        <!-- feature area -->
        <div class="feature-area pt-50 pb-50 " style="background-color: #fffff6;">
            <div class="container">
                <div class="feature-wrap">
                    <div class="row g-4">
                        <div class="col-md-6 col-lg-4">
                            <div class="feature-item text-center">

                                <div class="feature-icon mb-3">
                                    <i class="bi bi-shield-lock" style="font-size: 40px; color: #ffffff;"></i>
                                </div>
                                <div class="feature-content">
                                    <h4>Secure Documentation</h4>
                                    <p>End-to-end encrypted document storage ensures landlords’ and tenants’
                                        data remains fully protected.</p>
                                </div>
                            </div>
                        </div>



                        <div class="col-md-6 col-lg-4">
                            <div class="feature-item text-center">

                                <div class="feature-icon mb-3">
                                    <i class="bi bi-people" style="font-size: 40px; color: #ffffff;"></i>
                                </div>
                                <div class="feature-content">
                                    <h4>Multi-User Access</h4>
                                    <p>Landlords can manage multiple tenants and properties from a single platform with
                                        individual record tracking.</p>
                                </div>
                            </div>
                        </div>



                        <div class="col-md-6 col-lg-4">
                            <div class="feature-item text-center">

                                <div class="feature-icon mb-3">
                                    <i class="bi bi-kanban" style="font-size: 40px; color: #ffffff;"></i>
                                </div>
                                <div class="feature-content">
                                    <h4>Centralized Dashboard</h4>
                                    <p>Manage all plots, PGs, and tenant profiles from a unified, user-friendly
                                        dashboard interface.</p>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
        <!-- feature area end -->


        <!-- about area -->
        <section
            style="background-image: url('assets/img/bg/purple-bg.webp'); background-size: cover; background-position: center; background-repeat: no-repeat;"
            id="about">
            <div class="about-area py-80">
                <div class="container">
                    <div class="row align-items-center">
                        <!-- Image Section -->
                        <div class="col-lg-6">
                            <div class="about-left wow fadeInLeft" data-wow-delay=".25s">
                                <div class="about-img">
                                    <img class="img-1" src="assets/img/about/about.jpg" alt="Tenant Portal Overview">
                                </div>
                            </div>
                        </div>
                        <!-- Text Content Section -->
                        <div class="col-lg-6">
                            <div class="about-right wow fadeInUp" data-wow-delay=".25s">
                                <div class="site-heading mb-3">
                                    <h4>About Us</h4>
                                    <h3 class="site-title">Tenant – Secure Rental & Document Hub</h3>
                                </div>
                                <p class="about-text">
                                    Tenant Portal is a secure and centralized platform built to help landlords and
                                    property owners manage rental spaces and tenant data with ease. Whether you're
                                    handling PGs, apartments, or plots, the system allows you to store and organize
                                    important tenant documents like Aadhaar, PAN cards, photographs, and contact
                                    details—all in one place.
                                </p>
                                <p class="about-text">
                                    Designed for simplicity and efficiency, Tenant Portal streamlines property
                                    management, enabling users to handle multiple properties, access records instantly,
                                    and maintain data security at every step. It's a modern solution for landlords who
                                    value organization, transparency, and control over their rental operations.
                                </p>
                                <a href="about.php" class="theme-btn mt-4">Learn More <i
                                        class="fas fa-arrow-right"></i></a>
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
        <!-- <section id="services">
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
                                <a href="#" class="theme-btn" style="background:green;"><i class="fab fa-whatsapp"></i>
                                    whatsapp</a>
                                <a href="#" class="theme-btn"><i class="far fa-phone"></i> Call Now</a>
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
                                <a href="#" class="theme-btn" style="background:green;"><i class="fab fa-whatsapp"></i>
                                    whatsapp</a>
                                <a href="#" class="theme-btn"><i class="far fa-phone"></i> Call Now</a>
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
                                <a href="#" class="theme-btn" style="background:green;"><i class="fab fa-whatsapp"></i>
                                    whatsapp</a>
                                <a href="#" class="theme-btn"><i class="far fa-phone"></i> Call Now</a>
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
                                <a href="#" class="theme-btn" style="background:green;"><i class="fab fa-whatsapp"></i>
                                    whatsapp</a>
                                <a href="#" class="theme-btn"><i class="far fa-phone"></i> Call Now</a>
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
                                <a href="#" class="theme-btn" style="background:green;"><i class="fab fa-whatsapp"></i>
                                    whatsapp</a>
                                <a href="#" class="theme-btn"><i class="far fa-phone"></i> Call Now</a>
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
                                <a href="#" class="theme-btn" style="background:green;"><i class="fab fa-whatsapp"></i>
                                    whatsapp</a>
                                <a href="#" class="theme-btn"><i class="far fa-phone"></i> Call Now</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section> -->

        <section
            style="background-image: url('assets/img/bg/yellow-bg.webp'); background-size: cover; background-position: center; background-repeat: no-repeat;"
            class="py-5">
            <div class="container">
                <!-- Section Heading -->
                <div class="text-center mb-4">
                    <h1 class="chakra-heading mb-4">Smart Portal for Smart Landlords</h1>
                    <h4 class="chakra-text text-muted  mb-4">
                        Manage tenant records, documents, and properties securely – all in one place
                    </h4>
                </div>

                <div class="row justify-content-center bg-white bg-opacity-75 rounded-4 p-4">
                    <!-- Feature Image (Top in mobile, right in desktop) -->
                    <div class="col-12 col-lg-5 mb-4 mb-lg-0 text-center">
                        <img src="https://rentok-marketplace.s3.ap-south-1.amazonaws.com/marketplace-dump/owner-landing/owner-feature-2.webp"
                            class="img-fluid rounded-4 shadow" alt="Landlord Management System"
                            style="max-width: 100%; height: auto;">
                    </div>

                    <div class="col-12 col-lg-7 d-flex flex-column justify-content-center gap-2 gap-md-3">
                        <p class="mb-0 mb-md-2"><i class="fa fa-database text-primary me-2"></i> Centralized storage of
                            tenant data and property details</p>
                        <p class="mb-0 mb-md-2"><i class="fa fa-user-check text-success me-2"></i> Verified digital
                            records: Aadhaar, PAN, photo, and mobile number</p>
                        <p class="mb-0 mb-md-2"><i class="fa fa-home text-warning me-2"></i> Manage multiple homes, PGs,
                            and plots with ease</p>
                        <p class="mb-0 mb-md-2"><i class="fa fa-upload text-secondary me-2"></i> Upload agreements,
                            police verification, ID proofs – all digitally</p>
                        <p class="mb-0 mb-md-2"><i class="fa fa-lock text-danger me-2"></i> Military-grade encryption to
                            protect sensitive documents</p>
                        <p class="mb-0 mb-md-2"><i class="fa fa-calendar-check text-info me-2"></i> Get alerts for
                            document expiry, due renewals, and tenant check-outs</p>
                        <p class="mb-0 mb-md-3"><i class="fa fa-share-square text-primary me-2"></i> Share documents
                            with tenants instantly via link or WhatsApp</p>

                        <div>
                            <button type="button" class="btn btn-primary py-2">
                                Start Managing Now <i class="fa fa-arrow-right ms-2"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>






        <section
            style="background-image: url('assets/img/bg/blue-bg.webp'); background-size: cover; background-position: center; background-repeat: no-repeat;"
            class="py-5 ">
            <div class="container">
                <!-- Section Heading -->
                <div class="chakra-stack text-center mb-4">
                    <h1 class="chakra-heading mb-4">All Tenant Details in One Place</h1>
                    <h4 class="chakra-text text-muted  mb-4">
                        From Joining Form to Police Verification, Payment History to Tenant Ledger
                    </h4>
                </div>

                <div class="d-flex flex-wrap align-items-start justify-content-center gap-4 py-4">
                    <!-- Feature Image -->
                    <div class="rounded-4 overflow-hidden shadow" style="max-width: 500px;">
                        <img src="https://rentok-marketplace.s3.ap-south-1.amazonaws.com/marketplace-dump/owner-landing/owner-feature-1.webp"
                            class="img-fluid" alt="Tenant Management UI">
                    </div>

                    <!-- Smart Feature Highlights -->
                    <div class="d-flex flex-column justify-content-center gap-3">

                        <p><i class="fa fa-door-open text-primary me-2"></i> Instant, contactless tenant check-in like
                            5-star hotels</p>

                        <p><i class="fa fa-users text-success me-2"></i> Unified storage of tenant, parent, and
                            emergency contact info</p>

                        <p><i class="fa fa-id-card text-warning me-2"></i> Digital KYC with Aadhaar, PAN, photo uploads
                            & verification</p>

                        <p><i class="fa fa-building text-secondary me-2"></i> Manage multiple properties – PGs, hostels,
                            flats & plots</p>

                        <p><i class="fa fa-cloud-upload-alt text-primary me-2"></i> Securely upload & store rental
                            agreements and legal docs</p>

                        <p><i class="fa fa-lock text-danger me-2"></i> Bank-grade encryption for all tenant documents
                            and IDs</p>

                        <p><i class="fa fa-chart-line text-info me-2"></i> Dashboard insights: KYC status, document
                            expiry, and tenant analytics</p>

                        <button type="button" class="btn btn-primary  py-2 mt-2 w-50">
                            Try for Free <i class="fa fa-arrow-right ms-2"></i>
                        </button>
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
                                        <img src="assets/img/icon/money.svg" alt="Tenant Screening">
                                    </div>
                                    <div class="choose-item-info">
                                        <h4>Comprehensive Tenant Screening</h4>
                                        <p>Our tenant screening process includes background checks, employment
                                            verification, and identity validation to ensure trustworthy and reliable
                                            occupants.</p>
                                    </div>
                                </div>
                                <div class="choose-item">
                                    <div class="choose-item-icon">
                                        <img src="assets/img/icon/team.svg" alt="Exposure">
                                    </div>
                                    <div class="choose-item-info">
                                        <h4>Wide Reach and Exposure</h4>
                                        <p>List your property on our portal and connect with thousands of verified
                                            seekers. Boost visibility through our targeted marketing and regional
                                            presence.</p>
                                    </div>
                                </div>
                                <div class="choose-item">
                                    <div class="choose-item-icon">
                                        <img src="assets/img/icon/certified.svg" alt="Easy Listing">
                                    </div>
                                    <div class="choose-item-info">
                                        <h4>Easy Listing Process</h4>
                                        <p>Publish your rental listing in minutes. Just enter the details, upload clear
                                            images, and reach tenants faster with our mobile-optimized platform.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="choose-img">
                            <img src="assets/img/choose/01.jpg" alt="Tenant Portal Demo">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- choose area end -->




        <section
            style="background: linear-gradient(145deg, #e6f0ff 0%, #f1f6ff 100%); background-size: cover; background-position: center; background-repeat: no-repeat;"
            class="py-5 px-3 px-md-4">
            <div class="container">
                <div class="text-center mb-5">
                    <h1 class="chakra-heading mb-4">One Platform for All Your Rental Documents</h1>
                    <h4 class="chakra-text text-muted  mb-4">Easily store and manage all tenant and property data across
                        your rental
                        portfolio</h4>
                </div>

                <div class="row g-4">
                    <!-- Card Template Start -->
                    <!-- Repeat this block for each feature -->
                    <div class="col-md-4 col-sm-6">
                        <div
                            class="card border-0 rounded-4 shadow-lg h-100 position-relative text-center p-4 hover-card">
                            <div class="icon-wrapper position-absolute top-0 start-50 translate-middle bg-white shadow rounded-circle d-flex align-items-center justify-content-center"
                                style="width: 70px; height: 70px; top: -35px;">
                                <i class="bi bi-door-open-fill fs-4 text-primary"></i>
                            </div>
                            <div class="mt-3 pt-2">
                                <h5 class="fw-semibold mb-2">Instant, Contactless Tenant Check-in</h5>
                                <p class="text-muted mb-0">Seamless move-ins like 5-star hotels with digital workflows
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Card Template End -->

                    <!-- Copy and customize the above card for each feature below -->
                    <div class="col-md-4 col-sm-6">
                        <div
                            class="card border-0 rounded-4 shadow-lg h-100 position-relative text-center p-4 hover-card">
                            <div class="icon-wrapper position-absolute top-0 start-50 translate-middle bg-white shadow rounded-circle d-flex align-items-center justify-content-center"
                                style="width: 70px; height: 70px; top: -35px;">
                                <i class="bi bi-people-fill fs-4 text-success"></i>
                            </div>
                            <div class="mt-3 pt-2">
                                <h5 class="fw-semibold mb-2">Unified Tenant Contact Records</h5>
                                <p class="text-muted mb-0">Maintain details for tenants, parents, and emergency contacts
                                    in one place</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                        <div
                            class="card border-0 rounded-4 shadow-lg h-100 position-relative text-center p-4 hover-card">
                            <div class="icon-wrapper position-absolute top-0 start-50 translate-middle bg-white shadow rounded-circle d-flex align-items-center justify-content-center"
                                style="width: 70px; height: 70px; top: -35px;">
                                <i class="bi bi-person-vcard-fill fs-4 text-warning"></i>
                            </div>
                            <div class="mt-3 pt-2">
                                <h5 class="fw-semibold mb-2">Verified Digital KYC</h5>
                                <p class="text-muted mb-0">Upload and validate Aadhaar, PAN, photos & mobile numbers</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                        <div
                            class="card border-0 rounded-4 shadow-lg h-100 position-relative text-center p-4 hover-card">
                            <div class="icon-wrapper position-absolute top-0 start-50 translate-middle bg-white shadow rounded-circle d-flex align-items-center justify-content-center"
                                style="width: 70px; height: 70px; top: -35px;">
                                <i class="bi bi-buildings-fill fs-4 text-secondary"></i>
                            </div>
                            <div class="mt-3 pt-2">
                                <h5 class="fw-semibold mb-2">Multi-property Support</h5>
                                <p class="text-muted mb-0">Manage flats, PGs, hostels, and plots with a single landlord
                                    dashboard</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                        <div
                            class="card border-0 rounded-4 shadow-lg h-100 position-relative text-center p-4 hover-card">
                            <div class="icon-wrapper position-absolute top-0 start-50 translate-middle bg-white shadow rounded-circle d-flex align-items-center justify-content-center"
                                style="width: 70px; height: 70px; top: -35px;">
                                <i class="bi bi-cloud-arrow-up-fill fs-4 text-primary"></i>
                            </div>
                            <div class="mt-3 pt-2">
                                <h5 class="fw-semibold mb-2">Secure Document Storage</h5>
                                <p class="text-muted mb-0">Upload rental agreements, police verifications, ID proofs and
                                    more</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                        <div
                            class="card border-0 rounded-4 shadow-lg h-100 position-relative text-center p-4 hover-card">
                            <div class="icon-wrapper position-absolute top-0 start-50 translate-middle bg-white shadow rounded-circle d-flex align-items-center justify-content-center"
                                style="width: 70px; height: 70px; top: -35px;">
                                <i class="bi bi-shield-lock-fill fs-4 text-danger"></i>
                            </div>
                            <div class="mt-3 pt-2">
                                <h5 class="fw-semibold mb-2">Bank-grade Encryption</h5>
                                <p class="text-muted mb-0">All sensitive data is encrypted for full compliance and
                                    protection</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 mx-auto">
                        <div
                            class="card border-0 rounded-4 shadow-lg h-100 position-relative text-center p-4 hover-card">
                            <div class="icon-wrapper position-absolute top-0 start-50 translate-middle bg-white shadow rounded-circle d-flex align-items-center justify-content-center"
                                style="width: 70px; height: 70px; top: -35px;">
                                <i class="bi bi-bar-chart-line-fill fs-4 text-info"></i>
                            </div>
                            <div class="mt-3 pt-2">
                                <h5 class="fw-semibold mb-2">Smart Insights & Alerts</h5>
                                <p class="text-muted mb-0">Track KYC status, document expiry, and get notified about
                                    tenant checkouts</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <style>
        .hover-card:hover {
            transform: translateY(-5px);
            transition: all 0.3s ease-in-out;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .g-4,
        .gy-4 {
            --bs-gutter-y: 2.5rem;
        }
        </style>




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
                        <!-- Basic Plan -->
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
                                        <li><i class="fas fa-check-circle"></i>Manage up to 10 Tenants</li>
                                        <li><i class="fas fa-check-circle"></i>Basic Document Storage</li>
                                        <li><i class="fas fa-check-circle"></i>Secure Cloud Hosting</li>
                                        <li><i class="fas fa-check-circle"></i>Limited Email Support</li>
                                        <li><i class="fas fa-xmark-circle not-include"></i>Multi-Property Management
                                        </li>
                                        <li><i class="fas fa-xmark-circle not-include"></i>Custom Notifications</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Standard Plan -->
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
                                        <li><i class="fas fa-check-circle"></i>Manage up to 50 Tenants</li>
                                        <li><i class="fas fa-check-circle"></i>Advanced Document Storage</li>
                                        <li><i class="fas fa-check-circle"></i>Multi-Property Management</li>
                                        <li><i class="fas fa-check-circle"></i>SMS & Email Notifications</li>
                                        <li><i class="fas fa-check-circle"></i>Email + Chat Support</li>
                                        <li><i class="fas fa-xmark-circle not-include"></i>Custom Branding</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Premium Plan -->
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
                                        <li><i class="fas fa-check-circle"></i>Unlimited Tenants</li>
                                        <li><i class="fas fa-check-circle"></i>Unlimited Property Management</li>
                                        <li><i class="fas fa-check-circle"></i>Custom Notifications & Reminders</li>
                                        <li><i class="fas fa-check-circle"></i>Custom Branding & Logo</li>
                                        <li><i class="fas fa-check-circle"></i>Priority 24/7 Support</li>
                                        <li><i class="fas fa-check-circle"></i>Automated PDF Reports</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- pricing area end -->


        <!-- faq area -->
        <section
            style="background-image: url('assets/img/bg/blue-bg.webp'); background-size: cover; background-position: center; background-repeat: no-repeat;">

            <div class="faq-area py-50">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="faq-content wow fadeInUp" data-wow-delay=".25s">
                                <div class="site-heading mb-2">
                                    <h2 class="site-title my-5 text-center">General <span>Frequently</span> Asked
                                        Questions</h2>
                                </div>
                            </div>
                        </div>

                        <!-- Column 1 -->
                        <div class="col-lg-6">
                            <div class="accordion wow fadeInRight" data-wow-delay=".25s" id="accordionLeft">

                                <!-- FAQ 1 -->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading1">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                                            <span><i class="far fa-question"></i></span> What is this portal used for?
                                        </button>
                                    </h2>
                                    <div id="collapse1" class="accordion-collapse collapse show"
                                        aria-labelledby="heading1" data-bs-parent="#accordionLeft">
                                        <div class="accordion-body">
                                            This portal enables landlords or property owners to securely store and
                                            manage tenant documentation—such as Aadhaar, PAN card, photo ID, and contact
                                            details—on a centralized and encrypted system.
                                        </div>
                                    </div>
                                </div>

                                <!-- FAQ 2 -->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading2">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false"
                                            aria-controls="collapse2">
                                            <span><i class="far fa-question"></i></span> Is the data stored securely?
                                        </button>
                                    </h2>
                                    <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="heading2"
                                        data-bs-parent="#accordionLeft">
                                        <div class="accordion-body">
                                            Yes, all data is encrypted and stored in a secure cloud environment. Only
                                            authorized landlords can access their property and tenant details. We also
                                            implement multi-factor authentication and activity logs.
                                        </div>
                                    </div>
                                </div>

                                <!-- FAQ 3 -->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading3">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false"
                                            aria-controls="collapse3">
                                            <span><i class="far fa-question"></i></span> Can I manage multiple
                                            properties?
                                        </button>
                                    </h2>
                                    <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="heading3"
                                        data-bs-parent="#accordionLeft">
                                        <div class="accordion-body">
                                            Absolutely. Our platform supports managing multiple PGs, flats, plots, or
                                            homes. Each property is linked with its own tenant database and unique
                                            customer ID.
                                        </div>
                                    </div>
                                </div>

                                <!-- FAQ 4 -->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading4">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false"
                                            aria-controls="collapse4">
                                            <span><i class="far fa-question"></i></span> What types of tenant documents
                                            can I upload?
                                        </button>
                                    </h2>
                                    <div id="collapse4" class="accordion-collapse collapse" aria-labelledby="heading4"
                                        data-bs-parent="#accordionLeft">
                                        <div class="accordion-body">
                                            You can upload Aadhaar, PAN, passport photo, mobile number, rental
                                            agreements, and any other relevant tenant identification or verification
                                            documents.
                                        </div>
                                    </div>
                                </div>

                                <!-- FAQ 5 -->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading5">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="false"
                                            aria-controls="collapse5">
                                            <span><i class="far fa-question"></i></span> Is there a limit to the number
                                            of tenants or documents?
                                        </button>
                                    </h2>
                                    <div id="collapse5" class="accordion-collapse collapse" aria-labelledby="heading5"
                                        data-bs-parent="#accordionLeft">
                                        <div class="accordion-body">
                                            No. There is no limit to the number of properties or tenants you can manage.
                                            However, plans may vary based on storage or subscription level.
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- Column 2 -->
                        <div class="col-lg-6">
                            <div class="accordion wow fadeInRight" data-wow-delay=".25s" id="accordionRight">

                                <!-- FAQ 6 -->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading6">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapse6" aria-expanded="true" aria-controls="collapse6">
                                            <span><i class="far fa-question"></i></span> Can tenants also access their
                                            own documents?
                                        </button>
                                    </h2>
                                    <div id="collapse6" class="accordion-collapse collapse" aria-labelledby="heading6"
                                        data-bs-parent="#accordionRight">
                                        <div class="accordion-body">
                                            Yes, if allowed by the landlord. You can enable tenant-facing portals where
                                            tenants can view or download their documents securely.
                                        </div>
                                    </div>
                                </div>

                                <!-- FAQ 7 -->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading7">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapse7" aria-expanded="false"
                                            aria-controls="collapse7">
                                            <span><i class="far fa-question"></i></span> Can I export or backup data?
                                        </button>
                                    </h2>
                                    <div id="collapse7" class="accordion-collapse collapse" aria-labelledby="heading7"
                                        data-bs-parent="#accordionRight">
                                        <div class="accordion-body">
                                            Yes. You can export your data in CSV, PDF, or ZIP format for backup or audit
                                            purposes.
                                        </div>
                                    </div>
                                </div>

                                <!-- FAQ 8 -->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading8">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapse8" aria-expanded="false"
                                            aria-controls="collapse8">
                                            <span><i class="far fa-question"></i></span> How is customer data protected?
                                        </button>
                                    </h2>
                                    <div id="collapse8" class="accordion-collapse collapse" aria-labelledby="heading8"
                                        data-bs-parent="#accordionRight">
                                        <div class="accordion-body">
                                            We follow industry-standard practices such as SSL encryption, role-based
                                            access, audit logs, and secure hosting infrastructure to protect sensitive
                                            customer data.
                                        </div>
                                    </div>
                                </div>

                                <!-- FAQ 9 -->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading9">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapse9" aria-expanded="false"
                                            aria-controls="collapse9">
                                            <span><i class="far fa-question"></i></span> Can I use this for commercial
                                            or rental apartments?
                                        </button>
                                    </h2>
                                    <div id="collapse9" class="accordion-collapse collapse" aria-labelledby="heading9"
                                        data-bs-parent="#accordionRight">
                                        <div class="accordion-body">
                                            Yes, the portal is built to support landlords managing residential PGs,
                                            flats, villas, or even commercial rental spaces.
                                        </div>
                                    </div>
                                </div>

                                <!-- FAQ 10 -->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading10">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapse10" aria-expanded="false"
                                            aria-controls="collapse10">
                                            <span><i class="far fa-question"></i></span> How do I get started?
                                        </button>
                                    </h2>
                                    <div id="collapse10" class="accordion-collapse collapse" aria-labelledby="heading10"
                                        data-bs-parent="#accordionRight">
                                        <div class="accordion-body">
                                            Simply register as a landlord, verify your identity, and start adding your
                                            properties. From there, you can upload and manage tenant documents and track
                                            their status securely.
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>



    </main>
     <!-- End -->

@endsection
