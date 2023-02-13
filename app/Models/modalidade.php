<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class modalidade extends Model
{
    use HasFactory;
    public function desativarModalidade($params){

        $insert = DB::table('modalidades')
                    ->where('id', $params['id'])
                    ->update(['ativo' => false])
                    ;

        if($insert){
            return $error[]='Modalidade desativada com sucesso!!';
        }
    }
    public function ativarModalidade($params){

        $insert = DB::table('modalidades')
                    ->where('id', $params['id'])
                    ->update(['ativo' => true])
                    ;

        if($insert){
            return $error[]='Modalidade ativada com sucesso!!';
        }
    }
    public function deletaModalidade($id){

        $insert = DB::table('modalidades')
                    ->where('id', $id)

                    ->delete()
                    ;

    }
    public function cadastraModalidade($params){


            $insert = DB::table('modalidades')
                        ->insert(['modalidade' => $params['nome_modalidade'], 'ativo' => true]);

            if($insert){

                return $error[]='Modalidade cadastrada com sucesso!!';
            }

    }
    public function atualizaModalidade($params){

        $insert = DB::table('modalidades')
                    ->where('id', $params['id'])
                    ->update(['modalidade' => $params['nome_modalidade']]);

        if($insert){

            return $error[]='Modalidade atualizada com sucesso!!';
        }

    }
}
