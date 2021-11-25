<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as AuditableTrait;

class Nobillas extends Model implements Auditable
{
    use AuditableTrait;

    protected $guarded   = [];
    //
    public $timestamps   = false;
    protected $table     = "nobillas";
    protected $fillable  = [
        'num_registro', 
        'fecha_nacim', 
        'nombre_nobilla', 
        'edad_nobilla', 
        'peso_nacim', 
        'peso_destete', 
        'num_registro_papa',
        'num_registro_mama', 
        'tipo_animal_id',
        'img_nobilla',
        'img_padre_nobilla',
        'img_madre_nobilla',
        'vaca_id',
        'toro_id'
    ];
}
