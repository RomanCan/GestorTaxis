<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pasaje;

class ApiPasajeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return $pasaje=Pasaje::all();
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
        $pasaje=new Pasaje;
        $pasaje->nombre=$request->get('nombre');
        $pasaje->id_destino=$request->get('id_destino');
        $pasaje->fecha=$request->get('fecha');
        $pasaje->hora=$request->get('hora');
        $pasaje->save();

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
        return $pasaje=Pasaje::find($id);
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
        $pasaje=Pasaje::find($id);
        $pasaje->nombre=$request->get('nombre');
        $pasaje->id_destino=$request->get('id_destino');
        $pasaje->fecha=$request->get('fecha');
        $pasaje->hora=$request->get('hora');
        $pasaje->update();
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
        return $pasaje=Pasaje::destroy($id);
    }
}
