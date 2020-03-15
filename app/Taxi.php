<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taxi extends Model
{
    //
    protected $table='taxis';
    protected $primaryKey='id_taxi';
    protected $with=['taxistas','descripciones'];
    public $timestamps = false;
    public $fillable=[
        'id_taxista',
        'id_descripcion',
        'no_taxi',
        'placa',
        'numero_pasajero',
        'activo'
    ];

   
    public function taxistas(){
        return $this->belongsTo(Taxista::class,'id_taxista','id_taxista');
    }
    public function descripciones(){
        return $this->belongsTo(Descripcion::class,'id_descripcion','id_descripcion');
    }
}
