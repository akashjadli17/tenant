@extends('layouts.master')

@section('title', 'Myraluxa Aesthetic Pvt Ltd')

@section('content')

<style>
/* Tabs Styling */
/* Nav tab style */
.nav-tabs {
    border-bottom: 1px solid #ccc;
}

.nav-tabs .nav-link {
    color: #888;
    font-weight: 500;
    padding: 14px 20px;
    border: none;
    border-bottom: 2px solid transparent;
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

/* Tab content style */
.tab-content {
    padding-top: 40px;
}

.tab-pane img {
    width: 120px;
    margin-bottom: 20px;
}

.tab-pane h5 {
    font-weight: 600;
    margin-bottom: 10px;
}

.tab-pane p {
    font-size: 15px;
    margin-bottom: 20px;
}

.tab-pane .btn {
    font-size: 14px;
    font-weight: 500;
    padding: 10px 25px;
    border-radius: 25px;
}

/* Responsive center alignment */
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
}
</style>


<main class="main">

    <div class="site-breadcrumb" style="background: url(assets/img/breadcrumb/01.jpg)">
        <div class="container">
            <h2 class="breadcrumb-title">Booking</h2>
            <ul class="breadcrumb-menu">
                <li><a href="{{route('index')}}">Home</a></li>
                <li class="active">Booking</li>
            </ul>
        </div>
    </div>

    <section class="py-4">


        <div class="container my-5">
            <!-- Nav Tabs -->
            <ul class="nav nav-tabs justify-content-center" id="bookingTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="services-tab" data-bs-toggle="tab" data-bs-target="#services"
                        type="button" role="tab">SERVICES BOOKING</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="packages-tab" data-bs-toggle="tab" data-bs-target="#packages"
                        type="button" role="tab">PACKAGES BOOKING</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="skincare-tab" data-bs-toggle="tab" data-bs-target="#skincare"
                        type="button" role="tab">SKINCARE PRODUCT</button>
                </li>
            </ul>

            <!-- Tab Content -->
            <div class="tab-content py-5" id="bookingTabsContent">
                <!-- Services Tab -->
                <div class="tab-pane fade show active text-center" id="services" role="tabpanel">
                    <img src="./assets/img/icon/open-box.png" alt="Box" width="120" class="mb-4">
                    <h5>No Bookings Available!</h5>
                    <p>Check out treatments that best suit your skin needs.</p>
                    <button class="btn btn-outline-dark rounded-pill px-4">EXPLORE PRODUCTS</button>
                </div>

                <!-- Packages Tab -->
                <div class="tab-pane fade text-center" id="packages" role="tabpanel">
                    <img src="./assets/img/icon/open-box.png" alt="Box" width="120" class="mb-4">
                    <h5>No Packages Booked!</h5>
                    <p>Try our packages for long-term skincare solutions.</p>
                    <button class="btn btn-outline-dark rounded-pill px-4">VIEW PACKAGES</button>
                </div>

                <!-- Skincare Tab -->
                <div class="tab-pane fade text-center" id="skincare" role="tabpanel">
                    <img src="./assets/img/icon/open-box.png" alt="Box" width="120" class="mb-4">
                    <h5>No Skincare Products Purchased!</h5>
                    <p>Browse our range of dermatologist-approved skincare items.</p>
                    <button class="btn btn-outline-dark rounded-pill px-4">SHOP NOW</button>
                </div>
            </div>
        </div>



    </section>




</main>


@endsection