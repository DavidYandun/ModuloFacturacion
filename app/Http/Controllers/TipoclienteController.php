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
 	//	$this->middleware('auth');// debe autenticar el usuario para poder usar el controlador
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
 		return Redirect::to('tipocliente');
 	}
 	public function edit($id){
 		$tipocliente=Tipocliente::find($id);
 		return view('tipoclientes.edit',compact('tipocliente'));

 	}
 	public function update(TipoclienteRequest $request, $id){
 			Tipocliente::updateOrCreate(['IDTIPO'=>$id],$request->all());
 			return Redirect::to('tipocliente');
 	}

 	public function delete($id){
 		Tipocliente::destroy($id);
 		return Redirect::to('tipocliente');
 	}
 }


