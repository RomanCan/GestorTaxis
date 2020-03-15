<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use Session;

class ApiUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // return $usuario=Usuario::all();
        $id= Session::get('id_usuario');
        return $usuario = Usuario::where('id_usuario','=',$id)->get();
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
        $usuario=new Usuario;
        // $usuario->id_rol=$request->get('id_rol');
        $usuario->usuario=$request->get('usuario');
        $usuario->contrasenia=$request->get('contrasenia');
        $usuario->nombre=$request->get('nombre');
        $usuario->apellido_p=$request->get('apellido_p');
        $usuario->apellido_m=$request->get('apellido_m');
        $usuario->telefono=$request->get('telefono');
        $usuario->save();
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
        return $usuario=Usuario::find($id);
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
        $usuario=Usuario::find($id);
        // $usuario->id_rol=$request->get('id_rol');
        $usuario->usuario=$request->get('usuario');
        $usuario->contrasenia=$request->get('contrasenia');
        $usuario->nombre=$request->get('nombre');
        $usuario->apellido_p=$request->get('apellido_p');
        $usuario->apellido_m=$request->get('apellido_m');
        $usuario->telefono=$request->get('telefono');
        $usuario->update();

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
        return $usuario=Usuario::destroy($id);
    }
}
