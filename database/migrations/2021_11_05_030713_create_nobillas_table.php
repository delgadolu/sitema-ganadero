<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNobillasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('novillas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('num_registro');
            $table->string('nombre_novilla');
            $table->integer('edad_novilla');
            $table->date('fecha_nacim');
            $table->float('peso_nacim');
            $table->float('peso_destete');
            $table->string('num_registro_papa');
            $table->string('num_registro_mama');
            $table->string('img_novilla');
            $table->string('img_padre_novilla');
            $table->string('img_madre_novilla');
            $table->integer('vaca_id')->unsigned();
            $table->foreign('vaca_id')->references('id')->on('vacas');
            $table->integer('toro_id')->unsigned();
            $table->foreign('toro_id')->references('id')->on('toros');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('novillas');
    }
}
