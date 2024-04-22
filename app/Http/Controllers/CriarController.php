<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CrudUsuario;





class CriarController extends Controller
{
    public function store(Request $request){

        $nome = $request->input("nome");
        $email = $request->input("email");
        $curso = $request->input("curso");
        $telefone = $request->input("telefone");
        $tipo = $request->input("tipo");

        // Definir status pelo tipo de usuário
        switch ($tipo) {
            case 'aluno':
                $status = "matriculado";
                break;

            case 'candidato':
                $status = 'none';
                break;
            
            default:
                return response()->json(["status"=>"error", "mensagem"=>"Tipo de usuário inválido"], 400);
        }


        



        //Alocar as matérias com base no curso escolhido
        switch ($curso) {  
            case 'frontend':
                $notas = [
                    "html" => [0, "cursando"],
                    "css" => [0, "cursando"],
                    "javascript" => [0, "cursando"],
                    "react" => [0, "cursando"],
                    "bootstrap" => [0, "cursando"],
                    "json" => [0, "cursando"]
                ];
                break;
            case 'backend':
                $notas = [
                    "php" => [0, "cursando"],
                    "laravel" => [0, "cursando"],
                    "mysql" => [0, "cursando"],
                    "validacaoDeDados" => [0, "cursando"],
                    "arquiteturaMVC" => [0, "cursando"],
                    "apiRest" => [0, "cursando"]
                ];
                break;
            case 'fullstack':
                $notas = [
                    //Frontend
                    "html" => [0, "cursando"],
                    "css" => [0, "cursando"],
                    "javascript" => [0, "cursando"],
                    "react" => [0, "cursando"],
                    "bootstrap" => [0, "cursando"],
                    "json" => [0, "cursando"],
                    //Backend
                    "php" => [0, "cursando"],
                    "laravel" => [0, "cursando"],
                    "mysql" => [0, "cursando"],
                    "validacaoDeDados" => [0, "cursando"],
                    "arquiteturaMVC" => [0, "cursando"],
                    "apiRest" => [0, "cursando"]

                ];
                break;

            default:
                return response()->json(["status" => "error", "mensagem" => "Curso não reconhecido"], 400);
        }

        $usuario = CrudUsuario::create([
            "nome" => $nome,
            "email" => $email,
            "curso" => $curso,
            "telefone" => $telefone,
            "tipo" => $tipo,
            "status" => $status,
            "notas" => json_encode($notas)
        ]

        );

        return response()->json([
            "status" => "success",
            "mensagem" => "Usuário criado com sucesso",
            "nome" => $nome,
            "usuario" => $usuario
        ], 201);
        



    }
}
