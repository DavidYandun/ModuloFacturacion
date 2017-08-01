
@extends('admin.template.main')
@section ('title')
   Clientes
@endsection

@section('contenido')
<div class="container">
    <div class="row">
       <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <!--<button class="btn btn-success" data-toggle="modal" data-target="#nuevo"><i class="glyphicon glyphicon-edit"> Nuevo</i></button>-->
             <p><a href="{{url('cliente/create')}}"><button class="btn btn-success">Nuevo</button></a></p>
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
                <div class="panel-heading">Clientes</div>
                <div class="panel-body">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="table-responsive">
                            <table class="table table table-bordered table-condensed table-hover">
                                <thead class="thead thead-inverse">
                                    <th colspan="1">Opciones</th>
                                    <th>Tipo</th>
                                    <th>Cédula</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Fecha nacimiento</th>
                                    <th>Ciudad</th>
                                    <th>Dirección</th>
                                    <th>Teléfono</th>
                                    <th>e-mail</th>
                                    <th>Estado</th>
                                    
                                </thead>
                               @foreach ($clientes as $c)
                                <tr>

                                <td align="center">
                                       <a class="btn btn-primary" href="{{URL::action('ClienteController@edit',$c->idcliente)}}" ><i class="glyphicon glyphicon-pencil" ></i></a>
                                </td>
                                
                                    <!--{{$codtipo=$c->idtipo}}-->
                                    <?php
                                        $nombreTipo = App\TipoCliente::find($codtipo);
                                    ?>
                                    @if(($nombreTipo->detalle)=='CR')
                                    <td>CREDITO</td>
                                    @endif
                                    @if(($nombreTipo->detalle)=='EF')
                                    <td>CREDITO</td>
                                    @endif
                                    
                                    <td>{{ $c->cedula}}</td>
                                    <td>{{ $c->nombre}}</td>
                                    <td>{{ $c->apellido}}</td>
                                    <td>{{ $c->nacimiento}}</td>
                                    <td>{{ $c->ciudad}}</td>
                                    <td>{{ $c->direccion}}</td>
                                    <td>{{ $c->telefono}}</td>
                                    <td>{{ $c->email}}</td>
                                    <td>{{ $c->estado}}</td>
                                    
                                    
                                   </tr>
                                @endforeach
                            </table>
                        </div>
                        {{$clientes->render()}}
                    </div>
                    @include('clientes.delete')
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

        
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3>Nuevo cliente</h3>
            @if (count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
                </ul>
            </div>
            @endif
        </div>
    </div>
        <!--form action="{{url('cliente')}}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}"-->


        <form action="{{url('cliente')}}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">

    <!--TIPO CLIENTE-->
    <div class="row">
        <div class="form-group">
            <label for="idtipo" class="col-lg-2 control-label">Id Tipo <font color="red">*</font></label>
            <div class="col-lg-6">
                <select name="idtipo" id="idtipo" class="form-control">
                    <option value="">Seleccione el tipo de cliente</option>
                    @foreach ($tipocliente as $tc)
                        @if($tc->detalle=='EF')
                            <option value="{{ $tc->idtipo }}">EFECTIVO</option>
                        @endif
                        @if($tc->detalle=='CR')
                            <option value="{{ $tc->idtipo }}">CREDITO</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="col lg-4">
                <label><font color="gray">.</font></label>
            </div>
        </div>
    <!--cedula-->
             
        <div class="form-group">
            <label for="cedula" class="col-lg-2 control-label">Cédula <font color="red">*</font></label>
            <div class="col-lg-6">
            <input name="cedula" id="cedula" class="form-control" type="text" pattern="[0-2][0-9]{9}" value="{{old('cedula')}}" required maxlength="10" minlength="10" onkeypress="return esDigito()" placeholder="Ingrese su cédula" onchange="ValidarCedula(this.form.cedula.value, this.form.boton)" >
            </div>
            <div class="col lg-4">
                <label><font color="gray">Ej:1234567890</font></label>
            </div>
        </div>
        <!--NOMBRE-->
        <div class="form-group">
            <label for="nombre" class="col-lg-2 control-label">nombre <font color="red">*</font></label>
            <div class="col-lg-6">
                <input name="nombre" id="nombre" class="form-control" 
                pattern="[A-ZÁÉÍÓÚ][a-zñáéíóú|A-ZÁÉÍÓÚ]{1,11}|[A-ZÁÉÍÓÚ][a-zñáéíóú|A-ZÁÉÍÓÚ]{1,11} [A-ZÁÉÍÓÚ][a-zñáéíóú|A-ZÁÉÍÓÚ]{1,11}"
 type="text" value="{{old('nombre')}}" required maxlength="25" placeholder="Ingrese su nombre">
            </div>
            <div class="col lg-4">
                <label><font color="gray">Ej: Juan/JUAN</font></label>
            </div>

        </div>
    <!--apellido-->
        <div class="form-group">
            <label for="apellido" class="col-lg-2 control-label">Apellido <font color="red">*</font></label>
            <div class="col-lg-6">
                <input name="apellido" id="apellido" class="form-control" pattern="[A-ZÁÉÍÓÚ][a-zñáéíóú|A-ZÁÉÍÓÚ]{1,11}|[A-ZÁÉÍÓÚ][a-zñáéíóú|A-ZÁÉÍÓÚ]{1,11} [A-ZÁÉÍÓÚ][a-zñáéíóú|A-ZÁÉÍÓÚ]{1,11}"
 type="text" value="{{old('apellido')}}" required maxlength="25" placeholder="Ingrese su apellido">
            </div>
            <div class="col lg-4">
                <label><font color="gray">Ej: Perez/PEREZ</font></label>
            </div>
        </div>
    <!--NACIMIENTO-->
        <div class="form-group">
            <label for="nacimiento" class="col-lg-2 control-label">Fecha de Nacimiento</label>
            <div class="col-lg-6">
                <input name="nacimiento" id="NACIMIENTO" class="form-control" type="date" value="{{old('nacimiento')}}"  required min="1900-01-01" max="<?php echo date('Y-m-d'); ?>">
            </div>
            <div class="col lg-4">
                <label><font color="gray">Ej: 1991-01-01</font></label>
            </div>
        </div>
        </div><div class="row">
        <div class="form-group">
            <label for="ciudad" class="col-lg-2 control-label">Ciudad <font color="red">*</font></label>
            <div class="col-lg-6">
                <input name="ciudad" id="ciudad" class="form-control" type="text" value="{{old('ciudad')}}" required placeholder="Ingrese su ciudad de residencia">
            </div>
            <div class="col lg-4">
                <label><font color="gray">Ej: Ibarra/IBARRA</font></label>
            </div>
        </div>


        <div class="form-group">
            <label for="direccion" class="col-lg-2 control-label">Dirección <font color="red">*</font></label>
            <div class="col-lg-6">
                <input name="direccion" id="direccion" class="form-control" type="text" value="{{old('direccion')}}" required placeholder="Ingrese su domicilio">
            </div>
            <div class="col lg-4">
                <label><font color="gray">Ej: Av. 17 de Julio</font></label>
            </div>
        </div>

        <div class="form-group">
            <label for="telefono" class="col-lg-2 control-label">Teléfono <font color="red">*</font></label>
            <div class="col-lg-6">
                <input name="telefono" id="telefono" class="form-control" type="tel" pattern="0[0-9]{9}" value="{{old('telefono')}}" required maxlength="10" minlength="10" placeholder="Registre su número de teléfono">
            </div>
            <div class="col lg-4">
                <label><font color="gray">Ej: 062987987</font></label>
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-lg-2 control-label">e-mail <font color="red">*</font></label>
            <div class="col-lg-6">
                <input name="email" id="email" class="form-control" type="email" value="{{old('email')}}" required placeholder="Ingrese su correo electrónico">
            </div>
            <div class="col lg-4">
                <label><font color="gray">Ej: micorreo@electronico.com</font></label>
            </div>
        </div>
        <div class="form-group">
      <label for="estado" class="col-lg-2 control-label">Estado <font color="red">*</font></label>
      <div class="col-lg-6" class="col-xs-5 selectContainer">
        <select name="estado" id="estado" class="form-control" type="text" value="{{old('estado')}}" required onchange="crear(this.value)">
        <option value="">Seleccione un estado</option>
        <option value="A">Activo</option>
        <option value="I">Inactivo</option>
        </select>
      </div>
      <div class="col lg-4">
                <label><font color="gray">.</font></label>
            </div>
    </div>
    </div >
    

        <div class="form-group">
            <div class="col-lg-offset-2 col-lg-2 col-md-2 col-sm-12 col-xs-12">
              <input class="form-control btn btn-primary" type="submit" value="Añadir" />
            </div>
            <div class=" col-lg-offset-2 col-lg-2 col-md-2 col-sm-12 col-xs-12">
              <a href="{{url('cliente')}}" class="form-control btn btn-danger">Cancelar</a>
        </div>
            
        
        

    </form>
    


@push('scripts')
<script src="{{asset('js\validaciones.js')}}"></script>
@endpush
           
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script type="text/javascript">
    $(document).ready(function()){
        $('#modalEliminarCliente').on('show.bs.modal',function(event)){
        var button=$(event.relatedTarget);
        var action=button.data('action');
        var cedula=button.data('cedula');
        var modal=$(this);
        modal.find(".modal-body #txtEliminar").text("¿Estás seguro de eliminar al cliente con C.I"+cedula +"?");
        modal.find(".modal-body form").attr('action',action);
        });
    });
</script>
@endpush
