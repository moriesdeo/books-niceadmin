<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Laravel'))</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- Vendor CSS -->
    <link href="{{ secure_asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('assets/css/style.css') }}" rel="stylesheet">

    <!-- Additional Styles -->
    @stack('styles')
</head>
<body>
<!-- ======= Sidebar ======= -->
@include('layouts.sidebar')

<!-- ======= Main ======= -->
<main id="main" class="main">
    <header class="pagetitle">
        <h1>@yield('title', 'Dashboard')</h1>
    </header>

    @include('layouts.content')
</main>

<!-- Vendor JS -->
<script src="{{ secure_asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ secure_asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ secure_asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
<script src="{{ secure_asset('assets/vendor/echarts/echarts.min.js') }}"></script>
<script src="{{ secure_asset('assets/vendor/quill/quill.min.js') }}"></script>
<script src="{{ secure_asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
<script src="{{ secure_asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
<script src="{{ secure_asset('assets/vendor/php-email-form/validate.js') }}"></script>
<script src="{{ secure_asset('assets/js/main.js') }}"></script>

<!-- Scripts -->
@stack('scripts')
</body>
</html>
