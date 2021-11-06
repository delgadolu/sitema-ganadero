<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sanidad extends Model
{
    //
    protected $table     = "sanidad";
    protected $fillable  = [
        'fecha', 
        'nombre_medica', 
        'descripcion' 
    ];
}
