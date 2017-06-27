<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Http\Requests\CabeceraRequest;
use App\Cabecera;

class CabeceraController extends Controller
{
    public function __construct(){
        $this->middleware('auth');// debe autenticar el usuario para poder usar el controlador
    }
    public function index(){
        $cabecera=Cabecera::paginate(10);
        return view('cabecera.index',compact('cabecera'));
    }
    public function create(){
        return view('cabecera.create');
    }   

    public function store(Request $request){
        Cabecera::create($request->all());
        //$prductos=Producto::paginate(10);
    //  return view('productos.index',compact('productos'));
        return Redirect::to('cabecera');
    }

    public function edit($id){
        $cabecera=Cabecera::find($id);
        return view('cabecera.edit',compact('cabecera'));

    }
    public function update(Request $request, $id){
            Cabecera::updateOrCreate(['IDCABECERA'=>$id],$request->all());
            return Redirect::to('cabecera');
    }
    public function destroy($id){
        $user=Cabecera::find($id);
        $user->delete();
        return Redirect::to('cabecera');
    }
 }


