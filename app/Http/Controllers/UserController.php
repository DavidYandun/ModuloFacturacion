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

	public function index(){ 
 		//$role_user=Role_user::all();
 		//return view('usuarios.index',compact('role_user'));
 		$user=User::all();
 		return view('usuarios.index',compact('user'));
 	}
 	
 	public function create(){
 		$user=User::all();
 		return view('usuarios.create',compact('user'));
 	}	/*
 public function store(UserRequest $request){
 		$user=(new User)->fill($request->except('role'));
 		$user->save();
 		$role=Role::where('name',$request->role)->firstOrFail();
 		$user->attachRole($role);
 		return Redirect::to('usuarios');
 	}*/
 	public function store(UserRequest $request){
 		User::create($request->all());
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
    
}
