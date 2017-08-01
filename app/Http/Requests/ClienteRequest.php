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

    {

        if(Input::has('IDCLIENTE')){
            $id=Input::get('IDCLIENTE');
            return [         
                "IDTIPO"=>"required|integer|exists:tipo_cliente,IDTIPO",              
                "CEDULA"=>"unique:clientes,CEDULA|min:10|max:10".$id.",IDCLIENTE",
                "NOMBRE"=>"required|string|min:3|max:25",
                "APELLIDO"=>"required|string|min:3|max:25",
                "NACIMIENTO"=>"required|date", 
                "CIUDAD"=>"required|string|min:3|max:25",
                "DIRECCION"=>"required|string|min:3|max:25",
                "TELEFONO"=>"required|alpha_num|min:9|max:10",
                "EMAIL"=>"required|min:3|max:50",                
                "ESTADO"=>"required|in:A,I"
            ];
         }else{
        return [
              "IDTIPO"=>"required|integer|exists:tipo_cliente,IDTIPO",              
                "CEDULA"=>"unique:clientes,CEDULA|min:10|max:10",
                "NOMBRE"=>"required|string|min:3|max:25",
                "APELLIDO"=>"required|string|min:3|max:25",
                "NACIMIENTO"=>"required|date", 
                "CIUDAD"=>"required|string|min:3|max:25",
                "DIRECCION"=>"required|min:3|max:25",
                "TELEFONO"=>"required|alpha_num|min:9|max:10",
                "EMAIL"=>"required|min:3|max:50",                
                "ESTADO"=>"required|in:A,I"
         ];

       

        }
    }
}
