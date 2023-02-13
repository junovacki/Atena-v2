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
        Schema::create('turmas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('idDisciplina');
            $table->unsignedBigInteger('idGrade');
            $table->unsignedBigInteger('idUser');
            $table->string('descricao');
            $table->string('serie');
            $table->string('ano');
            $table->string('semestre');
            $table->boolean('ativo');
            $table->timestamps();

            $table->foreign('idDisciplina')->references('id')->on('disciplinas');
            $table->foreign('idGrade')->references('id')->on('grades');
            $table->foreign('idUser')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('turmas');
    }
};
