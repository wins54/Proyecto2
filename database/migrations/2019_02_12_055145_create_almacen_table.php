<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlmacenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('almacen', function (Blueprint $table) {
            $table->increments('ida');
             $table->integer('idp')->unsigned()->nullable();
            $table->foreign('idp')->references('idp')->on('producto')->nullable();
            $table->integer('idt')->unsigned()->nullable();
            $table->foreign('idt')->references('idt')->on('talla')->nullable();
            $table->integer('cantidad');
            $table->boolean('estadoDep', true);
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
        Schema::dropIfExists('almacen');
    }
}
