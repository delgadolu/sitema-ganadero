<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoAnimal extends Model
{
    protected $table     = "tipo_animal";
    protected $fillable  = ["descripcion"];
}
