<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as AuditableTrait;

class Mautas extends Model implements Auditable
{
    use AuditableTrait;

    protected $guarded   = [];
    
    public $timestamps   = false;
    protected $table     = "mautas";
    protected $fillable  = [
        'num_registro', 
        'fecha_nacim', 
        'nombre_mauta', 
        'edad_mauta', 
        'peso_nacim', 
        'peso_destete', 
        'num_registro_papa',
        'num_registro_mama', 
        'tipo_animal_id',
        'img_mauta',
        'img_padre_mauta',
        'img_madre_mauta',
        'vaca_id',
        'toro_id'
    ];
}
