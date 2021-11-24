<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as AuditableTrait;

class Becerras extends Model implements Auditable
{
    use AuditableTrait;

    protected $guarded   = [];
    
    protected $table     = "becerras";
    protected $fillable  = [
        'num_registro', 
        'fecha_nacim', 
        'nombre_becerra', 
        'edad_becerra', 
        'peso_nacim', 
        'peso_destete',
        'num_registro_papa',
        'num_registro_mama', 
        'tipo_animal_id',
        'img_becerra',
        'img_padre_becerra',
        'img_madre_becerra', 
        'vaca_id',
        'toro_id'
    ];
}
