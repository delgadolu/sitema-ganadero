<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacas extends Model
{
    public $timestamps   = false;
    protected $table     = "Vacas";
    protected $fillable  = [
        'num_registro', 
        'fecha_nacim', 
        'nombre_vaca', 
        'edad_vaca', 
        'peso_nacim', 
        'peso_destete', 
        'peso_pri_servi', 
        'edad_servi',
        'num_partos',
        'hijas_provadas',
        'tipo_animal_id'
    ];
}
