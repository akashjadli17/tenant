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
                        @forelse($packages as $package)
                            <div class="col-md-6 col-lg-4">
                                <div class="pricing-item active wow fadeInUp" data-wow-delay=".25s">
                                    <div class="pricing-header">
                                        <h5>{{ ucfirst($package->package_type) }}</h5>
                                    </div>

                                    <div class="pricing-price">
                                        <div class="pricing-icon">
                                            <img src="{{ asset('assets/img/icon/building.svg') }}" alt="">
                                        </div>
                                        <div class="pricing-amount">
                                            <strong>
                                                {!! $package->currency === 'INR'
                                                    ? '₹' .
                                                        number_format($package->price, 0) .
                                                        '<span class="pricing-amount-type">/' .
                                                        ucfirst($package->billing_cycle) .
                                                        '</span>'
                                                    : $package->currency .
                                                        ' ' .
                                                        number_format($package->price, 0) .
                                                        '<span class="pricing-amount-type">/' .
                                                        ucfirst($package->billing_cycle) .
                                                        '</span>' !!}
                                            </strong>

                                        </div>
                                    </div>

                                    <div class="pricing-btn">
                                        <a href="#" class="theme-btn2">
                                            Purchase Now <i class="fas fa-arrow-right"></i>
                                        </a>
                                    </div>

                                    <div class="pricing-feature">
                                        <ul>
                                            @php
                                                $features = json_decode($package->features, true) ?: [];
                                            @endphp

                                            @if (!empty($features))
                                                @foreach ($features as $feature)
                                                    <li>
                                                        @if (isset($feature['checked']) && $feature['checked'] == '1')
                                                            <i class="fas fa-check-circle"></i> {{ $feature['name'] }}
                                                        @else
                                                            <i class="fas fa-xmark-circle not-include"></i>
                                                            {{ $feature['name'] }}
                                                        @endif
                                                    </li>
                                                @endforeach
                                            @else
                                                <li>
                                                    <i class="fas fa-xmark-circle not-include"></i> No features listed
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12 text-center">
                                <p>No packages available at the moment.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </section>
        <!-- pricing area end -->






    </main>
@endsection
