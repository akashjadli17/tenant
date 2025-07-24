@extends('layouts.master')

@section('title', 'Myraluxa Aesthetic Pvt Ltd')

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
    margin: 20px auto;
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
            <h2 class="breadcrumb-title">Full Body Laser Hair Reduction</h2>
            <ul class="breadcrumb-menu">
                <li><a href="{{route('index')}}">Home</a></li>
                <li class="active">Full Body Laser Hair Reduction</li>
            </ul>
        </div>
    </div>


    <div class="service-single-area py-5">
        <div class="container">
            <div class="service-single-wrapper">
                <div class="row flex-row-reverse">

                    <div class="col-xl-8 col-lg-8">
                        <div class="service-details">
                            <div class="fade-gallery-wrapper">
                                <div class="fade-gallery-slider">
                                    <img src="./assets/img/slider/edit_slider.png" class="fade-gallery-img active"
                                        alt="gallery">
                                    <img src="./assets/img/slider/edit_slider1.webp" class="fade-gallery-img"
                                        alt="gallery">

                                </div>
                            </div>
                            <div class="service-summary">
                                <div class="info-left">
                                    <div class="service-title">Full Body Laser Hair Reduction</div>
                                    <div class="price-time">Rs. 7,080 &nbsp; | &nbsp; <i class="far fa-clock"></i> 180
                                        mins</div>
                                    <div class="rating">
                                        <span class="star">★</span>
                                        <span>4.85</span>
                                    </div>
                                </div>
                                <button class="add-to-cart">ADD TO CART</button>
                            </div>

                            <div class="container">
                                <!-- Nav Tabs -->
                                <ul class="nav nav-tabs justify-content-center" id="bookingTabs" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="services-tab" data-bs-toggle="tab"
                                            data-bs-target="#services" type="button" role="tab">OVERVIEW</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="packages-tab" data-bs-toggle="tab"
                                            data-bs-target="#packages" type="button" role="tab">HOW IT WORKS</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="skincare-tab" data-bs-toggle="tab"
                                            data-bs-target="#skincare" type="button" role="tab">FAQ'S</button>
                                    </li>
                                </ul>

                                <!-- Tab Content -->
                                <div class="tab-content py-5" id="bookingTabsContent">
                                    <!-- Services Tab -->
                                    <div class="tab-pane fade show active" id="services" role="tabpanel">
                                        <p>&#9679; Unwanted hair is bothersome and tedious to remove</p>
                                        <p>&#9679; Frequent shaving or waxing can lead to ingrown hair,
                                            pigmentation, and other skin issues</p>
                                        <p>&#9679; Fortunately, we provide permanent solutions to address
                                            all your hair removal concerns</p>
                                        <p>&#9679; This treatment covers the entire body except for
                                            sensitive parts like ears, eyebrows, and inner butt-line hair for safety
                                            reasons</p>
                                        <h4 class="mb-3">Aftercare Tips</h4>


                                        <ul class="service-single-list">
                                            <li><i class="far fa-check"></i>Redness & Bumps are normal, these may last
                                                up to 2 hours or longer. If sensitivity persists use a cold compress
                                            </li>
                                            <li><i class="far fa-check"></i>Avoid soap and face wash. The treated area
                                                must be washed gently with cold or lukewarm water, pat skin dry instead
                                                of rubbing for the first 48 hours</li>
                                            <li><i class="far fa-check"></i>Avoid makeup & lotion, moisturizer, or
                                                deodorant for the initial 24 hours
                                            </li>
                                            <li><i class="far fa-check"></i>Dead hair will start shedding 2-30 days
                                                after your treatment. Within this timeframe, you may notice stubble as
                                                dead hair is shed from the follicles</li>
                                            <li><i class="far fa-check"></i>Use sunscreen with SPF 25 or higher
                                                throughout the treatment period & for 1-2 months afterward to protect
                                                skin from harsh UV rays</li>
                                            <li><i class="far fa-check"></i>Avoid sweating activities such as sauna
                                                baths, workouts, swimming for up to 48 hours post treatment</li>
                                        </ul>

                                    </div>

                                    <!-- Packages Tab -->
                                    <div class="tab-pane fade text-center" id="packages" role="tabpanel">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <img src="assets/img/pricing/h1.jpg" alt>
                                                <p>Area is marked, cleansed and shaved</p>
                                            </div>
                                            <div class="col-md-6">
                                                <img src="assets/img/pricing/h2.jpg" alt>
                                                <p>ECG gel is applied to protect the skin</p>
                                            </div>
                                            <div class="col-md-6 ">
                                                <img src="assets/img/pricing/h3.jpg" alt>
                                                <p>Laser shots target the hair follicles</p>
                                            </div>
                                            <div class="col-md-6">
                                                <img src="assets/img/pricing/h4.jpg" alt>
                                                <p>Sunscreen is applied post-treatment for protection</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Skincare Tab -->
                                    <div class="tab-pane fade" id="skincare" role="tabpanel">
                                        <div class="accordion" id="accordionExample">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingOne">
                                                    <button class="accordion-button" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                                        aria-expanded="true" aria-controls="collapseOne">
                                                        What is Laser Hair Reduction
                                                    </button>
                                                </h2>
                                                <div id="collapseOne" class="accordion-collapse collapse show"
                                                    aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        Lasers can only reduce hair growth, they cannot eliminate
                                                        hair entirely. You can expect an 80- 90% reduction in growth
                                                        over 6 or more sessions depending on your body, medical
                                                        history, and hormones. You might need subsequent maintenance
                                                        sessions
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingTwo">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                                        aria-expanded="false" aria-controls="collapseTwo">
                                                        What is the key factor for achieving results
                                                    </button>
                                                </h2>
                                                <div id="collapseTwo" class="accordion-collapse collapse"
                                                    aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        For optimal results, lasers target the melanin in pigmented hair
                                                        follicles to arrest growth, the treatment is ineffective on
                                                        white or
                                                        gray hair. Individuals of all skin types can undergo treatment
                                                        although
                                                        best outcomes are achieved when there is a notable contrast
                                                        between hair
                                                        and skin color
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingThree">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                                        aria-expanded="false" aria-controls="collapseThree">
                                                        Under what circumstances should the treatment be avoided
                                                    </button>
                                                </h2>
                                                <div id="collapseThree" class="accordion-collapse collapse"
                                                    aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        Avoid the treatment in case you have body implants
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingfour">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapsefour"
                                                        aria-expanded="false" aria-controls="collapsefour">
                                                        Is the treatment painful
                                                    </button>
                                                </h2>
                                                <div id="collapsefour" class="accordion-collapse collapse"
                                                    aria-labelledby="headingfour" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        We offer treatment with painless diode technology.
                                                        However, you might feel pricks on a few occasions
                                                        during the treatment which will be more amplified
                                                        in pigmented areas
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingfive">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapsefive"
                                                        aria-expanded="false" aria-controls="collapsefive">
                                                        Are there any side effects
                                                    </button>
                                                </h2>
                                                <div id="collapsefive" class="accordion-collapse collapse"
                                                    aria-labelledby="headingfive" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        The Treatment is 100% safe, there are no permanent side effects.
                                                        However, if your skin is sensitive you might face itching,
                                                        redness, or bumps which will subside over a few hours/days
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingsix">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapsesix"
                                                        aria-expanded="false" aria-controls="collapsesix">

                                                        How to prepare for the treatment
                                                    </button>
                                                </h2>
                                                <div id="collapsesix" class="accordion-collapse collapse"
                                                    aria-labelledby="headingsix" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        Prior to your treatment session, refrain from waxing,
                                                        plucking, or bleaching, ensure 3-4 weeks of full hair growth,
                                                        avoid using makeup, lotion, or deodorant on the treatment area,
                                                        steer clear of chemical peels or aesthetic treatments for at
                                                        least
                                                        15 days, and minimize caffeine intake to minimize sensitivity
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
                                    <a href="#"><i class="far fa-angle-double-right"></i>Full Body Laser Hair
                                        Reduction</a>
                                    <a href="#"><i class="far fa-angle-double-right"></i>Full Arms Laser Hair
                                        Reduction</a>
                                    <a href="#"><i class="far fa-angle-double-right"></i>Half Arms Laser Hair
                                        Reduction</a>
                                    <a href="#"><i class="far fa-angle-double-right"></i>Full Legs Laser Hair
                                        Reduction</a>
                                    <a href="#"><i class="far fa-angle-double-right"></i>Half Legs Laser Hair
                                        Reduction</a>
                                    <a href="#"><i class="far fa-angle-double-right"></i>Full Front Laser Hair
                                        Reduction</a>
                                    <a href="#"><i class="far fa-angle-double-right"></i>Half Front Laser Hair
                                        Reduction</a>
                                    <a href="#"><i class="far fa-angle-double-right"></i>Full Back Laser Hair
                                        Reduction</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
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