@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <p><a href="cabecera/create"><button class="btn btn-success">Nuevo</button></a></p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Cabecera</div>
                <div class="panel-body">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-condensed table-hover">
                                <thead>
                                    <th>Cliente</th>
                                    <th>Caja</th>
                                    <th>Número</th>
                                    <th>Fecha</th>
                                    <th>Sub Total</th>
                                    <th>Iva</th>
                                    <th>Descuento</th>
                                    <th>Total</th>
                                    <th>Opciones</th>
                                </thead>
                               @foreach ($cabecera as $c)
                                <tr>
                                    <td>{{ $c->IDCLIENTE}}</td>
                                    <td>{{ $c->IDCAJA}}</td>
                                    <td>{{ $c->NUMERO}}</td>
                                    <td>{{ $c->FECHA}}</td>
                                    <td>{{ $c->SUBTOTAL}}</td>
                                    <td>{{ $c->IVA}}</td>
                                    <td>{{ $c->DESCUENTO}}</td>
                                    <td>{{ $c->TOTAL}}</td>
                                    
                                    <td>
                                        <a class="btn btn-info" href="{{URL::action('CabeceraController@edit',$c->IDCABECERA)}}">Editar</a>
                                        <a class="btn btn-info" href="{{URL::action('CabeceraController@delete',$c->IDCABECERA)}}">Eliminar</a>
                                        
                                    </td>
                                   </tr>
                                @endforeach
                            </table>
                        </div>
                        {{$cabecera->render()}}
                    </div>
                    @include('cabecera.delete')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script type="text/javascript">
    $(document).ready(function()){
        $('#modalEliminarCabecera').on('show.bs.modal',function(event)){
        var button=$(event.relatedTarget);
        var action=button.data('action');
        var cedula=button.data('cedula');
        var modal=$(this);
        modal.find(".modal-body #txtEliminar").text("¿Estás seguro de eliminar al cabecera con C.I"+cedula +"?");
        modal.find(".modal-body form").attr('action',action);
        });
    });
</script>
@endpush
