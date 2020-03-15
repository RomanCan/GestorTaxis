<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taxista extends Model
{
    //
    protected $table='taxistas';
    protected $primaryKey='id_taxista';
    public $timestamps=false;
    public $fillable=[
    	'nombre',
    	'apellido_p',
    	'apellido_m',
    	'edad',
        'curp',
        'licencia'
    ];
}
