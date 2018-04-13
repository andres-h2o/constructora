<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->date('fecha')->nullable();
            $table->double('monto')->nullable();
            $table->date('fecha_fin')->nullable();
            $table->integer('dias')->nullable();
            $table->integer('id_puesto')->unsigned()->nullable();
            $table->integer('id_vendedor')->unsigned()->nullable();
            $table->integer('id_tipoReserva')->unsigned()->nullable();
            $table->integer('id_mes')->unsigned()->nullable();
            $table->foreign('id_puesto')->references('id')->on('puestos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_vendedor')->references('id')->on('vendedors')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_tipoReserva')->references('id')->on('tipo_reservas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_mes')->references('id')->on('mes')->onDelete('cascade')->onUpdate('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('reservas');
    }
}
