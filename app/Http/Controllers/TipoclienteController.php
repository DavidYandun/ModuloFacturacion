<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Http\Requests\TipoclienteRequest;
use App\Tipocliente;
class TipoclienteController extends Controller
{
    public function __construct(){
 		$this->middleware('auth');// debe autenticar el usuario para poder usar el controlador
 	}
 	public function index(){
 		$tipoclientes=Tipocliente::paginate(10);
 		return view('tipoclientes.index',compact('tipoclientes'));

 	}
 	public function create(){
 		return view('tipoclientes.create');
 	}	

 	public function store(TipoclienteRequest $request){
 		Tipocliente::create($request->all());
 		//$prductos=Producto::paginate(10);
 	//	return view('productos.index',compact('productos'));
 		return Redirect::to('tipocliente');
 	}

 	public function edit($id){
 		
 		return view('tipoclientes.edit',['tipocliente'=>Tipocliente::findOrFail($id)]);

 	}
 	public function show($id){
 		return view('tipoclientes.show',['tipocliente'=>Tipocliente::findOrFail($id)]);
 	}
 	public function update(TipoclienteRequest $request, $id){
 			Tipocliente::updateOrCreate(['IDTIPO'=>$id],$request->all());
 			$tipocliente->tipocliente=$request->get('DETALLE');
 			
 			return Redirect::to('tipocliente');
 	}
 	public function destroy($id){
 		$user=Tipocliente::find($id);
 		$user->delete();
 		return Redirect::to('tipocliente');
 	}
}
