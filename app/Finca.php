<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Finca extends Model
{
    //
    protected $table     = "finca";
    protected $fillable  = [
        'nombre', 
        'cant_metros', 
        'total_animales', 
        'pasto_usado'
    ];
}
