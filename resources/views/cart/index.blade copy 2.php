@extends('layouts.master')
@section('title', 'Cart')

@section('content')

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

    @include('cart.style')

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

    </section>


    <!-- Schedule Modal Styled -->
    <div class="modal fade" id="scheduleModal" tabindex="-1" aria-labelledby="scheduleModalLabel" aria-hidden="true">
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
                    <div class="booking-steps position-relative">
                        
                        <div class="step" data-step="1">
                            <div class="step-number">1</div>
                            <div class="step-title">Date & Time</div>
                        </div>
                        <div class="step" data-step="2">
                            <div class="step-number">2</div>
                            <div class="step-title">Confirm</div>
                        </div>
                        <div class="progress-bar-steps">
                            <div class="progress"></div>
                        </div>
                    </div>

                    <div class="booking-content">
                        <!-- Step 1: Category Selection -->
                        <div class="booking-step active" id="step1">
                            <h3 class="mb-4">Select a Category</h3>
                            <div class="row row-cols-1 row-cols-md-3 g-4" id="categories-container">
                                <!-- Categories will be inserted here by jQuery -->
                            </div>
                        </div>

                        <!-- Step 2: Service Selection -->
                        <div class="booking-step" id="step2">
                            <h3 class="mb-4">Select a Service</h3>
                            <div class="selected-category-name mb-3 fw-bold"></div>
                            <div class="row row-cols-1 row-cols-md-3 g-4" id="services-container">
                                <!-- Services will be loaded dynamically based on category -->
                            </div>
                        </div>

                        <!-- Step 3: Employee Selection -->
                        <div class="booking-step" id="step3">
                            <h3 class="mb-4">Select a Staff Member</h3>
                            <div class="selected-service-name mb-3 fw-bold"></div>
                            <div class="row row-cols-1 row-cols-md-3 g-4" id="employees-container">
                                <!-- Employees will be loaded dynamically based on service -->
                            </div>
                        </div>

                        <!-- Step 4: Date and Time Selection -->
                        <div class="booking-step" id="step4">
                            <h3 class="mb-4">Select Date & Time</h3>
                            <div class="selected-employee-name mb-3 fw-bold"></div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card mb-4">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <button class="btn btn-sm btn-outline-secondary" id="prev-month"><i
                                                    class="bi bi-chevron-left"></i></button>
                                            <h5 class="mb-0" id="current-month">March 2023</h5>
                                            <button class="btn btn-sm btn-outline-secondary" id="next-month"><i
                                                    class="bi bi-chevron-right"></i></button>
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-calendar">
                                                <thead>
                                                    <tr>
                                                        <th>Sun</th>
                                                        <th>Mon</th>
                                                        <th>Tue</th>
                                                        <th>Wed</th>
                                                        <th>Thu</th>
                                                        <th>Fri</th>
                                                        <th>Sat</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="calendar-body">
                                                    <!-- Calendar will be generated dynamically -->
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0">Available Time Slots</h5>
                                            <div id="selected-date-display" class="text-muted small"></div>
                                        </div>
                                        <div class="card-body">
                                            <div id="time-slots-container" class="d-flex flex-wrap">
                                                <!-- Time slots will be loaded dynamically -->
                                                <div class="text-center text-muted w-100 py-4">
                                                    Please select a date to view available times
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Step 5: Confirmation -->
                        <div class="booking-step" id="step5">
                            <h3 class="mb-4">Confirm Your Booking</h3>
                            <div class="card">
                                <div class="card-header bg-light">
                                    <h5 class="mb-0">Booking Summary</h5>
                                </div>
                                <div class="card-body">
                                    
                                    <div class="summary-item">
                                        <div class="row">
                                            <div class="col-md-4 text-muted">Date & Time:</div>
                                            <div class="col-md-8" id="summary-datetime"></div>
                                        </div>
                                    </div>
                                    <div class="summary-item">
                                        <div class="row">
                                            <div class="col-md-4 text-muted">Duration:</div>
                                            <div class="col-md-8" id="summary-duration"></div>
                                        </div>
                                    </div>
                                    <div class="summary-item">
                                        <div class="row">
                                            <div class="col-md-4 text-muted">Price:</div>
                                            <div class="col-md-8" id="summary-price"></div>
                                        </div>
                                    </div>

                                    <div class="mt-4">
                                        <h5>Your Information</h5>
                                        <form id="customer-info-form">
                                            @csrf
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <label for="customer-name" class="form-label">Full Name</label>
                                                    <input type="text" class="form-control" id="customer-name" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="customer-email" class="form-label">Email</label>
                                                    <input type="email" class="form-control" id="customer-email"
                                                        required>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="customer-phone" class="form-label">Phone</label>
                                                    <input type="tel" class="form-control" id="customer-phone" required>
                                                </div>
                                                <div class="col-12">
                                                    <label for="customer-notes" class="form-label">Notes
                                                        (Optional)</label>
                                                    <textarea class="form-control" id="customer-notes"
                                                        rows="3"></textarea>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="booking-footer">
                        <button class="btn btn-outline-secondary" id="prev-step" disabled>
                            <i class="bi bi-arrow-left"></i> Previous
                        </button>
                        <button class="btn btn-primary" id="next-step">
                            Next <i class="bi bi-arrow-right"></i>
                        </button>
                    </div>
                </div>

                <div class="modal-footer bg-light">
                    <button type="submit" class="btn btn-success">Confirm Booking</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>

            </form>
        </div>
    </div>


</main>








@endsection