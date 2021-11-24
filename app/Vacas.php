<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as AuditableTrait;

class Vacas extends Model implements Auditable
{
    use AuditableTrait;

    protected $guarded   = [];
    
    public $timestamps   = false;
    protected $table     = "Vacas";
    protected $fillable  = [
        'num_registro', 
        'fecha_nacim', 
        'nombre_vaca', 
        'edad_vaca',
        'peso_nacim', 
        'peso_destete', 
        'peso_primer_servi', 
        'edad_servi',
        'num_partos',
        'hijas_provadas',
        'num_registro_papa',
        'num_registro_mama', 
        'tipo_animal_id',
        'img_vaca',
        'img_padre_vaca',
        'img_madre_vaca'
    ];
}
