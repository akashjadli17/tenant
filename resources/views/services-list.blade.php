@extends('layouts.master')

@section('title', $midCategory->name . ' Services')

@section('content')

    <style>
        .site-breadcrumb {
            padding-top: 35px;
            padding-bottom: 35px;
        }

        .service-card {
            max-width: 700px;
            height: 300px;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 12px;
            display: flex;
            justify-content: space-between;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            gap: 20px;
        }

        .service-left {
            flex: 1;
        }

        .service-title {
            font-size: 17px;
            font-weight: 600;
            margin-bottom: 10px;
            color: black;
        }

        .rating {
            display: flex;
            align-items: center;
            margin-bottom: 6px;
        }

        .rating i {
            color: #000;
            margin-right: 5px;
        }

        .price-time {
            color: gray;
            font-size: 15px;
            margin-bottom: 12px;
        }

        .benefits {
            list-style: none;
            padding: 0;
            margin: 10px 0 15px 0;
        }

        .benefits li {
            margin-bottom: 5px;
            display: flex;
            align-items: center;
        }

        .benefits li::before {
            content: '✔';
            color: green;
            margin-right: 10px;
        }

        .view-details a {
            font-weight: 600;
            color: #000;
            text-decoration: underline;
            cursor: pointer;
        }

        .service-right {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 35px;
        }

        .service-img {
            width: 150px;
            height: 175px;
            object-fit: cover;
            border-radius: 12px;
        }

        .add-to-cart {
            background: black;
            color: white;
            padding: 8px 12px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-weight: 600;
        }

        @media (max-width: 991px) {
            .site-breadcrumb {
                padding-top: 85px;
            }

            .service-card {
                flex-direction: column;
                align-items: flex-start;
                height: auto;
            }

            .service-right {
                flex-direction: row;
                justify-content: space-between;
                width: 100%;
            }

            .service-img {
                width: 80px;
                height: 80px;
            }

            .add-to-cart {
                padding: 8px 16px;
                font-size: 14px;
            }
        }
    </style>


    <main class="main">

        <div class="site-breadcrumb">
            <div class="container">
                <h2 class="breadcrumb-title">{{ $midCategory->name }}</h2>
                <ul class="breadcrumb-menu">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active">{{ $midCategory->name }}</li>
                </ul>
            </div>
        </div>

        <div class="contact-area py-5">
            <div class="container">
                <div class="contact-wrapper">
                    <div class="row d-flex justify-content-center">

                        @forelse($services as $service)
                            <div class="col-md-12 col-lg-6 align-self-center mb-4">
                                <div class="service-card">
                                    <div class="service-left">
                                        <div class="service-title">{{ $service->name }}</div>

                                        <div class="rating">
                                            <i>★</i>
                                            <span>{{ number_format($service->rating ?? 0, 2) }}</span>
                                        </div>

                                        <div class="price-time">
                                            Rs. {{ number_format($service->price) }} &nbsp; | &nbsp;
                                            <i class="far fa-clock"></i> {{ $service->duration }} mins
                                        </div>

                                        {!! nl2br(
                                            '<ul class="benefits"><li>' .
                                                implode('</li><li>', array_filter(array_map('trim', explode("\n", $service->highlight_points)))) .
                                                '</li></ul>',
                                        ) !!}


                                        <div class="view-details">
                                            <a href="{{ route('service.detail', Str::slug($service->name)) }}">VIEW
                                                DETAILS</a>
                                        </div>
                                    </div>

                                    <div class="service-right">
                                        <img src="{{ asset('storage/services/images/' . $service->image) }}"
                                            alt="{{ $service->name }}" class="service-img">
                                        <button class="add-to-cart" data-id="{{ $service->id }}">ADD TO CART</button>

                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="text-center">No services found under this category.</p>
                        @endforelse

                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection
