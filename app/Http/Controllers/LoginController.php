<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use Session;
use Redirect;
use Cache;
use Cookie;
class LoginController extends Controller
{
    //
    public function login(Request $r){
    	//variables independientes|||campos de vista
    	$usuario = $r->usuario;
    	$contraseña = $r->contrasenia;

    	$res = Usuario::where('usuario','=',$usuario)
    	->where('contrasenia','=',$contraseña)
    	->get();

    	if(count($res)>0)
    	{
    		$u=$res[0]->nombre.' '.$res[0]->apellido_p.' '.$res[0]->apellido_m;

    		Session::put('usuario',$u);
    		Session::put('rol',$res[0]->rol->rol);
    		Session::put('id_usuario',$res[0]->id_usuario);

    		if($res[0]->rol->rol == "Administrador")
    			return Redirect::to('perfil');
    		elseif ($res[0]->rol->rol =="Empleado") 
    			return Redirect::to('perfil_usuario');
    	}else{
    		return 'Contraseña o nombre de usuario incorrectos';
    	}


    }

    public function salir(){
        Session::flush();
        Session::reflash();
        Cache::flush();
        Cookie::forget('laravel_session');
        unset($_COOKIE);
        unset($_SESSION);
        return Redirect::to('/');
    }
}
