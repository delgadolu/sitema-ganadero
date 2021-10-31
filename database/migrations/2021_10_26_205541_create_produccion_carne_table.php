<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduccionCarneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produccion_carne', function (Blueprint $table) {
            $table->increments('id');
            $table->float('cant_carne');
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
        Schema::dropIfExists('produccion_carne');
    }
}
