<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Personal task manager') }}</title>

    <!-- Styles -->
    @include('includes.style')
    @stack('css')
</head>
<body>
<div id="app">
    @include('includes.navbar')
    @include('includes.errors')
    <main class="py-4">
        @yield('content')
    </main>
</div>
<!-- Scripts -->

@include('includes.scripts')
@stack('scripts')
</body>
</html>
