<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Http\Requests\CabeceraRequest;
use App\Cabecera;
use Http\ClienteController;

class CabeceraController extends Controller
{
   public function __construct(){
    //  $this->middleware('auth');// debe autenticar el usuario para poder usar el controlador
    }
    public function index(){
        $cabecera=Cabecera::paginate(10);
        return view('cabecera.index',compact('cabecera'));
    }
    public function create(){
        return view('cabecera.create');
    }   


    public function store(CabeceraRequest $request){
        Cabecera::create($request->all());
        return Redirect::to('cabecera');
    }
    public function edit($id){
        $cabecera=Cabecera::find($id);
        $clientes= DB::table('cliente')->orderBy('NOMBRE', 'APELLIDO')->lists('NOMBRE','IDCLIENTE');
        return view('cabecera.edit',compact('cabecera','clientes'));

    }


      /*public function edit($id){

        $installation = Installation::find($id); 
        $clients = DB::table('clients')->orderBy('name', 'asc')->lists('name','id');

        return view('installation.edit', compact('installation','clients'));
    }*/


    public function update(CabeceraRequest $request, $id){
            Cabecera::updateOrCreate(['IDCABECERA'=>$id],$request->all());
            return Redirect::to('cabecera');
    }

    public function delete($id){
        Cabecera::destroy($id);
        return Redirect::to('cabecera');
    }
 }
