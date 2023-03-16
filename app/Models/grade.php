<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class grade extends Model
{
    public function desativarGrade($params){

        $insert = DB::table('grades')
                    ->where('id', $params['id'])
                    ->update(['ativo' => false])
                    ;

        if($insert){
            return $error[]='Grade desativada com sucesso!!';
        }
    }
    public function ativarGrade($params){

        $insert = DB::table('grades')
                    ->where('id', $params['id'])
                    ->update(['ativo' => true])
                    ;

        if($insert){
            return $error[]='Grade ativada com sucesso!!';
        }
    }
    public function deletaGrade($id){

        $insert = DB::table('grade_disciplinas')
                    ->where('idGrade', $id)

                    ->delete()
                    ;
        $insert = DB::table('grades')
                    ->where('id', $id)

                    ->delete()
                    ;


    }
    public function cadastraGrade($params){



            $select = DB::table('grades')
                        ->select('id')
                        ->whereRaw('descricao = ? ', [$params['nome_grade']])->first();
            $insert = null;

            if($select == null){
                $insert = DB::table('grades')
                        ->insert(['descricao' => $params['nome_grade'], 'idCurso' => $params['curso'], 'ativo' => true]);
                $select2 = DB::table('grades')
                        ->select('id')
                        ->whereRaw('descricao = ? ', [$params['nome_grade']])->first();
                foreach($params['lista'] as $disciplina){
                    $insert2 = DB::table('grade_disciplinas')
                        ->insert(['idGrade' => $select2->id, 'idDisciplina' => $disciplina, 'cargaHoraria' => '66']);
                }
            }


            if($insert != null){

                return $error[]='Grade cadastrada com sucesso!!';
            }else{
                return $error[]='Nome de grade ja existe, grade nao cadastrada!!';
            }

    }
    public function atualizaGrade($params){

        $insert = DB::table('grade_disciplinas')
            ->where('idGrade', $params['id'])

            ->delete()
            ;
        $insert = DB::table('grades')
            ->where('id', $params['id'])
            ->update(['descricao' => $params['nome_grade'], 'idCurso' => $params['curso']]);


        foreach($params['lista'] as $disciplina){
            $insert2 = DB::table('grade_disciplinas')
                ->insert(['idGrade' => $params['id'], 'idDisciplina' => $disciplina, 'cargaHoraria' => '66']);
        }



        return $error[]='Grade atualizada com sucesso!!';



    }
    use HasFactory;
}
