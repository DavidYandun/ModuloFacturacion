<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;
use App\Http\Requests\ClienteRequest;
use App\Cliente;
use App\Tipocliente;

class ClienteController extends Controller
{
 	public function __construct(){
 	$this->middleware('auth');// debe autenticar el usuario para poder usar el controlador
 	}
 	public function index(){
 		$clientes=Cliente::paginate(10);
 		$tipocliente=Tipocliente::all();
 		return view('clientes.index',compact('clientes','tipocliente'));
 	}
 	public function create(){
 		$tipocliente=Tipocliente::all();
 		return view('clientes.create',compact('tipocliente'));
 	}	
 	public function store(ClienteRequest $request){
 		Cliente::create($request->all());
 		return Redirect::to('cliente');
 	}

 	public function edit($id){
 		$cliente=Cliente::find($id);
 		$tipocliente=Tipocliente::all();
 		return view('clientes.edit',compact('cliente','tipocliente'));

 	}
 	public function update(CLienteRequest $request, $id){
 			Cliente::updateOrCreate(['IDCLIENTE'=>$id],$request->all());
 			return Redirect::to('cliente');
 	}

 	public function delete($id){
 		Cliente::destroy($id);
 		return Redirect::to('cliente');
 	}
 }


