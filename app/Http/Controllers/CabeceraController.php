<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;
use App\Http\Requests\CabeceraRequest;


use App\Cabecera;
use App\Detalle;
use DB;

use Carbon\Carbon;//Control de Fechas
use Response;
use Illuminate\Support\Collections;

use App\Cliente;
use App\Caja;
use App\Producto;

class CabeceraController extends Controller
{
   public function __construct(){
    //  $this->middleware('auth');// debe autenticar el usuario para poder usar el controlador
    }

    #Función index

    public function index(){
        $cabecera=Cabecera::paginate(10);
        $cliente= Cliente::all();
        $caja= Caja::all();

        return view('cabecera.index',compact('cabecera'),compact('cliente','caja'));

        $producto=Producto::All();
       return view('cabecera.index',compact('cabecera'));
    }

  

    public function create(){
        $cliente= Cliente::all();
        $caja= Caja::all();
        $producto=Producto::All();        
        return view('cabecera.create',compact('cliente','caja','producto'));      
    }   
   


    public function store(CabeceraRequest $request){
       
         DB::beginTransaction();
       $cabecera=new Cabecera;
     
            $cabecera->IDCLIENTE=$request->get('IDCLIENTE');
            $cabecera->IDCAJA=$request->get('IDCAJA');
            $cabecera->NUMERO=0;
            $cabecera->ESTADO=$request->get('ESTADO');

            $mytime = Carbon::now('America/Guayaquil');
            $cabecera->FECHA=$mytime->toDateTimeString();
            
            $cabecera->SUBTOTAL=$request->get('SUBTOTAL');            
            $cabecera->DESCUENTO=0;
            $cabecera->IVA=$request->get('IVA');
            $cabecera->TOTAL=$request->get('TOTAL');          
            $cabecera->save();

                   
         $idproducto = $request->get('IDPRODUCTO');
         $cantidad = $request->get('CANTIDAD');
         $valor_unitario = $request->get('VALOR_UNITARIO');
         //$descuento = $request->get('DESCUENTO');
         $valor_total = $request->get('TOTAL');
         
         $cont = 0;
        
         while($cont<count($idproducto)){

             $detalle = new Detalle();
             $detalle->IDCABECERA= $cabecera->IDCABECERA; 

             $detalle->IDPRODUCTO= $idproducto[$cont];
             $detalle->CANTIDAD= $cantidad[$cont];
             $detalle->VALOR_UNITARIO= $valor_unitario[$cont];
             //$detalle->DESCUENTO= $descuento[$cont];
             $detalle->VALOR_TOTAL= $valor_total[$cont];                          
             $detalle->save();
             $cont=$cont+1;                        
         }       

        DB::commit();
    
       
        return Redirect::to('cabecera');
    } 

 /*       public function show($id)
    {
        $cabecera=DB::table('cabecera as c')
            ->join('clientes as p','c.IDCLIENTE','=','p.IDCLIENTE')
            ->join('caja as e','c.IDCAJA','=','e.IDCAJA')
            ->join('detalle as di','c.IDCABECERA','=','di.IDCABECERA')
            ->select('c.IDCABECERA','p.NOMBRE','c.IDCAJA','c.NUMERO','c.FECHA','c.SUBTOTAL','c.IVA','c.DESCUENTO',DB::raw('sum(di.CANTIDAD*VALOR_UNITARIO)-di.DESCUENTO as total'))
            ->where('c.IDCABECERA','=','$id')
            ->first(); // Arriba ya se utilizo group by, acá utilizar first para traer únicamente el primero.

        $detalles=DB::table('detalle as d')
            ->join('productos as p','d.IDPRODUCTO','=','p.IDPRODUCTO')
            ->select('p.NOMBREP as producto','d.CANTIDAD','d.VALOR_UNITARIO','d.DESCUENTO','d.VALOR_TOTAL')
            ->where('d.IDCABECERA','=',$id)
            ->get();
        return view("cabecera.show",["cabecera"=>$cabecera,"detalle"=>$detalles]);
    }
*/
    public function destroy($id)
    {
        $cabecera=Ingreso::findOrFail($id);
        $cabecera->ESTADO='I';
        $cabecera->update();
        return Redirect::to('cabecera');
    }
    public function show($id){
        $cabecera=Cabecera::find($id);
        $detalle=Detalle::all();
         return view('cabecera.show',compact('cabecera','detalle'));
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
        
            Cabecera::updateOrCreate(['IDCABECERA'=>$id],$cabecera->ESTADO=$request->get('ESTADO'));
            return Redirect::to('cabecera');
    }
    public function actualizar($id){
          $cabecera=Cabecera::findOrFail($id);
        $cabecera->ESTADO='I';
        $cabecera->update();
        return Redirect::to('cabecera');
    }

    public function delete($id){        
            Cabecera::destroy($id);
        return Redirect::to('cabecera');

 }
    }
