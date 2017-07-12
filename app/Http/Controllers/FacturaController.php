<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;
use App\Http\Requests\ClienteRequest;
use App\Cliente;

public function buscarUsuario($cedula){
 		$cliente=Cliente::find(cedula);
 		$tipocliente=Tipocliente::all();
 		return view('clientes.edit',compact('cliente','tipocliente'));

 	}

?>