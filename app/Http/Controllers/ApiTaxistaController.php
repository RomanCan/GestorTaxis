<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Taxista;

class ApiTaxistaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return $taxista = Taxista::all();
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
        $taxista = new Taxista;
        // $Taxista->id_taxista=$request->get('id_taxista');
        $taxista->nombre=$request->get('nombre');
        $taxista->apellido_p=$request->get('apellido_p');
        $taxista->apellido_m=$request->get('apellido_m');
        $taxista->edad=$request->get('edad');
        $taxista->curp=$request->get('curp');
        $taxista->licencia=$request->get('licencia');
        $taxista->save();
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
        return $taxista = Taxista::find($id);
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
        $taxista =Taxista::find($id);
        $taxista->nombre=$request->get('nombre');
        $taxista->apellido_p=$request->get('apellido_p');
        $taxista->apellido_m=$request->get('apellido_m');
        $taxista->edad=$request->get('edad');
        $taxista->curp=$request->get('curp');
        $taxista->licencia=$request->get('licencia');
        $taxista->update();
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
        return $taxista=Taxista::destroy($id);
    }
}
