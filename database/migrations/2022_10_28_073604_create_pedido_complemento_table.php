<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidoComplementoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido_complemento', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pedido')->unsigned();
            $table->foreign('id_pedido')->references('id')->on('pedidos');
            $table->foreignId('id_complemento')->unsigned();
            $table->foreign('id_complemento')->references('id')->on('complementos');
            $table->integer('cantidad');
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
        Schema::dropIfExists('pedido_complemento');
    }
}
