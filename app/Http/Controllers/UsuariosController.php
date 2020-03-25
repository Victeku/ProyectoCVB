<?php

namespace App\Http\Controllers;

use App\Usuarios;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\ApiController;
use Session;
class UsuariosController extends ApiController
{
    use ApiResponser;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $usuarios = Usuarios::all();
        //return response()->json(['data' =>$usuarios, 200]);
        return $this->showAll($usuarios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $reglas = [
            'nombre'=>'required',
            'apellidop'=>'required',
            'apellidom'=>'required',
            'genero'=>'required',
            'fn'=>'required',
            'telefono'=>'required',
            'estado'=>'required',
            'municipio'=>'required',
            'direccion'=>'required',
            'tipo_u'=>'required',
            'activo'=>'required',
            'archivo'=>'required',
            'correo'=>'required',
            'password'=>'required',

        ];

        $this->validate($request, $reglas);
        $campos = $request->all();
        $usuarios = usuarios::create($campos);
        return $this->showOne($usuarios, 201);
        //return response()->json(['data' =>$usuarios, 201]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function show($id_usuario)
    {
        $usuario = usuarios::findOrfail($id_usuario);
        //return response()->json(['usuario' => $usuario, 200]);
        return $this->showOne($usuario);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuarios $usuarios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_usuario)
    {
      $user = usuarios::findOrfail($id_usuario);
      /* $user->update($request->all());
      return $user; */
      $reglas = [
        ];
      $this->validate($request, $reglas);

            if ($request->has('nombre')){
                $user->nombre =$request->nombre;
            }
            if (!$user->isDirty()){
                return response()->json(['error'=>'Se debe especificar al menos un valor diferente para actualizar','code' => 422],422);
            }
            $user->save();
            return response()->json(['data'=> $user,200]);
      }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_usuario)
    {
        $user = usuarios::findOrfail($id_usuario);
        $user->delete();
        //return response()->json(['data' => $user], 200);
        return $this->showOne($user);
    }

