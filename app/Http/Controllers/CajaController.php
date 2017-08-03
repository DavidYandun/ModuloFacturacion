<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Http\Requests\CajaRequest;
use App\Caja;
class CajaController extends Controller
{
    public function __construct(){
 		$this->middleware('role:admin');// debe autenticar el usuario para poder usar el controlador
 	}
 	public function index(){
 		$caja=Caja::paginate(10);
 		return view('caja.index',compact('caja'));

 	}
 	public function create(){
 		return view('caja.create');
 	}	

 	public function store(CajaRequest $request){
 	
 		Caja::create($request->all());
 		//$prductos=Producto::paginate(10);
 	//	return view('productos.index',compact('productos'));
 		return Redirect::to('caja');
 	}

 	public function edit($id){
 		
 		return view('caja.edit',['caja'=>Caja::findOrFail($id)]);

 	}
 	public function show($id){
 		return view('caja.show',['caja'=>Caja::findOrFail($id)]);
 	}
 	
 	public function update(CajaRequest $request, $id){
 			Caja::updateOrCreate(['idcaja'=>$id],$request->all());
 			//$tipocliente->tipocliente=$request->get('DETALLE');
 			
 			return Redirect::to('caja');
 	}
 	
 	public function delete($id){
        Caja::destroy($id);
        return Redirect::to('caja');
    }
}
