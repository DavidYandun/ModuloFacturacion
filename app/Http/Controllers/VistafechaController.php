<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;
use App\Http\Requests\CabeceraRequest;
use App\Cabecera;
use App\Detalle;
use Illuminate\Support\Collections;

use App\Cliente;
use App\Caja;
use App\Producto;
use DB;

class VistafechaController extends Controller
{
    public function index($id){
        $fechaIni=$fi;
        $fechaFin=$ff;
        $cliente= Cliente::all();
        $caja= Caja::all();
        $cabecera=Cabecera::whereDate('fecha','>=' ,$fechaIni)->whereDate('fecha','<=',$fechaFin)->orderBy('fecha')->get();        
     //   $pdf = \PDF::loadView('reportes.fechas',
       //          ["cabecera"=>$cabecera,'fechaIni'=>$fechaIni,'fechaFin'=>$fechaFin]);
       // return $pdf->stream('cabecera por fechas.pdf');       
        return view('vistafecha.show', ["cabecera"=>$cabecera,'fechaIni'=>$fechaIni,'fechaFin'=>$fechaFin,"caja"=>$caja, "cliente"=>$cliente]);

    }
    public function ReporteFechas($fi,$ff){
        $fechaIni=$fi;
        $fechaFin=$ff;
        $cabecera=Cabecera::whereDate('fecha','>=' ,$fechaIni)->whereDate('fecha','<=',$fechaFin)->orderBy('fecha')->get();
        $pdf = \PDF::loadView('reportes.fechas',
                 ["cabecera"=>$cabecera,'fechaIni'=>$fechaIni,'fechaFin'=>$fechaFin]);
        return $pdf->stream('cabecera por fechas.pdf');
         }
  

    }

