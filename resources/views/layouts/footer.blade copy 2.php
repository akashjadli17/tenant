 <footer class="footer-area">
     <div class="footer-widget">
         <div class="container pt-60 mb-3">
             <div class="row footer-widget-wrapper">
                 <div class="col-md-6 col-lg-4">
                     <div class="footer-widget-box about-us">
                         <a href="#" class="footer-logo">
                             <img src="assets/img/logo/logo.png" alt>
                         </a>
                         <p class="mb-20">
                             We are many variations of passages available but the majority have suffered alteration
                             in some form by injected humour or randomised words.
                         </p>

                     </div>
                     <ul class="footer-social">
                         <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                         <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                         <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                         <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                         <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                     </ul>

                 </div>
                 <div class="col-md-6 col-lg-2">
                     <div class="footer-widget-box list">
                         <h4 class="footer-widget-title">Quick Links</h4>
                         <ul class="footer-list">
                             <li><a href="about.php"><i class="fas fa-caret-right"></i> About Us</a></li>
                             <li><a href="men.php"><i class="fas fa-caret-right"></i> Men</a></li>
                             <li><a href="women.php"><i class="fas fa-caret-right"></i> Women</a></li>
                             <li><a href="pricing.php"><i class="fas fa-caret-right"></i> Packages</a></li>
                             <li><a href="blog.php"><i class="fas fa-caret-right"></i> Blog</a></li>
                             <li><a href="carrer.php"><i class="fas fa-caret-right"></i> Carrer</a></li>
                             <li><a href="contact.php"><i class="fas fa-caret-right"></i> Contact Us</a></li>
                         </ul>
                     </div>
                 </div>
                 <div class="col-md-6 col-lg-2">
                     <div class="footer-widget-box list">
                         <h4 class="footer-widget-title">Company</h4>
                         <ul class="footer-list">
                             <li><a href="{{ url('/privacy-policies') }}"><i class="fas fa-caret-right"></i> Privacy &
                                     Policies</a></li>
                             <li><a href="{{ url('/terms') }}"><i class="fas fa-caret-right"></i> Terms & Conditions</a>
                             </li>
                             <li><a href="{{ url('/sitemap') }}"><i class="fas fa-caret-right"></i> Sitemap</a></li>
                             <li><a href="{{ url('/help-support') }}"><i class="fas fa-caret-right"></i> Help and
                                     Support</a></li>

                         </ul>
                     </div>
                 </div>
                 <div class="col-md-6 col-lg-4">
                     <div class="footer-widget-box list">
                         <h4 class="footer-widget-title">Contact </h4>
                         <div class="footer-opening">
                             <ul class="footer-contact">
                                 <li><i class="far fa-map-marker-alt"></i>BA-146-B Janak Puri, New Delhi 110058</li>
                                 <li><a href="tel:+21236547898"><i class="far fa-phone"></i>+91 935531766</a></li>
                                 <li><a href=""><i class="far fa-envelope"></i>info@Tenant.com</a>
                                 </li>
                             </ul>
                         </div>
                     </div>
                     <div class="footer-newsletter">
                         <div class="subscribe-form">
                             <form action="#">
                                 <input type="email" class="form-control" placeholder="Your Email">
                                 <button class="theme-btn" type="submit">
                                     <span class="far fa-paper-plane"></span> Subscribe
                                 </button>
                             </form>
                         </div>
                     </div>


                 </div>
             </div>
         </div>
         <!-- <div class="footer-bottom">
             <div class="container">
                 <div class="row align-items-center">
                     
                     <div class="col-md-6">
                         <div class="footer-newsletter">
                             <div class="subscribe-form">
                                 <form action="#">
                                     <input type="email" class="form-control" placeholder="Your Email">
                                     <button class="theme-btn" type="submit">
                                         <span class="far fa-paper-plane"></span> Subscribe
                                     </button>
                                 </form>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div> -->
     </div>
     <div class="copyright">
         <div class="container">
             <div class="row">
                 <div class="col-lg-6 text-center">
                     <p class="copyright-text">
                         &copy; Copyright <span id="date"></span> <a href="#"> Tenant </a> All Rights
                         Reserved.
                     </p>
                 </div>
                 <div class="col-lg-6 text-center">
                     <p class="copyright-text">
                         Design & Develop <span id="date"></span> <a href="https://wedigitalindia.com/"> Wedigital
                             India </a>
                     </p>
                 </div>


             </div>
         </div>
     </div>
 </footer>
 <style>
.subscribe-section {
    background-color: #0f1a1f;
    /* dark background */
    padding: 30px 0;
    text-align: center;
}

