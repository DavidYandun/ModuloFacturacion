<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class maestroDetalleController extends Controller
{
	public function _construct()
	{

	}
	public function index(Request $request)
	{
		if ($request)
		{
		$query=trim($request->get('searchText'));
		$cabeceras=DB::table('cabecera as c')
		->join('clientes as p','c.IDCLIENTE','=','p.IDCLIENTE')
		->join('detalle as d','c.IDCABECERA','=','d.IDCABECERA')
		->select('p.NOMBRE','c.NUMERO','c.FECHA','c.SUTOTAL','c.IVA','c.DESCUENTO','c.TOTAL')
		->where('c.NUMERO','LIKE','%'.$query.'%')
		->orderBy('c.IDCABECERA','desc')
		->groupBy('p.NOMBRE','c.NUMERO','c.FECHA','c.SUTOTAL','c.IVA','c.DESCUENTO','c.TOTAL')
		->paginate(10);
		return view('maestrodetalle.index',["cabeceras"=>$cabeceras,"searchText"=>$query]);
		}
	}
    public function create()
    {
    	$clientes=DB::table('cliente')
    	$productos = DB::table('producto as prd')
    	->select(DB::raw('CONCAT(prd.IDPRODUCTO, " " ,prd.NOMBREP) AS producto'),'prd.IDPRODUCTO')
    	->where('prd.STOCK','>','0')
    	->get();
    	return view('maestrodetalle.index',['cliente'=>$clientes,"producto"=>$productos]);
    }
    public function store (maestroDetalleRequest $request)
    {
    	try{
    		DB::beginTransaction();
    		$cabecera=new Cabecera;
    		$cabecera->IDCLIENTE=$request->get('IDCLIENTE');
    		$cabecera->IDCAJA=$request->get('IDCAJA');
    		$cabecera->NUMERO=$request->get('NUMERO');
    		$cabecera->FECHA=$request->get('FECHA');
    		$cabecera->SUBTOTAL=$request->get('SUBTOTAL');
    		$cabecera->IVA=$request->get('IVA');
    		$cabecera->DESCUENTO=$request->get('DESCUENTO');
    		$cabecera->TOTAL=$request->get('TOTAL');
    		$cabecera->save();

             


    		DB::commit();
    	}catch(\Exception $e)
    	{

    		DB::rollback();

    	}
    }
}
