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
      if(Input::has('IDEMPLEADO')){
            $id=Input::get('IDEMPLEADO');
            return [                
                "CEDULA"=>"unique:empleados,CEDULA|min:10|max:10",
                "NOMBRE"=>"required|min:3|max:25",
                "APELLIDO"=>"required|min:3|max:25",
                "NACIMIENTO"=>"required|date", 
                "CIUDAD"=>"required|min:3|max:25",
                "DIRECCION"=>"required|min:3|max:25",
                "TELEFONO"=>"required|alpha_num|min:10|max:10",               
                "ESTADO"=>"required|alpha_num|size:1"
            ];
         }else{
        return [             
                "CEDULA"=>"unique:empleados,CEDULA|min:10|max:13",
                "NOMBRE"=>"required|min:3|max:25",
                "APELLIDO"=>"required|min:3|max:25",
                "NACIMIENTO"=>"required|date", 
                "CIUDAD"=>"required|min:3|max:25",
                "DIRECCION"=>"required|min:3|max:25",
                "TELEFONO"=>"required|alpha_num|min:10|max:10",                
                "ESTADO"=>"required|alpha_num|size:1"
         ];
        }
    }
}
