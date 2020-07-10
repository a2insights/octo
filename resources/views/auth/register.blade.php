@extends('layouts.site')
@section('content')
    <div class="masthead text-white">
        <div class="masthead-content">
            <div class="container">
                <h2 class="text-center">Sign Up!</h2>
                <div class="row">
                    <div class="col align-self-start">
                    </div>
                    <div class="col-md-8 align-self-center">
                        <div class="card bg-dark mt-4 mx-2">
                            <div class="card-body">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-5">
                                            <label for="name">{{ __('Name') }}</label>
                                            <input
                                                id="name"
                                                type="text"
                                                class="form-control @error('name') is-invalid @enderror"
                                                name="name"
                                                value="{{ old('name') }}"
                                                required
                                                autocomplete="name"
                                                autofocus
                                            >
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-7">
                                            <label for="name">{{ __('Blog') }}</label>
                                            <input
                                                id="blog"
                                                type="text"
                                                class="form-control @error('blog') is-invalid @enderror"
                                                name="blog"
                                                value="{{ old('blog') }}"
                                                required
                                                autofocus
                                            >
                                            @error('blog')
                                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">{{ __('E-Mail Address') }}</label>
                                        <input
                                            id="email"
                                            type="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            name="email"
                                            value="{{ old('email') }}"
                                            required
                                            autocomplete="email"
                                        >
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                        @enderror
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="password">{{ __('Password') }}</label>
                                            <input
                                                id="password"
                                                type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password"
                                                required
                                                autocomplete="new-password"
                                            >
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                            <input
                                                id="password-confirm"
                                                type="password"
                                                class="form-control"
                                                name="password_confirmation"
                                                required
                                                autocomplete="new-password"
                                            >
                                        </div>
                                    </div>
                                    <div class="form-group mt-4">
                                        <button type="submit" class="btn btn-block btn-outline-primary">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col align-self-end">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
