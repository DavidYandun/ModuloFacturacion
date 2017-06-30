<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Input;

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
               
                'CEDULA'=>'required|size:10|CEDULA|unique:clientes,CEDULA,'.$ID.',IDCLIENTE',
                'NOMBRE'=>'required|min:3|max:20',
                'APELLIDO'=>'required|min:3|max:20',
                'NACIMIENTO'=>'required',
                'CUIDAD'=>'required|min:3|max:20',
                'DIRECCION'=>'required|min:10|max:20',
                'TELEFONO'=>'required|size:10',
                'EMAIL'=>'required|max:50',
                'ESTADO'=>'required|in:A,I'
            ];
        }else{
            return [
            'CEDULA'=>'required|size:10|CEDULA|unique:clientes',
               'NOMBRE'=>'required|min:3|max:20',
                'APELLIDO'=>'required|min:3|max:20',
                'NACIMIENTO'=>'required|NACIMIENTO,'.$ID.',IDCLIENTE',
                'CUIDAD'=>'required|min:3|max:20',
                'DIRECCION'=>'required|min:10|max:20',
                'TELEFONO'=>'required|size:10',
                'EMAIL'=>'required|max:50',
                'ESTADO'=>'required|in:A,I'
                ];
        }
        
    }
}