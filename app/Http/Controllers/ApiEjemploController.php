<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Destino;

class ApiEjemploController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return $destino = Destino::all();
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
        $destino = new Destino;
        $destino->nombre = $request->get('nombre');
        $destino->precio = $request->get('precio');
        $destino->save();
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
        return $destino = Destino::find($id);
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
        $destino = Destino::find($id);
        $destino->nombre = $request->get('nombre');
        $destino->precio = $request->get('precio');
        $destino->update();
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
        return $destino = Destino::destroy($id);
    }
}