.subscribe-container {
    display: inline-flex;
    border: 1px solid #2e2e2e;
    border-radius: 4px;
    overflow: hidden;
}

.subscribe-input {
    padding: 12px 16px;
    font-size: 16px;
    border: none;
    outline: none;
    background-color: #0f1a1f;
    color: #ddd;
    width: 250px;
}

.subscribe-input::placeholder {
    color: #aaa;
}

.subscribe-button {
    background-color: #a1532c;
    color: #fff;
    padding: 12px 20px;
    border: none;
    cursor: pointer;
    font-weight: bold;
    letter-spacing: 1px;
    transition: background-color 0.3s ease;
}

.subscribe-button:hover {
    background-color: #8c4523;
}
 </style>

 <a href="#" id="scroll-top"><i class="far fa-long-arrow-up"></i></a>


 <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
 <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
 <script src="{{ asset('assets/js/modernizr.min.js') }}"></script>
 <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
 <script src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}"></script>
 <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
 <script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
 <script src="{{ asset('assets/js/jquery.appear.min.js') }}"></script>
 <script src="{{ asset('assets/js/jquery.easing.min.js') }}"></script>
 <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
 <script src="{{ asset('assets/js/counter-up.js') }}"></script>
 <script src="{{ asset('assets/js/wow.min.js') }}"></script>
 <script src="{{ asset('assets/js/main.js') }}"></script>
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <script>
const scrollContainers = document.querySelectorAll("#infiniteScroll--left");

scrollContainers.forEach((container) => {
    const scrollWidth = container.scrollWidth;
    let isScrollingPaused = false;

    window.addEventListener("load", () => {
        setInterval(() => {
            if (isScrollingPaused) return;

            const first = container.querySelector("article");
            if (!isElementInViewport(first)) {
                container.appendChild(first);
                container.scrollTo(container.scrollLeft - first.offsetWidth, 0);
            }
            container.scrollTo(container.scrollLeft + 1, 0);
        }, 15);
    });

    function isElementInViewport(el) {
        const rect = el.getBoundingClientRect();
        return rect.right > 0;
    }

    function pauseScrolling() {
        isScrollingPaused = true;
    }

    function resumeScrolling() {
        isScrollingPaused = false;
    }

    const allArticles = container.querySelectorAll("article");
    for (let article of allArticles) {
        article.addEventListener("mouseenter", pauseScrolling);
        article.addEventListener("mouseleave", resumeScrolling);
    }
});
 </script>



 <!-- <script>
     $(document).ready(function() {
         $('.filter-btn').click(function() {
             // Remove active class from all
             $('.filter-btn').removeClass('active');
             // Add active class to clicked one
             $(this).addClass('active');

             var filterValue = $(this).data('filter');

             // Hide all items first
             $('.filter-item').hide();

             // Show only matching items
             $(filterValue).fadeIn(300);
         });

         // Trigger click on first filter by default (Male)
         $('.filter-btn[data-filter=".cat3"]').trigger('click');
     });
 </script> -->

 <script>
document.addEventListener('DOMContentLoaded', function() {
    const buttons = document.querySelectorAll('.add-to-cart');
    buttons.forEach(btn => {
        btn.addEventListener('click', function() {
            const serviceId = btn.getAttribute('data-id');
            fetch("{{ route('cart.add') }}", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        service_id: serviceId
                    })
                })
                .then(response => response.json())
                .then(data => {
                    alert(data.message || 'Added to cart');
                });
        });
    });
});
 </script>



 <script>
