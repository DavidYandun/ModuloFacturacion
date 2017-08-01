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
    //  $this->middleware('auth');// debe autenticar el usuario para poder usar el controlador
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
     
            $cabecera->IDCLIENTE=$request->get('IDCLIENTE');
            $cabecera->IDCAJA=$request->get('IDCAJA');
          //  $cabecera->NUMERO=0;
            $cabecera->ESTADO=$request->get('ESTADO');

            $mytime = Carbon::now('America/Guayaquil');
            $cabecera->FECHA=$mytime->toDateTimeString();
            
            $cabecera->SUBTOTAL=$request->get('SUBTOTAL');            
          //  $cabecera->DESCUENTO=0;
            $cabecera->IVA=$request->get('IVA');
            $cabecera->TOTAL=$request->get('TOTAL');          
            $cabecera->save();

                   
         $idproducto = $request->get('IDPRODUCTO');
         $cantidad = $request->get('CANTIDAD');
         $valor_unitario = $request->get('VALOR_UNITARIO');
         //$descuento = $request->get('DESCUENTO');
         $valor_total = $request->get('VALOR_TOTAL');
         
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
    public function ExportPDF($id)
{
    $cabecera = Cabecera::find($id)->first();
    $detalles = Detalle::all();
    $pdf = PDF::loadView("cabecera.imprimir",["cabecera"=>$cabecera,"detalles"=>$detalles]);
    return $pdf->download('cabecera.pdf');

}

        public function show($id)
    {
        $cabecera=DB::table('cabecera as c')
            ->join('clientes as cli','c.IDCLIENTE','=','cli.IDCLIENTE')
            ->join('caja as caj','c.IDCAJA','=','caj.IDCAJA')
            ->select('c.IDCABECERA','cli.NOMBRE','cli.APELLIDO','cli.CEDULA','cli.DIRECCION','caj.IDCAJA','c.FECHA','c.SUBTOTAL','c.IVA','c.TOTAL')
            ->where('c.IDCABECERA',$id)
            ->first(); // Arriba ya se utilizo group by, acá utilizar first para traer únicamente el primero.

        $detalles=DB::table('detalle as d')
            ->join('productos as p','d.IDPRODUCTO','=','p.IDPRODUCTO')
            ->select('p.NOMBREP','d.CANTIDAD','d.VALOR_UNITARIO','d.VALOR_TOTAL')
            ->where('d.IDCABECERA','=',$id)
            ->get();
        return view("cabecera.show",["cabecera"=>$cabecera,"detalles"=>$detalles]);
            
        
    }
    public function pdf($id){
        $cabecera=DB::table('cabecera as c')
            ->join('clientes as cli','c.IDCLIENTE','=','cli.IDCLIENTE')
            ->join('caja as caj','c.IDCAJA','=','caj.IDCAJA')
            ->select('c.IDCABECERA','cli.NOMBRE','cli.APELLIDO','cli.CEDULA','cli.DIRECCION','caj.IDCAJA','c.FECHA','c.SUBTOTAL','c.IVA','c.DESCUENTO','c.TOTAL')
            ->where('c.IDCABECERA',$id)
            ->first();
            $detalles=DB::table('detalle as d')
            ->join('productos as p','d.IDPRODUCTO','=','p.IDPRODUCTO')
            ->select('p.NOMBREP','d.CANTIDAD','d.VALOR_UNITARIO','d.DESCUENTO','d.VALOR_TOTAL')
            ->where('d.IDCABECERA','=',$id)
            ->get();
            $view = view("cabecera.show",["cabecera"=>$cabecera,"detalles"=>$detalles]);
            $pdf= \App::make('dompdf.wrapper');
            $pdf->loadHTML($view);

            return $pdf->stream('detalles');
    }

    public function destroy($id)
    {
        $cabecera=Ingreso::findOrFail($id);
        $cabecera->ESTADO='I';
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

     
  /* public function ultimafactura(){
    $price = DB::table('cabecera')->max('IDCABECERA');
    return view('price');
   }


    /*public function delete($id){        
            Cabecera::destroy($id);
        return Redirect::to('cabecera');*/


 }
    
