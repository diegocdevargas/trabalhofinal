<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceitaFuturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receita_futuras', function (Blueprint $table) {
            $table->increments('id');
            $table->date('data_efetiva')->nullable();
            $table->date('data_finalizacao')->nullable();
            $table->integer('receita_id')->unsigned();
            $table->foreign('receita_id')->references('id')->on('receitas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('receita_futuras');
    }
}
