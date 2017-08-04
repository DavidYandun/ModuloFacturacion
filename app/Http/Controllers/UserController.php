<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
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

	public function index(){ 
 		$role_user=Role_user::all();
 		$role=Role::all();
 		//return view('usuarios.index',compact('role_user'));
 		$user=User::all();
 		return view('usuarios.index',compact('role_user','role','user'));
 	}
 	
 	public function create(){
 		$user=User::all();
 		return view('usuarios.create',compact('user'));
 	}



 	public function store(UserRequest $request){

 		//User::create($request->all());
 		
 		$user = new User;
 		$user->name=$request->get('name');
 		$user->email=$request->get('email');
 		$user->password=bcrypt($request->get('password'));
 		$user->save();
 		//User::create(['name'=>$request->get('name'),'email'=>$request->get('email'),'password'=>$request->get('password')]);
 		//Role_user::create(['user_id'=>User::all()->last()->id,'role_id'=>$request->get('rol')]);
 		
 		return Redirect::to('usuarios');
	}

	public function edit($id){
 		$usuarios=User::find($id);
 		return view('usuarios.edit',compact('usuarios'));

 	}
 	public function update(UserRequest $request, $id){
 			User::updateOrCreate(['id'=>$id],$request->all());
 			return Redirect::to('usuarios');
 	}

 	public function delete($id){
 		User::destroy($id);
 		return Redirect::to('usuarios');
 	}
 	public function show($id){
 		return view('usuarios.index',['user'=>User::findOrFail($id)]);
 	}
    
}
