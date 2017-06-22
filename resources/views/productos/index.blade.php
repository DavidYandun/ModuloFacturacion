@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <p><a href="{{url('producto/create')}}"><button class="btn btn-success">Nuevo</button></a></p>
        </div>
    </div>
    @if ($message = Session::get('mensaje'))
    <div class="row">
    <div class="alert alert-success">
        <p>
            <strong>{{ $message }}</strong>
        </p>
    </div>
    </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Productos</div>
                <div class="panel-body">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-condensed table-hover">
                                <thead>
                                    <th>Nombre</th>
                                    <th>Precio</th>
                                    <th>Código</th>
                                    <th>Cantidad</th>
                                    <th>minStock</th>
                                    <th>Opciones</th>
                                </thead>
                               @foreach ($productos as $p)
                                <tr>
                                    <td>{{ $p->nombre}}</td>
                                    <td>{{ $p->precio}}</td>
                                    <td>{{ $p->codigo}}</td>
                                    <td>{{ $p->cantidad}}</td>
                                    <td>{{ $p->minStock}}</td>
                                    <td>
                                        <a class="btn btn-info" href="{{URL::action('ProductoController@edit',$p->idProducto)}}">Editar</a>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                        {{$productos->render()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection