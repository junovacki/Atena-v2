<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class disciplina extends Model
{
    public function desativarDisciplina($params){

        $insert = DB::table('disciplinas')
                    ->where('id', $params['id'])
                    ->update(['ativo' => false])
                    ;

        if($insert){
            return $error[]='Disciplina desativada com sucesso!!';
        }
    }
    public function ativarDisciplina($params){

        $insert = DB::table('disciplinas')
                    ->where('id', $params['id'])
                    ->update(['ativo' => true])
                    ;

        if($insert){
            return $error[]='Disciplina ativada com sucesso!!';
        }
    }
    public function deletaDisciplina($id){

        $insert = DB::table('disciplinas')
                    ->where('id', $id)

                    ->delete()
                    ;

    }
    public function cadastraDisciplina($params){


            $insert = DB::table('disciplinas')
                        ->insert(['nome_disciplina' => $params['nome_disciplina'], 'ativo' => true]);

            if($insert){

                return $error[]='Disciplina cadastrada com sucesso!!';
            }

    }
    public function atualizaDisciplina($params){

        $insert = DB::table('disciplinas')
                    ->where('id', $params['id'])
                    ->update(['nome_disciplina' => $params['nome_disciplina']]);

        if($insert){

            return $error[]='Disciplina atualizada com sucesso!!';
        }

    }
    use HasFactory;
}
