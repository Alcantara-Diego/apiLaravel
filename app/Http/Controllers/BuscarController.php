<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CrudUsuario;
class BuscarController extends Controller
{
    public function index(){
        $usuarios = CrudUsuario::all();

        return response()->json($usuarios, 200);
    }

    public function showById($id){


        if($id){
            $usuario = CrudUsuario::findOrFail($id); 
            return response()->json($usuario, 200); 

        } 

        return response()->json(["error" => "Usuário não encontrado"], 404); 
    }

    public function showByTipo($tipo){
        $usuario = CrudUsuario::where("tipo", $tipo)->get();

        return response()->json($usuario, 200);
    }

    public function showByCurso($curso){
        $usuario = CrudUsuario::where("curso", $curso)->get();

        return response()->json($usuario, 200);
    }
}
