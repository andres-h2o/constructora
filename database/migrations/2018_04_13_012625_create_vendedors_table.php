<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVendedorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendedors', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nombre')->nullable();
            $table->integer('telefono')->nullable();
            $table->string('direccion')->nullable();
            $table->integer('estado')->nullable();
            $table->integer('codigo')->nullable();
            $table->string('ci')->nullable();
            $table->integer('id_grupo')->unsigned()->nullable();
            $table->foreign('id_grupo')->references('id')->on('grupos')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('vendedors');
    }
}
