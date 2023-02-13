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
        Schema::create('alunos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->string('cpf');
            $table->string('rg');
            $table->string('endereco');
            $table->string('telefone');
            $table->string('email');
            $table->string('ra');
            $table->boolean('ativo');
            $table->timestamps();
        });

        DB::table('alunos')->insert(array('nome'=>'teste', 'cpf'=>'000.111.222-33', 'rg'=>'00.111.222-3','telefone'=>'41 99999-8888','endereco'=>'rua batavo','email'=>'teste@gmail.com','ra'=>'52289850', 'ativo'=> true));

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alunos');
    }
};
