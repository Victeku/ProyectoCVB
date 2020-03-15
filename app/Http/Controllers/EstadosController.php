<?php

namespace App\Http\Controllers;

use App\Estados;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\ApiController;

class EstadosController extends ApiController
{
    use ApiResponser;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estados = Estados::all();
        //return response()->json(['data' =>$estados, 200]);
        return $this->showAll($estados);
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
        $estados = Estados::create($campos);
        return $this->showOne($estados, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Estados  $estados
     * @return \Illuminate\Http\Response
     */
    public function show($id_estado)
    {
        $estado =Estados::findOrfail($id_estado);
        //return response()->json(['estado' => $estado, 200]);
        return $this->showOne($estado);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Estados  $estados
     * @return \Illuminate\Http\Response
     */
    public function edit(Estados $estados)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Estados  $estados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_estado)
    {
        $state = Estados::findOrfail($id_estado);
        /* $state->update($request->all());
        return $state; */
        $reglas = [
          ];
        $this->validate($request, $reglas);
  
              if ($request->has('nombre')){
                  $state->nombre =$request->nombre;
              }
  
              if (!$state->isDirty()){
                  return response()->json(['error'=>'Se debe especificar al menos un valor diferente para actualizar','code' => 422],422);
              }
              $state->save();
              return response()->json(['data'=> $state,200]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Estados  $estados
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_estado)
    {
        $state = Estado::findOrfail($id_estado);
        $state->delete();
        //return response()->json(['data' => $state], 200);
        return $this->showOne($state);
    }
}
