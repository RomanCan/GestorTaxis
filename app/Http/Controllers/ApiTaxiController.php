<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Taxi;

class ApiTaxiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return $taxi = Taxi::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $taxi=new Taxi;
        $taxi->id_taxista=$request->get('id_taxista');
        $taxi->id_descripcion=$request->get('id_descripcion');
        $taxi->no_taxi=$request->get('no_taxi');
        $taxi->placa=$request->get('placa');
        $taxi->numero_pasajero=$request->get('numero_pasajero');
        $taxi->activo=$request->get('activo');

        $taxi->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return $taxi=Taxi::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $taxi=Taxi::find($id);
        $taxi->id_taxista=$request->get('id_taxista');
        $taxi->id_descripcion=$request->get('id_descripcion');
        $taxi->no_taxi=$request->get('no_taxi');
        $taxi->placa=$request->get('placa');
        $taxi->numero_pasajero=$request->get('numero_pasajero');
        $taxi->activo=$request->get('activo');
        $taxi->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        return $Taxi=Taxi::destroy($id);
    }
}
