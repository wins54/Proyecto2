<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle', function (Blueprint $table) {
            $table->increments('iddet');
            $table->integer('ida')->unsigned()->nullable();
            $table->foreign('ida')->references('ida')->on('almacen')->nullable();
            $table->float('cantidade');
            $table->integer('idpe')->unsigned()->nullable();
            $table->foreign('idpe')->references('idpe')->on('pedido')->nullable();
            $table->integer('subtotal')->unsigned()->nullable();
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
        Schema::dropIfExists('detalle');
    }
}
