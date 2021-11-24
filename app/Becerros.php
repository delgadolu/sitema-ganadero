<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as AuditableTrait;

class Becerros extends Model implements Auditable
{
    use AuditableTrait;

    protected $guarded   = [];
    //
    public $timestamps   = false;
    protected $table     = "becerros";
    protected $fillable  = [
        'num_registro', 
        'fecha_nacim', 
        'nombre_becerro', 
        'edad_becerro', 
        'peso_nacim', 
        'peso_destete', 
        'num_registro_papa',
        'num_registro_mama', 
        'tipo_animal_id',
        'img_becerro',
        'img_padre_becerro',
        'img_madre_becerro',
        'vaca_id',
        'toro_id'
    ];
}
