<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido', function (Blueprint $table) {
            $table->increments('idpe');
            $table->integer('idcliente')->nullable();
            $table->foreign('idcliente')->references('idcliente')->on('cliente')->nullable();
            $table->float('totalpe');
            $table->float('saldo');
            $table->integer('idpago')->unsigned()->nullable();
            $table->foreign('idpago')->references('idpago')->on('pago')->nullable();
            $table->integer('cuenta')->nullable();
            $table->integer('cantidadpro')->nullable();
            $table->dateTime('fechaCompra')->nullable();
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
        Schema::dropIfExists('pedido');
    }
}
