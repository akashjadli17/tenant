<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Myra Skincare')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/logo/favicon.png') }}">

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/dashboard/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dashboard/css/icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dashboard/css/app.min.css') }}">

    <!-- JS Plugin (if needed early) -->
    <script src="{{ asset('assets/dashboard/js/plugin.js') }}"></script>

    <!-- Extra head section -->
    @stack('head')
</head>

<body>

    <!-- Admin Header -->
    @include('layouts.adminheader')
    @include('layouts.adminmaster-sidebar')


    <!-- Main Content -->
    <div class="content">
        @yield('content')
    </div>

    <!-- Admin Footer -->
    @include('layouts.adminfooter')

    <!-- Additional Scripts -->
    @stack('scripts')
</body>

</html>