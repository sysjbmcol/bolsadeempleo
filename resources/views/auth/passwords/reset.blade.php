@extends('layouts.index')

@section('title', 'Reestablecer Contraseña | TGL')

@section('content')
    <div class="container w-100 vh-100 d-flex justify-content-center align-items-center">
        <div class="container bg-dark text-light rounded-5 d-flex justify-content-center align-items-center flex-column"
            style="height: 500px;">
            <h2 class="fs-2 text-center m-4">{{ __('Reset Password') }}</h2>
            <form method="POST" action="{{ route('password.update') }}" class="w-75">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <label for="email" class="">{{ __('Email Address') }}
                </label>

                <input id="email" type="email"
                    class="form-control w-100 mb-4 mt-2 @error('email') is-invalid @enderror" name="email"
                    value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <label for="password" class="">{{ __('Password') }}</label>

                <input id="password" type="password"
                    class="form-control w-100 mb-4 mt-2 @error('password') is-invalid @enderror" name="password" required
                    autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <label for="password-confirm" class="">{{ __('Confirm Password') }}</label>

                <input id="password-confirm" type="password" class="form-control w-100 mb-4 mt-2"
                    name="password_confirmation" required autocomplete="new-password">

                <div class="container-fluid d-flex justify-content-center">
                    <button type="submit" class="btn btn-outline-light mb-3">
                        {{ __('Reset Password') }}
                    </button>
                </div>
            </form>
            <a href="{{ route('index') }}" class="btn btn-outline-danger">Cancelar</a>
        </div>
    </div>
@endsection
