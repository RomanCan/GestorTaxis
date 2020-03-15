<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Descripcion extends Model
{
    //
    protected $table='descripciones';
    protected $primaryKey='id_descripcion';
    public $timestamps=false;
    public $fillable=[
    	'marca',
    	// 'placas',
    	// 'activo'
    ];
}
