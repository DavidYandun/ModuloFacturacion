@extends('admin.template.main')
@section ('title')
   Detalle
@endsection

@section('contenido')



<div class="container">
    <!--<div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <p><a href="detalle/create"><button class="btn btn-success">Nuevo</button></a></p>
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
    @endif-->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Detalle Factura</div>
                <div class="panel-body">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-condensed table-hover">
                                <thead>
                                    <th>ID_Cabecera</th>
                                    <th>ID_Producto</th>
                                    <th>Cantidad</th>
                                    <th>Valor Unitario</th>
                                    <th>Valor Total</th>
                                    <th>Descuento</th>
                                    <th>Opciones</th>
                                </thead>
                              @foreach ($detalles as $d)
                                <tr>
                                    <td>{{ $d->IDCABECERA}}</td>
                                    <td>{{ $d->IDPRODUCTO}}</td>
                                    <td>{{ $d->CANTIDAD}}</td>
                                    <td>{{ $d->VALOR_UNITARIO}}</td>
                                    <td>{{ $d->VALOR_TOTAL}}</td>
                                    <td>{{ $d->DESCUENTO}}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{URL::action('DetalleController@edit',$d->IDDETALLE)}}"><i class="fa fa-pencil-square-o" > Editar</i></a>

                                        <a class="btn btn-danger" href="{{URL::action('DetalleController@delete',$d->IDDETALLE)}}"><i class="fa fa-trash-o" > Eliminar</i></a>

                                    </td>
                                   </tr>
                                @endforeach
                            </table>
                        </div>
                        {{$detalles->render()}}
                    </div>
                    @include('detalles.delete')
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
@endpush
