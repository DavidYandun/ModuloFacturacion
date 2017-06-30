<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Http\Requests\FacturaspendientesRequest;
use App\Facturaspendientes;

class FacturaspendientesController extends Controller
{
    public function __construct(){
 		$this->middleware('auth');// debe autenticar el usuario para poder usar el controlador
 	}
 	public function index(){
 		$facturaspendientes=Facturaspendientes::paginate(10);
 		return view('facturaspendientes.index',compact('facturaspendientes'));

 	}
 	public function create(){
 		return view('facturaspendientes.create');
 	}	

 	public function store(FacturaspendientesRequest $request){
 		Facturaspendientes::create($request->all());
 		//$prductos=Producto::paginate(10);
 	//	return view('detalles.index',compact('detalles'));
 		return Redirect::to('facturaspendientes');
 	}

 	
 	public function edit($id){
 		
 		return view('facturaspendientes.edit',['facturaspendiente'=>Facturaspendientes::findOrFail($id)]);

 	}
 	public function show($id){
 		return view('facturaspendientes.show',['facturaspendientes'=>Facturaspendientes::findOrFail($id)]);
 	}

 	public function update(FacturaspendientesRequest $request, $id){
 			Facturaspendientes::updateOrCreate(['IDPENDIENTE'=>$id],$request->all());
 			return Redirect::to('facturaspendientes');
 	}
 	
 	public function destroy($id){
 		$user=Facturaspendientes::find($id);
 		$user->delete();
 		return Redirect::to('facturaspendientes');
 	}
}
