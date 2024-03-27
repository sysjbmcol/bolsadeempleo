@extends('layouts.app')

@section('script')
    @yield("script")
@endsection

@section('content')

    <style>
        .contratacionContainer{
            margin: 0!important; 
            height: calc(100vh - 100px);
        }
            /* hola */
        .formContratacion{
            width: 100%;
            max-width: 400px;
            padding: 15px;
        }
    </style>

    <div class="row contratacionContainer">
        <div class="col align-self-center">
            <section class="d-flex justify-content-center">
                @yield("formulario")
            </section>
        </div>
    </div>

@endsection



