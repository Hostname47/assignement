<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('favicon.ico') }}"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'The Big Rich Group Assignement')</title>
    <!-- <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}" defer></script> --> <!-- internet was lost, so I have to use file instead of CDN -->
    <script type="text/javascript" src="{{ asset('js/core.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/core.css') }}" rel="stylesheet">
    @stack('styles')
    @stack('scripts')
</head>
<body>
    @include('partials.header')
    <main>
        @if(Session::has('message'))
            <p class="green-message">{{ Session::get('message') }}</p>
        @endif
        @if(Session::has('errors'))
            <p class="red-message">{{ Session::get('errors')->first() }}</p>
        @endif
        @if(Session::has('error'))
            <p class="red-message">{{ Session::get('error') }}</p>
        @endif
        
        @yield('content')
    </main>
</body>
</html>