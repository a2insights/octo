@extends('layouts.site')
@section('content')
    <div class="masthead text-white text-center">
        <div class="masthead-content">
            <div class="container">
                <h2 class="masthead-heading mb-0">Start a web!</h2>
                <h5 class="masthead-subheading mb-0 mb-0">Create a web under laravel power. It’s easy and free.</h5>
                <a href="{{ auth()->user() ? route('dashboard') : route('register') }}" class="btn btn-primary btn-xl rounded-pill mt-5">Create your free blog</a>
            </div>
        </div>
        <div class="bg-circle-1 bg-circle"></div>
        <div class="bg-circle-2 bg-circle"></div>
        <div class="bg-circle-3 bg-circle"></div>
        <div class="bg-circle-4 bg-circle"></div>
    </div>
    <section class="bg-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 order-lg-2">
                    <div class="p-5">
                        <img class="img-fluid rounded-circle" src="{{ asset('img/networks.jpg') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <div class="p-5">
                        <h2 class="display-4">A new system concept</h2>
                        <p>Use the laravel power to implement your websites with a PHP OO</p>
                        <code><var>$blogs</var> = Blog::all()</code>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-white">
        <div class="container pb-5">
            <h2 class="text-center mb-4">Made with:</h2>
            <div class="row">
                <div class="col align-self-start">
                </div>
                <div class="col-lg-6 col-md-6 text-center align-self-center">
                    <a href="https://laravel.com/" target="_blank" class="float-left">
                        <img src="{{asset('img/logo-laravel-1.svg')}}" alt="logo laravel icon">
                        <img src="{{asset('img/logo-laravel-2.svg')}}" alt="logo laravel word">
                    </a>
                    <a href="https://tenancyforlaravel.com/" target="_blank">
                        <img width="150px" src="{{asset('img/logo-tenancy.svg')}}" alt="logo tenancy">
                    </a>
                    <a href="https://startbootstrap.com" target="_blank" class="float-right">
                        <img width="50px" src="{{asset('img/logo-sb.svg')}}" alt="logo start bootstrap">
                    </a>
                </div>
                <div class="col align-self-end">
                </div>
            </div>
        </div>
    </section>
@endsection
