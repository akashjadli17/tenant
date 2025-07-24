@extends('layouts.master')

@section('content')
<main class="main">

    <div class="site-breadcrumb" style="background: url(assets/img/breadcrumb/01.jpg)">
        <div class="container">
            <h2 class="breadcrumb-title">Help & Support</h2>
            <ul class="breadcrumb-menu">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class="active">Help & Support</li>
            </ul>
        </div>
    </div>

    <div class="container py-5">
        <h3 class="mb-4">Help & Support</h3>

        {{-- Contact Info --}}
        <div class="border p-4 rounded mb-4">
            <h5><i class="fas fa-map-marker-alt me-2"></i>Contact Information</h5>
            <p class="mb-0">Tenant Clinic, 59A, Block A 5B, Possangipur, Janakpuri, New Delhi, Delhi 110058, India</p>
        </div>

        {{-- Customer Support --}}
        <div class="border p-4 rounded mb-4">
            <h5><i class="fas fa-headset me-2"></i>Customer Support</h5>
            <ul class="list-unstyled mb-0">
                <li><i class="fas fa-phone-alt me-2"></i>+91-935531766</li>
                <li><i class="fas fa-envelope me-2"></i>info@Tenant.com</li>
            </ul>
        </div>

        {{-- FAQs --}}
        <div class="faq-section">
            <h4 class="mb-4">Frequently Asked Questions</h4>

            <div class="accordion" id="faqAccordion">
                <div class="accordion-item mb-3 border rounded">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1" aria-expanded="true">
                            Are Tenant treatments safe?
                        </button>
                    </h2>
                    <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Yes, all treatments are clinically approved, performed by certified professionals, and supervised by dermatologists. We prioritize safety, hygiene, and efficacy.
                        </div>
                    </div>
                </div>

                <div class="accordion-item mb-3 border rounded">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                            How do I book a treatment at home?
                        </button>
                    </h2>
                    <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            You can book an appointment directly through our website or contact our customer support. We will schedule a visit based on your availability and location.
                        </div>
                    </div>
                </div>

                <div class="accordion-item mb-3 border rounded">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                            What skincare should I follow after treatment?
                        </button>
                    </h2>
                    <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            After your treatment, our professionals will guide you with a custom aftercare plan including recommended cleansers, moisturizers, and sunscreens.
                        </div>
                    </div>
                </div>

                <div class="accordion-item mb-3 border rounded">
                    <h2 class="accordion-header" id="headingFour">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                            Do I need to prepare before my appointment?
                        </button>
                    </h2>
                    <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Yes, depending on the treatment. Basic hygiene, no makeup, and avoiding direct sun exposure 24 hours before are common recommendations.
                        </div>
                    </div>
                </div>

                <div class="accordion-item mb-3 border rounded">
                    <h2 class="accordion-header" id="headingFive">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                            What if I want to cancel or reschedule my appointment?
                        </button>
                    </h2>
                    <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            We allow rescheduling or cancellations up to 24 hours before your scheduled appointment. Cancellations after that may incur a fee.
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</main>
@endsection