    public function altausuario(){
        $sname = Session::get('sesionname');
        $sidu = Session::get('sesionid_ad');
        $stipo = Session::get('sesiontipo');
     if($sname =='' or $sidu =='' or $stipo=='')
     {
         Session::flash('error', 'Es necesario loguearse antes de continuar');
       return redirect()->route('login');
         
     }
     else
     {
        return view('usuarios.altausuario');
    }
}
    public function guardarusuario(Request $request){
        $sname = Session::get('sesionname');
        $sidu = Session::get('sesionid_ad');
        $stipo = Session::get('sesiontipo');
     if($sname =='' or $sidu =='' or $stipo=='')
     {
         Session::flash('error', 'Es necesario loguearse antes de continuar');
       return redirect()->route('login');
         
     }
     else
     {
        $nombre=$request->nombre;
        $apellidop=$request->apellidop;
        $apellidom=$request->apellidom;
        $genero=$request->genero;
        $telefono=$request->telefono;
        $fn=$request->fn;
        $estado=$request->estado;
        $municipio=$request->municipio;
        $direccion=$request->direccion;
        $tipo_u=$request->tipo_u;
        $correo=$request->correo;
        $password=$request->password;
        $id_usuario=$request->id_usuario;

    $file = $request->file('archivo');
     if($file!="")
     {
     $ldate = date('Ymd_His_');
     $img = $file->getClientOriginalName();
     $img2 = $ldate.$img;
     \Storage::disk('local')->put($img2, \File::get($file));
     }
     else
     {
     $img2 = "sinfoto.jpg";
     }
        $usuarios=new Usuarios;
        $usuarios->id_usuario=$request->id_usuario;
        $usuarios->nombre=$request->nombre;
        $usuarios->apellidop=$request->apellidop;
        $usuarios->apellidom=$request->apellidom;
        $usuarios->genero=$request->genero;
        $usuarios->fn=$request->fn;
        $usuarios->activo = 'Si';
        $usuarios->telefono=$request->telefono;
        $usuarios->archivo=$img2;
        $usuarios->estado=$request->estado;
        $usuarios->municipio=$request->municipio;
        $usuarios->direccion=$request->direccion;
        $usuarios->tipo_u=$request->tipo_u;
        $usuarios->correo=$request->correo;
        $usuarios->password=$request->password;
        $usuarios->save();


        echo '<script>alert("Nuevo Registro Exitoso")</script> ';
       //return view('usuarios.reporteusuarios');


       return redirect('/reporteusuarios');

       //return view ('usuarios/vista');
    }
}
    public function reporteusuarios(Request $request){
        $sname = Session::get('sesionname');
        $sidu = Session::get('sesionid_ad');
        $stipo = Session::get('sesiontipo');
     if($sname =='' or $sidu =='' or $stipo=='')
     {
         Session::flash('error', 'Es necesario loguearse antes de continuar');
       return redirect()->route('login');
         
     }
     else
     {
        //$usuarios['usuarios']=Usuarios::paginate(5);
        $data = [
            "reporte" => "0", 
            "buscar" => ""
        ];

    $users = Usuarios::Buscar($request->get('buscar'))
        ->orderBy('id_usuario')
        ->paginate(3);

    if($request->all() != null){
            //dd($request->all());
            $data = [
                    "reporte" => 1, 
                    "buscar" => $request->get('buscar')
                ];
        }
        
        
        return view('usuarios.reporteusuarios')
        ->with($data)
		->with(['users' => $users]);



    }
    }
    public function editausuario(Request $request){
        $sname = Session::get('sesionname');
        $sidu = Session::get('sesionid_ad');
        $stipo = Session::get('sesiontipo');
     if($sname =='' or $sidu =='' or $stipo=='')
     {
         Session::flash('error', 'Es necesario loguearse antes de continuar');
       return redirect()->route('login');
         
     }
     else
     {
        $nombre=$request->nombre;
        $apellidop=$request->apellidop;
        $apellidom=$request->apellidom;
        $genero=$request->genero;
        $fn=$request->fn;
        $estado=$request->estado;
        $municipio=$request->municipio;
        $direccion=$request->direccion;
        $tipo_u=$request->tipo_u;
        $correo=$request->correo;
        $password=$request->password;
        $id_usuario=$request->id_usuario;

    $file = $request->file('archivo');
     if($file!="")
     {
     $ldate = date('Ymd_His_');
     $img = $file->getClientOriginalName();
     $img2 = $ldate.$img;
     \Storage::disk('local')->put($img2, \File::get($file));
     }
     else
     {
     $img2 = "sinfoto.jpg";
     }

                $usuarios = Usuarios::find($id_usuario);
            if ($file!="")
            {
            $usuarios->archivo = $img2;
            }

        $usuarios->id_usuario=$request->id_usuario;
        $usuarios->nombre=$request->nombre;
        $usuarios->apellidop=$request->apellidop;
        $usuarios->apellidom=$request->apellidom;
        $usuarios->genero=$request->genero;
        $usuarios->fn=$request->fn;

        $usuarios->estado=$request->estado;
        $usuarios->municipio=$request->municipio;
        $usuarios->direccion=$request->direccion;
        $usuarios->tipo_u=$request->tipo_u;
        $usuarios->correo=$request->correo;
        $usuarios->password=$request->password;
        $usuarios->save();
       echo "<script>alert('Registro Guardado')</scrip>";
       return view('usuarios.reporteusuarios');
        }
    }

    public function modificausuario($id_usuario){
        $consulta = Usuarios::Where('id_usuario','=',$id_usuario)
                   ->get();
        return view('usuarios.editausuario')
        ->with('consulta',$consulta[0]);

    }
    public function vista(){
        return view('usuarios/vista');
    }
    public function eliminauser($id_usuario){
        $sname = Session::get('sesionname');
        $sidu = Session::get('sesionid_ad');
        $stipo = Session::get('sesiontipo');
     if($sname =='' or $sidu =='' or $stipo=='')
     {
         Session::flash('error', 'Es necesario loguearse antes de continuar');
       return redirect()->route('login');
         
     }
     else
     {

      $consulta= \DB:: UPDATE("update usuarios
      set activo='No' where id_usuario= $id_usuario");
        // echo '<script>alert("Eliminacion Exitosa")</script> ';
         //return view('usuarios.reporteusuarios');
     // return redirect()->route('reporteusuarios');
       return redirect('/reporteusuarios');
    }
}
    public function restableceruser($id_usuario){
        $sname = Session::get('sesionname');
		  $sidu = Session::get('sesionid_ad');
		  $stipo = Session::get('sesiontipo');
	   if($sname =='' or $sidu =='' or $stipo=='')
	   {
		   Session::flash('error', 'Es necesario loguearse antes de continuar');
		 return redirect()->route('login');
		   
	   }
	   else
	   {
      $consulta= \DB:: UPDATE("update usuarios
      set activo='Si' where id_usuario= $id_usuario");
        // echo '<script>alert("Restauracion Exitosa")</script> ';
        //  return view('usuarios.reporteusuarios');
    return redirect('/reporteusuarios');
    }
}
}
