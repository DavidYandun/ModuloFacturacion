<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table ="productos";

    protected $primaryKey ="idProducto";

    public $timestamps=false;

    protected $fillable=[
    "nombre","precio","codigo","cantidad","minStock"
    ];
}
