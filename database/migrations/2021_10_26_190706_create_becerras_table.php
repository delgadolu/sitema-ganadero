<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBecerrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('becerras', function (Blueprint $table) {
            $table->increments('id');
            $table->string('num_registro');
            $table->string('nombre_becerra');
            $table->integer('edad_becerro');
            $table->date('fecha_nacim');
            $table->float('peso_nacim');
            $table->float('peso_destete');
            $table->string('num_registro_papa');
            $table->string('num_registro_mama');
            $table->string('img_becerra');
            $table->string('img_padre_becerra');
            $table->string('img_madre_becerra');
            $table->integer('vaca_id')->unsigned();
            $table->foreign('vaca_id')->references('id')->on('vacas');
            $table->integer('toro_id')->unsigned();
            $table->foreign('toro_id')->references('id')->on('toros'); 
            $table->integer('tipo_animal_id')->unsigned();
            $table->foreign('tipo_animal_id')->references('id')->on('tipo_animal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('becerras');
    }
}

