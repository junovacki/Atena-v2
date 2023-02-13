<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class turno extends Model
{
    use HasFactory;
    public function desativarTurno($params){

        $insert = DB::table('turnos')
                    ->where('id', $params['id'])
                    ->update(['ativo' => false])
                    ;

        if($insert){
            return $error[]='Turno desativado com sucesso!!';
        }
    }
    public function ativarTurno($params){

        $insert = DB::table('turnos')
                    ->where('id', $params['id'])
                    ->update(['ativo' => true])
                    ;

        if($insert){
            return $error[]='Turno ativado com sucesso!!';
        }
    }
    public function deletaTurno($id){

        $insert = DB::table('turnos')
                    ->where('id', $id)

                    ->delete()
                    ;

    }
    public function cadastraTurno($params){


            $insert = DB::table('turnos')
                        ->insert(['turno' => $params['nome_turno'], 'ativo' => true]);

            if($insert){

                return $error[]='Turno cadastrado com sucesso!!';
            }

    }
    public function atualizaTurno($params){

        $insert = DB::table('turnos')
                    ->where('id', $params['id'])
                    ->update(['turno' => $params['nome_turno']]);

        if($insert){

            return $error[]='Turno atualizado com sucesso!!';
        }

    }
}
