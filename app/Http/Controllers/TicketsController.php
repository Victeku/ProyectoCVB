<?php

namespace App\Http\Controllers;

use App\Tickets;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\ApiController;

class TicketsController extends ApiController
{
    use ApiResponser;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Tickets::all();
        //return response()->json(['data' =>$tickets, 200]);
        return $this->showAll($tickets);
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

        $campos = $request->all();
        $tickets = Tickets::create($campos);
        return $this->showOne($tickets, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tickets  $tickets
     * @return \Illuminate\Http\Response
     */
    public function show($id_ticket)
    {
        $tickets = Tickets::findOrfail($id_ticket);
        //return response()->json(['tickets' => $tickets, 200]);
        return $this->showOne($tickets);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tickets  $tickets
     * @return \Illuminate\Http\Response
     */
    public function edit(Tickets $tickets)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tickets  $tickets
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_ticket)
    {
        $tick = Tickets::findOrfail($id_ticket);
        /* $tick->update($request->all());
        return $tick; */
        $reglas = [
          ];
        $this->validate($request, $reglas);
  
        if ($request->has('total')){
            $tick->total =$request->total;
        }else{
            return response()->json(['error'=>'Se debe especificar al menos un valor diferente para actualizar','code' => 422],422);
        }
              $tick->save();
              return response()->json(['data'=> $tick,200]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tickets  $tickets
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_ticket)
    {
        $ticket = Tickets::findOrfail($id_ticket);
        $ticket->delete();
        //return response()->json(['data' => $ticket], 200);
        return $this->showOne($ticket);
    }
}
