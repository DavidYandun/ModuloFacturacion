<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Input;

class ProductoRequest extends FormRequest
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
        
        }
    }
}