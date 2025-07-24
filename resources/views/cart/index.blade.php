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
                        <div class="step active" data-step="1">
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
                        <!-- Step 1: Date and Time -->
                        <div class="booking-step active" id="step1">
                            <h3 class="mb-4">Select Date & Time</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card mb-4">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <button class="btn btn-sm btn-outline-secondary" id="prev-month"><i
                                                    class="bi bi-chevron-left"></i></button>
                                            <h5 class="mb-0" id="current-month">Month Year</h5>
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
                                                    <!-- Calendar will be dynamically rendered -->
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
                                                <div class="text-center text-muted w-100 py-4">
                                                    Please select a date to view available times
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Step 2: Confirmation -->
                        <div class="booking-step" id="step2">
                            <h3 class="mb-4">Confirm Your Booking</h3>
                            <div class="card">
                                <div class="card-header bg-light">
                                    <h5 class="mb-0">Booking Summary</h5>
                                </div>
                                <div class="card-body">
                                    <div class="summary-item row mb-2">
                                        <div class="col-md-4 text-muted">Date & Time:</div>
                                        <div class="col-md-8" id="summary-datetime"></div>
                                    </div>
                                    <div class="summary-item row mb-2">
                                        <div class="col-md-12">
                                            <h6 class="text-muted">Cart Summary:</h6>
                                            <ul id="cart-summary-list" class="list-unstyled mb-0"></ul>
                                        </div>
                                    </div>


                                    <div class="mt-4">
                                        <h5>Your Information</h5>
                                        <form id="customer-info-form">
                                            @csrf
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <label class="form-label">Full Name</label>
                                                    <input type="text" class="form-control" id="customer-name" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Email</label>
                                                    <input type="email" class="form-control" id="customer-email"
                                                        required>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="form-label">Phone</label>
                                                    <input type="tel" class="form-control" id="customer-phone" required>
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label">Notes (Optional)</label>
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

                    <div class="booking-footer mt-3">
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

@section('script')
 <script>
