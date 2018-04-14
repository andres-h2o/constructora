<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGruposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nombre')->nullable();
            $table->string('detalle')->nullable();
            $table->integer('id_proyecto')->unsigned();
            $table->integer('id_coordinador')->unsigned();
            $table->foreign('id_proyecto')->references('id')->on('proyectos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_coordinador')->references('id')->on('coordinadors')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('grupos');
    }
}
