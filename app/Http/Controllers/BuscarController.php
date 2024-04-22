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

    public function show($id, $curso){

        if($id){
            $usuario = CrudUsuario::find($id);
        }

        return response()->json($usuario, 200);;
    }
}
