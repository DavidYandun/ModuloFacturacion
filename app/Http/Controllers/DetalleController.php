<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Http\Requests\DetalleRequest;
use App\Detalle;

class DetalleController extends Controller
{
    public function __construct(){
 		$this->middleware('auth');// debe autenticar el usuario para poder usar el controlador
 	}
 	public function index(){
 		$detalles=Detalle::paginate(10);
 		return view('detalles.index',compact('detalles'));

 	}
 	public function create(){
 		return view('detalles.create');
 	}	

 	public function store(DetalleRequest $request){
 		Detalle::create($request->all());
 		//$prductos=Producto::paginate(10);
 	//	return view('detalles.index',compact('detalles'));
 		return Redirect::to('detalle');
 	}

 	
 	public function edit($id){
 		
 		return view('detalles.edit',['detalle'=>Detalle::findOrFail($id)]);

 	}
 	public function show($id){
 		return view('detalles.show',['detalle'=>Detalle::findOrFail($id)]);
 	}

 	public function update(DetalleRequest $request, $id){
 			Detalle::updateOrCreate(['IDDETALLE'=>$id],$request->all());
 			return Redirect::to('detalle');
 	}
 	
 	public function delete($id){
        Detalle::destroy($id);
        return Redirect::to('detalle');
    }
}
