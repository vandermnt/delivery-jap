<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComprasTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('compras', function (Blueprint $table) {
      $table->increments('id');
      $table->unsignedInteger('carrinho_id')->nullable();;
      $table->unsignedInteger('produto_id')->nullable();;
      $table->integer('qtde_produto');
      $table->timestamps();


    });
    Schema::table('compras', function (Blueprint $table) {
      $table->foreign('produto_id')->references('id')->on('produtos');
      $table->foreign('carrinho_id')->references('id')->on('carrinhos');
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down(){
    Schema::dropIfExists('compras');
  }
}
