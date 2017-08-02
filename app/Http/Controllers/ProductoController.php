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
 	//	$this->middleware('auth');// debe autenticar el usuario para poder usar el controlador
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
 		return Redirect::to('producto');
 	}
 	public function edit($id){
 		$producto=Producto::find($id);
 		return view('productos.edit',compact('producto'));

 	}
 	public function update(ProductoRequest $request, $id){
 			Producto::updateOrCreate(['idproducto'=>$id],$request->all());
 			return Redirect::to('producto');
 	}

 	public function delete($id){
 		Producto::destroy($id);
 		return Redirect::to('producto');
 	}

 	public function show(){
      $url="http://wsinventario.herokuapp.com/product";
      //$url="file:///C:/Users/DAVID/Desktop/webservicelocal.html";
      $json=file_get_contents($url);
      $listado=json_decode($json,true);

      foreach($listado['data'] as $list){
      	$aux=$list['ID_PROD'];
        $prod=Producto::find($aux);

        if($prod== null){
          $id=$list['ID_PROD'];
          $nombre=$list['NOMBRE_PROD'];
          $descripcion=$list['DESCRIPCION_PROD'];
          $grabiva=$list['GRABA_IVA_PROD'];
          $costo=$list['COSTO_PROD'];
          $precio=$list['PVP_PROD'];
          $estado=$list['ESTADO_PROD'];
          $stock=$list['STOCK_PROD'];
          
          Producto::create(['idproducto'=>$id,'stock'=>$stock,'nombrep'=>$nombre,'descripcion'=>$descripcion,'valor'=>$precio]);
        }
    }

    foreach (Producto::all() as $produ) {
	foreach ($listado['data'] as $list) {
		if($produ->idproducto==$list['ID_PROD']){
			$x=true;
		}else{
			$x=false;
		}
	}
	if($x==false){
		Producto::delete($produ->idproducto);
	}
}
return Redirect::to('producto');
//return view('productos.index');
}
 }


