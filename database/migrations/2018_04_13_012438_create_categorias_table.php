<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nombre')->nullable();
            $table->string('color')->nullable();
            $table->double('precio')->nullable();
            $table->double('cuota_inicial')->nullable();
            $table->double('cuota_mensual')->nullable();
            $table->integer('plazo_meses')->nullable();
            $table->integer('id_proyecto')->unsigned()->nullable();
            $table->foreign('id_proyecto')->references('id')->on('proyectos')->onDelete('cascade')->onUpdate('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('categorias');
    }
}
