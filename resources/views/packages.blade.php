@extends('layouts.master')

@section('title', 'Tenants Management')

@section('content')
    <main class="main">

        <!-- Breadcrumb -->
        <div class="site-breadcrumb" style="background: url('{{ asset('assets/img/breadcrumb/01.jpg') }}');">
            <div class="container">
                <h2 class="breadcrumb-title">Our Pricing</h2>
                <ul class="breadcrumb-menu">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active">Our Pricing</li>
                </ul>
            </div>
        </div>

        <!-- Packages Section -->
        <div class="pricing-area py-5">
            <div class="container">
                <div class="row">
                    @forelse($packages as $package)
                        <div class="col-md-6 col-lg-6 mb-4">
                            <div class="package-card d-flex">
                                <!-- Left Content -->
                                <div class="package-content flex-grow-1">
                                    <div class="package-label">{{ $package->package_type }}</div>
                                    <div class="package-title">{{ $package->title }}</div>

                                    <div class="price-section">
                                        <span class="old-price">₹ {{ number_format($package->original_price) }}</span>
                                        <span class="price">₹ {{ number_format($package->discounted_price) }}</span>
                                    </div>

                                    <ul class="services">
                                      @if (is_array($package->features))
                                            @foreach ($package->features as $feature)
                                                <li>{{ $feature }}</li>
                                            @endforeach
                                        @endif

                                    </ul>

                                    <div class="package-bottom">
                                        <button class="add-to-cart">ADD TO CART</button>
                                    </div>
                                </div>

                                <!-- Right Image -->
                                <div class="package-image">
                                    @if ($package->package_image)
                                        <img src="{{ asset('storage/' . $package->package_image) }}" alt="Package Image"
                                            class="person-img" />
                                    @else
                                        <img src="{{ asset('images/default-package.png') }}" alt="Default Image"
                                            class="person-img" />
                                    @endif
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center">
                            <p>No packages available at the moment. Please check back later.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </main>


    <style>
        .package-card {
            background: #fff;
            max-width: 600px;
            margin: 20px auto;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 20px;
            height: auto;
            flex-wrap: wrap;
        }

        .package-content {
            flex: 1;
            min-width: 250px;
        }

        .package-label {
            background: #e0e0e0;
            color: #333;
            display: inline-block;
            padding: 6px 14px;
            border-radius: 10px;
            font-weight: 500;
            font-size: 14px;
        }

        .package-title {
            font-size: 18px;
            font-weight: 500;
            margin: 10px 0 20px;
            color: #2c3e50;
        }

        .price-section {
            margin-bottom: 20px;
        }

        .price {
            font-size: 26px;
            color: #000;
            font-weight: 600;
        }

        .old-price {
            text-decoration: line-through;
            color: #c00;
            font-size: 18px;
            margin-right: 10px;
        }

        .services {
            margin: 20px 0;
            padding: 0;
        }

        .services li {
            list-style: none;
            margin: 10px 0;
            position: relative;
            padding-left: 30px;
            font-size: 14px;
            color: #34495e;
        }

        .services li::before {
            content: "✓";
            position: absolute;
            left: 0;
            top: 0;
            color: #f28c28;
            font-weight: bold;
        }

        .add-to-cart {
            background: #000;
            color: #fff;
            padding: 12px 25px;
            font-size: 16px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .add-to-cart:hover {
            background: #333;
        }

        .package-bottom {
            margin-top: 20px;
            display: flex;
            justify-content: flex-start;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .package-image img.person-img {
            height: 255px;
            width: auto;
            max-width: 220px;
            border-radius: 12px;
            /* object-fit: cover; */
        }

        /* ✅ MOBILE RESPONSIVENESS */
        @media (max-width: 768px) {
            .package-card {
                flex-direction: column;
                align-items: center;
                padding: 20px;
                text-align: center;
            }

            .package-title {
                font-size: 20px;
            }

            .price {
                font-size: 22px;
            }

            .old-price {
                font-size: 16px;
            }

            .services li {
                font-size: 15px;
                padding-left: 26px;
            }

            .add-to-cart {
                width: 100%;
                padding: 12px;
                font-size: 16px;
            }

            .package-bottom {
                justify-content: center;
            }

            .package-image img.person-img {
                margin-top: 20px;
                max-width: 100%;
                height: auto;
            }
        }
    </style>



@endsection
