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
        Schema::create('categorias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('categoria');
            $table->boolean('ativo');
            $table->timestamps();
        });
        DB::table('categorias')->insert(array('categoria'=>'Exatas', 'ativo' => true));
        DB::table('categorias')->insert(array('categoria'=>'Humanas', 'ativo' => true));
        DB::table('categorias')->insert(array('categoria'=>'Biológicas', 'ativo' => true));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categorias');
    }
};
