@extends('layouts.contratacion')

@section('script')
<script>

    document.title = "Contratación - Paso 1"
    const form = document.getElementById('formContratacion');
    const temp = sessionStorage.getItem('fecha');
    const infoFecha = document.getElementById('fechatraducida');

    function traducirFecha(fechaSinTransformar) {
        const fecha = new Date(fechaSinTransformar);
        // sumarle un dia a la fecha ya que por algún motivo se resta un dia
        fecha.setDate(fecha.getDate() + 1);
        const fechaTraducida = fecha.toLocaleDateString('es-ES', {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });
        return fechaTraducida;
    }


    if (temp) {
        form[0].value = temp;
        const fechaTraducida = traducirFecha(temp);
        infoFecha.innerText = `La fecha sera el día ${fechaTraducida}`;
    }

    form.addEventListener('change', (e) => {
        const fechaTraducida = traducirFecha(e.target.value);
        if (fechaTraducida === 'Invalid Date') {
            infoFecha.innerText = `¿Cuando les gustaria reunirse?`;
            return;
        }
        if(e.target.value !== temp){
            sessionStorage.setItem('fecha', e.target.value);
        }
        infoFecha.innerText = `La fecha sera el día ${fechaTraducida}`;
    });

    form.addEventListener('submit', (e) => {
        e.preventDefault();
        if (!sessionStorage.getItem('fecha')) {
            alert('Por favor selecciona una fecha');
            return;
        }
        const siguientePaso = e.target[1].getAttribute('redirectTo');
        window.location.href = siguientePaso;
        //e.target.submit();
    });

    
</script>
@endsection


@section("formulario")

    <form
    id="formContratacion"
    class="formContratacion"
    >
        <div class="mb-3">
        <label class="form-label">Programa una fecha en el siguien campo</label>
        <input type="date" class="form-control">
        <div id="fechatraducida" class="form-text">¿Cuando les gustaria reunirse?</div>
        </div>
        <button type="submit" class="btn btn-primary" redirectTo={{route("contratacion.paso2")}}>
            <i class="fa-solid fa-arrow-right"></i>
            Siguiente paso
        </button>
    </form>

@endsection
