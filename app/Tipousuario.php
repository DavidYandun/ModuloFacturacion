<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipousuario extends Model
{
  	protected $table='tipos_usuario';
    protected $primaryKey='idtipo';
    public $timestamps=false;
    protected $fillable=[
    'detalle'
    ];
}	