$(document).ready(function() {

    const categories = [];

    const container = $('#categories-container'); // Target the container by ID

    let html = '';
    $.each(categories, function(index, category) {
        html += `
            <div class="col">
                <div class="card border h-100 category-card text-center rounded p-2" data-category="${category.id}">
                    <div class="card-body">
                         ${category.image ? `<img class="img-fluid w-25 mb-2" src="uploads/images/category/${category.image}">` : ""}
                        <h5 class="card-title">${category.title}</h5>
                        <p class="card-text">${category.body}</p>
                    </div>
                </div>
            </div>
        `;
    });

    container.html(html); // Insert all generated HTML at once


    const employees = [];
    // console.log(employees);

    // Booking state
    let bookingState = {
        currentStep: 1,
        selectedDate: null,
        selectedTime: null
    };

    // Initialize the booking system
    updateProgressBar();
    generateCalendar();

    // Step navigation
    $("#next-step").click(function() {
        const currentStep = bookingState.currentStep;

        // Validate current step before proceeding
        if (!validateStep(currentStep)) {
            return;
        }

        if (currentStep < 5) {
            goToStep(currentStep + 1);
        } else {
            // Submit booking
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






    // Date selection
    $(document).on("click", ".calendar-day:not(.disabled)", function() {
        $(".calendar-day").removeClass("selected");
        $(this).addClass("selected");

        const date = $(this).data("date");
        bookingState.selectedDate = date;

        // Reset time selection
        bookingState.selectedTime = null;

        // Update time slots based on employee availability
        updateTimeSlots(date);
    });

    // Time slot selection
    $(document).on("click", ".time-slot:not(.disabled)", function() {
        $(".time-slot").removeClass("selected");
        $(this).addClass("selected");

       bookingState.selectedTime = {
            start: $(this).data("start"),
            end: $(this).data("end"),
            display: $(this).data("time")
        };

    });

    // Calendar navigation
    $("#prev-month").click(function() {
        navigateMonth(-1);
    });

    $("#next-month").click(function() {
        navigateMonth(1);
    });

    // Functions
    function goToStep(step) {
        // Hide all steps
        $(".booking-step").removeClass("active");

        // Show the target step
        $(`#step${step}`).addClass("active");

        // Update the step indicators
        $(".step").removeClass("active completed");

        for (let i = 1; i <= 2; i++) {
            if (i < step) {
                $(`.step[data-step="${i}"]`).addClass("completed");
            } else if (i === step) {
                $(`.step[data-step="${i}"]`).addClass("active");
            }
        }

        // Update the current step
        bookingState.currentStep = step;

        // Update the navigation buttons
        updateNavigationButtons();

        // Update the progress bar
        updateProgressBar();

        // If we're on the confirmation step, update the summary
        if (step === 2) {
            updateSummary();
        }

        // Scroll to top of booking container
        $(".booking-container")[0].scrollIntoView({
            behavior: "smooth"
        });
    }


    function updateProgressBar() {
        const progress = ((bookingState.currentStep - 1) / 2) * 100;
        $(".progress-bar-steps .progress").css("width", `${progress}%`);
    }


    function updateNavigationButtons() {
        // Enable/disable previous button
        if (bookingState.currentStep === 1) {
            $("#prev-step").prop("disabled", true);
        } else {
            $("#prev-step").prop("disabled", false);
        }

        // Update next button text
        if (bookingState.currentStep === 5) {
            $("#next-step").html('Confirm Booking <i class="bi bi-check-circle"></i>');
        } else {
            $("#next-step").html('Next <i class="bi bi-arrow-right"></i>');
        }
    }


    function validateStep(step) {

        switch (step) {

            case 1:
                if (!bookingState.selectedDate) {

                }
                if (!bookingState.selectedTime) {

                }
                return true;
            default:
                return true;
        }
    }


    function updateServicesStep(categoryId) {
        // Show loading state if needed
        $("#services-container").html(
            '<div class="text-center py-5"><div class="spinner-border text-primary" role="status"></div></div>'
        );

        // Make AJAX request to get services for this category
        $.ajax({
            url: `/categories/${categoryId}/services`,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.success && response.services) {
                    const services = response.services;

                    // Update category name display
                    $(".selected-category-name").text(
                        `Selected Category: ${services[0]?.category?.title || ''}`);

                    // Clear services container
                    $("#services-container").empty();

                    // Add services with animation delay
                    services.forEach((service, index) => {
                        // Determine the price display
                        let priceDisplay;
                        if (service.sale_price) {
                            // If sale price exists, show both with strike-through on original price
                            priceDisplay =
                                `<span class="text-decoration-line-through text-muted">${service.price}</span> <span class=" fw-bold">${service.sale_price}</span>`;
                        } else {
                            // If no sale price, just show regular price normally
                            priceDisplay =
                                `<span class="fw-bold">${service.price}</span>`;
                        }

                        const serviceCard = `
                                    <div class="col animate-slide-in" style="animation-delay: ${index * 100}ms">
                                        <div class="card border h-100 service-card text-center p-2" data-service="${service.id}">
                                            <div class="card-body">
                                                ${service.image ? `<img class="img-fluid rounded mb-2" src="uploads/images/service/${service.image}">` : ""}
                                                <h5 class="card-title mb-1">${service.title}</h5>
                                                <p class="card-text mb-1">${service.excerpt}</p>
                                                <p class="card-text">${priceDisplay}</p>
                                            </div>
                                        </div>
                                    </div>
                                `;

                        $("#services-container").append(serviceCard);
                    });
                } else {
                    $("#services-container").html(
                        '<div class="col-12 text-center py-5"><p>No services available for this category.</p></div>'
                    );
                }
            },
            error: function(xhr) {
                console.error(xhr);
                $("#services-container").html(
                    '<div class="col-12 text-center py-5"><p>Error loading services. Please try again.</p></div>'
                );
            }
        });
    }





    function generateCalendar() {
        const today = new Date();
        const currentMonth = today.getMonth();
        const currentYear = today.getFullYear();

        renderCalendar(currentMonth, currentYear);
    }

    function renderCalendar(month, year) {
        const firstDay = new Date(year, month, 1);
        const lastDay = new Date(year, month + 1, 0);
        const daysInMonth = lastDay.getDate();
        const startingDay = firstDay.getDay(); // 0 = Sunday

        // Update month display
        const monthNames = ["January", "February", "March", "April", "May", "June", "July", "August",
            "September", "October", "November", "December"
        ];
        $("#current-month").text(`${monthNames[month]} ${year}`);

        // Clear calendar
        $("#calendar-body").empty();

        // Build calendar
        let date = 1;
        for (let i = 0; i < 6; i++) {
            // Create a table row
            const row = $("<tr></tr>");

            // Create cells for each day of the week
            for (let j = 0; j < 7; j++) {
                if (i === 0 && j < startingDay) {
                    // Empty cells before the first day of the month
                    row.append("<td></td>");
                } else if (date > daysInMonth) {
                    // Break if we've reached the end of the month
                    break;
                } else {
                    // Create a cell for this date
                    const today = new Date();
                    const cellDate = new Date(year, month, date);
                    const formattedDate =
                        `${year}-${(month + 1).toString().padStart(2, '0')}-${date.toString().padStart(2, '0')}`;

                    // Check if this date is in the past
                    const isPast = cellDate < new Date(today.setHours(0, 0, 0, 0));

                    // Create the cell with appropriate classes
                    const cell = $(
                        `<td class="text-center calendar-day${isPast ? ' disabled' : ''}" data-date="${formattedDate}">${date}</td>`
                    );

                    row.append(cell);
                    date++;
                }
            }

            // Add the row to the calendar if it has cells
            if (row.children().length > 0) {
                $("#calendar-body").append(row);
            }
        }
    }

    function navigateMonth(direction) {
        const currentMonthText = $("#current-month").text();
        const [monthName, year] = currentMonthText.split(" ");

        const monthNames = ["January", "February", "March", "April", "May", "June", "July", "August",
            "September", "October", "November", "December"
        ];
        let month = monthNames.indexOf(monthName);
        let yearNum = parseInt(year);

        month += direction;

        if (month < 0) {
            month = 11;
            yearNum--;
        } else if (month > 11) {
            month = 0;
            yearNum++;
        }

        renderCalendar(month, yearNum);
    }



    function updateCalendar() {
        // Update employee name display
        const employee = bookingState.selectedEmployee;
        $(".selected-employee-name").text(`Selected Staff: ${employee.user.name}`);

        // Clear previous selections
        bookingState.selectedDate = null;
        bookingState.selectedTime = null;
        $(".calendar-day").removeClass("selected");
        $(".time-slot").removeClass("selected");

        // Show initial state instead of loading spinner
        $("#time-slots-container").html(`
                    <div class="text-center w-100 py-4">
                        <div class="alert alert-info">
                            <i class="bi bi-calendar-event me-2"></i>
                            Please select a date to view available time slots
                        </div>
                    </div>
                `);
    }

    function updateTimeSlots(selectedDate) {
        if (!selectedDate) {
            $("#time-slots-container").html(`
            <div class="text-center w-100 py-4">
                <div class="alert alert-warning">
                    <i class="bi bi-exclamation-triangle me-2"></i>
                    No date selected
                </div>
            </div>
        `);
            return;
        }

        // Show loading state (mimicking server)
        $("#time-slots-container").html(`
        <div class="text-center w-100 py-4">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            <div class="mt-2">Checking availability...</div>
        </div>
    `);

        setTimeout(() => {
            // 👉 Mocked slots with 1-hour ranges
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
                        end: "01:00",
                        display: "12:00 PM - 1:00 PM"
                    },
                    {
                        start: "02:00",
                        end: "03:00",
                        display: "2:00 PM - 3:00 PM"
                    },
                    {
                        start: "03:00",
                        end: "04:00",
                        display: "3:00 PM - 4:00 PM"
                    }
                ]
            };

            $("#time-slots-container").empty();

            if (mockedResponse.available_slots.length === 0) {
                $("#time-slots-container").html(`
                <div class="text-center py-4">
                    <div class="alert alert-warning">
                        <i class="bi bi-clock-history me-2"></i>
                        No available slots for this date
                    </div>
                </div>
            `);
                return;
            }

            $("#time-slots-container").append(`
            <div class="slot-info mb-3">
                <small class="text-muted">
                    <i class="bi bi-info-circle me-1"></i>
                    Each slot: ${mockedResponse.slot_duration} mins
                </small>
            </div>
        `);

            const $slotsContainer = $("<div class='slots-grid d-flex flex-wrap gap-2'></div>");
            mockedResponse.available_slots.forEach(slot => {
                const slotElement = $(`
                <div class="time-slot btn btn-outline-primary"
                    data-start="${slot.start}"
                    data-end="${slot.end}"
                    data-time="${slot.display}"
                    title="Select ${slot.display}">
                    <i class="bi bi-clock me-1"></i> ${slot.display}
                </div>
            `);

                slotElement.on('click', function() {
                    $(".time-slot").removeClass("selected active");
                    $(this).addClass("selected active");
                    bookingState.selectedTime = {
                        start: $(this).data("start"),
                        end: $(this).data("end"),
                        display: $(this).data("time")
                    };
                    updateBookingSummary();
                });

                $slotsContainer.append(slotElement);
            });

            $("#time-slots-container").append($slotsContainer);

        }, 500); // Simulated delay
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
    } else {
        $("#summary-datetime").text("Date or time not selected.");
    }
}





    // function submitBooking() {

    function submitBooking() {
        // Get form data
        const form = $('#customer-info-form');
        const csrfToken = form.find('input[name="_token"]').val(); // Get CSRF token from form

        // Prepare booking data
        const bookingData = {
            name: $('#customer-name').val(),
            email: $('#customer-email').val(),
            phone: $('#customer-phone').val(),
            notes: $('#customer-notes').val(),
            booking_date: bookingState.selectedDate,
            booking_time: bookingState.selectedTime.start,
            booking_time_display: bookingState.selectedTime.display, // OPTIONAL for backend readability
            _token: csrfToken
        };


        // Add user_id if authenticated (using JavaScript approach)
        if (typeof currentAuthUser !== 'undefined' && currentAuthUser) {
            bookingData.user_id = currentAuthUser.id;
        }

        // Show loading state
        const nextBtn = $("#next-step");
        nextBtn.prop('disabled', true).html(
            '<span class="spinner-border spinner-border-sm" role="status"></span> Processing...'
        );

        // Submit via AJAX
        $.ajax({
            url: '/bookings',
            method: 'POST',
            data: bookingData,
            success: function(response) {
                // Update modal with booking details
                const formattedDate = new Date(bookingState.selectedDate).toLocaleDateString(
                    'en-US', {
                        weekday: 'long',
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric'
                    });

               const bookingDetails = `
                    <div class="mb-2"><strong>Customer:</strong> ${$("#customer-name").val()}</div>
                    <div class="mb-2"><strong>Date & Time:</strong> ${formattedDate} | ${bookingState.selectedTime.display}</div>
                    <div><strong>Reference:</strong> ${response.booking_id || 'BK-' + Math.random().toString(36).substr(2, 8).toUpperCase()}</div>
                `;


                $('#modal-booking-details').html(bookingDetails);

                // Show success modal
                const successModal = new bootstrap.Modal('#bookingSuccessModal');
                successModal.show();

                // Reset form after delay
                setTimeout(resetBooking, 1000);
            },
            error: function(xhr) {
                let errorMessage = 'Booking failed. Please try again.';

                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                } else if (xhr.status === 422) {
                    errorMessage = 'Validation error: Please check your information.';
                }

                alert(errorMessage);
                nextBtn.prop('disabled', false).html(
                    'Confirm Booking <i class="bi bi-check-circle"></i>');
            },
            complete: function() {
                // Re-enable button if request fails
                if (nextBtn.prop('disabled')) {
                    setTimeout(() => {
                        nextBtn.prop('disabled', false).html(
                            'Confirm Booking <i class="bi bi-check-circle"></i>');
                    }, 2000);
                }
            }
        });
    }

    function resetBooking() {
        // Reset booking state
        bookingState = {
            currentStep: 1,
            selectedCategory: null,
            selectedService: null,
            selectedEmployee: null,
            selectedDate: null,
            selectedTime: null
        };

        // Reset UI
        $(".category-card, .service-card, .employee-card, .calendar-day, .time-slot").removeClass(
            "selected");
        $("#customer-info-form")[0].reset();

        // Go to first step
        goToStep(1);
    }
});
 </script>

 </body>


 </html>