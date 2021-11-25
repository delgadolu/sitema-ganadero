<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as AuditableTrait;

class Toretes extends Model implements Auditable
{
    use AuditableTrait;

    protected $guarded   = [];
    
    public $timestamps   = false;
    protected $table     = "toretes";
    protected $fillable  = [
        'num_registro', 
        'fecha_nacim', 
        'nombre_torete', 
        'edad_torete', 
        'peso_nacim', 
        'peso_destete', 
        'num_registro_papa',
        'num_registro_mama', 
        'tipo_animal_id',
        'img_torete',
        'img_padre_torete',
        'img_madre_torete',
        'vaca_id',
        'toro_id'
    ];
}
