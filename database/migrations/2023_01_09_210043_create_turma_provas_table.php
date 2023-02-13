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
        Schema::create('turma_provas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('idProva');
            $table->unsignedBigInteger('idTurma');
            $table->timestamps();

            $table->foreign('idProva')->references('id')->on('provas');
            $table->foreign('idTurma')->references('id')->on('turmas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('turma_provas');
    }
};
