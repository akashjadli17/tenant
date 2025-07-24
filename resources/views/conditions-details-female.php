<?php
include("./include/header.php")
?>
<style>
    .site-breadcrumb {
        padding-top: 35px;
        padding-bottom: 35px;
    }

    .service-card {
        max-width: 700px;
        height: 410px;
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
        margin-bottom: 10px;
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
        gap: 15px;
    }

    .service-img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 12px;
    }

    .add-to-cart {
        background: black;
        color: white;
        padding: 10px 20px;
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
            <h2 class="breadcrumb-title">Unwanted Hair</h2>
            <ul class="breadcrumb-menu">
                <li><a href="{{route('index')}}">Home</a></li>
                <li class="active">Unwanted Hair</li>
            </ul>
        </div>
    </div>

    <div class="contact-area py-5">
        <div class="container">
            <div class="contact-wrapper">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-12 col-lg-6 align-self-center">
                        <div class="service-card">
                            <div class="service-left">
                                <div class="service-title">Full Body Laser Hair Reduction</div>
                                <div class="rating">
                                    <i>★</i>
                                    <span>4.85</span>
                                </div>
                                <div class="price-time">Rs. 7,080 &nbsp; | &nbsp; <i class="far fa-clock"></i> 180 mins</div>

                                <ul class="benefits">
                                    <li>80-90% reduction in hair growth over 6+ sessions</li>
                                    <li>No more monthly waxing hassles or razor cuts</li>
                                    <li>US FDA-approved, painless, and safe technology</li>
                                </ul>

                               <div class="view-details"><a href="laser-treatments-female.php">VIEW DETAILS</a></div>
                            </div>

                            <div class="service-right">
                                <img src="./assets/img/condition/C1.png" alt="Service" class="service-img">
                                <button class="add-to-cart">ADD TO CART</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 align-self-center">
                        <div class="service-card">
                            <div class="service-left">
                                <div class="service-title">Full Arms Laser Hair Reduction</div>
                                <div class="rating">
                                    <i>★</i>
                                    <span>4.72</span>
                                </div>
                                <div class="price-time">Rs. 3,975 &nbsp; | &nbsp; <i class="far fa-clock"></i> 60 mins</div>

                                <ul class="benefits">
                                    <li>Includes full arms and underarms</li>
                                    <li>80-90% reduction in hair growth over 6+ sessions</li>
                                    <li>US FDA-approved, painless, and safe technology</li>
                                </ul>

                               <div class="view-details"><a href="laser-treatments-female.php">VIEW DETAILS</a></div>
                            </div>

                            <div class="service-right">
                                <img src="./assets/img/condition/C2.png" alt="Service" class="service-img">
                                <button class="add-to-cart">ADD TO CART</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 align-self-center">
                        <div class="service-card">
                            <div class="service-left">
                                <div class="service-title">Half Arms Laser Hair Reduction</div>
                                <div class="rating">
                                    <i>★</i>
                                    <span>4.72</span>
                                </div>
                                <div class="price-time">Rs. 4,200 &nbsp; | &nbsp; <i class="far fa-clock"></i> 60 mins</div>

                                <ul class="benefits">
                                    <li>Includes shoulder to elbow joint or elbow joint to finger-tips</li>
                                    <li>US FDA-approved, painless, and safe technology</li>

                                </ul>

                               <div class="view-details"><a href="laser-treatments-female.php">VIEW DETAILS</a></div>
                            </div>

                            <div class="service-right">
                                <img src="./assets/img/condition/C3.png" alt="Service" class="service-img">
                                <button class="add-to-cart">ADD TO CART</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 align-self-center">
                        <div class="service-card">
                            <div class="service-left">
                                <div class="service-title">Full Legs Laser Hair Reduction</div>
                                <div class="rating">
                                    <i>★</i>
                                    <span>4.88</span>
                                </div>
                                <div class="price-time">Rs. 4,550 &nbsp; | &nbsp;
                                    <i class="far fa-clock"></i> 90 mins
                                </div>

                                <ul class="benefits">
                                    <li>Rock that short dress with absolute confidence, free from any worries about unwanted hair</li>
                                    <li>Includes legs, front and back, from thighs to toes</li>
                                    <li>Doesn’t include bikini area and buttocks</li>

                                </ul>

                               <div class="view-details"><a href="laser-treatments-female.php">VIEW DETAILS</a></div>
                            </div>

                            <div class="service-right">
                                <img src="./assets/img/condition/C4.png" alt="Service" class="service-img">
                                <button class="add-to-cart">ADD TO CART</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 align-self-center">
                        <div class="service-card">
                            <div class="service-left">
                                <div class="service-title">Half Legs Laser Hair Reduction</div>
                                <div class="rating">
                                    <i>★</i>
                                    <span>4.76</span>
                                </div>
                                <div class="price-time">Rs. 3,750 &nbsp; | &nbsp;
                                    <i class="far fa-clock"></i> 60 mins
                                </div>

                                <ul class="benefits">
                                    <li>Be LBD ready and flaunt your silky, hair-free legs, always!</li>
                                    <li>Includes lower leg- front & back from knees to toes</li>


                                </ul>

                               <div class="view-details"><a href="laser-treatments-female.php">VIEW DETAILS</a></div>
                            </div>

                            <div class="service-right">
                                <img src="./assets/img/condition/C5.png" alt="Service" class="service-img">
                                <button class="add-to-cart">ADD TO CART</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 align-self-center">
                        <div class="service-card">
                            <div class="service-left">
                                <div class="service-title">Full Front Laser Hair Reduction</div>
                                <div class="rating">
                                    <i>★</i>
                                    <span>4.82</span>
                                </div>
                                <div class="price-time">Rs. 4,125 &nbsp; | &nbsp;
                                    <i class="far fa-clock"></i> 120 mins
                                </div>

                                <ul class="benefits">
                                    <li>Be it your swim suit or a crop top, flaunt your smooth body without any hassle</li>
                                    <li>Includes body from neck to just above the bikini line</li>


                                </ul>

                               <div class="view-details"><a href="laser-treatments-female.php">VIEW DETAILS</a></div>
                            </div>

                            <div class="service-right">
                                <img src="./assets/img/condition/C6.png" alt="Service" class="service-img">
                                <button class="add-to-cart">ADD TO CART</button>
                            </div>
                        </div>
                    </div>
                     <div class="col-md-12 col-lg-6 align-self-center">
                        <div class="service-card">
                            <div class="service-left">
                                <div class="service-title">Half Front Laser Hair Reduction</div>
                                <div class="rating">
                                    <i>★</i>
                                    <span>4.74</span>
                                </div>
                                <div class="price-time">Rs. 3,750 &nbsp; | &nbsp;
                                    <i class="far fa-clock"></i> 60 mins
                                </div>

                                <ul class="benefits">
                                    <li>Be it your swim suit or a crop top, flaunt your smooth body without any hassle</li>
                                    <li>Includes either front body from neck to just below the breasts OR just the abdomen region</li>


                                </ul>

                               <div class="view-details"><a href="laser-treatments-female.php">VIEW DETAILS</a></div>
                            </div>

                            <div class="service-right">
                                <img src="./assets/img/condition/C7.png" alt="Service" class="service-img">
                                <button class="add-to-cart">ADD TO CART</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 align-self-center">
                        <div class="service-card">
                            <div class="service-left">
                                <div class="service-title">Full Back Laser Hair Reduction</div>
                                <div class="rating">
                                    <i>★</i>
                                    <span>4.74</span>
                                </div>
                                <div class="price-time">Rs. 4,125 &nbsp; | &nbsp;
                                    <i class="far fa-clock"></i> 60 mins
                                </div>

                                <ul class="benefits">
                                    <li>Say goodbye to outfit dilemmas with a smooth back</li>
                                    <li>Includes back body from neck to just above the buttocks</li>


                                </ul>

                               <div class="view-details"><a href="laser-treatments-female.php">VIEW DETAILS</a></div>
                            </div>

                            <div class="service-right">
                                <img src="./assets/img/condition/C8.jpg" alt="Service" class="service-img">
                                <button class="add-to-cart">ADD TO CART</button>
                            </div>
                        </div>
                    </div>

                    

                </div>
            </div>
        </div>
    </div>


</main>


<?php
include("./include/footer.php")
?>