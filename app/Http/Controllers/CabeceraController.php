<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Http\Requests\CabeceraRequest;
use App\Cabecera;
use Http\ClienteController;
use App\Cliente;
use App\Caja;

class CabeceraController extends Controller
{
   public function __construct(){
    //  $this->middleware('auth');// debe autenticar el usuario para poder usar el controlador
    }
    public function index(){
        $cabecera=Cabecera::paginate(10);
        $cliente= Cliente::all();
        $caja= Caja::all();
        return view('cabecera.index',compact('cabecera'),compact('cliente','caja'));
    }
    public function create(){
        $cliente= Cliente::all();
        $caja= Caja::all();
        return view('cabecera.create',compact('cliente','caja'));
    }   


    public function store(CabeceraRequest $request){
        Cabecera::create($request->all());
        return Redirect::to('cabecera');
    }
    public function edit($id){
        $cabecera=Cabecera::find($id);
       
         $cliente= Cliente::all();
        $caja= Caja::all();
        return view('cabecera.edit',compact('cabecera','cliente','caja'));

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
