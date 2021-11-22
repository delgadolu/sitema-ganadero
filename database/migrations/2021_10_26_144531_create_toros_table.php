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
            $table->float('peso_inclu_servi');
            $table->float('hijas_provadas');
            $table->string('num_registro_papa');
            $table->string('num_registro_mama');
            $table->string('img_toro')->nullable();
            $table->string('img_padre_toro')->nullable();
            $table->string('img_madre_toro')->nullable();
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
