@extends('layouts.site')
@section('content')
    <div style="padding-bottom: 5rem;padding-top: calc(4rem + 50px);" class="masthead text-white text-center">
        <div class="masthead-content">
            <div class="container">
                <h2 class="masthead-heading mb-0">Start a web!</h2>
                <h5 class="masthead-subheading mb-0 mb-0">Create a web under laravel power. It’s easy and free.</h5>
            </div>
        </div>
        <div class="bg-circle-1 bg-circle"></div>
        <div class="bg-circle-2 bg-circle"></div>
        <div class="bg-circle-3 bg-circle"></div>
        <div class="bg-circle-4 bg-circle"></div>
    </div>
    <section style="background: #f7f7f7">
        <div class="container">
            <div class="row pt-5 align-items-center">
                <div class="col-lg-6 order-lg-1">
                    <div>
                        <h2 class="display-4">web/mobile api's</h2>
                        <p>This project was created to help other developers makes web/mobile api's in a easy way.</p>
                        <p>Demo is also linked to <a target="_blank" href="https://www.octo.app.a2insights.com.br">Vue Project</a> that shows how this backend can be integrated to a front-end.</p>
                    </div>
                </div>
                <div class="col-lg-6 order-lg-2">
                    <div>
                        <img class="img-fluid " src="{{ asset('img/social-media.png') }}" alt="Social média">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-white">
        <div class="container py-5">
            <h2 class="text-center pt-3 mb-4">Octo Web</h2>
            <div class="col-lg-12">
                <div class="text-center">
                    <a href="https://octo.docs.a2insights.com.br" rel="noopener" target="_blank" class="mx-3">Api Docs</a>
                    <a href="https://octo.a2insights.com.br/login" rel="noopener" target="_blank" class="mx-3">Api Demo</a>
                    <a href="https://octo.app.docs.a2insights.com.br" rel="noopener" target="_blank" class="mx-3">Mobile Docs</a>
                    <a href="https://www.octo.app.a2insights.com.br" rel="noopener" target="_blank" class="mx-3">Mobile Demo</a>
                    <a href="https://github.com/a2insights/octo" rel="noopener" target="_blank" class="mx-3">Github</a>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-white">
        <div class="container py-5">
            <h2 class="text-center pt-3 mb-4">Made with:</h2>
            <div class="row">
                <div class="col align-self-start">
                </div>
                <div class="col-lg-6 col-md-6 text-center ">
                    <a class="mx-2" href="https://laravel.com" target="_blank">
                        <img src="{{asset('img/logo-laravel-1.svg')}}" alt="logo laravel icon">
                        <img src="{{asset('img/logo-laravel-2.svg')}}" alt="logo laravel word">
                    </a>
                    <a class="mx-2" href="https://startbootstrap.com" target="_blank">
                        <img width="50px" src="{{asset('img/logo-sb.svg')}}" alt="logo start bootstrap">
                    </a>
                    <a class="mx-2" href="https://www.creative-tim.com" target="_blank">
                        <img width="50px" src="{{asset('img/logo-ct.png')}}" alt="logo creative tim">
                    </a>
                    <a class="mx-2" href="https://tenancyforlaravel.com" target="_blank">
                        <img width="150px" src="{{asset('img/logo-tenancy.svg')}}" alt="logo tenancy">
                    </a>
                </div>
                <div class="col align-self-end">
                </div>
            </div>
        </div>
    </section>
@endsection
