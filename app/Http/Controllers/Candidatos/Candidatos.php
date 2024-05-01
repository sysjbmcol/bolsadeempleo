<?php

namespace App\Http\Controllers\Candidatos;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Candidatos extends Controller
{

    /* Crear funcion para poder obtener los datos que se van a visualizar del candidato,
     debe hacer la busqueda por el ID del candidato, la funcion se debe poder consultar a traves
     de una ruta. Una vez se termine el diseño de la vista se debe ajustar para que muestre la informacion de X candidato
     */

    public function obtenerCandidato(Request $request)
    {
        $id = intval($request->route('id'));
        $usuario = User::find($id);
        return response()->json($usuario);
    }

    /*
     Debe mostar Nombre, foto, habilidades e insignias
      */



    public function filtroHabilidad(Request $request)
    {
        $habilidades = $this->retornarArrayHabilidades($request->input('keyword'));
        $query = $this->crearQuery($habilidades);
        return json_encode($query);
    }


    private function retornarArrayHabilidades(string $habilidades)
    {
        $finalArray = [];
        $expresion_regular = '/[,- ]/';
        $arrayHabilidades = preg_split($expresion_regular, $habilidades);

        for ($i = 0; $i < count($arrayHabilidades); $i++) {
            $finalArray[$i] = trim($arrayHabilidades[$i]);
        }

        return $finalArray;
    }


    private function crearQuery($habilidades)
    {
        $query = DB::table('users')->join('categorias', 'id', '=')->orderBy('id', 'asc');

        foreach ($habilidades as $habilidad) {
            $query->where('id', 'LIKE', '%' . $habilidad . '%');
        }

        // $query->where('id', 1);

        return $query;
    }

    public function mostrarCandidato(Request $request)
    {
        $id = intval($request->route('id'));
        return view('candidatos.show')->with(['id' => $id]);
    }
}
