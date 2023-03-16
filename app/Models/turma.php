<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class turma extends Model
{
    public function desativarTurma($params){

        $insert = DB::table('turmas')
                    ->where('id', $params['id'])
                    ->update(['ativo' => false])
                    ;

        if($insert){
            return $error[]='Turma desativada com sucesso!!';
        }
    }
    public function ativarTurma($params){

        $insert = DB::table('turmas')
                    ->where('id', $params['id'])
                    ->update(['ativo' => true])
                    ;

        if($insert){
            return $error[]='Turma ativada com sucesso!!';
        }
    }
    public function deletaTurma($id){

        $insert = DB::table('turmas')
                    ->where('id', $id)

                    ->delete()
                    ;

    }
    public function cadastraTurma($params){


            $insert = DB::table('turmas')
                        ->insert(['idGrade'=>$params['grade'],'descricao'=>$params['descricao'],'serie'=>$params['serie'],'ano'=>$params['ano'],'semestre'=>$params['semestre'],'ativo'=>true]);

            if($insert){

                return $error[]='Turma cadastrada com sucesso!!';
            }

    }
    public function atualizaTurma($params){

        $insert = DB::table('turmas')
                    ->where('id', $params['id'])
                    ->update(['idGrade'=>$params['grade'],'descricao'=>$params['descricao'],'serie'=>$params['serie'],'ano'=>$params['ano'],'semestre'=>$params['semestre']]);

        if($insert){

            return $error[]='Turma atualizada com sucesso!!';
        }

    }
    public function vincularAlunos($params){
        $insert = DB::table('aluno_turmas')
                    ->where('idTurma', $params['id'])

                    ->delete()
                    ;

        foreach ($params['lista'] as $key => $lista) {
            $insert = DB::table('aluno_turmas')
                        ->insert(['idTurma'=>$params['id'],'idAluno'=>$lista]);
        }

        if($insert){

            return $error[]='Alunos vinculados com sucesso!!';
        }

    }
    use HasFactory;
}
