@extends('layouts.contratacion')

@section('script')
<script>

    document.title = "Contratación - Paso 2"
    const form = document.getElementById('formContratacion');

    // Asegurar que la fecha este presente, si no redirigir al paso 1
    if (!sessionStorage.getItem('fecha'))
        window.location.href = form.getAttribute('redirectIfNotFoundDate');

    form.addEventListener('change', (e) => {
        const hour = e.target.value;
        sessionStorage.setItem('hour', hour);
    });

    form.addEventListener('submit', (e) => {
        e.preventDefault();
        if (!sessionStorage.getItem('hour')) {
            alert('Por favor selecciona una hora');
            return;
        }
        const siguientePaso = e.target[1].getAttribute('redirectTo');
        window.location.href = siguientePaso;
    });

    
</script>
@endsection

@section('formulario')

    <form
    redirectIfNotFoundDate="{{route('contratacion.paso1')}}"
    id="formContratacion"
    class="formContratacion"
    >
        <div class="mb-3">
        <label class="form-label">Selecciona una hora</label>
        <input type="time" class="form-control">
        <div id="fechatraducida" class="form-text">¿A que hora reunirse?</div>
        </div>
        <button type="submit" class="btn btn-primary" redirectTo={{route("contratacion.paso3")}}>
            <i class="fa-solid fa-arrow-right"></i>
            Siguiente paso
        </button>
    </form>


@endsection



