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
                    <a href="{{ route('properties.index') }}" class="waves-effect">
                        <i class="bx bx-store"></i>
                        <span key="t-services">Properties</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('tenants.index') }}" class="waves-effect">
                        <i class="bx bx-store"></i>
                        <span key="t-services">Tenants</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('services.index') }}" class="waves-effect">
                        <i class="bx bx-store"></i>
                        <span key="t-services">Services</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.packages.index') }}" class="waves-effect">
                        <i class="bx bx-package"></i>
                        <span key="t-packages">Packages</span>
                    </a>
                </li>
 
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
