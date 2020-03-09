<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarrinhosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carrinhos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_usuario')->length(10);
            $table->date('data_compra');
            $table->boolean('compra_finalizada')->nullable();
            $table->boolean('compra_aprovada')->nullable();
            $table->double('valor')->nullable();
            $table->string('forma_pagamento')->nullable();
            $table->string('observacao')->nullable();
            $table->double('troco')->nullable();
            $table->timestamps();

            $table->foreign('id_usuario')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carrinhos');
    }
}
