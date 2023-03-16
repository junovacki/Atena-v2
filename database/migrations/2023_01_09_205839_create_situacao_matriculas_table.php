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
        Schema::create('situacao_matriculas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('descricao');
            $table->timestamps();
        });

        DB::table('situacao_matriculas')->insert(array('descricao'=>'ativa'));
        DB::table('situacao_matriculas')->insert(array('descricao'=>'fechada'));
        DB::table('situacao_matriculas')->insert(array('descricao'=>'inadimplente'));

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('situacao_matriculas');
    }
};
