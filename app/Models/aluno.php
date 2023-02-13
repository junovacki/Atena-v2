<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class aluno extends Model
{
    use HasFactory;
    public function desativarAluno($params){

        $insert = DB::table('alunos')
                    ->where('id', $params['id'])
                    ->update(['ativo' => false])
                    ;

        if($insert){
            return $error[]='Aluno desativado com sucesso!!';
        }
    }
    public function ativarAluno($params){

        $insert = DB::table('alunos')
                    ->where('id', $params['id'])
                    ->update(['ativo' => true])
                    ;

        if($insert){
            return $error[]='Aluno ativado com sucesso!!';
        }
    }
    public function deletaAluno($id){

        $insert = DB::table('Alunos')
                    ->where('id', $id)

                    ->delete()
                    ;

    }
    public function cadastraAluno($params){


            $insert = DB::table('alunos')
                        ->insert(['nome' => $params['nome_aluno'],'cpf' => $params['cpf_aluno'],'rg' => $params['rg_aluno'], 'telefone' => $params['telefone_aluno'],'endereco' => $params['endereco_aluno'],'email' => $params['email_aluno'],'ra' => $params['ra_aluno'], 'ativo' => true]);

            if($insert){

                return $error[]='Aluno cadastrado com sucesso!!';
            }

    }
    public function atualizaAluno($params){

        $insert = DB::table('alunos')
                    ->where('id', $params['id'])
                    ->update(['nome' => $params['nome_aluno'],'cpf' => $params['cpf_aluno'],'rg' => $params['rg_aluno'], 'telefone' => $params['telefone_aluno'],'endereco' => $params['endereco_aluno'],'email' => $params['email_aluno'],'ra' => $params['ra_aluno']]);

        if($insert){

            return $error[]='Aluno atualizado com sucesso!!';
        }

    }
}
