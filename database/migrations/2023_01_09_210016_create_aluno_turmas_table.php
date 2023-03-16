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
        Schema::create('aluno_turmas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('idAluno');
            $table->unsignedBigInteger('idTurma');
            $table->timestamps();

            $table->foreign('idAluno')->references('id')->on('alunos');
            $table->foreign('idTurma')->references('id')->on('turmas');
        });
        DB::table('aluno_turmas')->insert(array('idAluno'=>'1','idTurma'=>'1'));

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grade_disciplinas');
    }
};
