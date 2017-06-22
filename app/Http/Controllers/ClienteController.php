<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Http\Requests\ClienteRequest;
use App\Cliente;

class ClienteController extends Controller
{
 	public function __construct(){
 		$this->middleware('auth');// debe autenticar el usuario para poder usar el controlador
 	}
 	public function index(){
 		$clientes=Cliente::paginate(10);
 		return view('clientes.index',compact('clientes'));

 	}
 	public function create(){
 		return view('clientes.create');
 	}	

 	public function store(ClienteRequest $request){
 		Cliente::create($request->all());
 		//$prductos=Producto::paginate(10);
 	//	return view('productos.index',compact('productos'));
 		return Redirect::to('cliente');
 	}

 	public function edit($id){
 		
 		return view('clientes.edit',['cliente'=>Cliente::findOrFail($id)]);

 	}
 	public function show($id){
 		return view('clientes.show',['cliente'=>Cliente::findOrFail($id)]);
 	}
 	public function update(ClienteRequest $request, $id){
 			Cliente::updateOrCreate(['IDCLIENTE'=>$id],$request->all());
 			$cliente->idtipo=$request->get('IDTIPO');
 			$cliente->cedula=$request->get('CEDULA');
 			$cliente->nombre=$request->get('NOMBRE');
 			$cliente->apellido=$request->get('APELLIDO');
 			$cliente->nacimiento=$request->get('NACIMIENTO');
 			$cliente->ciudad=$request->get('CIUDAD');
 			$cliente->direccion=$request->get('DIRECCION');
 			$cliente->telefono=$request->get('TELEFONO');
 			$cliente->email=$request->get('EMAIL');
 			$cliente->estado=$request->get('ESTADO');
 			$cliente->update();
 			return Redirect::to('cliente');
 	}
 	public function destroy($id){
 		$user=Cliente::find($id);
 		$user->delete();
 		return Redirect::to('cliente');
 	}
}
