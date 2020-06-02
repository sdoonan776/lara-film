<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Welcome to Lara Film, for all your movie rental needs">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lara Film | @yield('title')</title>
    <link rel="shortcut icon" type="favicon" href="{{ asset('favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <header class="main-header">
        @include('partials.header')
    </header>

    <nav>
        @include('partials.sidebar')
    </nav>

    <main class="content">
        @yield('content')
    </main>    

    <footer class="main-footer">
        @include('partials.footer')
    </footer>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
</body>
</html>