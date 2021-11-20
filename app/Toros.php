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
        'peso_inclu_servi', 
        'hijas_provadas',
        'num_registro_papa',
        'num_registro_mama', 
        'tipo_animal_id'
    ];
}
