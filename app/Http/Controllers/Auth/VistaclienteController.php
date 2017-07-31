<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Requests\CabeceraRequest;
use App\Cabecera;
use App\Detalle;
use Carbon\Carbon;//Control de Fechas
use Response;
use Illuminate\Support\Collections;
use App\Cliente;
use App\Caja;
use App\Producto;


class VistaclienteController extends Controller
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
  
 }
    
