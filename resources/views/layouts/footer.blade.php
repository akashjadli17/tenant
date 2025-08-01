<!-- footer area -->
<footer class="footer-area">
    <div class="footer-shape" style="background-image: url(assets/img/shape/01.png);"></div>
    <div class="footer-widget">
        <div class="container">
            <div class="footer-widget-wrap pt-40 pb-40">
                <div class="row g-4">

                    <!-- About -->
                    <div class="col-lg-4">
                        <div class="footer-widget-box about-us">
                            <a href="#" class="footer-logo">
                                <img src="assets/img/logo/logo.png" alt="Tenant Portal Logo">
                            </a>
                            <p class="mb-4">
                                Tenant Portal is a centralized platform designed for landlords to securely manage tenant
                                documentation, property records, and rental data — all in one place. Simplify your
                                rental operations today.
                            </p>
                            <ul class="footer-social">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-x-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Quick Links -->
                    <div class="col-6 col-lg-2">
                        <div class="footer-widget-box list">
                            <h4 class="footer-widget-title">Quick Links</h4>
                            <ul class="footer-list">
                                <li><a href="index.php" class="nav-link"><i
                                            class="far fa-angle-double-right"></i>Home</a></li>
                                <li><a href="package.php" class="nav-link"><i
                                            class="far fa-angle-double-right"></i>Packages</a></li>
                                <li><a href="blog.php" class="nav-link"><i
                                            class="far fa-angle-double-right"></i>Blog</a></li>
                                <li><a href="contact.php" class="nav-link"><i
                                            class="far fa-angle-double-right"></i>Contact</a></li>
                                <li><a href="#" class="nav-link"><i
                                            class="far fa-angle-double-right"></i>Login</a></li>
                            </ul>
                        </div>
                    </div>


                    <!-- Contact -->
                    <div class="col-lg-3">
                        <div class="footer-widget-box">
                            <h4 class="footer-widget-title">Contact Us</h4>
                            <ul class="footer-contact">
                                <li>
                                    <div class="icon"><i class="far fa-location-dot"></i></div>
                                    <div class="content">
                                        <h6>Head Office</h6>
                                        <p>1234 Rental Avenue, Suite<br>Dream City, Country 000000</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon"><i class="far fa-phone"></i></div>
                                    <div class="content">
                                        <h6>Call Us</h6>
                                        <a href="tel:+911234567890">+91 12345 67890</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon"><i class="far fa-envelope"></i></div>
                                    <div class="content">
                                        <h6>Email</h6>
                                        <a href="mailto:info@tenantportal.com">info@tenantportal.com</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Map -->
                    <div class="col-lg-3">
                        <div class="footer-widget-box">
                            <h4 class="footer-widget-title">Our Location</h4>
                            <div class="mt-3">
                                <iframe
                                    src="https://maps.google.com/maps?q=Dream%20City&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                    width="100%" height="200" style="border:0; border-radius: 8px;"
                                    allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                                </iframe>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Copyright -->
    <div class="container text-center">
        <div class="copyright">
            <div class="row">
                <div class="col-md-6 align-self-center">
                    <p class="copyright-text">
                        &copy; <span id="date"></span> <a href="#">Tenant Portal</a> — All Rights Reserved.
                    </p>
                </div>
                <div class="col-md-6">
                    <p class="copyright-text">
                        Designed & Developed by <a href="#">WeDigital India</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer area end -->


<!-- scroll-top -->
<a href="#" id="scroll-top"><i class="far fa-arrow-up"></i></a>
<!-- scroll-top end -->


<!-- js -->
<script data-cfasync="false" src="{{ asset('assets/js/mail-decode.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('assets/js/modernizr.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.appear.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.easing.min.js') }}"></script>
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/js/counter-up.js') }}"></script>
<script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('assets/js/wow.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
<!-- slider -->
<script>
    var myCarousel = document.querySelector('#carouselExampleControls');
    var carousel = new bootstrap.Carousel(myCarousel, {
        interval: 1400,
        ride: 'carousel'
    });
</script>
