<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVacasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('num_registro');
            $table->string('nombre_vaca');
            $table->Integer('edad_vaca');
            $table->date('fecha_nacim');
            $table->float('peso_nacim');
            $table->float('peso_destete');
            $table->Integer('edad_servi');
            $table->float('peso_primer_servi');
            $table->Integer('num_partos');
            $table->float('hijas_provadas');
            $table->string('num_registro_papa');
            $table->string('num_registro_mama');
            $table->string('img_vaca');
            $table->string('img_padre_vaca');
            $table->string('img_madre_vaca');
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
        Schema::dropIfExists('vacas');
    }
}
