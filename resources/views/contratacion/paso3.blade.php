@extends('layouts.app')

@section('script')
<script>

    document.title = "Contratación - Paso 3"
    const form = document.getElementById('formContratacion');

    form.addEventListener('submit', (e) => {
        e.preventDefault();
        // const fecha = form[0].value;
        // if (!fecha) {
        //     alert('Por favor selecciona una fecha');
        //     return;
        // }
        const siguientePaso = e.target[1].getAttribute('redirectTo');
        window.location.href = siguientePaso;
    });

    
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
                <form
                    id="formContratacion"
                    class="formContratacion"
                >
                    <div class="mb-3">
                      <label class="form-label">Ingresa tus solicitudes especiales</label>
                      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                      <div id="fechatraducida" class="form-text">¿Buscas algo especifico?</div>
                    </div>
                    <button type="submit" class="btn btn-primary" redirectTo={{route("contratacion.resumen")}}>
                        <i class="fa-solid fa-check"></i>
                        Finalizar
                    </button>
                </form>
            </section>
        </div>
    </div>

@endsection



