@extends('layouts.master')
@section('title', 'Cart')

@section('content')
  <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.css" rel="stylesheet">
<!-- ✅ Use the global version -->
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js" defer></script>


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

    .fc .fc-scroller{
        overflow: hidden scroll !important;
    }
    .fc-daygrid-body.fc-daygrid-body-unbalanced{
        width:340px !important;
    }

    table.fc-scrollgrid-sync-table{
        width: 339px !important;
         height: 306px !important;
    }
</style>


<main class="main">

    <div class="site-breadcrumb" style="background: url(assets/img/breadcrumb/01.jpg)">
        <div class="container">
            <h2 class="breadcrumb-title">Cart</h2>
            <ul class="breadcrumb-menu">
                <li><a href="{{ route('index') }}">Home</a></li>
                <li class="active">Cart</li>
            </ul>
        </div>
    </div>

    <section class="py-4">
        <div class="container">
            <div class="row">
                <div class="error-msg text-danger mb-3" style="display: none;">*Please select an item</div>

                <!-- Left Section -->
                <div class="col-lg-6">
                    <h2 class="pro">PRODUCTS / PACKAGES</h2>

                    @forelse ($carts as $cart)
                    <div class="product-card border rounded p-3 mb-3 position-relative">
                        <div class="product-title fw-bold">
                            {{ $loop->iteration }}. {{ $cart->service->name }} -
                            <span
                                class="gender-badge badge bg-primary">{{ $cart->service->gender->name ?? 'Unisex' }}</span>
                        </div>
                        <div class="session-count">Number of Sessions: {{ $cart->quantity }}</div>

                        <div class="price-area mt-2">
                            @if ($cart->service->discount_price && $cart->service->discount_price < $cart->
                                service->price)
                                <span class="original-price text-muted text-decoration-line-through">Rs.
                                    {{ number_format($cart->service->price) }}</span>
                                <span class="final-price fw-bold ms-2 text-success">Rs.
                                    {{ number_format($cart->service->discount_price * $cart->quantity) }}</span>
                                @else
                                <span class="final-price fw-bold text-success">Rs.
                                    {{ number_format($cart->service->price * $cart->quantity) }}</span>
                                @endif
                        </div>

                        <form method="POST" action="{{ route('cart.remove', $cart->id) }}"
                            class="position-absolute top-0 end-0 m-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="delete-icon btn btn-sm btn-outline-danger border-0">&#128465;</button>
                        </form>
                    </div>
                    @empty
                    <p class="text-muted">No items in your cart.</p>
                    @endforelse
                </div>

                <!-- Right Section -->
                <div class="col-lg-6">
                    @auth
                    <div class="user-id">User ID: <strong>{{ auth()->id() }}</strong></div>
                    @endauth

                    <h2 class="pro mt-4 mt-lg-0">PAYMENT SUMMARY</h2>
                    <div class="summary-card border rounded p-3">
                        @php
                        $subtotal = $carts->sum(function($c) {
                        $price = $c->service->discount_price ?? $c->service->price;
                        return $price * $c->quantity;
                        });
                        @endphp
                        <p><span>Items Total</span> <span>Rs. {{ number_format($subtotal) }}</span></p>
                        <p><span>Taxes @ 9% SGST</span> <span>All inclusive</span></p>
                        <p><span>Taxes @ 9% CGST</span> <span>All inclusive</span></p>
                        <hr style="margin: 10px 0;">
                        <h3><span>Total Payable</span> <span class="total-payable text-success">Rs.
                                {{ number_format($subtotal) }}</span></h3>
                    </div>

                    <h2 class="pro mt-4">COUPONS</h2>
                    <div class="coupon-box bg-light border p-3 rounded text-center cursor-pointer"
                        data-bs-toggle="modal" data-bs-target="#exampleModal">
                        View available coupons (0)
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-lg-12 d-flex justify-content-center">
                    <button class="schedule-btn btn btn-danger px-5 py-2" data-bs-toggle="modal"
                        data-bs-target="#scheduleModal">
                        SCHEDULE SESSION(S)
                    </button>

                </div>
            </div>
        </div>


        <!-- Schedule Modal Styled -->
        <div class="modal fade" id="scheduleModal" tabindex="-1" aria-labelledby="scheduleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <form method="POST" action="{{ route('booking.confirm') }}" class="modal-content border-0">
                    @csrf

                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="scheduleModalLabel">
                            <i class="fas fa-calendar-check me-2"></i> Appointment Booking
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body p-4">

                        <!-- Stepper -->
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            @php $currentStep = 4; @endphp
                            @for ($i = 1; $i <= 5; $i++) <div
                                class="text-center flex-fill {{ $i <= $currentStep ? 'text-primary' : 'text-muted' }}">
                                <div class="rounded-circle border {{ $i <= $currentStep ? 'bg-primary text-white' : 'bg-light' }} mb-2 mx-auto"
                                    style="width: 36px; height: 36px; line-height: 36px;">
                                    {{ $i }}
                                </div>
                                <small>
                                    @switch($i)
                                    @case(1) Category @break
                                    @case(2) Service @break
                                    @case(3) Staff @break
                                    @case(4) <strong>Date & Time</strong> @break
                                    @case(5) Confirm @break
                                    @endswitch
                                </small>
                        </div>
                        @endfor
                    </div>

