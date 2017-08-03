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
use Barryvdh\DomPDF\Facade as PDF;



class CabeceraController extends Controller
{
   public function __construct(){

    $this->middleware('auth');// debe autenticar el usuario para poder usar el controlador

      $this->middleware('auth');// debe autenticar el usuario para poder usar el controlador

    }

    #Función index

    public function index(){
        $cabecera=Cabecera::paginate(10);
        $cliente= Cliente::all();
        $caja= Caja::all();

        return view('cabecera.index',compact('cabecera'),compact('cliente','caja'));

    }
    
    public function create(){
        $cliente= Cliente::all();
        $caja= Caja::all();
        $producto=Producto::all(); 
        $cabecera=Cabecera::all();
        return view('cabecera.create',compact('cliente','caja','producto','cabecera'));      
    }   
   
    public function store(CabeceraRequest $request){
       
         DB::beginTransaction();
       $cabecera=new Cabecera;
     
            $cabecera->idcliente=$request->get('idcliente');
            $cabecera->idcaja=$request->get('idcaja');
           // $cabecera->NUMERO=0;
            $cabecera->estado=$request->get('estado');

            $mytime = Carbon::now('America/Guayaquil');
            $cabecera->fecha=$mytime->toDateTimeString();
            
            $cabecera->subtotal=$request->get('subtotal');            
            //$cabecera->DESCUENTO=0;
            $cabecera->iva=$request->get('iva');
            $cabecera->total=$request->get('total');          
            $cabecera->save();

                   
         $idproducto = $request->get('idproducto');
         $cantidad = $request->get('cantidad');
         $valor_unitario = $request->get('valor_unitario');
         //$descuento = $request->get('DESCUENTO');
         $valor_total = $request->get('valor_total');
         
         $cont = 0;
        
         while($cont<count($idproducto)){

             $detalle = new Detalle();
             $detalle->idcabecera= $cabecera->idcabecera; 

             $detalle->idproducto= $idproducto[$cont];
             $detalle->cantidad= $cantidad[$cont];
             $detalle->valor_unitario= $valor_unitario[$cont];
             //$detalle->DESCUENTO= $descuento[$cont];
             $detalle->valor_total= $valor_total[$cont];                          
             $detalle->save();
             $cont=$cont+1;                        
         }       

        DB::commit();    
       
        return Redirect::to('cabecera');
    } 
    public function ExportPDF($id)
{
    $cabecera=DB::table('cabecera as c')
            ->join('clientes as cli','c.idcliente','=','cli.idcliente')
            ->join('caja as caj','c.idcaja','=','caj.idcaja')
            ->select('c.idcabecera','cli.nombre','cli.apellido','cli.cedula','cli.direccion','caj.idcaja','c.fecha','c.subtotal','c.iva','c.total')
            ->where('c.idcabecera',$id)
            ->first(); // Arriba ya se utilizo group by, acá utilizar first para traer únicamente el primero.

        $detalles=DB::table('detalle as d')
            ->join('productos as p','d.idproducto','=','p.idproducto')
            ->select('p.nombrep','d.cantidad','d.valor_unitario','d.valor_total')
            ->where('d.idcabecera','=',$id)
            ->get();

    $pdf = PDF::loadView("cabecera.imprimir",["cabecera"=>$cabecera,"detalles"=>$detalles]);
    return $pdf->download('cabecera.pdf');
}


        public function show($id)
    {
        $cabecera=DB::table('cabecera as c')
            ->join('clientes as cli','c.idcliente','=','cli.idcliente')
            ->join('caja as caj','c.idcaja','=','caj.idcaja')
            ->select('c.idcabecera','cli.nombre','cli.apellido','cli.cedula','cli.direccion','caj.idcaja','c.fecha','c.subtotal','c.iva','c.total')
            ->where('c.idcabecera',$id)
            ->first(); // Arriba ya se utilizo group by, acá utilizar first para traer únicamente el primero.

        $detalles=DB::table('detalle as d')
            ->join('productos as p','d.idproducto','=','p.idproducto')
            ->select('p.nombrep','d.cantidad','d.valor_unitario','d.valor_total')
            ->where('d.idcabecera','=',$id)
            ->get();
        return view("cabecera.show",["cabecera"=>$cabecera,"detalles"=>$detalles]);                    
    }    

    public function destroy($id)
    {
        $cabecera=Ingreso::findOrFail($id);
        $cabecera->estado='I';
        $cabecera->update();
        return Redirect::to('cabecera');
    }

    public function edit($id){
        $cabecera=Cabecera::find($id);       
         $cliente= Cliente::all();
        $caja= Caja::all();
        return view('cabecera.edit',compact('cabecera','cliente','caja'));

    }

    public function update(CabeceraRequest $request, $id){
        
            Cabecera::updateOrCreate(['idcabecera'=>$id],$cabecera->estado=$request->get('estado'));
            return Redirect::to('cabecera');
    }
    public function actualizar($id){
          $cabecera=Cabecera::findOrFail($id);
        $cabecera->estado='I';
        $cabecera->update();
        return Redirect::to('cabecera');
    }
  }

     
  /* public function ultimafactura(){
    $price = DB::table('cabecera')->max('idcabecera');
    return view('price');
   }


    /*public function delete($id){        
            Cabecera::destroy($id);
        return Redirect::to('cabecera');*/


 
    
