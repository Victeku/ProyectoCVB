<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Usuarios;
use Session;

class AccesoSistema extends Controller
{
    public function login(){
        return view('sistema.login');
    }
    public function index(){
        return view('index');
    }
    public function valida(Request $request){
        $correo = $request->correo;
        $password = $request->password;
       
         $this->validate($request,[
           'correo'=>'required|email',
           'password'=>'required',
            ]);
        $admins =Usuarios::where('correo', $correo)
            ->where('password','=',$password)
            ->where('activo','=','Si')
            ->select('id_usuario')
            ->first();
         //  return $admins;
        $usuario = Usuarios::find($admins->id_usuario);
        //return $usuario;

        if ($usuario->tipo_u == 'admin'){ 
            Session::put('sesionname',$usuario->nombre . ' ' . $usuario->apellidop);
            Session::put('sesionid_usuario',$usuario->id_usuario);
            Session::put('sesiontipo',$usuario->tipo_u);
            Session::put('sesionarchivo',$usuario->archivo);
            return redirect()->route('indexadmin');	
        }else{
            if($usuario->tipo_u == 'user'){
                Session::put('sesionname',$usuario->nombre . ' ' . $usuario->apellidop);
                Session::put('sesionid_usuario',$usuario->id_usuario);
                Session::put('sesiontipo',$usuario->tipo_u);
                Session::put('sesionarchivo',$usuario->archivo);
                return redirect()->route('index');	
            }
	  
        }
    }
    public function cerrarsesion()
    {
         Session::forget('sesionname');
         Session::forget('sesionidu');
         Session::forget('sesiontipo');
         Session::flush();
         Session::flash('error', 'Session Cerrada Correctamente');
         return redirect()->route('index');
    }
 
}
