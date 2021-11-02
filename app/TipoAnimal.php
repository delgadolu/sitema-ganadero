<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoAnimal extends Model
{
    public $timestamps   = false;
    protected $table     = "tipo_animal";
    protected $fillable  = ["descripcion"];
}
