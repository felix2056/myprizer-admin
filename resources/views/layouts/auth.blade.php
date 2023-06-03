@php
    $site_settings = \App\Models\SiteSetting::first();
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    
    <meta name="description" content="{{ $site_settings->site_description ?? '' }}">
    <meta name="keywords" content="{{ $site_settings->site_keywords ?? '' }}">
    {{-- <meta name="robots" content="index, follow"> --}}
    
    <title>{{ $site_settings->site_name }} - Admin Dashboard</title>
    <link rel="shortcut icon" href="{{ $site_settings->site_favicon ?? '/images/favicon.png' }}" type="image/x-icon">

    <!-- css links -->
    <link rel="stylesheet" href="/css/perfect-scrollbar.css">
    <link rel="stylesheet" href="/css/choices.css">
    <link rel="stylesheet" href="/css/apexcharts.css">
    <link rel="stylesheet" href="/css/quill.css">
    <link rel="stylesheet" href="/css/rangeslider.css">
    <link rel="stylesheet" href="/css/custom.css">
    <link rel="stylesheet" href="/css/main.css">
</head>

<body>
    <!--  -->
    @yield('content')

    <script src="/js/alpine.js"></script>
    <script src="/js/perfect-scrollbar.js"></script>
    <script src="/js/choices.js"></script>
    <script src="/js/chart.js"></script>
    <script src="/js/apexchart.js"></script>
    <script src="/js/quill.js"></script>
    <script src="/js/rangeslider.min.js"></script>
    <script src="/js/main.js"></script>
</body>
</html>
