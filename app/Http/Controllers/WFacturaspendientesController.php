<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Facturaspendientes;
use App\Cabecera;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class WFacturaspendientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return response()->json(['datos' =>  Facturaspendientes::all()], 200);
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
        !$request->input('abono') ||
        !$request->input('saldo'))
      {
        return response()->json(['mensaje' => "No se pudieron procesar los datos", 'codigo'=> 422], 422);
      }
      Facturaspendientes::create($request->all());
      return response()->json(['mensaje' =>  'La factura pendiente se ingreso satisfactoriamente'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $factura = Facturaspendientes::find($id);
      if (!$factura) {
        return response()->json(['mensaje' => "No se encontro la factura pendiente", 'codigo'=> 404], 404);
      }
      return response()->json(['datos' =>  $factura], 200);
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
      $factura = Facturaspendientes::find($id);
      if (!$factura) {
        return response()->json(['mensaje' => "No se encontro la factura pendiente", 'codigo'=> 404], 404);
      }

      $idcabecera = $request->input('idcabecera');
      $abono = $request->input('abono');
      $saldo = $request->input('saldo');
      if (!$idcabecera ||
          !$abono ||
          !$saldo)
      {
        return response()->json(['mensaje' => "No pudieron procesar los datos", 'codigo'=> 422], 422);
      }

      $factura->idcabecera = $idcabecera;
      $factura->abono = $abono;
      $factura->saldo = $saldo;
      $factura->save();
      return response()->json(['mensaje' =>  "Factura pendiente actualizada"], 200);

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $factura = Facturaspendientes::find($id);
      if (!$factura) {
        return response()->json(['mensaje' => "No se encontro la factura pendiente", 'codigo'=> 404], 404);
      }
      $factura->delete();
      return response()->json(['mensaje' =>  "Factura pendiente eliminada"], 200);
    }

    public function actualizarFact($idFacturaP, $abono)
    {
      // return "Hola ".$idcabecera." ".$abono;
      $factura = Facturaspendientes::find($idFacturaP);

      // Resto el saldo
      $saldoActual = $factura->saldo;
      $factura->saldo = $saldoActual - $abono;

      // Sumo el abono
      $abonito = $factura->abono;
      $factura->abono = $abonito + $abono;


      $factura->save();
      return response()->json(['mensaje' =>  $factura], 200);
    }
}
