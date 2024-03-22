@extends('layouts.app')

@section('script')
<script>

    document.title = "Contratación - Paso 2"

    
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
                      <label class="form-label">Selecciona una hora</label>
                      <input type="time" class="form-control">
                      <div id="fechatraducida" class="form-text">¿A que hora reunirse?</div>
                    </div>
                    <button type="submit" class="btn btn-primary" redirectTo={{route("contratacion.paso2")}}>
                        <i class="fa-solid fa-arrow-right"></i>
                        Siguiente paso
                    </button>
                </form>
            </section>
        </div>
    </div>

@endsection



