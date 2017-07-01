<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\support\Facades\Input;


class TipoclienteRequest extends FormRequest
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
         if(Input::has('IDTIPO')){
            $id=Input::get('IDTIPO');
            return [   
            "DETALLE"=>"required|min:1|max:2"
             ];
         }else{
        return [    
         "DETALLE"=>"required|min:1|max:2"               
         ];
        }
    }
}
