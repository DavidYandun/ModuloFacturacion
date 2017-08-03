@extends('admin.template.main')
@section ('title')
   Empleados
@endsection

@section('contenido')
<div class="container">
    <div class="row">
        <div class="col-lg-1">
             <p><a href="{{url('empleado/create')}}"><button class="btn btn-success">Nuevo</button></a></p>
        </div>
        <div class="col-lg-1">
             <a class="btn btn-primary" href="export/pdf"><i class="glyphicon glyphicon-print" > IMPRIMIR</i></a>
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
                <div class="panel-heading">Empleados</div>
                <div class="panel-body">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-condensed table-hover">
                                <thead>                                    
                                    <th colspan="1">Opciones</th>
                                    <th>Cédula</th>
                                    <th>nombre</th>
                                    <th>Apellido</th>
                                    <th>Fecha nacimiento</th>
                                    <th>Ciudad</th>
                                    <th>Dirección</th>
                                    <th>Teléfono</th>                                    
                                    <th>Estado</th>
                                    
                                </thead>
                               @foreach ($empleados as $c)
                                <tr>
                                    <td align="center">

                                        <a class="btn btn-primary" href="{{URL::action('EmpleadoController@edit',$c->idempleado)}}"><i class="glyphicon glyphicon-pencil" ></i></a>
                                    
                                    <a class="btn btn-primary" href="{{URL::action('EmpleadoController@ExportPDF',$c->idempleado)}}"><i class="glyphicon glyphicon-list-alt"></i></a>
                                                                                                        
                                    </td>
                                    <td>{{ $c->cedula}}</td>
                                    <td>{{ $c->nombre}}</td>
                                    <td>{{ $c->apellido}}</td>
                                    <td>{{ $c->nacimiento}}</td>
                                    <td>{{ $c->ciudad}}</td>
                                    <td>{{ $c->direccion}}</td>
                                    <td>{{ $c->telefono}}</td>                                    
                                    <td>{{ $c->estado}}</td>
                                    
                                    
                                   </tr>
                                @endforeach
                            </table>
                        </div>
                        {{$empleados->render()}]
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
