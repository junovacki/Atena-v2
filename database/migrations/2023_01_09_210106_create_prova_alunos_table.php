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
            $table->unsignedBigInteger('idProva');
            $table->boolean('presente');
            $table->string('quantidadeAcerto');
            $table->timestamps();

            $table->foreign('idAluno')->references('id')->on('alunos');
            $table->foreign('idTurma')->references('id')->on('turmas');
            $table->foreign('idProva')->references('id')->on('provas');
        });
        DB::table('prova_alunos')->insert(array('idAluno'=>'1','idTurma'=>'1','idProva'=>'1','presente'=>true,'quantidadeAcerto'=>'1'));

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
