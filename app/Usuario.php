<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    //
    protected $table='usuarios';
   	protected $primaryKey = 'id_usuario';
   	protected $with=['rol'];
   	public $timestamps=false;
   	public $fillable=[
   		// 'id_rol',
   		'usuario',
   		'contrasenia',
   		'nombre',
   		'apellido_p',
   		'apellido_m',
   		'telefono'
   	];
   	public function rol(){
   		return $this->belongsTo(Rol::class,'id_rol','id_rol');
   	}

}
