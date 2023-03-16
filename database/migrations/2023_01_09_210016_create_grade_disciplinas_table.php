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
        Schema::create('grade_disciplinas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('idDisciplina');
            $table->unsignedBigInteger('idGrade');
            $table->string('cargaHoraria');
            $table->timestamps();

            $table->foreign('idDisciplina')->references('id')->on('disciplinas');
            $table->foreign('idGrade')->references('id')->on('grades');
        });
        DB::table('grade_disciplinas')->insert(array('idGrade'=>'1','idDisciplina'=>'1','cargaHoraria'=>'66'));

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
