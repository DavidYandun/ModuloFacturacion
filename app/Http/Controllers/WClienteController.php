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
        !$request->input('idtipo') ||
        !$request->input('cedula') ||
        !$request->input('nombre') ||
        !$request->input('apellido')||
        !$request->input('nacimiento')||
        !$request->input('ciudad')||
        !$request->input('direccion') ||
        !$request->input('telefono') ||
        !$request->input('email') ||
        !$request->input('estado'))
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

      $nombre = $request->input('nombre');
      $telefono = $request->input('telefono');
      $idtipo = $request->input('idtipo');
      $cedula = $request->input('cedula');
      $apellido = $request->input('apellido');
      $nacimiento = $request->input('nacimiento');
      $ciudad = $request->input('ciudad');
      $direccion = $request->input('direccion');
      $email = $request->input('email');
      $estado = $request->input('estado');
      if (!$nombre ||
          !$telefono ||
          !$idtipo ||
          !$cedula ||
          !$apellido ||
          !$nacimiento ||
          !$ciudad ||
          !$direccion ||
          !$email ||
          !$estado)
      {
        return response()->json(['mensaje' => "No pudieron procesar los datos", 'codigo'=> 422], 422);
      }

      $cliente->nombre = $nombre;
      $cliente->telefono = $telefono;
      $cliente->idtipo = $idtipo;
      $cliente->cedula = $cedula;
      $cliente->apellido = $apellido;
      $cliente->nacimiento = $nacimiento;
      $cliente->ciudad = $ciudad;
      $cliente->direccion = $direccion;
      $cliente->email = $email;
      $cliente->estado = $estado;
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
