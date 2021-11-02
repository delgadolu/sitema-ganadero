<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Becerros extends Model
{
    //
    protected $table     = "becerros";
    protected $fillable  = [
        'num_registro', 
        'fecha_nacim', 
        'nombre_becerro', 
        'edad_becerro', 
        'peso_nacim', 
        'peso_destete', 
        'vaca_id',
        'toro_id',
        'tipo_animal_id'
    ];
}
