<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\support\Facades\Input;

class EmpleadoRequest extends FormRequest
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
    {
      if(Input::has('idempleado')){

            $id=Input::get('ideempleado');
         //   $id=Request::get('idempleado');
            return [                
                "cedula"=>"unique:empleados,cedula|min:10|max:10",
                "nombre"=>"required|min:3|max:25",
                "apellido"=>"required|min:3|max:25",
                "nacimiento"=>"required|date", 
                "ciudad"=>"required|min:3|max:25",
                "direccion"=>"required|min:3|max:25",
                "telefono"=>"required|alpha_num|min:10|max:10",               
                "estado"=>"required|alpha_num|size:1"
            ];
         }else{
        return [             
                "cedula"=>"unique:empleados,cedula|min:10|max:13",
                "nombre"=>"required|min:3|max:25",
                "apellido"=>"required|min:3|max:25",
                "nacimiento"=>"required|date", 
                "ciudad"=>"required|min:3|max:25",
                "direccion"=>"required|min:3|max:25",
                "telefono"=>"required|alpha_num|min:10|max:10",                
                "estado"=>"required|alpha_num|size:1"
         ];
        }
    }
}
