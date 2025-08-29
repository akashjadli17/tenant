@extends('layouts.master')

@section('title', 'Our Pricing')

@section('content')
    <main class="main">
        <div class="site-breadcrumb" style="background: url('{{ asset('assets/img/breadcrumb/01.jpg') }}');">
            <div class="container">
                <h2 class="breadcrumb-title">Our Pricing</h2>
                <ul class="breadcrumb-menu">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active">Our Pricing</li>
                </ul>
            </div>
        </div>

        
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

    </main>
@endsection
