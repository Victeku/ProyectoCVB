<?php

namespace App\Http\Controllers;

use App\Municipios;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\ApiController;

class MunicipiosController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $municipios = Municipios::all();
        return $this->showAll($municipios);
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
        ];

        $this->validate($request, $reglas);
        $campos = $request->all();
        $municipio = Municipios::create($campos);
        return $this->showOne($municipio, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Municipios  $municipios
     * @return \Illuminate\Http\Response
     */
    public function show($id_municipio)
    {
         $municipio = Municipios::findOrfail($id_municipio);
        return $this->showOne($municipio);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Municipios  $municipios
     * @return \Illuminate\Http\Response
     */
    public function edit(Municipios $municipios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Municipios  $municipios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_municipio)
    {
        $muni = Municipios::findOrfail($id_municipio);
        $reglas = [
          ];
        $this->validate($request, $reglas);

              if ($request->has('nombre')){
                  $muni->nombre =$request->nombre;
              }

              if (!$muni->isDirty()){
                  return response()->json(['error'=>'Se debe especificar al menos un valor diferente para actualizar','code' => 422],422);
              }
              $muni->save();
              return response()->json(['data'=> $muni,200]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Municipios  $municipios
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_municipio)
    {
         $muni = Municipios::findOrfail($id_municipio);
        $muni->delete();
        return $this->showOne($muni);
    }
}
