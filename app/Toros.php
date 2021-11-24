<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as AuditableTrait;

class Toros extends Model implements Auditable
{
    use AuditableTrait;

    protected $guarded   = [];
    
    public $timestamps   = false;
    protected $table     = "toros";
    protected $fillable  = [
        'num_registro', 
        'fecha_nacim', 
        'nombre_toro', 
        'edad_toro', 
        'peso_nacim', 
        'peso_destete', 
        'peso_inclu_servi', 
        'hijas_provadas',
        'num_registro_papa',
        'num_registro_mama', 
        'tipo_animal_id',
        'img_toro',
        'img_padre_toro',
        'img_madre_toro'
    ];
}
