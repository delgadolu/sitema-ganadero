<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nobillas extends Model
{
    //
    public $timestamps   = false;
    protected $table     = "nobillas";
    protected $fillable  = [
        'num_registro', 
        'fecha_nacim', 
        'nombre_nobilla', 
        'edad_nobilla', 
        'peso_nacim', 
        'peso_destete', 
        'vaca_id',
        'toro_id',
        'tipo_animal_id'
    ];
}
