<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class categoria extends Model
{
    use HasFactory;
    public function desativarCategoria($params){

        $insert = DB::table('categorias')
                    ->where('id', $params['id'])
                    ->update(['ativo' => false])
                    ;

        if($insert){
            return $error[]='Categoria desativada com sucesso!!';
        }
    }
    public function ativarCategoria($params){

        $insert = DB::table('categorias')
                    ->where('id', $params['id'])
                    ->update(['ativo' => true])
                    ;

        if($insert){
            return $error[]='Categoria ativada com sucesso!!';
        }
    }
    public function deletaCategoria($id){

        $insert = DB::table('categorias')
                    ->where('id', $id)

                    ->delete()
                    ;

    }
    public function cadastraCategoria($params){


            $insert = DB::table('categorias')
                        ->insert(['categoria' => $params['nome_categoria'], 'ativo' => true]);

            if($insert){

                return $error[]='Categoria cadastrada com sucesso!!';
            }

    }
    public function atualizaCategoria($params){

        $insert = DB::table('categorias')
                    ->where('id', $params['id'])
                    ->update(['categoria' => $params['nome_categoria']]);

        if($insert){

            return $error[]='Categoria atualizada com sucesso!!';
        }

    }
}
