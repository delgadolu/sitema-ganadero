<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTorosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('toros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('num_registro');
            $table->date('fecha_nacim');
            $table->string('nombre_toro');
            $table->integer('edad_toro');
            $table->float('peso_nacim');
            $table->float('peso_destete');
            $table->float('peso_saltar');
            $table->float('desendencia_provadas');
            $table->integer('tipo_animal_id')->unsigned();
            $table->foreign('tipo_animal_id')->references('id')->on('tipo_animal');
            //$table->foreignId('id_tipo')->constrained('tipo_animal')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('toros');
    }
}
