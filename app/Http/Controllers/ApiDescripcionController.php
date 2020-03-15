<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Descripcion;

class ApiDescripcionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return $v=Descripcion::all();
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
        $v=new Descripcion;
       // $v->id_descripcion=$request->get('id_descripcion');
        $v->marca=$request->get('marca');
        // $v->placas=$request->get('placas');
        // $v->activo=$request->get('activo');
        // $v->numero_pasajero=$request->get('numero_pasajero');
        $v->save();
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
        return $v=Descripcion::find($id);
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
         $v=Descripcion::find($id);
        // $v->id_descripcion=$request->get('id_descripcion');
        $v->marca=$request->get('marca');
        // $v->placas=$request->get('placas');
        // $v->activo=$request->get('activo');
        // $v->numero_pasajero=$request->get('numero_pasajero');
        $v->update();
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
        return $v=Descripcion::destroy($id);
    }
}
