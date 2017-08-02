<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\support\Facades\Input;

class CabeceraRequest extends FormRequest
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
        if(Input::has('idcabecera')){
            $id=Request::Get('idcabecera');
        return [
            "idcliente"=>"required|min:1|max:1000",
            "idcaja"=>"required|integer|min:1|max:11",
            
            //"FECHA"=>"required|date(dd-mm-aaaa)",
            
           
        ];
     }else{ 
        return[
            "idcliente"=>"required|min:1|max:1000",
            "idcaja"=>"required|integer|min:1|max:11",
            
            //"FECHA"=>"required|date(dd-mm-aaaa)",
          
        ];
     }
    }
}