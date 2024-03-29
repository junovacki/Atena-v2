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
            $table->unsignedBigInteger('idGrade');
            $table->string('descricao');
            $table->string('serie');
            $table->string('ano');
            $table->string('semestre');
            $table->boolean('ativo');
            $table->timestamps();

            $table->foreign('idGrade')->references('id')->on('grades');



        });
        DB::table('turmas')->insert(array('idGrade'=>'1','descricao'=>'Analise de Sistemas','serie'=>'5','ano'=>'2','semestre'=>'1','ativo'=>true));

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
