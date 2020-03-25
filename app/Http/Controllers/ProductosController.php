<?php

namespace App\Http\Controllers;

use App\Productos;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\ApiController;
use Session;

class ProductosController extends ApiController
{
    use ApiResponser;
    /**
     * Display a listing of the resource.
     *
     *
     * @return \Illuminate\Http\Response
     */

     public function index()
    {

        $producto= Productos::all();
        //return response()->json(['data' =>$producto, 200]);
       return $this->showAll($producto);
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
            'categoria'=>'required',
            'precio'=>'required',
            'color'=>'required',
            'tamaño'=>'required',

        ];

        $this->validate($request, $reglas);
        $campos = $request->all();
        $productos = productos::create($campos);
        return $this->showOne($productos, 201);
        //return response()->json(['data' =>$productos, 201]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function show($id_producto)
    {
       $producto = productos::findOrfail($id_producto);
        return response()->json(['producto' => $producto, 200]);
        //return $this->showOne($producto);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function edit(Productos $productos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_producto)
    {
      $producto = productos::findOrfail($id_producto);
    /*  $producto->update($request->all());
      return $producto; */
      $reglas = [
        ];
      $this->validate($request, $reglas);

            if ($request->has('nombre')){
                $producto->nombre =$request->nombre;
            }

            if (!$producto->isDirty()){
                return response()->json(['error'=>'Se debe especificar al menos un valor diferente para actualizar','code' => 422],422);
            }
            $producto->save();
            return response()->json(['data'=> $producto,200]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_producto)
    {
        $producto = productos::findOrfail($id_producto);
        $producto->delete();
        //return response()->json(['data' => $producto], 200);
        return $this->showOne($producto);
    }

    public function formulario(){
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
        return view("productos.formulario");
    }
    }
   public function guardar(Request $request){
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
        //  return $request;
        $product = new Productos;
        $product->nombre= $request->nombre;
        $product->categoria = $request->categoria;
        $product->precio = $request->precio;
        $product->color = $request->color;
        $product->tamaño = $request->tamano;
        //return $product;
        $product->save();
        //$product = Producto::all();
        return redirect('/reporteproductos');
    }
}
    public function reporteproductos(){
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
        //$productos['productos']=productos::paginate(5);

        $consulta = \DB::select("SELECT po.id_producto,po.nombre,po.categoria,po.precio,po.color,po.tamaño
        FROM productos AS po");
        return view('productos.reporteproductos')
        ->with('consulta',$consulta);
     }
    }
}
