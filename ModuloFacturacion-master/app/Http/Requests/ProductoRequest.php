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
        if(Input::has('idProducto')){
            $id=Input::get('idProducto');
            return [
                 "nombre"=>"required|min:3|max:20",
                "precio"=>"required|numeric",
                "codigo"=>"required|unique:productos,codigo,".$id.",idProducto|alpha_num|size:8",
                "cantidad"=>"required|integer",
                "minStock"=>"required|integer|min:10|max:50"
            ];
        }else{
            return [
               "nombre"=>"required|min:3|max:20",
                "precio"=>"required|numeric",
                "codigo"=>"required|unique:productos|alpha_num|size:8",
                "cantidad"=>"required|integer",
                "minStock"=>"required|integer|min:10|max:50"
            ];
        }
    }
}