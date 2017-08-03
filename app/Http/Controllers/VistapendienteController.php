<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;
use App\Http\Requests\FacturaspendientesRequest;
use App\Facturaspendientes;
use App\Cabecera;
use App\Detalle;
use Illuminate\Support\Collections;

use App\Cliente;
use App\Caja;
use App\Producto;
use DB;

class VistapendienteController extends Controller
{
    public function index(){
        $facturaspendientes=Facturaspendientes::all();
        $cabecera=Cabecera::all();
        $cliente= Cliente::all();
        

        return view('vistapendiente.index',compact('facturaspendientes','cabecera','cliente'));

    }
    public function show($id){
        $facturaspendientes=Facturaspendientes::paginate(10);
        $cabecera=Cabecera::all();
        $cliente= Cliente::find($id);

        return view('vistapendiente.show',compact('facturaspendientes','cabecera','cliente'));

    }
}
