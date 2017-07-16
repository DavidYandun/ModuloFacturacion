<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class WClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(['datos' =>  Cliente::all()], 200);
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
        !$request->input('IDTIPO') ||
        !$request->input('CEDULA') ||
        !$request->input('NOMBRE') ||
        !$request->input('APELLIDO')||
        !$request->input('NACIMIENTO')||
        !$request->input('CIUDAD')||
        !$request->input('DIRECCION') ||
        !$request->input('TELEFONO') ||
        !$request->input('EMAIL') ||
        !$request->input('ESTADO'))
      {
        return response()->json(['mensaje' => "No se pudieron procesar los datos", 'codigo'=> 422], 422);
      }
      Cliente::create($request->all());
      return response()->json(['mensaje' =>  'Cliente insertado satisfactoriamente'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $cliente = Cliente::find($id);
      if (!$cliente) {
        return response()->json(['mensaje' => "No se encontro al Cliente", 'codigo'=> 404], 404);
      }
      return response()->json(['datos' =>  $cliente], 200);
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
      $cliente = Cliente::find($id);
      if (!$cliente) {
        return response()->json(['mensaje' => "No se encontro al Cliente", 'codigo'=> 404], 404);
      }

      $NOMBRE = $request->input('NOMBRE');
      $TELEFONO = $request->input('TELEFONO');
      $IDTIPO = $request->input('IDTIPO');
      $CEDULA = $request->input('CEDULA');
      $APELLIDO = $request->input('APELLIDO');
      $NACIMIENTO = $request->input('NACIMIENTO');
      $CIUDAD = $request->input('CIUDAD');
      $DIRECCION = $request->input('DIRECCION');
      $EMAIL = $request->input('EMAIL');
      $ESTADO = $request->input('ESTADO');
      if (!$NOMBRE ||
          !$TELEFONO ||
          !$IDTIPO ||
          !$CEDULA ||
          !$APELLIDO ||
          !$NACIMIENTO ||
          !$CIUDAD ||
          !$DIRECCION ||
          !$EMAIL ||
          !$ESTADO)
      {
        return response()->json(['mensaje' => "No pudieron procesar los datos", 'codigo'=> 422], 422);
      }

      $cliente->NOMBRE = $NOMBRE;
      $cliente->TELEFONO = $TELEFONO;
      $cliente->IDTIPO = $IDTIPO;
      $cliente->CEDULA = $CEDULA;
      $cliente->APELLIDO = $APELLIDO;
      $cliente->NACIMIENTO = $NACIMIENTO;
      $cliente->CIUDAD = $CIUDAD;
      $cliente->DIRECCION = $DIRECCION;
      $cliente->EMAIL = $EMAIL;
      $cliente->ESTADO = $ESTADO;
      $cliente->save();
      return response()->json(['mensaje' =>  "Cliente actualizado"], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Cliente::find($id);
        if (!$cliente) {
          return response()->json(['mensaje' => "No se encontro al Cliente", 'codigo'=> 404], 404);
        }
        $cliente->delete();
        return response()->json(['mensaje' =>  "Cliente eliminado"], 200);
    }
}
