<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Becerras extends Model
{
    //
    protected $table     = "becerras";
    protected $fillable  = [
        'num_registro', 
        'fecha_nacim', 
        'nombre_becerra', 
        'edad_becerra', 
        'peso_nacim', 
        'peso_destete', 
        'vaca_id',
        'toro_id',
        'tipo_animal_id'
    ];
}
