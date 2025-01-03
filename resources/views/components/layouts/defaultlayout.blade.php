<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Informatics Festival #12</title>
        <!-- <link rel="stylesheet" href="{{ asset('landingpage_/css/bootstrap.min.css') }}"> -->
        <!-- <link rel="stylesheet" href="{{ asset('landingpage_/css/custom.css') }}"> -->
        <link rel="stylesheet" href="{{ asset('landingpage_/css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('landingpage_/css/main.css') }}">
        <script src="{{ asset('landingpage_/js/app.js') }}"></script>
        <link rel="shortcut icon" href="{{ asset('images/ifest.png') }}" type="image/x-icon">
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body id="main_log_fst">
        {{ $slot }}
        <!-- <script src="{{ asset('landingpage_/js/bootstrap.bundle.min.js') }}"></script> -->
        <!-- <script src="{{ asset('landingpage_/js/jquery.min.js') }}"></script> -->
        <script src="{{ asset('landingpage_/js/functions.js') }}"></script>
        <script src="{{ asset('landingpage_/js/auth.js') }}"></script>
    </body>
</html>