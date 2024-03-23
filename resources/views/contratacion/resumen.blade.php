@extends('layouts.app')

@section('script')
<script>

    document.title = "Contratación - Resumen"
    const verifyData = document.getElementById('verifyData');
    if (!sessionStorage.getItem('fecha'))
        window.location.href = verifyData.getAttribute('ifNotFoundDate');
    if (!sessionStorage.getItem('hour'))
        window.location.href = verifyData.getAttribute('ifNotFoundHour');
    if (!sessionStorage.getItem('description'))
        window.location.href = verifyData.getAttribute('ifNotFoundDescription');
    
</script>
@endsection

@section('content')

    <style>
        .contratacionContainer{
            margin: 0!important; 
            height: calc(100vh - 100px);
        }

        .formContratacion{
            width: 100%;
            max-width: 400px;
            padding: 15px;
        }
    </style>

    <div class="row contratacionContainer">
        <div class="col align-self-center">
            <section class="d-flex justify-content-center">

                {{-- Seccion necesaria para la verificación de datos --}}
                <section
                    id="verifyData"
                    ifNotFoundDate="{{route('contratacion.paso1')}}"
                    ifNotFoundHour="{{route('contratacion.paso2')}}"
                    ifNotFoundDescription="{{route('contratacion.paso3')}}"
                >
                </section>

                <div class="d-flex flex-column justify-content-center text-center">
                    <h2 class="text-wrap text-center" style="width: 180vh;">
                        ¡Tu solicitud se ha realizado con éxito! Estaremos confirmado la fecha, hora y lugar de la cita en breve a tu número registrado.
                    </h2>

                    &nbsp;

                    <section>                        
                        <a href="{{route("index")}}" class="justify-content-center btn btn-dark btn-lg">
                            Finalizar
                        </a>
                    </section>
    
                </div>

            </section>
        </div>
    </div>

@endsection



