<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        
        @yield('meta')
        
        <script src="{{ asset('/assets/common/js/manifest.js') }}"></script>
        <script src="{{ asset('/assets/common/js/app.js') }}"></script>

        @yield('homepage-page-head-part')
    </head>
    @yield('body')
</html>