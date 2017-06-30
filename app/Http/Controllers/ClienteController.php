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
 	//	$this->middleware('auth');// debe autenticar el usuario para poder usar el controlador
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
 	public function show($id){
 		return view('clientes.show',['cliente'=>Cliente::findOrFail($id)]);
 	}

 	public function edit($id){
 		$cliente=Cliente::find($id);
 		return view('clientes.edit',compact('cliente'));

 	}
 	public function update(CLienteRequest $request, $id){
 			Cliente::updateOrCreate(['IDCLIENTE'=>$id],$request->all());
 			return Redirect::to('cliente');
 	}
 	public function destroy($id){
 		Cliente::destroy($id);
 		return Redirect::to('cliente');
 	}
 }


