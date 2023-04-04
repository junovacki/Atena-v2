<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Barryvdh\DomPDF\Facade\Pdf;

class prova extends Model
{
    use HasFactory;
    public function atribuirAcertos($params){
        foreach ($params['alunos_respostas'] as $value) {
            $select = DB::table('prova_alunos')
        ->whereRaw('idProva = ? and idAluno = ? ', [$params['id_prova'],$value['idALuno']])->first();
        if($select->quantidadeAcerto != $value['acertos']){
            $insert = DB::table('prova_alunos')
            ->where('idProva', $params['id_prova'])
            ->where('idAluno', $value['idALuno'])
            ->update(['quantidadeAcerto' => $value['acertos']])
            ;
        }

        }

        return $error[]='Acertos atribuidos com sucesso!!';



    }

    public function desativarProva($params){

        $insert = DB::table('provas')
                    ->where('id', $params['id'])
                    ->update(['ativo' => false])
                    ;

        if($insert){
            return $error[]='Prova desativada com sucesso!!';
        }
    }
    public function ativarProva($params){

        $insert = DB::table('provas')
                    ->where('id', $params['id'])
                    ->update(['ativo' => true])
                    ;

        if($insert){
            return $error[]='Prova ativada com sucesso!!';
        }
    }
    public function deletaProva($id){

        $insert = DB::table('prova_alunos')
                    ->where('idProva', $id)
                    ->delete();
        $insert = DB::table('turma_provas')
        ->where('idProva', $id)
        ->delete();
        $insert = DB::table('prova_perguntas')
        ->where('idProva', $id)
        ->delete();
        $insert = DB::table('provas')
        ->where('id', $id)
        ->delete();

    }
    public function cadastraProva($params){

        $select = DB::table('provas')
        ->whereRaw('descricao = ? ', [$params['nome_prova']])->first();
        if($select == null){
            $insert = DB::table('provas')
            ->insert(['descricao' => $params['nome_prova'], 'dataProva' => $params['data'], 'ativo' => true]);
            $select = DB::table('provas')
                ->whereRaw('descricao = ? ', [$params['nome_prova']])->first();
            foreach($params['perguntas'] as $perguntas){
                $insert = DB::table('prova_perguntas')
                ->insert(['idPergunta' => $perguntas, 'idProva' => $select->id]);
            }
            $insert = DB::table('turma_provas')
                ->insert(['idTurma' => $params['turma'], 'idProva' => $select->id]);
            $select2 = DB::table('aluno_turmas')
                ->select('idAluno')
                ->whereRaw('idTurma = ? ', [$params['turma']])->get();
            foreach($select2 as $alunos){
                $insert = DB::table('prova_alunos')
                ->insert(['idAluno' => $alunos->idAluno, 'idProva' => $select->id, 'idTurma' => $params['turma'], 'presente' => true, 'quantidadeAcerto'=> '0']);
            }
            return $error[]='Prova cadastrada com sucesso!!';

        }else{
            return $error[]='Nome de prova ja cadastrada!!';
        }


    }
    public function atualizaProva($params){

        $insert = DB::table('prova_alunos')
                    ->where('idProva', $params['id_prova'])
                    ->delete();
        $insert = DB::table('turma_provas')
        ->where('idProva', $params['id_prova'])
        ->delete();
        $insert = DB::table('prova_perguntas')
        ->where('idProva', $params['id_prova'])
        ->delete();
        $insert = DB::table('provas')
        ->where('id', $params['id_prova'])
        ->delete();
        $insert = DB::table('provas')
            ->insert(['descricao' => $params['nome_prova'], 'dataProva' => $params['data'], 'ativo' => true]);
            $select = DB::table('provas')
                ->whereRaw('descricao = ? ', [$params['nome_prova']])->first();
            foreach($params['perguntas'] as $perguntas){
                $insert = DB::table('prova_perguntas')
                ->insert(['idPergunta' => $perguntas, 'idProva' => $select->id]);
            }
            $insert = DB::table('turma_provas')
                ->insert(['idTurma' => $params['turma'], 'idProva' => $select->id]);
            $select2 = DB::table('aluno_turmas')
                ->select('idAluno')
                ->whereRaw('idTurma = ? ', [$params['turma']])->get();
            foreach($select2 as $alunos){
                $insert = DB::table('prova_alunos')
                ->insert(['idAluno' => $alunos->idAluno, 'idProva' => $select->id, 'idTurma' => $params['turma'], 'presente' => true, 'quantidadeAcerto'=> '0']);
            }
            return $error[]='Prova atualizada com sucesso!!';

    }
}
