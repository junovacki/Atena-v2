<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class curso extends Model
{
    use HasFactory;
    public function desativarCurso($params){

        $insert = DB::table('cursos')
                    ->where('id', $params['id'])
                    ->update(['ativo' => false])
                    ;

        if($insert){
            return $error[]='Curso desativado com sucesso!!';
        }
    }
    public function ativarCurso($params){

        $insert = DB::table('cursos')
                    ->where('id', $params['id'])
                    ->update(['ativo' => true])
                    ;

        if($insert){
            return $error[]='Curso ativado com sucesso!!';
        }
    }
    public function deletaCurso($id){

        $insert = DB::table('cursos')
                    ->where('id', $id)

                    ->delete()
                    ;

    }
    public function cadastraCurso($params){


            $insert = DB::table('cursos')
                        ->insert(['nome_curso' => $params['nome_curso'],'idModalidade' => $params['modalidade'],'idCategoria' => $params['categoria'], 'idTurno' => $params['turno'], 'ativo' => true]);

            if($insert){

                return $error[]='Curso cadastrado com sucesso!!';
            }

    }
    public function atualizaCurso($params){

        $insert = DB::table('cursos')
                    ->where('id', $params['id'])
                    ->update(['nome_curso' => $params['nome_curso'],'idModalidade' => $params['modalidade'],'idCategoria' => $params['categoria'], 'idTurno' => $params['turno']]);

        if($insert){

            return $error[]='Curso atualizado com sucesso!!';
        }

    }
}
