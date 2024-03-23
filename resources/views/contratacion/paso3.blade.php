@extends('layouts.app')

@section('script')
<script>

    
    const form = document.getElementById('formContratacion');
    
    // Asegurar que la fecha este presente, si no redirigir al paso 1
    if(!sessionStorage.getItem('fecha'))
        window.location.href = form.getAttribute('redirectIfNotFoundDate');
    // Asegurar que la hora este presente, si no redirigir al paso 2
    if(!sessionStorage.getItem('hour'))
        window.location.href = form.getAttribute('redirectIfNotFoundHour');
    document.title = "Contratación - Paso 3"

    form.addEventListener('change', (e) => {
        const description = e.target.value;
        sessionStorage.setItem('description', description);
    });

    form.addEventListener('submit', (e) => {
        e.preventDefault();
        const description = sessionStorage.getItem('description');
        if (!description && description.trim() === '') {
            alert('Por favor ingresa una descripción');
            return;
        }
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
                    redirectIfNotFoundDate="{{route('contratacion.paso1')}}"
                    redirectIfNotFoundHour="{{route('contratacion.paso2')}}"
                    id="formContratacion"
                    class="formContratacion"
                >
                    <div class="mb-3">
                      <label class="form-label">Ingresa tus solicitudes especiales</label>
                      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" aria-autocomplete="true" minlength="1" placeholder="¿Detalles extras?"></textarea>
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



