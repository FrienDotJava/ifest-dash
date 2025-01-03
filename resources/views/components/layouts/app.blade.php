<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title') - {{ config('app.name', 'Informatics Festival #12') }}</title>
        <link rel="stylesheet" href="{{ asset('public_/css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('public_/css/main.css') }}">
        <link rel="shortcut icon" href="{{ asset('images/ifest.png') }}" type="image/x-icon">
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('public_/js/app.js') }}"></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800;900&amp;display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,600,700" rel="stylesheet">
    </head>
    <body>
        {{ $slot }}
        <script src="{{ asset('public_/js/functions.js') }}"></script>
        <script src="{{ asset('public_/js/main.js') }}"></script>
    </body>
</html>
