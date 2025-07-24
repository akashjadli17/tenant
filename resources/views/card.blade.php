@extends('layouts.master')

@section('title', 'Myraluxa Aesthetic Pvt Ltd')

@section('content')
<style>
.error-msg {
    color: red;
    margin-bottom: 15px;
    font-size: 14px;
}

/* .container {
        display: flex;
        flex-wrap: wrap;
        gap: 30px;
    }

    .row {
        display: flex;
        flex-wrap: wrap;
        width: 100%;
        gap: 30px;
    } */

.col-lg-6 {
    flex: 1;
    min-width: 300px;
}

h2 {
    margin-bottom: 15px;
}

h2.pro {
    font-size: 25px;
}

.product-card {
    background: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
    position: relative;
}

.product-title {
    font-size: 20px;
    font-weight: 600;
    line-height: 1.4;
}

.gender-badge {
    background: #d0d8ff;
    color: #222;
    padding: 2px 10px;
    font-size: 12px;
    border-radius: 12px;
    margin-left: 8px;
}

.session-count {
    color: #555;
    font-size: 14px;
    margin-top: 10px;
}

.price-area {
    margin-top: 10px;
    font-size: 18px;
    font-weight: 500;
}

.original-price {
    text-decoration: line-through;
    color: #888;
    margin-right: 10px;
}

.final-price {
    color: #000;
}

.delete-icon {
    position: absolute;
    top: 85px;
    right: 10px;
    cursor: pointer;
    font-size: 25px;
    color: #555;
}

.summary-card {
    background: #f2f2f2;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.summary-card p {
    margin: 5px 0;
    display: flex;
    justify-content: space-between;
}

.summary-card h3 {
    margin-top: 15px;
    display: flex;
    justify-content: space-between;
    font-size: 20px;
}

.total-payable {
    color: #c00;
    font-weight: 700;
}

.user-id {
    text-align: right;
    margin-bottom: 10px;
    font-size: 14px;
}

.coupon-box {
    background: #f2f2f2;
    padding: 12px 18px;
    border-radius: 12px;
    margin-top: 20px;
    font-size: 14px;
    cursor: pointer;
}

.schedule-btn {
    display: block;
    width: 40%;
    background: #d77474;
    color: white;
    padding: 14px;
    border: none;
    border-radius: 12px;
    font-size: 16px;
    font-weight: 600;
    margin-top: 40px;
    cursor: pointer;
    transition: background 0.3s ease;
}

.schedule-btn:hover {
    background: #c25c5c;
}

@media (max-width: 768px) {
    .row {
        flex-direction: column;
    }

    .user-id {
        text-align: left;
        margin-top: 10px;
    }

    h2.pro {
        font-size: 20px;
    }

    .product-title {
        font-size: 16px;
        font-weight: 600;
        line-height: 1.4;
    }

    .schedule-btn {
        display: block;
        width: 65%;
        background: #d77474;
        color: white;
        padding: 14px;
        border: none;
        border-radius: 12px;
        font-size: 14px;
        font-weight: 600;
        margin-top: 40px;
        cursor: pointer;
        transition: background 0.3s ease;
    }
}
</style>


<main class="main">

    <div class="site-breadcrumb" style="background: url(assets/img/breadcrumb/01.jpg)">
        <div class="container">
            <h2 class="breadcrumb-title">Cart</h2>
            <ul class="breadcrumb-menu">
                <li><a href="{{route('index')}}">Home</a></li>
                <li class="active">Cart</li>
            </ul>
        </div>
    </div>

    <section class="py-4">


        <div class="container">
            <div class="row">
                <div class="error-msg">*Please select an item</div>
                <!-- Left Section -->
                <div class="col-lg-6">
                    <h2 class="pro">PRODUCTS/PACKAGES</h2>

                    <div class="product-card">
                        <div class="product-title">
                            1. Male Private Area Laser Hair Reduction -
                            <span class="gender-badge">Male</span>
                        </div>
                        <div class="session-count">Number of Session : 1</div>
                        <div class="price-area">
                            <span class="original-price">Rs. 4,800</span>
                            <span class="final-price">Rs. 4,320</span>
                        </div>
                        <div class="delete-icon">&#128465;</div>
                    </div>
                </div>

                <!-- Right Section -->
                <div class="col-lg-6">
                    <div class="user-id">User ID: <strong>42208</strong></div>

                    <h2 class="pro">PAYMENT SUMMARY</h2>
                    <div class="summary-card">
                        <p><span>Items Total</span> <span>Rs. 4,320</span></p>
                        <p><span>Taxes @ 9% SGST</span> <span>All inclusive</span></p>
                        <p><span>Taxes @ 9% CGST</span> <span>All inclusive</span></p>
                        <hr style="margin: 10px 0;">
                        <h3><span>Total Payable</span> <span class="total-payable">Rs. 4,320</span></h3>
                    </div>

                    <h2 class="pro" style="margin-top: 30px;">COUPONS</h2>
                    <div class="coupon-box" data-bs-toggle="modal" data-bs-target="#exampleModal">View available coupons
                        (0)</div>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-12 d-flex justify-content-center">
                    <button class="schedule-btn">SCHEDULE SESSION(S)</button>
                </div>
            </div>
        </div>

        <!-- coupon -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Coupons For You</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">

                                <input type="email" class="form-control" id="exampleInputEmail1"
                                    placeholder="Enter Coupon Code">

                            </div>

                            <button type="submit" class="btn btn-primary" style="background:rgb(255, 0, 0);border: 1px solid red;
                            ">Apply</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <!-- end -->

    </section>




</main>



@endsection