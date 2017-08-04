<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Role_user;
use App\Role;
use DB;
use App\Http\Requests;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{

	 public function __construct(){
      $this->middleware('role:admin');// debe autenticar el usuario para poder usar el controlador
    }

	
 	
 	public function createrole($id){
 		$role_user=Role_user::all();
 		$role=Role::all();
 		$user=User::find($id);
 		return view('usuarios.createrole',compact('user'));
 	}	
 	
 	

}
