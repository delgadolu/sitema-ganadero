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
        'peso_nacim', 
        'peso_destete', 
        'peso_primer_servi', 
        'edad_servi',
        'num_partos',
        'hijas_provadas',
        'tipo_animal_id'
    ];
}
