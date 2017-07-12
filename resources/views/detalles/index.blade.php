@extends('admin.template.main')
@section ('title')
   Detalle
@endsection

@section('contenido')



<div class="container">
<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <p><a href="detalle/create"><button class="btn btn-success"><i class="glyphicon glyphicon-edit"> Nuevo</i></button></a></p>
        </div>
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
                                    <th colspan="2">Opciones</th>
                                    <th>Cabecera</th>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Valor Unitario</th>
                                    <th>Descuento</th>
                                    <th>Valor Total</th>
                                    
                                </thead>
                              @foreach ($detalles as $d)
                                <tr>
                                    <td align="center">
                                        <a class="btn btn-danger" href="{{URL::action('DetalleController@delete',$d->IDDETALLE)}}"><i class="glyphicon glyphicon-trash" ></i></a>
                                    </td>
                                    <td align="center">
                                        <a class="btn btn-primary" href="{{URL::action('DetalleController@edit',$d->IDDETALLE)}}"><i class="glyphicon glyphicon-pencil" ></i></a>
                                    </td>
                                
                                    <td>{{ $d->IDCABECERA}}</td>
                                    <!--{{$idproducto=$d->IDPRODUCTO}}-->
                                    <?php
                                        $prod = App\Producto::find($idproducto);
                                    ?>
                                    <td>{{ $prod->NOMBREP}}</td>
                                    <td>{{ $d->CANTIDAD}}</td>
                                    <td>{{ $d->VALOR_UNITARIO}}</td>
                                    <td>{{ $d->DESCUENTO}}</td>
                                    <td>{{ $d->VALOR_TOTAL}}</td>
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
