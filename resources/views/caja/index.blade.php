@extends('admin.template.main')
@section ('title')
   Caja
@endsection

@section('contenido')
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <p><a href="caja/create"><button class="btn btn-success"><i class="glyphicon glyphicon-edit"> Nuevo</i></button></a></p>
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
                <div class="panel-heading">Caja</div>
                <div class="panel-body">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-condensed table-hover">
                                <thead>
                                    <th colspan="2">Opciones</th>
                                    <th>ID Caja</th>
                                    <th>ID Usuario</th>
                                    <th>Número</th>
                                    
                                </thead>
                              @foreach ($caja as $c)
                                <tr>
                                <td align="center">
                                        <a class="btn btn-danger" href="{{URL::action('CajaController@delete',$c->idcaja)}}"><i class="glyphicon glyphicon-trash" ></i></a>
                                </td>
                                 <td align="center">
                                        <a class="btn btn-primary" href="{{URL::action('CajaController@edit',$c->idcaja)}}"><i class="glyphicon glyphicon-pencil" ></i></a>
                                </td>
                                
                                    <td>{{ $c->idcaja}}</td>
                                    <td>{{ $c->idusuario}}</td>
                                    <td>{{ $c->numero}}</td>
                                   

                                   </tr>
                                @endforeach
                            </table>
                        </div>
                        {{$caja->render()}}
                    </div>
                    @include('caja.delete')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')

<script type="text/javascript">
$(document).ready(function () {
    

    $('#modalEliminarCaja').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var action = button.data('action');
        var idcaja = button.data('idcaja');
        var modal = $(this);
        modal.find(".modal-body #txtEliminar").text("¿Estás seguro de eliminar a la Caja con IDCAJA " + idcaja + "?");
        modal.find(".modal-body form").attr('action', action);
    });
});
</script>

@endpush
