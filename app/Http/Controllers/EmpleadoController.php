<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;
use App\Http\Requests\EmpleadoRequest;
use App\Empleado;
use Barryvdh\DomPDF\Facade as PDF;

class EmpleadoController extends Controller
{
    public function __construct(){
      $this->middleware('role:admin');// debe autenticar el usuario para poder usar el controlador
    }
    public function index(){
        $empleados=Empleado::paginate(10);
        return view('empleados.index',compact('empleados'));
    }
    public function create(){
        return view('empleados.create');
    }  
    public function ExportPDF()
    {
        $empleados=Empleado::all();
        $pdf = PDF::loadView('empleados.show',compact('empleados') );
        return $pdf->download('empleados.pdf');
    } 


    public function store(EmpleadoRequest $request){
        Empleado::create($request->all());
        return Redirect::to('empleado');
    }
    public function edit($id){
        $empleado=Empleado::find($id);
        return view('empleados.edit',compact('empleado'));
    }
    public function update(EmpleadoRequest $request, $id){
            Empleado::updateOrCreate(['IDEMPLEADO'=>$id],$request->all());
            return Redirect::to('empleado');
    }
   public function delete($id){
        Empleado::destroy($id);
        return Redirect::to('empleado');
    }

 }


