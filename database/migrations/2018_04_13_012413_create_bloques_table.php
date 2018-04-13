<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBloquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bloques', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('numero')->nullable();
            $table->integer('id_modulo')->unsigned()->nullable();
            $table->foreign('id_modulo')->references('id')->on('modulos')->onDelete('cascade')->onUpdate('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bloques');
    }
}
