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
<<<<<<< HEAD
    $this->middleware('auth');// debe autenticar el usuario para poder usar el controlador
=======
      $this->middleware('auth');// debe autenticar el usuario para poder usar el controlador
>>>>>>> c736e1fc64baf2e4d63922a7454b8681eb1a03b3
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
        $producto=Producto::All();        
        return view('cabecera.create',compact('cliente','caja','producto'));      
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

        public function show($id)
    {
        $cabecera=DB::table('cabecera as c')
            ->join('clientes as cli','c.idcliente','=','cli.idcliente')
            ->join('caja as caj','c.idcaja','=','caj.idcaja')
            ->select('c.idcabecera','cli.NOMBRE','cli.APELLIDO','cli.CEDULA','cli.DIRECCION','caj.idcaja','c.fecha','c.subtotal','c.iva','c.total')
            ->where('c.idcabecera',$id)
            ->first(); // Arriba ya se utilizo group by, acá utilizar first para traer únicamente el primero.

        $detalles=DB::table('detalle as d')
            ->join('productos as p','d.idproducto','=','p.idproducto')
            ->select('p.NOMBREP','d.cantidad','d.valor_unitario','d.valor_total')
            ->where('d.idcabecera','=',$id)
            ->get();
        return view("cabecera.show",["cabecera"=>$cabecera,"detalles"=>$detalles]);
            
        
    }
  /*  public function pdf($id){
        $cabecera=DB::table('cabecera as c')
            ->join('clientes as cli','c.idcliente','=','cli.idcliente')
            ->join('caja as caj','c.idcaja','=','caj.idcaja')
            ->select('c.idcabecera','cli.NOMBRE','cli.APELLIDO','cli.CEDULA','cli.DIRECCION','caj.idcaja','c.fecha','c.subtotal','c.iva','c.DESCUENTO','c.total')
            ->where('c.idcabecera',$id)
            ->first();
            $detalles=DB::table('detalle as d')
            ->join('productos as p','d.idproducto','=','p.idproducto')
            ->select('p.NOMBREP','d.cantidad','d.valor_unitario','d.DESCUENTO','d.valor_total')
            ->where('d.idcabecera','=',$id)
            ->get();
            $view = view("cabecera.show",["cabecera"=>$cabecera,"detalles"=>$detalles]);
            $pdf= \App::make('dompdf.wrapper');
            $pdf->loadHTML($view);

            return $pdf->stream('detalles');
    }*/

    public function destroy($id)
    {
        $cabecera=Ingreso::findOrFail($id);
        $cabecera->estado='I';
        $cabecera->update();
        return Redirect::to('cabecera');
    }
   /* public function show($id){
        $cabecera=Cabecera::find($id);
        $detalle=Detalle::all();
         return view('cabecera.show',compact('cabecera','detalle'));
    }*/
    public function edit($id){
        $cabecera=Cabecera::find($id);       
         $cliente= Cliente::all();
        $caja= Caja::all();
        return view('cabecera.edit',compact('cabecera','cliente','caja'));

    }
     public function ExportPDF($id)
{
    $cabecera = Cabecera::find($id)->first();
    $detalles = Detalle::find($id);
    $pdf = PDF::loadView('cabecera.show', compact('cabecera','detalles'));
    return $pdf->download('cabecera.pdf');

}


      /*public function edit($id){

        $installation = Installation::find($id); 
        $clients = DB::table('clients')->orderBy('name', 'asc')->lists('name','id');

        return view('installation.edit', compact('installation','clients'));
    }*/


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

     
  /* public function ultimafactura(){
    $price = DB::table('cabecera')->max('idcabecera');
    return view('price');
   }


    /*public function delete($id){        
            Cabecera::destroy($id);
        return Redirect::to('cabecera');*/


 }
    
