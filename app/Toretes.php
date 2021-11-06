<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Toretes extends Model
{
    //
    public $timestamps   = false;
    protected $table     = "toretes";
    protected $fillable  = [
        'num_registro', 
        'fecha_nacim', 
        'nombre_torete', 
        'edad_torete', 
        'peso_nacim', 
        'peso_destete', 
        'vaca_id',
        'toro_id',
        'tipo_animal_id'
    ];
}
