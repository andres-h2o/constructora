<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateModulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modulos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('nro')->nullable();
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
        Schema::drop('modulos');
    }
}
