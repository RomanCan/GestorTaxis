<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasaje extends Model
{
    //
    protected $table='pasajes_fijos';
    protected $primaryKey='id_pasaje';
    protected $with=['destinos'];
    public $timestamps=false;
    public $fillable=[
    	'nombre',
    	'id_destino',
    	'fecha',
    	'hora'
    ];

    public function destinos(){
        return $this->belongsTo(Destino::class,'id_destino','id_destino');
    }
}
