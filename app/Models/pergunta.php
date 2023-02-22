<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class pergunta extends Model
{
    public function deletaPergunta($id){

        $insert = DB::table('perguntas')
                    ->where('id', $id)

                    ->delete()
                    ;

    }
    public function cadastraPergunta($params){


            $insert = DB::table('perguntas')
                        ->insert(['criado_por' => $params['nome_usuario'],'texto_pergunta' => $params['texto_pergunta'],'idCurso' => $params['curso'], 'idDisciplina' => $params['disciplina'], 'texto_resposta_a' => $params['texto_resposta_a'],'texto_resposta_b' => $params['texto_resposta_b'],'texto_resposta_c' => $params['texto_resposta_c'],'texto_resposta_d' => $params['texto_resposta_d'],'texto_resposta_e' => $params['texto_resposta_e'],'alternativa_a' => $params['alternativa_a'],'alternativa_b' => $params['alternativa_b'],'alternativa_c' => $params['alternativa_c'],'alternativa_d' => $params['alternativa_d'],'alternativa_e' => $params['alternativa_e']]);

            if($insert){

                return $error[]='Pergunta cadastrado com sucesso!!';
            }

    }
    public function atualizaPergunta($params){

        $insert = DB::table('perguntas')
                    ->where('id', $params['id'])
                    ->update(['criado_por' => $params['nome_usuario'],'texto_pergunta' => $params['texto_pergunta'],'idCurso' => $params['curso'], 'idDisciplina' => $params['disciplina'], 'texto_resposta_a' => $params['texto_resposta_a'],'texto_resposta_b' => $params['texto_resposta_b'],'texto_resposta_c' => $params['texto_resposta_c'],'texto_resposta_d' => $params['texto_resposta_d'],'texto_resposta_e' => $params['texto_resposta_e'],'alternativa_a' => $params['alternativa_a'],'alternativa_b' => $params['alternativa_b'],'alternativa_c' => $params['alternativa_c'],'alternativa_d' => $params['alternativa_d'],'alternativa_e' => $params['alternativa_e']]);

        if($insert){

            return $error[]='Pergunta atualizada com sucesso!!';
        }

    }
    use HasFactory;
}
