<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBloqueosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bloqueos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->date('estado')->nullable();
            $table->integer('id_puesto')->unsigned()->nullable();
            $table->integer('id_vendedor')->unsigned()->nullable();
            $table->foreign('id_puesto')->references('id')->on('puestos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_vendedor')->references('id')->on('vendedors')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bloqueos');
    }
}
