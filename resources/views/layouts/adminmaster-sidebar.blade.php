<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>

                <li>
                    <a href="{{ route('dashboard') }}">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-grid-alt"></i>
                        <span key="t-categories">Categories</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('top-categories.index') }}" key="t-top-category">Top Category</a></li>
                        <li><a href="{{ route('mid-categories.index') }}" key="t-mid-category">Mid Category</a></li>
                    </ul>
                </li>


                <li>
                    <a href="{{ route('services.index') }}" class="waves-effect">
                        <i class="bx bx-store"></i>
                        <span key="t-services">Services</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('packages.index') }}" class="waves-effect">
                        <i class="bx bx-package"></i>
                        <span key="t-packages">Packages</span>
                    </a>
                </li>


                <li>
                    <a href="{{ route('doctor_details.index') }}" class="waves-effect">
                        <i class="bx bx-user-circle"></i> {{-- You can use bx-user, bx-id-card, or bx-stethoscope if available --}}
                        <span key="t-doctors">Doctors</span>
                    </a>
                </li>

                <li>

                    <a href="{{ route('blogs.index') }}" class="waves-effect">
                        <i class="bx bx-detail"></i>
                        <span key="t-blog">Blogs</span>
                    </a>

                </li>


                <li>
                    <a href="{{ route('careers.index') }}" class="waves-effect">
                        <i class="bx bx-briefcase-alt"></i>
                        <span key="t-jobs">Careers</span>
                    </a>

                </li>

                {{-- <li>
                    <a href="{{ route('customers.index') }}" class="waves-effect">
                        <i class="bx bx-user"></i>
                        <span key="t-customers">Customers</span>
                    </a>
                </li> --}}



                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-cart"></i>
                        <span key="t-orders-section">Orders</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="ecommerce-orders.html" key="t-orders">Orders</a></li>
                        <li><a href="ecommerce-cart.html" key="t-cart">Cart</a></li>
                        <li><a href="ecommerce-checkout.html" key="t-checkout">Checkout</a></li>
                        <li><a href="invoices-list.html" key="t-invoice-list">Invoice</a></li>
                    </ul>
                </li>


            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
