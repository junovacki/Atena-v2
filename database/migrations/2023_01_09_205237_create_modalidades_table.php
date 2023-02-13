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
        Schema::create('modalidades', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('modalidade');
            $table->boolean('ativo');
            $table->timestamps();
        });
        DB::table('modalidades')->insert(array('modalidade'=>'Presencial', 'ativo' => true));
        DB::table('modalidades')->insert(array('modalidade'=>'Ensino A Distância', 'ativo' => true));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modalidades');
    }
};
