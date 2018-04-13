<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->date('fecha')->nullable();
            $table->double('monto')->nullable();
            $table->integer('id_puesto')->unsigned()->nullable();
            $table->integer('id_vendedor')->unsigned()->nullable();
            $table->integer('id_mes')->unsigned()->nullable();
            $table->integer('id_tipo_venta')->unsigned()->nullable();
            $table->foreign('id_puesto')->references('id')->on('puestos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_vendedor')->references('id')->on('vendedors')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_mes')->references('id')->on('mes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_tipo_venta')->references('id')->on('tipo_ventas')->onDelete('cascade')->onUpdate('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ventas');
    }
}
