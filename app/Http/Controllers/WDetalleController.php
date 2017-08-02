<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Detalle;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class WDetalleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(['datos' =>  Detalle::all()], 200);
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
      if (
        !$request->input('idcabecera') ||
        !$request->input('idproducto') ||
        !$request->input('cantidad') ||
        !$request->input('valor_unitario')||
        !$request->input('valor_total')
      {
        return response()->json(['mensaje' => "No se pudieron procesar los datos", 'codigo'=> 422], 422);
      }
      Detalle::create($request->all());
      return response()->json(['mensaje' =>  'Detalle insertado satisfactoriamente'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $detalle = Detalle::find($id);
      if (!$detalle) {
        return response()->json(['mensaje' => "No se encontro el Detalle", 'codigo'=> 404], 404);
      }
      return response()->json(['datos' =>  $detalle], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

      $metodo = $request->method();
      $detalle = Detalle::find($id);
      if (!$detalle) {
        return response()->json(['mensaje' => "No se encontro el Detalle", 'codigo'=> 404], 404);
      }

      $idcabecera = $request->input('idcabecera');
      $idproducto = $request->input('idproducto');
      $cantidad = $request->input('cantidad');
      $valor_unitario = $request->input('valor_unitario');
      $valor_total = $request->input('valor_total');
      if (!$idcabecera ||
          !$idproducto ||
          !$valor_unitario ||
          !$valor_total 
      {
        return response()->json(['mensaje' => "No pudieron procesar los datos", 'codigo'=> 422], 422);
      }

      $detalle->idcabecera = $idcabecera;
      $detalle->idproducto = $idproducto;
      $detalle->cantidad = $cantidad;
      $detalle->valor_unitario = $valor_unitario;
      $detalle->valor_total = $valor_total;
      $detalle->save();
      return response()->json(['mensaje' =>  "Detalle actualizado"], 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $detalle = Cliente::find($id);
      if (!$detalle) {
        return response()->json(['mensaje' => "No se encontro el Detalle", 'codigo'=> 404], 404);
      }
      $detalle->delete();
      return response()->json(['mensaje' =>  "Detalle eliminado"], 200);
    }
}
