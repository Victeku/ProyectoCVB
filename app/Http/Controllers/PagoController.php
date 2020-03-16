<?php

namespace App\Http\Controllers;

use App\Pago;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\ApiController;
class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $pagos = Pago::all();
      return response()->json(['data' =>$pagos, 200]);
      //return $this->showAll($pagos);
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
          'num_t'=>'required',
          'nip_t'=>'required',
      ];

      $this->validate($request, $reglas);
      $campos = $request->all();
      $pagos = Pago::create($campos);
      return $this->showOne($pagos, 201);
      //return response()->json(['data' =>$pagos, 201]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pago  $pagos
     * @return \Illuminate\Http\Response
     */
    public function show($id_pago)
    {
       $pagos = Pago::findOrfail($id_pago);
       return response()->json(['Pago' => $pagos, 200]);
       //return $this->showOne($pagos);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pago  $pagos
     * @return \Illuminate\Http\Response
     */
    public function edit(Pago $id_pago)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pago  $pagos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_pago)
    {
      $pagos = Pago::findOrfail($id_pago);
      /* $pagos->update($request->all());
      return $pagos; */
      $reglas = [
        ];
      $this->validate($request, $reglas);

            if ($request->has('num_t')){
                $pagos->num_t =$request->num_t;
            }

            if (!$pagos->isDirty()){
                return response()->json(['error'=>'Se debe especificar al menos un valor diferente para actualizar','code' => 422],422);
            }
            $pagos->save();
            return response()->json(['data'=> $pagos,200]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pago  $pagos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pago)
    {
      $pagos = Pago::findOrfail($id_pago);
      $pagos->delete();
      //return response()->json(['data' => $pagos], 200);
      return $this->showOne($pagos);
    }
}
