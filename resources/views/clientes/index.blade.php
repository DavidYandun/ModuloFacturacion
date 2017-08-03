
@extends('admin.template.main')
@section ('title')
   Clientes
@endsection

@section('contenido')
<div class="container">
    <div class="row">
       
            <!--<button class="btn btn-success" data-toggle="modal" data-target="#nuevo"><i class="glyphicon glyphicon-edit"> Nuevo</i></button>-->
           
<div class="col-lg-1">
            <p><a href="{{url('cliente/create')}}"><button class="btn btn-success"> Nuevo</button></a></p>
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
