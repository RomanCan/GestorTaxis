<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::apiResource('apiDestinoejemplo','ApiEjemploController');
//zona de apis
Route::apiResource('apiDestino','ApiDestinoController');
Route::apiResource('apiTaxista','ApiTaxistaController');
Route::apiResource('apiPasaje','ApiPasajeController');
Route::apiResource('apiPasajefijo','ApiPasajefijoController');
Route::apiResource('apiTaxi','ApiTaxiController');
Route::apiResource('apiDescripcion','ApiDescripcionController');
Route::apiResource('apiUsuario','ApiUsuarioController');

//zona de vistas admin
Route::view('/','login');
Route::view('taxistas','admin.taxista');
Route::view('taxis','admin.taxis');
Route::view('marcas','admin.descripcion');
Route::view('destinos','admin.destino');
Route::view('pasajes_fijos','admin.pasaje_fijo');
Route::view('perfil','admin.perfil');

// zona de vistas usuario
Route::view('perfil_usuario','usuario.perfil');
Route::view('pasajesfijos','usuario.pasajes_fijos');

// zona de post y get
Route::post('log','LoginController@login');
Route::get('logout','LoginController@salir');

