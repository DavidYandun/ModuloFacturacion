<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cabecera;

use App\Http\Requests;
use App\Http\Controllers\Controller;



class WCabeceraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     //GET --- http://localhost:8000/cabeceras
    public function index()
    {
        return response()->json(['datos' =>  Cabecera::all()], 200);
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

    // POST - http://localhost:8000/cabeceras
    public function store(Request $request)
    {
      // if (!$request->input('IDCLIENTE') ||     !$request->input('IDCAJA') ||
      //   !$request->input('NUMERO')    ||     !$request->input('FECHA') ||
      //   !$request->input('SUBTOTAL')  ||     !$request->input('IVA') ||
      //   !$request->input('DESCUENTO') ||     !$request->input('TOTAL')){
      //   return response()->json(['mensaje' => "No se pudieron procesar los datos".$request->input('IDCLIENTE'), 'codigo'=> 422], 422);
      // }

      Cabecera::create($request->all());
      return response()->json(['mensaje' =>  'Cabecera insertada satisfactoriamente'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     //GET --- http://localhost:8000/cabeceras/{{id}}
    public function show($id)
    {
      $cabecera = Cabecera::find($id);
      if (!$cabecera) {
        return response()->json(['mensaje' => "No se encontro la cabecera", 'codigo'=> 404], 404);
      }
      return response()->json(['datos' =>  $cabecera], 200);
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

     //PATCH - PUT --- http://localhost:8000/cabeceras/{{id}}
    public function update(Request $request, $id)
    {
      // $metodo = $request->method();
      $cabecera = Cabecera::find($id);
      if (!$cabecera) {
        return response()->json(['mensaje' => "No se encontro la cabecera", 'codigo'=> 404], 404);
      }

      // $idcabecera = $request->input('idCabecera');
      $idCliente = $request->input('IDCLIENTE');
      $idCaja = $request->input('IDCAJAD');
      $numero = $request->input('NUMERO');
      $fecha = $request->input('FECHA');
      $subtotal = $request->input('SUBTOTAL');
      $iva = $request->input('IVA');
      $descuento = $request->input('DESCUENTO');
      $total = $request->input('TOTAL');
      if (!$idCliente ||
          !$idCaja ||
          !$numero ||
          !$fecha ||
          !$subtotal ||
          !$iva ||
          !$descuento ||
          !$total)
      {
        return response()->json(['mensaje' => "No pudieron procesar los datos", 'codigo'=> 422], 422);
      }

      // $cabecera->IDCABECERA = $idcabecera;
      $cabecera->IDCLIENTE = $idCliente;
      $cabecera->IDCAJA = $idCaja;
      $cabecera->NUMERO = $numero;
      $cabecera->FECHA = $fecha;
      $cabecera->SUBTOTAL = $subtotal;
      $cabecera->IVA = $iva;
      $cabecera->DESCUENTO = $descuento;
      $cabecera->TOTAL = $total;
      $cabecera->save();
      return response()->json(['mensaje' =>  "Cabecera actualizado"], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     //DELETE --- http://localhost:8000/cabeceras/{{id}}
    public function destroy($id)
    {
      $cabecera = Cabecera::find($id);
      if (!$cabecera) {
        return response()->json(['mensaje' => "No se encontro la cabecera", 'codigo'=> 404], 404);
      }
      $cabecera->delete();
      return response()->json(['mensaje' =>  "Cabecera eliminada"], 200);
    }
}
