<?php

namespace App\Http\Controllers;

use App\Almacen;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\ApiController;

class AlmacenController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $almacen= Almacen::all();
      //return response()->json(['data' =>$almacen, 200]);
     return $this->showAll($almacen);
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
          'estado_p'=>'required',
          'cantidad_p'=>'required',
      ];

      $this->validate($request, $reglas);
      $campos = $request->all();
      $almacen = Almacen::create($campos);
      return $this->showOne($almacen, 201);
      //return response()->json(['data' =>$almacen, 201]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Almacen  $almacen
     * @return \Illuminate\Http\Response
     */
    public function show($id_almacen)
    {
      $almacen = Almacen::findOrfail($id_almacen);
       return response()->json(['almacen' => $almacen, 200]);
       //return $this->showOne($almacen);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Almacen  $almacen
     * @return \Illuminate\Http\Response
     */
    public function edit(Almacen $almacen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Almacen  $almacen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_almacen)
    {
      $almacen = Almacen::findOrfail($id_almacen);
      /* $almacen->update($request->all());
      return $almacen; */
      $reglas = [
        ];
      $this->validate($request, $reglas);

            if ($request->has('estado_p')){
                $almacen->estado_p =$request->estado_p;
            }

            if (!$almacen->isDirty()){
                return response()->json(['error'=>'Se debe especificar al menos un valor diferente para actualizar','code' => 422],422);
            }
            $almacen->save();
            return response()->json(['data'=> $almacen,200]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Almacen  $almacen
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_almacen)
    {
      $alamacen = Almacen::findOrfail($id_almacen);
      $alamacen->delete();
      //return response()->json(['data' => $alamacen], 200);
      return $this->showOne($alamacen);
    }
}
