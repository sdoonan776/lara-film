<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Welcome to Lara Film, for all your movie rental needs">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Lara Film | @yield('title')</title>
    <link rel="shortcut icon" type="favicon" href="{{ asset('favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header class="main-header">
        @include('partials.header')
    </header>

    <main id="app" class="content-wrap">
        @yield('content')
    </main>

    <footer class="main-footer">
        @include('partials.footer')
    </footer>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
</body>
</html>
