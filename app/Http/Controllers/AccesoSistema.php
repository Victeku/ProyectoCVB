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
        $usuarios =Usuarios::where('correo','=',$correo)
                             ->where('password','=',$password)
                             ->where('activo','=','Si')
                             ->get();
        if (count($usuarios)==0 ){ 
           Session::flash('error', 'El usuario no existe o la contraseña
                                     no es correcta');
           return redirect()->route('login');
        }
        else
        {
            Session::put('sesionname',$usuarios[0]->nombre . ' ' . $usuarios[0]->apellidop);
            Session::put('sesionid_usuario',$usuarios[0]->id_usuario);
            Session::put('sesiontipo',$usuarios[0]->tipo_u);
            Session::put('sesionarchivo',$usuarios[0]->archivo);
            return redirect()->route('indexadmin');		  
        }
    }
}
