<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Http\Requests\TipousuarioRequest;
use App\Tipousuario;
class TipousuarioController extends Controller
{
    public function __construct(){
 		$this->middleware('auth');// debe autenticar el usuario para poder usar el controlador
 	}
 	public function index(){ 
 		$tipousuarios=Tipousuario::paginate(10);
 		return view('tipousuarios.index',compact('tipousuarios'));

 	}
 	public function create(){
 		return view('tipousuarios.create');
 	}	

 	public function store(TipousuarioRequest $request){
 		Tipousuario::create($request->all());
 		//$prductos=Producto::paginate(10);
 	//	return view('productos.index',compact('productos'));
 		return Redirect::to('tipousuario');
 	}

 	public function edit($id){
 		
 		return view('tipousuarios.edit',['tipousuario'=>Tipousuario::findOrFail($id)]);

 	}
 	public function show($id){
 		return view('tipousuarios.show',['tipousuario'=>Tipousuario::findOrFail($id)]);
 	}
 	public function update(TipousuarioRequest $request, $id){
 			Tipousuario::updateOrCreate(['IDTIPO'=>$id],$request->all());
 			//$tipocliente->tipocliente=$request->get('DETALLE');
 			
 			return Redirect::to('tipousuario');
 	}
 	
 	public function destroy($id){
 		$user=Tipousuario::find($id);
 		$user->delete();
 		return Redirect::to('tipousuario');
 	}
}
