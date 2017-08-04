@extends('admin.template.main')
@section ('title')
   Facturas Pendientes
@endsection

@section('contenido')
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <p><a href="facturaspendientes/create"><button class="btn btn-success">Nuevo</button></a></p>
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
                <div class="panel-heading">Facturas Pendientes</div>
                <div class="panel-body">

                <!--BUSQUEDA-->
                <div class="container" style="background:#CEF6F5 ">
                <div class="col-lg-2">
                <label>Listar Facturas por: </label>
                </div>
                <!--Todo-->
                <div class="col-lg-2">
                    <a href="{{url('facturaspendientes')}}" class="btn btn-success">Todas las Facturas</a>
                </div>
                <!--FIN Todo-->

                <!--POR CLIENTES-->
                <div class="col-lg-2">
                
                <?php $client = App\Cliente::all();?>
                        <input id="lc" type="button" value="Listar por Cliente" class="btn btn-success">
                        <div id="capa" style="display: none;padding: 10px;">
                        <select class="selectpicker" data-live-search="true" id="seleccion" onchange="capturar()"> 
                            <option>Seleccione un cliente</option>
                            @foreach ($client as $cli)                
                                <option value="{{$cli->idcliente}}" data-subtext="{{ $cli->cedula }}">
                                    {{ $cli->nombre }} {{ $cli->apellido }}
                                </option>
                            @endforeach
                        </select>                
                        </div>
                </div>

               
                <!--FIN POR CLIENTES-->
                
        <!--FIN BUSQUEDA-->
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-condensed table-hover">
                                <thead>
                                    <th>ID_Pendiente</th>
                                    <th>ID_Cabecera</th>
                                    <th>Cliente</th>
                                    <th>Valor Factura</th>
                                    <th>Abono</th>
                                    <th>Saldo</th>
                                    <th>Opciones</th>
                                </thead>
                              @foreach ($facturaspendientes as $d)
                                    <?php $cab = App\Cabecera::find($d->idcabecera); ?>
                                    <?php $cli = App\Cliente::find($cab->idcliente); ?>
                                <tr>
                                    <td>{{ $d->idpendiente}}</td>
                                    <td>{{ $d->idcabecera}}</td>
                                    <td>{{$cli->nombre}} {{$cli->apellido}}</td>
                                    <td>{{$cab->total}}</td>
                                    <td>{{ $d->abono}}</td>
                                    <td>{{ $d->saldo}}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{URL::action('FacturaspendientesController@edit',$d->idpendiente)}}"><i class="fa fa-pencil-square-o" > Editar</i></a>

                                        <a class="btn btn-danger" href="{{URL::action('FacturaspendientesController@delete',$d->idpendiente)}}"><i class="fa fa-trash-o" > Eliminar</i></a>


                                    </td>
                                   </tr>
                                @endforeach
                            </table>
                        </div>
                        {{$facturaspendientes->render()}}
                    </div>
                    @include('facturaspendientes.delete')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script type="text/javascript">
    $(document).ready(function()){
        $('#modalEliminarTipoCliente').on('show.bs.modal',function(event)){
        var button=$(event.relatedTarget);
        var action=button.data('action');
        var idtipo=button.data('idtipo');
        var modal=$(this);
        modal.find(".modal-body #txtEliminar").text("¿Estás seguro de eliminar al cliente con C.I"+idtipo +"?");
        modal.find(".modal-body form").attr('action',action);
        });
    });
</script>
<script type="text/javascript">
        $(document).ready(function () {
            
            $('#lc').on('click', function () {
                $('#capa').css('display', 'block');
                $('#fech').css('display', 'none');
            });
            $('#lf').on('click', function () {                
                $('#capa').css('display', 'none');
                $('#fech').css('display', 'block');                         
            });
        });
    </script>

<script type="text/javascript">
    function capturar(){
        var cod=document.getElementById("seleccion").value;
        window.location = "vistapendiente/"+cod;
    }
    
</script>
@endpush
