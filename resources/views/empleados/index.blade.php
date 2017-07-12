@extends('admin.template.main')
@section ('title')
   Empleados
@endsection

@section('contenido')
<!--<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <p><a href="empleado/create"><button class="btn btn-success">Nuevo</button></a></p>
        </div>
    </div>-->
    <!--@if ($message = Session::get('mensaje'))
    <div class="row">
    <div class="alert alert-success">
        <p>
            <strong>{{ $message }}</strong>
        </p>
    </div>
    </div>
    @endif-->
    <div>
        <button  class="btn btn-primary" data-toggle="modal" data-target="#nuevo"><i class="glyphicon glyphicon-plus"> Nuevo</i></button> 
    </div>
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
                                        <a class="btn btn-primary" href="{{URL::action('EmpleadoController@edit',$c->IDEMPLEADO)}}"><i class="fa fa-pencil-square-o" >Editar</i></a>
                                        <a class="btn btn-danger" href="{{URL::action('EmpleadoController@delete',$c->IDEMPLEADO)}}"><i class="fa fa-trash-o" >Eliminar</i></a>
                                        
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


<div class="modal fade" id="nuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4>Nuevo Cliente</h4>
            </div>
            <div class="modal-body">
            <form action="{{url('empleado')}}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="row">
        <div class="form-group">
            <label for="CEDULA" class="col-lg-2 control-label">Cédula <font color="red">*</font></label>
            <div class="col-lg-10">
                <input name="CEDULA" id="CEDULA" class="form-control" type="text" pattern="[0-2][0-9]{9}" value="{{old('CEDULA')}}" required maxlength="10" minlength="10">
            </div>
        </div>

        <div class="form-group">
            <label for="NOMBRE" class="col-lg-2 control-label">Nombre <font color="red">*</font></label>
            <div class="col-lg-10">
                <input name="NOMBRE" id="NOMBRE" class="form-control" pattern="[A-ZÁÉÍÓÚ][a-zñáéíóú]{2,11}"
 type="text" value="{{old('NOMBRE')}}" required maxlength="25">
            </div>
        </div>

        <div class="form-group">
            <label for="APELLIDO" class="col-lg-2 control-label">Apellido <font color="red">*</font></label>
            <div class="col-lg-10">
                <input name="APELLIDO" id="APELLIDO" class="form-control" pattern="[A-ZÁÉÍÓÚ][a-zñáéíóú]{2,11}"
 type="text" value="{{old('APELLIDO')}}" required maxlength="25">
            </div>
        </div>

        <div class="form-group">
            <label for="NACIMIENTO" class="col-lg-2 control-label">Fecha de Nacimiento <font color="red">*</font></label>
            <div class="col-lg-10">
                <input name="NACIMIENTO" id="NACIMIENTO" class="form-control" type="date" value="{{old('NACIMIENTO')}}"  required min="1991-01-01" max="2017-12-31" value="1991-01-01">
            </div>
        </div>
        </div>
        <div class="row">
        <div class="form-group">
            <label for="CIUDAD" class="col-lg-2 control-label">Ciudad <font color="red">*</font></label>
            <div class="col-lg-10">
                <input name="CIUDAD" id="CIUDAD" class="form-control" type="text" value="{{old('CIUDAD')}}" required>
            </div>
        </div>

        <div class="form-group">
            <label for="DIRECCION" class="col-lg-2 control-label">Dirección <font color="red">*</font></label>
            <div class="col-lg-10">
                <input name="DIRECCION" id="DIRECCION" class="form-control" type="text" value="{{old('DIRECCION')}}" required>
            </div>
        </div>

        <div class="form-group">
            <label for="TELEFONO" class="col-lg-2 control-label">Teléfono <font color="red">*</font></label>
            <div class="col-lg-10">
                <input name="TELEFONO" id="TELEFONO" class="form-control" type="text" pattern="09[0-9]{8}" value="{{old('TELEFONO')}}" required maxlength="10" minlength="10">
            </div>
        </div>
        <div class="form-group">
      <label for="ESTADO" class="col-lg-2 control-label">Estado <font color="red">*</font></label>
      <div class="col-lg-10" class="col-xs-5 selectContainer">
        <select name="ESTADO" id="ESTADO" class="form-control" type="text" value="{{old('ESTADO')}}" required onchange="crear(this.value)">
        <option value="">Seleccione un Estado</option>
        <option value="A">Activo</option>
        <option value="I">Inactivo</option>
        </select>
      </div>
    </div>
    </div>

        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <input class="btn btn-primary" type="submit" value="Añadir" />
        </div>
    </form>       
           
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
