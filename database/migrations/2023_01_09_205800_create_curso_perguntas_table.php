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
        Schema::create('curso_perguntas', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('idCurso');
            $table->unsignedBigInteger('idPergunta');

            $table->foreign('idCurso')->references('id')->on('cursos');
            $table->foreign('idPergunta')->references('id')->on('perguntas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('curso_perguntas');
    }
};
