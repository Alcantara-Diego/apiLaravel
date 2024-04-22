<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CrudUsuario;



function definirMaterias($curso, $tipo){

    $tipo =="aluno"? $materiaStatus = "cursando": $materiaStatus = "pendente";

    //Alocar as matérias com base no curso escolhido
    switch ($curso) {  
        case 'frontend':
            $notas = [
                "html" => [0, $materiaStatus],
                "css" => [0, $materiaStatus],
                "javascript" => [0, $materiaStatus],
                "react" => [0, $materiaStatus],
                "bootstrap" => [0, $materiaStatus],
                "json" => [0, $materiaStatus]
            ];

            return array("materias"=> $notas, "codigo"=>200);

        case 'backend':
            $notas = [
                "php" => [0, $materiaStatus],
                "laravel" => [0, $materiaStatus],
                "mysql" => [0, $materiaStatus],
                "validacaoDeDados" => [0, $materiaStatus],
                "arquiteturaMVC" => [0, $materiaStatus],
                "apiRest" => [0, $materiaStatus]
            ];

            return array("materias"=> $notas, "codigo"=>200);

        case 'fullstack':
            $notas = [
                //Frontend
                "html" => [0, $materiaStatus],
                "css" => [0, $materiaStatus],
                "javascript" => [0, $materiaStatus],
                "react" => [0, $materiaStatus],
                "bootstrap" => [0, $materiaStatus],
                "json" => [0, $materiaStatus],
                //Backend
                "php" => [0, $materiaStatus],
                "laravel" => [0, $materiaStatus],
                "mysql" => [0, $materiaStatus],
                "validacaoDeDados" => [0, $materiaStatus],
                "arquiteturaMVC" => [0, $materiaStatus],
                "apiRest" => [0, $materiaStatus]

            ];
            
            return array("materias"=> $notas, "codigo"=>200);

        default:
            return array("materias"=> [], "codigo"=>400);
            
    }


}

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


        $criarBoletim = definirMaterias($curso, $tipo);

        if ($criarBoletim["codigo"] !==200) {

            return response()->json(["status"=>"error", "mensagem"=>"Erro ao gerar boletim do usuário"], 400);

        } else {
            $notas = $criarBoletim["materias"];
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

        //  $usuario = [
        //     "nome" => $nome,
        //     "email" => $email,
        //     "curso" => $curso,
        //     "telefone" => $telefone,
        //     "tipo" => $tipo,
        //     "status" => $status,
        //     "notas" => json_encode($notas)
        // ];

        return response()->json([
            "status" => "success",
            "mensagem" => "Usuário criado com sucesso",
            "usuario" => $usuario
        ], 201);
        



    }
}