<!-- Step 4: Select Date & Time -->
<h5 class="mb-3">Step 4: Select Date & Time</h5>
<div class="row">
    <!-- Calendar -->
    <div class="col-md-6 mb-3">
        <label class="form-label fw-semibold">Choose Date</label>
        <div id="calendar"></div>
        <input type="hidden" name="booking_date" id="booking_date" required>
    </div>

    <!-- Time Slots -->
    <div class="col-md-6 mb-3">
        <label class="form-label fw-semibold">Available Time Slots</label>
        <div class="d-grid gap-2" id="time-slots">
            @foreach ([
                '10:30 AM - 11:00 AM', '11:00 AM - 11:30 AM', '12:00 PM - 12:30 PM',
                '1:00 PM - 1:30 PM', '2:00 PM - 2:30 PM', '3:00 PM - 3:30 PM'
            ] as $slot)
                <button type="button" class="btn btn-outline-primary slot-btn" data-value="{{ $slot }}">
                    {{ $slot }}
                </button>
            @endforeach
        </div>
        <input type="hidden" name="booking_time" id="selected_slot" required>
    </div>
</div>

                    <hr>

                    <!-- Step 5 -->
                    <h5 class="mb-3">Step 5: Confirm Booking</h5>
                    <div class="bg-light p-3 rounded border">
                        @foreach ($carts as $cart)
                        <p class="mb-2">
                            <strong>{{ $loop->iteration }}.</strong>
                            {{ $cart->service->name }} ({{ $cart->quantity }}
                            session{{ $cart->quantity > 1 ? 's' : '' }})
                            - Rs.
                            {{ number_format(($cart->service->discount_price ?? $cart->service->price) * $cart->quantity) }}
                        </p>
                        @endforeach

                        <p class="mt-3">
                            <strong>Total Payable:</strong>
                            Rs. {{ number_format($subtotal) }}
                        </p>
                    </div>

                    <input type="hidden" name="total_price" value="{{ $subtotal }}">

            </div>

            <div class="modal-footer bg-light">
                <button type="submit" class="btn btn-success">Confirm Booking</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
            </form>
        </div>
        </div>




    </section>
</main>

 




<style>
.fc-daygrid-day.selected-date {
    background-color: #0d6efd !important;
    color: white !important;
    border-radius: 6px;
}

.slot-btn.active {
    background-color: #0d6efd !important;
    color: white !important;
    border-color: #0d6efd !important;
}
</style>

@endsection
 