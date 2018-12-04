<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDespesaFuturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('despesa_futuras', function (Blueprint $table) {
            $table->increments('id');
            $table->date('data_efetiva')->nullable();
            $table->date('data_finalizacao')->nullable();
            $table->integer('despesa_id')->unsigned();
            $table->foreign('despesa_id')->references('id')->on('despesas');
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
        Schema::dropIfExists('despesa_futuras');
    }
}
