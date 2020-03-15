<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    //
    protected $table='registro';
    protected $primatyKey='id_registro';
    protected $with=['pasajes','destinos'];
    public $timestamps=false;
    public $fillable=[
    	'id_registro',
    	// 'cantidad_p',
    	'id_pasaje',
    	'id_destino'
    ];

    public function pasajes(){
    	return $this->belongsTo(Pasaje::class,'id_pasaje','id_pasaje');
    }
    public function destinos(){
    	return $this->belongsTo(Destino::clas,'id_destino','id_destino');
    }
}
