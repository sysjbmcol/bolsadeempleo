@extends('layouts.contratacion')

@section('script')
<script>

    document.title = "Contratación - Paso 2"
    const form = document.getElementById('formContratacion');
    if(sessionStorage.getItem('hour')){
        form[0].value = sessionStorage.getItem('hour');
    }

    // Asegurar que la fecha este presente, si no redirigir al paso 1
    if (!sessionStorage.getItem('fecha'))
        window.location.href = form.getAttribute('redirectIfNotFoundDate');

    function isValidHour(hour){
        const [hourStr, minuteStr] = hour.split(':');
        const hourInt = parseInt(hourStr);
        const minuteInt = parseInt(minuteStr);
        
        const fecha = new Date(sessionStorage.getItem('fecha'));
        fecha.setDate(fecha.getDate() + 1);
        //adicionar la hora seleccionada
        fecha.setHours(hourInt);
        fecha.setMinutes(minuteInt);

        const fechaActual = new Date();
        // console.log("fecha", fecha)
        // console.log("fechaActual", fechaActual)

        if(fechaActual > fecha){
            return false;
        }

        return true;
    }

    form.addEventListener('change', (e) => {
        const hour = e.target.value;
        if (isValidHour(hour)){
            sessionStorage.setItem('hour', hour);
        }
    });

    form.addEventListener('submit', (e) => {
        e.preventDefault();
        const hour = sessionStorage.getItem('hour');        
        if (!isValidHour(hour) || !hour) {
            alert('Por favor selecciona una hora y que sea posterior a la actual');
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
    class="formContratacion card bg-light"
    >
        <div class="mb-3">
        <label class="form-label">Selecciona una hora</label>
        <input type="time" class="form-control text-center">
        <div id="fechatraducida" class="form-text">¿A que hora reunirse?</div>
        </div>
        <button type="submit" class="btn btn-primary" redirectTo={{route("contratacion.paso3")}}>
            <i class="fa-solid fa-arrow-right"></i>
            Siguiente paso
        </button>
    </form>


@endsection



