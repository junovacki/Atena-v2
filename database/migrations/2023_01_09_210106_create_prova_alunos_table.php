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
        Schema::create('prova_alunos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('idAluno');
            $table->unsignedBigInteger('idTurma');
            $table->unsignedBigInteger('idUser');
            $table->unsignedBigInteger('idProva');
            $table->boolean('presente');
            $table->string('quantidadeAcerto');
            $table->timestamps();

            $table->foreign('idAluno')->references('id')->on('alunos');
            $table->foreign('idTurma')->references('id')->on('turmas');
            $table->foreign('idUser')->references('id')->on('users');
            $table->foreign('idProva')->references('id')->on('provas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prova_alunos');
    }
};
