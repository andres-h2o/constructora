<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePuestosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('puestos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('nro')->nullable();
            $table->double('largo')->nullable();
            $table->double('ancho')->nullable();
            $table->double('latitud')->nullable();
            $table->double('longitud')->nullable();
            $table->string('estado')->nullable();
            $table->integer('id_bloque')->unsigned();
            $table->integer('id_categoria')->unsigned()->nullable();
            $table->foreign('id_bloque')->references('id')->on('bloques')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_categoria')->references('id')->on('categorias')->onDelete('cascade')->onUpdate('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('puestos');
    }
}
