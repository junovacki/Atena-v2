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
        Schema::create('grades', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('idCurso');
            $table->string('descricao');
            $table->boolean('ativo');
            $table->timestamps();

            $table->foreign('idCurso')->references('id')->on('cursos');
        });
        DB::table('grades')->insert(array('idCurso'=>'1','descricao'=>'2023 - Analise de Sistemas','ativo'=>true));

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grades');
    }
};
