<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Http\Requests\ProductoRequest;
use App\Producto;

class ProductoController extends Controller
{
 	public function __construct(){
 		$this->middleware('auth');// debe autenticar el usuario para poder usar el controlador
 	}
 	public function index(){
 		$productos=Producto::paginate(10);
 		return view('productos.index',compact('productos'));

 	}
 	public function create(){
 		return view('productos.create');
 	}	

 	public function store(ProductoRequest $request){
 		Producto::create($request->all());
 		//$prductos=Producto::paginate(10);
 	//	return view('productos.index',compact('productos'));
 		return Redirect::to('producto');
 	}

 	public function edit($id){
 		$producto=Producto::find($id);
 		return view('productos.edit',compact('producto'));

 	}
 	public function update(ProductoRequest $request, $id){
 			Producto::updateOrCreate(['idProducto'=>$id],$request->all());
 			return Redirect::to('producto');
 	}
 	public function destroy($id){
 		Producto::destroy($id);
 		return Redirect::to('producto');
 	}
}