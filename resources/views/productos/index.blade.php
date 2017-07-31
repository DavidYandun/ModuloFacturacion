@extends('admin.template.main')

@section ('title')
   Productos
@endsection
@section('TituloBanner')
Productos
@endsection


@section('contenido')
<div class="container">
   @role('admin')
    <div class="row">
    
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <p><a href="{{url('producto/create')}}"><button class="btn btn-success">Nuevo</button></a></p>
        </div>
    </div>
    @endrole
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
                                @role('admin')
                                    <th colspan="2" align="center">Opciones</th>
                                @endrole
                                    <th>Código</th>
                                    <th>Stock</th>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Precio</th>
                                    
                                </thead>
                               @foreach ($productos as $p)
                                <tr>
                                @role('admin')
                                    <td align="center">
                                        <a class="btn btn-danger" href="{{URL::action('ProductoController@delete',$p->IDPRODUCTO)}}">Eliminar</a>
                                    </td>
                                    <td align="center">
                                        <a class="btn btn-info" href="{{URL::action('ProductoController@edit',$p->IDPRODUCTO)}}">Editar</a>
                                    </td>

                                @endrole
                                    <td>{{ $p->IDPRODUCTO}}</td>
                                    <td>{{ $p->STOCK}}</td>
                                    <td>{{ $p->NOMBREP}}</td>
                                    <td>{{ $p->DESCRIPCION}}</td>
                                    <td>{{ $p->VALOR}}</td>
                                    
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