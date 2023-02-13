<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aluno_cursos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('idCurso');
            $table->unsignedBigInteger('idAluno');
            $table->unsignedBigInteger('idSituacaoMatricula');
            $table->timestamps();

            $table->foreign('idCurso')->references('id')->on('cursos');
            $table->foreign('idAluno')->references('id')->on('alunos');
            $table->foreign('idSituacaoMatricula')->references('id')->on('situacao_matriculas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aluno_cursos');
    }
};
