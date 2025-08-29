<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>

                <!-- Common for all -->
                <li>
                    <a href="{{ route('dashboard') }}">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">Dashboard</span>
                    </a>
                </li>

                <!-- Admin + Owner -->
                @if(auth()->user()->user_type === 'admin' || auth()->user()->user_type === 'owner')
                <li>
                    <a href="{{ route('admin.properties.index') }}" class="waves-effect">
                        <i class="bx bx-building-house"></i>
                        <span key="t-properties">Properties</span>
                    </a>
                </li>
                @endif

                <!-- Admin only -->
                @if(auth()->user()->user_type === 'admin')
                <li>
                    <a href="{{ route('tenants.index') }}" class="waves-effect">
                        <i class="bx bx-user"></i>
                        <span key="t-tenants">Tenants</span>
                    </a>
                </li>

                <li>
                    <a href="#" class="waves-effect">
                        <i class="bx bx-cog"></i>
                        <span key="t-services">Services</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.packages.index') }}" class="waves-effect">
                        <i class="bx bx-package"></i>
                        <span key="t-packages">Packages</span>
                    </a>
                </li>
                @endif

                <!-- All roles -->
                {{-- <li>
                    <a href="{{ route('notifications.index') }}" class="waves-effect">
                        <i class="bx bx-bell"></i>
                        <span key="t-notifications">Notifications</span>
                    </a>
                </li> --}}

                <!-- Tenant-specific (show rented unit details page, if you have a route) -->
                @if(auth()->user()->user_type === 'tenant')
                <li>
                    <a href="{{ route('units.show', auth()->user()->id) }}" class="waves-effect">
                        <i class="bx bx-door-open"></i>
                        <span key="t-myunit">My Unit</span>
                    </a>
                </li>
                @endif

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
