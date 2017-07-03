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
        if(Input::has('IDCABECERA')){
            $id=Input::Get('IDCABECERA');
        return [
            "IDCLIENTE"=>"required|integer|min:1|max:1000",
            "IDCAJA"=>"required|integer|min:1|max:11",
            "NUMERO"=>"required|integer",
            //"FECHA"=>"required|date(dd-mm-aaaa HH:mm:ss)",
            
            "SUBTOTAL"=>"required|numeric",
            "IVA"=>"required|numeric",
            "DESCUENTO"=>"required|numeric",
            "TOTAL"=>"required|numeric"            
        ];
     }else{ 
        return[
            "IDCLIENTE"=>"required|integer|min:1|max:1000",
            "IDCAJA"=>"required|integer|min:1|max:11",
            "NUMERO"=>"required|integer",
            //"FECHA"=>"required|date(dd-mm-aaaa HH:mm:ss)",
            "SUBTOTAL"=>"required|numeric",
            "IVA"=>"required|numeric",
            "DESCUENTO"=>"required|numeric",
            "TOTAL"=>"required|numeric"            
        ];
     }
    }
}   