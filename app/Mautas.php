<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mautas extends Model
{
    //
    public $timestamps   = false;
    protected $table     = "mautas";
    protected $fillable  = [
        'num_registro', 
        'fecha_nacim', 
        'nombre_mauta', 
        'edad_mauta', 
        'peso_nacim', 
        'peso_destete', 
        'vaca_id',
        'toro_id',
        'tipo_animal_id'
    ];
}
