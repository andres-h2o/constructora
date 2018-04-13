<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->double('ventas_contado')->nullable();
            $table->double('monto_ventas_contado')->nullable();
            $table->double('ventas_credito')->nullable();
            $table->double('monto_ventas_credito')->nullable();
            $table->integer('nro_reservas')->nullable();
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_cierre')->nullable();
            $table->integer('estado')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('mes');
    }
}
