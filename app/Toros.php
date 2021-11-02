<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Toros extends Model
{
    public $timestamps   = false;
    protected $table     = "toros";
    protected $fillable  = [
        'num_registro', 
        'fecha_nacim', 
        'nombre_toro', 
        'edad_toro', 
        'peso_nacim', 
        'peso_destete', 
        'peso_saltar', 
        'hijas_provadas', 
        'tipo_animal_id'
    ];
}
