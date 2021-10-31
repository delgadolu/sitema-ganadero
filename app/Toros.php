<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Toros extends Model
{
    //
    protected $table    = "toros";
    protected $fillable = ['num_registro', 'fecha_nacim', 'nombre_toro', 'edad_toro', 'peso_nacim', 'peso_destete', 'peso_saltar', 'desendencia_provadas', 'tipo_animal_id'];
}
