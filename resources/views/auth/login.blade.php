@extends('layouts.site')
@section('content')
    <div class="masthead text-white">
        <div class="masthead-content">
            <h2 class="text-center">Sign In!</h2>
            <div class="row">
                <div class="col align-self-start">
                </div>
                <div class="col-md-3 align-self-center">
                    <div class="card border-0 color-bg-animated mt-4 mx-2">
                        <div class="card-body px-4 pb-2 pt-4">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="email">{{ __('E-Mail') }}</label>
                                    <input
                                        id="email"
                                        type="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}"
                                        required
                                        autocomplete="email"
                                        autofocus
                                    >
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">{{ __('Password') }}</label>
                                    <input
                                        id="password"
                                        type="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        name="password"
                                        required
                                        autocomplete="current-password"
                                    >
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                    <div class="form-group mt-3">
                                        <div class="form-check">
                                            <input
                                                class="form-check-input"
                                                type="checkbox"
                                                name="remember"
                                                id="remember" {{ old('remember') ? 'checked' : '' }}
                                            >
                                            <label class="form-check-label " for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group mb-0">
                                        <button type="submit" class="btn btn-block btn-md btn-outline-primary">
                                            {{ __('Login') }}
                                        </button>
                                        @if (Route::has('password.request'))
                                            <a class="btn mt-3 btn-link pl-0" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </div>
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
@endsection
