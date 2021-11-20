<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduccionLecheTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produccion_leche', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('num_registro');
            $table->string('nombre_vaca');
            $table->Integer('num_partos');
            $table->float('prome_mensu_leche');
            $table->integer('vaca_id')->unsigned();
            $table->foreign('vaca_id')->references('id')->on('vacas');
            $table->enum('status', [1,2,3])->default('1')->comment("1 => Dias, 2 => Mes, 3 => Año");   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produccion_leche');
    }
}
