<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'RFTG - Location de DVD') }}</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script defer src=""></script>
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-50">
        @include('layouts.navigation')

        @yield('content')
    </div>
    
    @stack('scripts')
</body>
</html>