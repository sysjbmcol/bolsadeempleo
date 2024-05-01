@extends('layouts.app')
@section('content')
    <h1>Hola</h1>
    <div id="candidato"></div>
    <script>
        const obtenerCandidato = async () => {
            const result = await fetch("{{ route('show.candidato', ['id' => $id]) }}")
            const candidato = await result.json();
            console.log(candidato)
        }

        obtenerCandidato()
    </script>
@endsection
