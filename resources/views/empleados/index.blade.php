@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <p><a href="empleado/create"><button class="btn btn-success">Nuevo</button></a></p>
        </div>
    </div>
    <!--@if ($message = Session::get('mensaje'))
    <div class="row">
    <div class="alert alert-success">
        <p>
            <strong>{{ $message }}</strong>
        </p>
    </div>
    </div>
    @endif-->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Empleados</div>
                <div class="panel-body">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-condensed table-hover">
                                <thead>                                    
                                    <th>Cédula</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Fecha nacimiento</th>
                                    <th>Ciudad</th>
                                    <th>Dirección</th>
                                    <th>Teléfono</th>                                    
                                    <th>Estado</th>
                                    <th>Opciones</th>
                                </thead>
                               @foreach ($empleados as $c)
                                <tr>                                    
                                    <td>{{ $c->CEDULA}}</td>
                                    <td>{{ $c->NOMBRE}}</td>
                                    <td>{{ $c->APELLIDO}}</td>
                                    <td>{{ $c->NACIMIENTO}}</td>
                                    <td>{{ $c->CIUDAD}}</td>
                                    <td>{{ $c->DIRECCION}}</td>
                                    <td>{{ $c->TELEFONO}}</td>                                    
                                    <td>{{ $c->ESTADO}}</td>
                                    
                                    <td>
                                        <a class="btn btn-info" href="{{URL::action('EmpleadoController@edit',$c->IDEMPLEADO)}}">Editar</a>
                                        <a class="btn btn-info" href="{{URL::action('EmpleadoController@delete',$c->IDEMPLEADO)}}">Eliminar</a>
                                        
                                    </td>
                                   </tr>
                                @endforeach
                            </table>
                        </div>
                        {{$empleados->render()}}
                    </div>
                    @include('empleados.delete')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script type="text/javascript">
    $(document).ready(function()){
        $('#modalEliminarEmpleado').on('show.bs.modal',function(event)){
        var button=$(event.relatedTarget);
        var action=button.data('action');
        var cedula=button.data('cedula');
        var modal=$(this);
        modal.find(".modal-body #txtEliminar").text("¿Estás seguro de eliminar al empleado con C.I"+cedula +"?");
        modal.find(".modal-body form").attr('action',action);
        });
    });
</script>
@endpush
