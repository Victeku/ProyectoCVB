<?php

namespace App\Http\Controllers;

use App\Productos;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $producto= Productos::all();
        return response()->json(['data' =>$producto, 200]);
        //return $this->showOne($producto);
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
        //
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
    public function update(Request $request, Productos $productos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Productos $productos)
    {
        //
    }

    public function formulario(){
        return view("productos.formulario");
    }

   public function guardar(Request $request){
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
    public function reporteproductos(){
        //$usuarios['usuarios']=Usuarios::paginate(5);

        $consulta = \DB::select("SELECT po.id_producto,po.nombre,po.categoria,po.precio,po.color,po.tamaño
        FROM productos AS po");
        return view('productos.reporteproductos')
        ->with('consulta',$consulta);

        
    }
}
