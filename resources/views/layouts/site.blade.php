<!doctype html>
<html class="h-100" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.png') }}">
    <title>{{ config('app.name', 'Blog') }}</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @notify_css
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
</head>
<body class="d-flex flex-column h-100">
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            </ul>
            <ul class="navbar-nav ml-auto">
                @if(Auth::user())
                    <li class="nav-item">
                        <a class="nav-link" href="/{{ Auth::user()->blog()->path }}">{{ __('Blog') }}</a>
                    </li>
                @endif
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
                    </li>
                @endauth
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('SIGN IN') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('New blog') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
<main role="main" class="flex-shrink-0" id="app">
    @yield('content')
</main>
<footer class="bg-dark footer mt-auto py-3">
    <div class="container">
        <p class="m-0 text-center text-white small">Copyright &copy; {{ config('app.name') }} - {{ date('Y') }}</p>
    </div>
</footer>
</body>
@notify_js
@notify_render
<style>
    body {
        font-family: 'Lato', serif;
        background: linear-gradient(0deg, #ff6a00 0%, #ee0979 100%);
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-family: 'Catamaran', serif;
        font-weight: 800 !important;
    }

    .btn-xl {
        text-transform: uppercase;
        padding: 1.5rem 3rem;
        font-size: 0.9rem;
        font-weight: 700;
        letter-spacing: 0.1rem;
    }

    .rounded-pill {
        border-radius: 5rem;
    }

    .navbar-custom {
        padding-top: 1rem;
        padding-bottom: 1rem;
        background-color: rgb(239, 18, 108);
    }

    .navbar-custom .navbar-brand {
        text-transform: uppercase;
        font-size: 1rem;
        letter-spacing: 0.1rem;
        font-weight: 700;
    }

    .navbar-custom .navbar-nav .nav-item .nav-link {
        text-transform: uppercase;
        font-size: 0.8rem;
        font-weight: 700;
        letter-spacing: 0.1rem;
    }

    .masthead {
        position: relative;
        overflow: hidden;
        padding-top: calc(7rem + 72px);
        padding-bottom: 7rem;
        background-repeat: no-repeat;
        background-position: center center;
        background-attachment: scroll;
        background-size: cover;
    }

    .masthead .masthead-content {
        z-index: 1;
        position: relative;
    }

    .masthead .masthead-content .masthead-heading {
        font-size: 10rem;
    }

    .masthead .masthead-content .masthead-subheading {
        font-size: 2rem;
    }

    .bg-circle {
        z-index: 0;
        position: absolute;
        border-radius: 100%;
        background: linear-gradient(0deg, #ee0979 0%, #ff6a00 100%);
    }

    .bg-circle-1 {
        height: 90rem;
        width: 90rem;
        bottom: -55rem;
        left: -55rem;
    }

    .bg-circle-2 {
        height: 50rem;
        width: 50rem;
        top: -25rem;
        right: -25rem;
    }

    .bg-circle-3 {
        height: 20rem;
        width: 20rem;
        bottom: -10rem;
        right: 5%;
    }

    .bg-circle-4 {
        height: 30rem;
        width: 30rem;
        top: -5rem;
        right: 35%;
    }

    .bg-primary {
        background-color: #ee0979 !important;
    }

    .btn-primary {
        background-color: #ee0979;
        border-color: #ee0979;
    }

    .btn-primary:active, .btn-primary:focus, .btn-primary:hover {
        background-color: #bd0760 !important;
        border-color: #bd0760 !important;
    }

    .btn-primary:focus {
        box-shadow: 0 0 0 0.2rem rgba(238, 9, 121, 0.5);
    }

    .btn-secondary {
        background-color: #ff6a00;
        border-color: #ff6a00;
    }

    .btn-secondary:active, .btn-secondary:focus, .btn-secondary:hover {
        background-color: #cc5500 !important;
        border-color: #cc5500 !important;
    }

    .btn-secondary:focus {
        box-shadow: 0 0 0 0.2rem rgba(255, 106, 0, 0.5);
    }

</style>
</html>
