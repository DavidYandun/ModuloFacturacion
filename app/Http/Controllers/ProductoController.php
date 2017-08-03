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
      $json=file_get_contents($url);
      $listado=json_decode($json,true);

      foreach($listado['data'] as $list){
        $produc=Producto::all();
        $b=false;
        foreach ($produc as $p) {
          if ($p->idproducto != $list['ID_PROD']) {
            $b=false; 
            
          }
          else{
            $b=true;
            break;
          }

        }
       if ($b==false) {
          $nombre=$list['NOMBRE_PROD'];
          $descripcion=$list['DESCRIPCION_PROD'];
          $grabiva=$list['GRABA_IVA_PROD'];
          $costo=$list['COSTO_PROD'];
          $precio=$list['PVP_PROD'];
          $estado=$list['ESTADO_PROD'];
          $stock=$list['STOCK_PROD'];
          $idproducto=$list['ID_PROD'];
          
          Producto::create(['stock'=>$stock,'nombrep'=>$nombre,'descripcion'=>$descripcion,'valor'=>$precio,'idproducto'=>$idproducto]);
        } else if($b==true){
          $pp=Producto::find($list['ID_PROD']);
          //$pp->idproducto=$list['ID_PROD'];
          $pp->stock=$list['STOCK_PROD'];
          $pp->nombrep=$list['NOMBRE_PROD'];
          $pp->descripcion=$list['DESCRIPCION_PROD'];
          $pp->valor=$list['PVP_PROD'];
          $pp->save();
        }
          
      
    }

return Redirect::to('producto');
//return view('productos.index');
}
 }


