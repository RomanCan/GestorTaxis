<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Destino extends Model
{
    //
    protected $table='destinos';
    protected $primaryKey='id_destino';
    public $timestamps=false;
    public $fillable=[
    	// 'id_destino',
    	'nombre',
    	'precio'
    ];
}
