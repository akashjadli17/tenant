@extends('layouts.master')

@section('content')

    <style>
        .site-breadcrumb {
            padding-top: 40px;
            padding-bottom: 40px;
        }

        /* ==== Fade Gallery Slider ==== */
        .fade-gallery-wrapper {
            position: relative;
            width: 100%;
            height: 400px;
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

        /* ==== Service Summary ==== */
        .service-summary {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            max-width: 1000px;
            /* margin: 20px auto; */
            background-color: #fff;
            gap: 20px;
            flex-wrap: wrap;
        }

        .info-left {
            display: flex;
            flex-direction: column;
            gap: 10px;
            flex: 1;
        }

        .service-title {
            font-size: 20px;
            font-weight: 600;
        }

        .price-time {
            display: flex;
            align-items: center;
            font-size: 16px;
            font-weight: bold;
            flex-wrap: wrap;
        }

        .price-time i {
            margin: 0 8px;
            font-style: normal;
            font-weight: normal;
            color: #888;
        }

        .duration {
            font-weight: normal;
            color: #999;
        }

        .rating {
            display: flex;
            align-items: center;
            font-size: 15px;
            color: #999;
            gap: 6px;
            flex-wrap: wrap;
        }

        .rating .star {
            color: #0a0a23;
            font-size: 18px;
        }

        .add-to-cart {
            background-color: #000;
            color: #fff;
            padding: 12px 30px;
            border: none;
            border-radius: 50px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s;
            white-space: nowrap;
        }

        .add-to-cart:hover {
            background-color: #333;
        }

        /* ==== Tabs Styling ==== */
        .nav-tabs {
            display: flex;
            justify-content: center;
            border-bottom: 1px solid #ccc;
            gap: 10px;
            flex-wrap: wrap;
        }

        .nav-tabs .nav-link {
            color: #888;
            font-weight: 500;
            padding: 14px 20px;
            border: none;
            border-bottom: 2px solid transparent;
            transition: 0.3s ease;
        }

        .nav-tabs .nav-link:hover {
            color: #000;
            background-color: transparent;
        }

        .nav-tabs .nav-link.active {
            color: #000;
            font-weight: 600;
            border-bottom: 2px solid #000;
        }

        .tab-content {
            padding-top: 40px;
        }

        .tab-pane img {
            /* width: 120px; */
            margin-bottom: 20px;
        }

        .tab-pane h5 {
            font-weight: 600;
            margin-bottom: 10px;
        }

        .tab-pane p {
            font-size: 15px;
            margin-bottom: 20px;
            color: black;
        }

        .tab-pane .btn {
            font-size: 14px;
            font-weight: 500;
            padding: 10px 25px;
            border-radius: 25px;
            transition: 0.3s ease;
        }

        /* =================== MOBILE VIEW =================== */
        @media (max-width: 991px) {
            .site-breadcrumb {
                padding-top: 85px;
            }

            .fade-gallery-wrapper {
                height: 200px;
            }

            .service-summary {
                flex-direction: column;
                align-items: flex-start;
                text-align: left;
                gap: 15px;
            }

            .add-to-cart {
                width: 100%;
                text-align: center;
            }

            .price-time,
            .rating {
                font-size: 14px;
            }

            .service-title {
                font-size: 18px;
            }

            .fade-gallery-img {
                object-position: center;
            }
        }

        @media (max-width: 768px) {
            .nav-tabs {
                flex-direction: column;
                align-items: center;
            }

            .nav-tabs .nav-link {
                width: 100%;
                text-align: center;
            }

            .tab-content {
                padding: 20px 10px;
            }

            .tab-pane .btn {
                width: 100%;
                max-width: 250px;
            }

            .tab-pane img {
                width: 100px;
            }

            .service-summary {
                padding: 15px;
            }

            .tab-pane p {
                font-size: 14px;
            }
        }
    </style>
    <main class="main">
        <div class="site-breadcrumb">
            <div class="container">
                <h2 class="breadcrumb-title">{{ $service->name }}</h2>
                <ul class="breadcrumb-menu">
                    <li><a href="/">Home</a></li>
                    <li class="active">{{ $service->name }}</li>
                </ul>
            </div>
        </div>

        <div class="service-single-area py-5">
            <div class="container">
                <div class="service-single-wrapper">
                    <div class="row flex-row-reverse">
                        <div class="col-xl-8 col-lg-8">
                            <div class="service-details">
                                @if ($service->image)
                                    <div class="fade-gallery-wrapper">
                                        <div class="fade-gallery-slider">
                                            <img src="{{ asset('storage/services/images/' . $service->image) }}"
                                                class="fade-gallery-img active" alt="gallery">
                                            @if ($service->video)
                                                <img src="{{ asset('storage/services/images/' . $service->video) }}"
                                                    class="fade-gallery-img" alt="gallery">
                                            @endif
                                        </div>
                                    </div>
                                @endif
                                <div class="service-summary">
                                    <div class="info-left">
                                        <div class="service-title">{{ $service->name }}</div>
                                        <div class="price-time">Rs. {{ $service->price }} &nbsp; | &nbsp; <i
                                                class="far fa-clock"></i> {{ $service->duration }} mins</div>
                                        <div class="rating">
                                            <span class="star">&#9733;</span>
                                            <span>{{ $service->rating ?? '4.85' }}</span>
                                        </div>
                                    </div>
                                    <button class="add-to-cart">ADD TO CART</button>
                                </div>

                                <ul class="nav nav-tabs justify-content-center" id="bookingTabs" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="services-tab" data-bs-toggle="tab"
                                            data-bs-target="#services" type="button" role="tab">OVERVIEW</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="how-tab" data-bs-toggle="tab" data-bs-target="#how"
                                            type="button" role="tab">HOW IT WORKS</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="faq-tab" data-bs-toggle="tab" data-bs-target="#faq"
                                            type="button" role="tab">FAQ'S</button>
                                    </li>
                                </ul>

                                <div class="tab-content py-5">
                                    @php
                                        $paragraphs = preg_split(
                                            '/<p[^>]*>(.*?)<\/p>/i',
                                            $service->overview,
                                            -1,
                                            PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY,
                                        );
                                        $aftercareIndex = array_search(
                                            'Aftercare Tips',
                                            array_map('strip_tags', $paragraphs),
                                        );
                                    @endphp

                                    <div class="tab-pane fade show active" id="services" role="tabpanel">
                                        {{-- ✅ First section: List with bullets --}}
                                        <div style="padding-left: 20px;">
                                            <ul
                                                style="list-style-type: disc; list-style-position: outside; padding-left: 20px; margin-bottom: 30px;">
                                                @foreach ($paragraphs as $index => $text)
                                                    @if ($index < $aftercareIndex)
                                                        @if (!empty(trim(strip_tags($text))))
                                                            <li style="margin-bottom: 10px;">{{ strip_tags($text) }}</li>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>


                                        {{-- ✅ Aftercare Tips Section --}}
                                        @if ($aftercareIndex !== false)
                                            <div style="background-color: #fef1ee; padding: 30px; border-radius: 4px;">
                                                <h4 style="font-weight: 600; margin-bottom: 20px;">Aftercare Tips</h4>
                                                <ul style="list-style: none; padding-left: 0;">
                                                    @foreach ($paragraphs as $index => $text)
                                                        @if ($index > $aftercareIndex)
                                                            @if (!empty(trim(strip_tags($text))))
                                                                <li
                                                                    style="display: flex; align-items: flex-start; margin-bottom: 15px;">
                                                                    <span
                                                                        style="margin-right: 10px; margin-top: 2px;">✅</span>
                                                                    <span>{{ strip_tags($text) }}</span>
                                                                </li>
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    </div>

                                    {{-- 💡 How It Works Tab --}}
                                    <div class="tab-pane fade" id="how" role="tabpanel">
                                        <div class="row">
                                            @foreach ($service->how_it_works ?? [] as $index => $step)
                                                <div class="col-md-6 mb-4">
                                                    <div style="position: relative; border-radius: 10px; overflow: hidden;">
                                                        <img src="{{ asset('storage/services/how_it_works/' . $step['image']) }}"
                                                            alt="Step {{ $index + 1 }}" class="img-fluid"
                                                            style="border-radius: 10px;">

                                                        {{-- Number Badge --}}
                                                        <div 
                                                            style="
                                                                    position: absolute;
                                                                    bottom: 10px;
                                                                    left: 10px;
                                                                    background-color: #0d1b5c;
                                                                    color: #fff;
                                                                    width: 30px;
                                                                    height: 30px;
                                                                    border-radius: 50%;
                                                                    display: flex;
                                                                    align-items: center;
                                                                    justify-content: center;
                                                                    font-weight: bold;
                                                                    font-size: 14px;
                                                                ">
                                                            {{ $index + 1 }}
                                                        </div>
                                                    </div>

                                                    {{-- Step Title --}}
                                                    <p style="font-weight: 600; margin-top: 10px;">{{ $step['title'] }}</p>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>


                                    {{-- 💬 FAQ Tab --}}
                                    <div class="tab-pane fade" id="faq" role="tabpanel">
                                        <div class="accordion" id="accordionFaq">
                                            @foreach ($service->faqs ?? [] as $index => $faq)
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="heading{{ $index }}">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#collapse{{ $index }}">
                                                            {{ $faq['question'] }}
                                                        </button>
                                                    </h2>
                                                    <div id="collapse{{ $index }}"
                                                        class="accordion-collapse collapse" data-bs-parent="#accordionFaq">
                                                        <div class="accordion-body">
                                                            {{ $faq['answer'] }}
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-4">
                            <div class="service-sidebar">
                                <div class="widget category">
                                    <h4 class="widget-title">All Services</h4>
                                    <div class="category-list">
                                        @foreach (App\Models\Service::take(8)->get() as $s)
                                            <a href="{{ route('service.detail', Str::slug($s->name)) }}">
                                                <i class="far fa-angle-double-right"></i> {{ $s->name }}
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>

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
