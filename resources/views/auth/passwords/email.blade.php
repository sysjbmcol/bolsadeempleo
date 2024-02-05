@extends('layouts.index')

@section('title', 'Reestablecer Contraseña | TGL')

@section('content')
    <style>
        .mw-500{
            max-width: 600px !important;
            max-height: 400px !important;
        }
    </style>
    <div class="container w-100 vh-100 d-flex justify-content-center align-items-center">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card bg-dark text-light text-center mw-500">
                    <div class="card-header fs-1">{{ __('Reset Password') }}</div>

                    <div class="card-body">
                        <div class="container d-flex justify-content-center align-items-center">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                        </div>

                        <form method="POST" action="{{ route('password.email') }}" class="">
                            @csrf

                            <div class="mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="w-100 d-flex align-items-center justify-content-center flex-column">
                                    <input id="email" type="email"
                                        class="form-control w-100 @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="w-100">
                                <div class="w-100 mb-4">
                                    <button type="submit" class="btn btn-outline-light">
                                        {{ __('Send Password Reset Link') }}
                                    </button>
                                </div>
                                <a href="{{ route('login') }}" class="btn btn-outline-danger">
                                    Cancelar
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
