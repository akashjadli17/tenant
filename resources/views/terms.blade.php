@extends('layouts.master')

@section('content')
    <main class="main">

        <div class="site-breadcrumb" style="background: url(assets/img/breadcrumb/01.jpg)">
            <div class="container">
                <h2 class="breadcrumb-title">Terms & Conditions</h2>
                <ul class="breadcrumb-menu">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active">Terms & Conditions</li>
                </ul>
            </div>
        </div>

        <div class="department-single-area py-5">
            <div class="container">
                <div class="department-single-wrapper">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12">
                            <div class="department-details">

                                <h4 class="mb-4">Introduction</h4>
                                <p>Welcome to Tenant Aesthetic Private Ltd. (“Company”, “we”, “our”, or “us”). These Terms
                                    and Conditions govern your use of our website located at <a
                                        href="#">www.Tenant.com</a> (the “Site”) and the services
                                    we provide through it, including all digital content, online consultations, at-home
                                    treatments, and aesthetic appointments.</p>

                                <p>By accessing or using this Site, you agree to be legally bound by the following Terms,
                                    which are intended to protect both you—the client—and us, the service provider. These
                                    Terms apply to all visitors, users, and others who access the website or use any of our
                                    offerings. Please read them carefully before proceeding with any interaction,
                                    registration, or transaction on the Site.</p>

                                <p>Tenant is committed to offering a seamless, secure, and high-quality experience for
                                    individuals seeking advanced skincare, cosmetic procedures, and beauty wellness. To
                                    ensure smooth operation and a safe environment for everyone, it is important that all
                                    visitors understand their rights, obligations, and limitations while using our platform.
                                </p>

                                <p>Throughout this document, references to "you" or "your" refer to any person accessing or
                                    using our website or services. These Terms constitute a legally binding agreement
                                    between you and Tenant. If you do not agree with any portion of these Terms, you
                                    should discontinue your use of the Site immediately.</p>

                                <p>We reserve the right to modify or update these Terms at any time, and such changes will
                                    become effective upon being posted here. Continued use of the Site following any such
                                    changes signifies your acceptance of the revised Terms.</p>

                                <h4 class="my-2">Acceptance of Terms</h4>
                                <p>By accessing or using the Site, you agree to comply with and be bound by these Terms. If
                                    you disagree with any part of the Terms, you must refrain from accessing the Site or
                                    using any of its services.</p>

                                <h4 class="my-2">Eligibility</h4>
                                <p>You must be at least 18 years old or have parental/legal guardian consent to use our
                                    services. By using the Site, you represent and warrant that you meet these requirements.
                                </p>

                                <h4 class="my-2">Use of Services</h4>
                                <ul>
                                    <li>You agree to use our services only for lawful and authorized purposes.</li>
                                    <li>You must not engage in any activity that could harm or impair the operation of the
                                        Site.</li>
                                    <li>Unauthorized use, scraping, or duplication of our content is strictly prohibited.
                                    </li>
                                </ul>

                                <h4 class="my-2">User Accounts</h4>
                                <p>Users may be required to create an account. You are responsible for keeping your login
                                    credentials secure. We are not liable for any loss or damage arising from unauthorized
                                    use of your account.</p>

                                <h4 class="my-2">Appointments & Payments</h4>
                                <ul>
                                    <li>Appointments are subject to availability and are confirmed only after full/partial
                                        payment.</li>
                                    <li>All payments must be made using authorized channels listed on the Site.</li>
                                    <li>We reserve the right to cancel appointments in case of incomplete payment or
                                        fraudulent activity.</li>
                                </ul>

                                <h4 class="my-2">Cancellations & Refunds</h4>
                                <p>We require a minimum of 24-hour notice for any cancellations or rescheduling. Refunds are
                                    not offered for completed procedures or no-shows, except in specific documented cases,
                                    as per our Refund Policy.</p>

                                <h4 class="my-2">Limitation of Liability</h4>
                                <p>We strive to provide accurate and timely service, but make no warranties regarding the
                                    effectiveness of treatments or uninterrupted site functionality. In no event shall
                                    Tenant be liable for indirect, incidental, or special damages, including loss of data
                                    or revenue.</p>

                                <h4 class="my-2">Intellectual Property</h4>
                                <p>All content on this Site, including images, videos, trademarks, and copy, are the
                                    property of Tenant Aesthetic Pvt. Ltd. or its licensors. Unauthorized reproduction is
                                    strictly prohibited.</p>

                                <h4 class="my-2">Service Availability</h4>
                                <p>We aim to ensure uninterrupted access to our website and services, but cannot guarantee
                                    continuous availability due to maintenance, updates, or technical issues. We may suspend
                                    or discontinue services at any time without notice.</p>

                                <h4 class="my-2">Third-Party Links & Content</h4>
                                <p>Our website may include links to third-party sites. These are provided for your
                                    convenience only. We do not endorse, control, or assume responsibility for any content
                                    or services provided by external websites.</p>

                                <h4 class="my-2">Termination</h4>
                                <p>We may suspend or terminate your access to the Site or services at our discretion, with
                                    or without cause or notice. Termination does not relieve you of obligations incurred
                                    prior to the termination.</p>

                                <h4 class="my-2">Privacy Policy</h4>
                                <p>Your use of the website is also governed by our <a
                                        href="{{ url('/privacy-policies') }}">Privacy Policy</a>, which outlines how we
                                    collect, use, and protect your personal data.</p>

                                <h4 class="my-2">Feedback and Submissions</h4>
                                <p>By submitting feedback, suggestions, or ideas to us, you grant Tenant the right to use,
                                    reproduce, modify, and publish them for any purpose without compensation. We are not
                                    obliged to maintain the confidentiality of such communications.</p>

                                <h4 class="my-2">Modifications to Terms</h4>
                                <p>We reserve the right to revise these Terms at any time. Changes will take effect
                                    immediately upon posting. Your continued use of the Site constitutes acceptance of the
                                    modified Terms.</p>

                                <h4 class="my-2">Governing Law & Jurisdiction</h4>
                                <p>These Terms are governed by the laws of India. Any disputes shall be subject to the
                                    exclusive jurisdiction of the courts of Jaipur, Rajasthan.</p>

                                <h4 class="my-2">Contact Information</h4>
                                <p>If you have questions or concerns about these Terms & Conditions, please contact us:</p>
                                <ul>
                                    <li><strong>Email:</strong> info@Tenant.com</li>
                                    <li><strong>Phone:</strong> +91-935531766</li>
                                    <li><strong>Office Address:</strong> Tenant Clinic, 59A, Block A 5B, Possangipur,
                                        Janakpuri, New Delhi, Delhi 110058, India</li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection
