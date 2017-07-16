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
        !$request->input('IDCABECERA') ||
        !$request->input('IDPRODUCTO') ||
        !$request->input('CANTIDAD') ||
        !$request->input('VALOR_UNITARIO')||
        !$request->input('VALOR_TOTAL')||
        !$request->input('DESCUENTO'))
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

      $IDCABECERA = $request->input('IDCABECERA');
      $IDPRODUCTO = $request->input('IDPRODUCTO');
      $CANTIDAD = $request->input('CANTIDAD');
      $VALOR_UNITARIO = $request->input('VALOR_UNITARIO');
      $VALOR_TOTAL = $request->input('VALOR_TOTAL');
      $DESCUENTO = $request->input('DESCUENTO');
      if (!$IDCABECERA ||
          !$IDPRODUCTO ||
          !$VALOR_UNITARIO ||
          !$VALOR_TOTAL ||
          !$DESCUENTO)
      {
        return response()->json(['mensaje' => "No pudieron procesar los datos", 'codigo'=> 422], 422);
      }

      $detalle->IDCABECERA = $IDCABECERA;
      $detalle->IDPRODUCTO = $IDPRODUCTO;
      $detalle->CANTIDAD = $CANTIDAD;
      $detalle->VALOR_UNITARIO = $VALOR_UNITARIO;
      $detalle->VALOR_TOTAL = $VALOR_TOTAL;
      $detalle->DESCUENTO = $DESCUENTO;
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