$(document).ready(function() {
    // Booking state
    let bookingState = {
        currentStep: 1,
        selectedDate: null,
        selectedTime: null
    };


    const currentUser = @json(auth() -> user());
    const cartItems = @json($carts);

    // Initialize
    generateCalendar();
    updateProgressBar();

    // Step Navigation
    $("#next-step").click(function() {
        if (!validateStep(bookingState.currentStep)) return;

        if (bookingState.currentStep < 2) {
            goToStep(bookingState.currentStep + 1);
        } else {
            if ($("#customer-info-form")[0].checkValidity()) {
                submitBooking();
            } else {
                $("#customer-info-form")[0].reportValidity();
            }
        }
    });

    $("#prev-step").click(function() {
        if (bookingState.currentStep > 1) {
            goToStep(bookingState.currentStep - 1);
        }
    });

    function goToStep(step) {
        $(".booking-step").removeClass("active");
        $(`#step${step}`).addClass("active");

        $(".step").removeClass("active completed");
        for (let i = 1; i <= 2; i++) {
            if (i < step) $(`.step[data-step="${i}"]`).addClass("completed");
            else if (i === step) $(`.step[data-step="${i}"]`).addClass("active");
        }

        bookingState.currentStep = step;
        updateNavigationButtons();
        updateProgressBar();

        if (step === 2) updateSummary();
        prefillUserInfo();

        $(".booking-container")[0].scrollIntoView({
            behavior: "smooth"
        });
    }

    function prefillUserInfo() {
        if (currentUser) {
            $("#customer-name").val(currentUser.name || '');
            $("#customer-email").val(currentUser.email || '');
            $("#customer-phone").val(currentUser.phone || '');

        }
    }


    function updateProgressBar() {
        const progress = ((bookingState.currentStep - 1) / 2) * 100;
        $(".progress-bar-steps .progress").css("width", `${progress}%`);
    }

    function updateNavigationButtons() {
        $("#prev-step").prop("disabled", bookingState.currentStep === 1);
        $("#next-step").html(
            bookingState.currentStep === 2 ?
            'Confirm Booking <i class="bi bi-check-circle"></i>' :
            'Next <i class="bi bi-arrow-right"></i>'
        );
    }

    function validateStep(step) {
        if (step === 1) {
            return bookingState.selectedDate && bookingState.selectedTime;
        }
        return true;
    }

    // Calendar
    function generateCalendar() {
        const today = new Date();
        renderCalendar(today.getMonth(), today.getFullYear());
    }

    function renderCalendar(month, year) {
        const firstDay = new Date(year, month, 1);
        const lastDay = new Date(year, month + 1, 0);
        const daysInMonth = lastDay.getDate();
        const startDay = firstDay.getDay();

        const monthNames = ["January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
        ];
        $("#current-month").text(`${monthNames[month]} ${year}`);
        $("#calendar-body").empty();

        let date = 1;
        for (let i = 0; i < 6; i++) {
            const row = $("<tr></tr>");
            for (let j = 0; j < 7; j++) {
                if (i === 0 && j < startDay) {
                    row.append("<td></td>");
                } else if (date > daysInMonth) {
                    break;
                } else {
                    const cellDate = new Date(year, month, date);
                    const formatted = cellDate.toISOString().split("T")[0];
                    const isPast = cellDate < new Date(new Date().setHours(0, 0, 0, 0));
                    const cell = $(
                        `<td class="text-center calendar-day${isPast ? ' disabled' : ''}" data-date="${formatted}">${date}</td>`
                        );
                    row.append(cell);
                    date++;
                }
            }
            if (row.children().length) $("#calendar-body").append(row);
        }
    }

    $("#prev-month").click(() => navigateMonth(-1));
    $("#next-month").click(() => navigateMonth(1));

    function navigateMonth(direction) {
        const [monthName, yearStr] = $("#current-month").text().split(" ");
        const monthNames = ["January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
        ];
        let month = monthNames.indexOf(monthName);
        let year = parseInt(yearStr);

        month += direction;
        if (month < 0) {
            month = 11;
            year--;
        } else if (month > 11) {
            month = 0;
            year++;
        }

        renderCalendar(month, year);
    }

    // Date click
    $(document).on("click", ".calendar-day:not(.disabled)", function() {
        $(".calendar-day").removeClass("selected");
        $(this).addClass("selected");

        bookingState.selectedDate = $(this).data("date");
        bookingState.selectedTime = null;
        updateTimeSlots(bookingState.selectedDate);
    });

    // Time Slot click
    $(document).on("click", ".time-slot", function() {
        $(".time-slot").removeClass("selected active");
        $(this).addClass("selected active");

        bookingState.selectedTime = {
            start: $(this).data("start"),
            end: $(this).data("end"),
            display: $(this).data("time")
        };

        updateSummary();
    });

    function updateTimeSlots(selectedDate) {
        $("#time-slots-container").html(`
            <div class="text-center w-100 py-4">
                <div class="spinner-border text-primary" role="status"></div>
                <div class="mt-2">Checking availability...</div>
            </div>
        `);

        setTimeout(() => {
            const mockedResponse = {
                slot_duration: 60,
                available_slots: [{
                        start: "10:00",
                        end: "11:00",
                        display: "10:00 AM - 11:00 AM"
                    },
                    {
                        start: "11:00",
                        end: "12:00",
                        display: "11:00 AM - 12:00 PM"
                    },
                    {
                        start: "12:00",
                        end: "13:00",
                        display: "12:00 PM - 1:00 PM"
                    },
                    {
                        start: "14:00",
                        end: "15:00",
                        display: "2:00 PM - 3:00 PM"
                    },
                    {
                        start: "15:00",
                        end: "16:00",
                        display: "3:00 PM - 4:00 PM"
                    }
                ]
            };

            $("#time-slots-container").empty();

            if (mockedResponse.available_slots.length === 0) {
                $("#time-slots-container").html(
                    `<div class="alert alert-warning">No slots available.</div>`);
                return;
            }

            $("#time-slots-container").append(`
                <div class="slot-info mb-3 text-muted small">
                    <i class="bi bi-info-circle me-1"></i> Each slot: ${mockedResponse.slot_duration} mins
                </div>
            `);

            const $slotsGrid = $("<div class='slots-grid d-flex flex-wrap gap-2'></div>");
            mockedResponse.available_slots.forEach(slot => {
                const slotBtn = $(`
                    <div class="time-slot btn btn-outline-primary"
                        data-start="${slot.start}"
                        data-end="${slot.end}"
                        data-time="${slot.display}">
                        <i class="bi bi-clock me-1"></i> ${slot.display}
                    </div>
                `);
                $slotsGrid.append(slotBtn);
            });

            $("#time-slots-container").append($slotsGrid);
        }, 500);
    }

    function updateSummary() {
        if (bookingState.selectedDate && bookingState.selectedTime) {
            const formattedDate = new Date(bookingState.selectedDate).toLocaleDateString('en-US', {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });
            $("#summary-datetime").text(`${formattedDate} | ${bookingState.selectedTime.display}`);
        }

        // Generate cart summary
        const $cartList = $("#cart-summary-list");
        $cartList.empty();

        let total = 0;

        cartItems.forEach((item, index) => {
            const name = item.service?.name || 'Service';
            const qty = item.quantity || 1;
            const price = item.service?.discount_price || item.service?.price || 0;
            const subtotal = qty * price;
            total += subtotal;

            $cartList.append(`
            <li>
                <strong>${index + 1}. ${name}</strong> - 
                ${qty} session(s) × Rs.${price} = <strong>Rs.${subtotal}</strong>
            </li>
        `);
        });

        $cartList.append(`
        <li class="mt-2 border-top pt-2 text-end fw-bold text-success">
            Total: Rs.${total}
        </li>
    `);
    }


    function submitBooking() {
        const form = $('#customer-info-form');
        const csrfToken = form.find('input[name="_token"]').val();

        const bookingData = {
            name: $('#customer-name').val(),
            email: $('#customer-email').val(),
            phone: $('#customer-phone').val(),
            notes: $('#customer-notes').val(),
            booking_date: bookingState.selectedDate,
            booking_time: bookingState.selectedTime.start,
            booking_time_display: bookingState.selectedTime.display,
            _token: csrfToken
        };

        const nextBtn = $("#next-step");
        nextBtn.prop('disabled', true).html(
            '<span class="spinner-border spinner-border-sm" role="status"></span> Processing...');

        $.ajax({
            url: '/bookings',
            method: 'POST',
            data: bookingData,
            success: function(response) {
                const formattedDate = new Date(bookingState.selectedDate).toLocaleDateString(
                    'en-US', {
                        weekday: 'long',
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric'
                    });

                const bookingDetails = `
                    <div><strong>Customer:</strong> ${bookingData.name}</div>
                    <div><strong>Date & Time:</strong> ${formattedDate} | ${bookingData.booking_time_display}</div>
                    <div><strong>Reference:</strong> ${response.booking_id || 'BK-' + Math.random().toString(36).substr(2, 8).toUpperCase()}</div>
                `;

                $('#modal-booking-details').html(bookingDetails);
                new bootstrap.Modal('#bookingSuccessModal').show();
                setTimeout(resetBooking, 1000);
            },
            error: function() {
                alert('Booking failed. Please try again.');
                nextBtn.prop('disabled', false).html(
                    'Confirm Booking <i class="bi bi-check-circle"></i>');
            }
        });
    }

    function resetBooking() {
        bookingState = {
            currentStep: 1,
            selectedDate: null,
            selectedTime: null
        };
        $(".calendar-day, .time-slot").removeClass("selected active");
        $("#customer-info-form")[0].reset();
        goToStep(1);
    }
});
 </script>




@endsection