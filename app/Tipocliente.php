<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipocliente extends Model
{
    protected $table='tipo_cliente';
    protected $primaryKey='idtipo';
    public $timestamps=false;
    protected $fillable=[
    'detalle'
    ];
}
