<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{asset('/assets/css/app.css')}}">

</head>
<body>
    <div id="app" style="width: 100%;">
        <div class="container">
            <header id="header">
            {{-- 元になるデータは@sectionで纏められている。@yieldでは、埋め込みを行う。 --}}
                @yield('header')
                @yield('headerCategory')
            </header>
            <main id="main">
                @yield('content')
                @yield('categoryMenu')
                @yield('categoryMenuCategory')
            </main>
            <footer id="footer">
                <small>&copy; 2022 Kisiemon</small>
            </footer>
        </div>
    </div>
</body>
</html>
