<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table ="productos";

    protected $primaryKey ="IDPRODUCTO";

    public $timestamps=false;

    protected $fillable=[
    "STOCK","NOMBREP","DESCRIPCION","VALOR"
    ];
}
