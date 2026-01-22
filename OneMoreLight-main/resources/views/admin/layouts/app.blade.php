<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>@yield('title', 'Admin Dashboard') - PT Charoen Pokphand</title>

    <link rel="shortcut icon" href="{{ asset('mazer/assets/images/favicon.svg') }}" type="image/x-icon">
    
    <link rel="stylesheet" crossorigin href="{{ asset('mazer/assets/compiled/css/app.css') }}">
    <link rel="stylesheet" crossorigin href="{{ asset('mazer/assets/compiled/css/app-dark.css') }}">
    <link rel="stylesheet" crossorigin href="{{ asset('mazer/assets/compiled/css/iconly.css') }}">
    
    @stack('styles')
</head>

<body>
    <script src="{{ asset('mazer/assets/static/js/initTheme.js') }}"></script>
    <div id="app">
        @include('admin.partials.sidebar')
        
        <div id="main">
            @include('admin.partials.header')

            @yield('content')

            @include('admin.partials.footer')
        </div>
    </div>
    
    <script src="{{ asset('mazer/assets/static/js/components/dark.js') }}"></script>
    <script src="{{ asset('mazer/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('mazer/assets/compiled/js/app.js') }}"></script>
    
    @stack('scripts')
</body>

</html>
