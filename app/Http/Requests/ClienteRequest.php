<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\support\Facades\Input;

class ClienteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
<<<<<<< HEAD
    {
        if(Input::has('IDCLIENTE')){
            $id=Input::get('IDCLIENTE');
            return [
                "IDTIPO"=>"required|integer|min:1|max:11",
                "CEDULA"=>"required|min:10|max:10",
                "NOMBRE"=>"required|min:3|max:25",
                "APELLIDO"=>"required|min:3|max:25",
                "NACIMIENTO"=>"required|date", 
                "CIUDAD"=>"required|min:3|max:25",
                "DIRECCION"=>"required|min:3|max:25",
                "TELEFONO"=>"required|alpha_num|size:10",
                "EMAIL"=>"required|min:3|max:50",
                "ESTADO"=>"required|alpha_num|size:1"
            ];
         }else{
        return [
             "IDTIPO"=>"required|integer|min:1|max:11",
                "CEDULA"=>"required|min:10|max:13",
                "NOMBRE"=>"required|min:3|max:25",
                "APELLIDO"=>"required|min:3|max:25",
                "NACIMIENTO"=>"required|date", 
                "CIUDAD"=>"required|min:3|max:25",
                "DIRECCION"=>"required|min:3|max:25",
                "TELEFONO"=>"required|alpha_num|size:10",
                "EMAIL"=>"required|min:3|max:50",
                "ESTADO"=>"required|alpha_num|size:1"
         ];
=======
    { 
        if(Input::has('IDCLIENTE')){
            $id=Input::get('IDCLIENTE');
            return [
                 "IDTIPO"=>"required|min:3|max:20",
                "CEDULA"=>"required",
                "APELLIDO"=>"required|integer",
                "NACIMIENTO"=>"required|integer|min:10|max:50",
                "CIUDAD"=>"required|integer|min:10|max:50",
                "DIRECCION"=>"required|integer|min:10|max:50",
                "TELEFONO"=>"required|integer|min:10|max:50",
                "EMAIL"=>"required|integer|min:10|max:50",
                "EDAD"=>"required|integer|min:10|max:50"
            ];
        }else{
            return [
               "nombre"=>"required|min:3|max:20",
                   "IDTIPO"=>"required|min:3|max:20",
                "CEDULA"=>"required",
                "NOMBRE"=>"required|unique:productos,codigo,".$id.",idProducto|alpha_num|size:8",
                "APELLIDO"=>"required|integer",
                "NACIMIENTO"=>"required|integer|min:10|max:50",
                "CIUDAD"=>"required|integer|min:10|max:50",
                "DIRECCION"=>"required|integer|min:10|max:50",
                "TELEFONO"=>"required|integer|min:10|max:50",
                "EMAIL"=>"required|integer|min:10|max:50",
                "EDAD"=>"required|integer|min:10|max:50"
            ];
        }
        
>>>>>>> 6dd7579f5c3ca9388d0aee3f4b7ebff7365bc2d5
        }
    }
}
