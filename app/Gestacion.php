<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gestacion extends Model
{
    //
    protected $table     = "gestacion";
    protected $fillable  = [
        'fecha_gesta', 
        'vaca_id', 
        'toro_id'
    ];
}
