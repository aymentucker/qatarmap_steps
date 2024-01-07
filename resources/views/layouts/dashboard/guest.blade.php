<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title data-setting="app_name" data-rightJoin=" Pro | Responsive Bootstrap 5 Admin Dashboard Template">
        {{ env('APP_NAME') }} Pro | Responsive Bootstrap 5 Admin Dashboard Template</title>
    <meta name="description"
        content="{{ env('APP_NAME') }} Pro is a revolutionary Bootstrap Admin Dashboard Template and UI Components Library. The Admin Dashboard Template and UI Component features 8 modules.">
    <meta name="keywords"
        content="premium, admin, dashboard, template, bootstrap 5, clean ui, qompac ui, admin dashboard,responsive dashboard, optimized dashboard, simple auth">
    <meta name="author" content="Iqonic Design">
    <meta name="DC.title" content="{{ env('APP_NAME') }} Pro Simple | Responsive Bootstrap 5 Admin Dashboard Template">

    <!-- Style Link start -->
    @include('components.partials._head')
    <!-- Style Link end -->
</head>

<body class="light theme-default theme-color-default">

    <!-- Loader start -->
    <div id="loading">
        <x-partials._body_loader />
    </div>
    <!-- Loader end -->

    <!-- Wrapper / Page Content Start-->
    <div class="wrapper">
        {{ $slot }}
    </div>
    <!-- Wrapper / Page Content End-->

    <!-- Live Customizer start -->
    {{-- <x-widgets.setting-offcanvas /> --}}
    <!-- Live Customizer end -->

    <!-- Script Link start -->
    @include('components.partials._scripts')
    <!-- Script Link end -->

    <!-- Notification Script start -->
    <x-partials._app_toast />
    <!-- Notification Script end -->
</body>

</html>
