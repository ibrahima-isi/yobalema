<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>{{ config('app.name', "Yobalema") }} | @yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=DM+Sans:300,400,700&display=swap" rel="stylesheet">

    @include('layouts.client._stylesheets')

</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">


<div class="site-wrap" id="home-section">

    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="mt-3 site-mobile-menu-close">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>

    <!-- App Header -->
    @include('layouts.client._header')

    <!-- Start Content -->
        @yield('content')
    <!-- End Content -->

    <!-- App Footer -->
    @include('layouts.client._footer')

</div>

@include('layouts.client._scripts')

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBcnTraR8rzs-NOYZ7jzGVBASwbd0dtsrE&callback=initMap"></script>

</body>

</html>
