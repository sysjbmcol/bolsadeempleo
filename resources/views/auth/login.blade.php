@extends('layouts.index')

@section('imports')
    <link rel="stylesheet" href="{{ asset('css/incio_sesion.css') }}">
@endsection

@section('title', 'Inicia Sesión | TGL')

@section('content')
    <div class="d-flex justify-content-center align-items-center vh-100 w-100">
        <div class="container d-flex border-5 w-100">
            <div
                class="d-none w-100 mh-100 d-md-flex flex-column justify-content-center align-items-center text-center bg-dark color-white h-500">
                <h2 class="fs-1">¡¡Bienvenido!!</h2>
                <p class="mt-3 fs-5">Si aún no tienes cuenta por favor registrate aqui</p>
                <a href="{{ route('register') }}" class="btn btn-outline-light w-25 rounded-5"> {{ __('Register') }}
                </a>
            </div>

            <div
                class="w-100 mh-100 d-flex flex-column justify-content-center align-items-center bg-light position-relative">

                <a href="{{route("index")}}" class="regresar__boton">
                    <i class="fa-solid fa-xmark"></i>
                </a>

                <form method="POST" action="{{ route('login') }}"
                    class="w-75 d-flex justify-content-center align-items-center flex-column">
                    @csrf
                    <h2 class="fs-1 mt-5">Inicia Sesión</h2>

                    <div class="w-75 col-md-12 d-flex justify-content-around align-items-center mt-3 mb-3">

                        <a href="/"
                            class="d-flex justify-content-center align-items-center border border-secondary rounded-5 text-secondary text-decoration-none opcion">
                            <i class="fa-brands fa-google"></i>
                        </a>
                        <a href="#"
                            class="d-flex justify-content-center align-items-center border border-secondary rounded-5 text-secondary text-decoration-none opcion">
                            <i class="fa-brands fa-github"></i>
                        </a>
                        <a href="#"
                            class="d-flex justify-content-center align-items-center border border-secondary rounded-5 text-secondary text-decoration-none opcion">
                            <i class="fa-brands fa-linkedin"></i>
                        </a>
                    </div>

                    <span class="mb-4">o inicia sesión con una cuenta</span>

                    <div class="w-75 mb-4">
                        <input id="email" type="email"
                            class="form-control px-3 py-1 h-40 border border-dark  @error('email') is-invalid @enderror "
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                            placeholder="{{ __('Email Address') }}">


                        @error('email')
                            <span class="invalid-feedback text-center" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <div class="w-75 mb-3">
                        <input id="password" type="password"
                            class="form-control px-3 py-1 h-40 border border-dark @error('password') is-invalid @enderror"
                            name="password" required autocomplete="current-password" placeholder="{{ __('Password') }}">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-2 d-inline w-50">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>


                    <button type="submit" class="mt-4 mb-2 btn btn-outline-dark rounded-5 btn-iniciar">
                        {{ __('Login') }}
                    </button>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="mb-2">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </form>

                <div
                    class="d-flex w-100 mh-100 d-md-none flex-column justify-content-center align-items-center text-center bg-dark text-white mt-1">
                    <p class="mt-3 fs-5">Si aún no tienes cuenta por favor registrate aqui</p>
                    <a href="{{ route('register') }}" class="btn btn-outline-light w-50 rounded-5 mb-4">
                        {{ __('Register') }}
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection
