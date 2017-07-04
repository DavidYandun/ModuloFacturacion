@extends('admin.template.main')
@section ('title')
   Caja
@endsection

@section('contenido')
<div class="container">
    <!--<div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <p><a href="caja/create"><button class="btn btn-success">Nuevo</button></a></p>
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
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Caja</div>
                <div class="panel-body">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-condensed table-hover">
                                <thead>
                                    <th>ID Caja</th>
                                    <th>ID Usuario</th>
                                    <th>Número</th>
                                    <th>Opciones</th>
                                </thead>
                              @foreach ($caja as $c)
                                <tr>
                                    <td>{{ $c->IDCAJA}}</td>
                                    <td>{{ $c->IDUSUARIO}}</td>
                                    <td>{{ $c->NUMERO}}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{URL::action('CajaController@edit',$c->IDCAJA)}}"><i class="fa fa-pencil-square-o" > Editar</i></a>

                                        <a class="btn btn-danger" href="{{URL::action('CajaController@delete',$c->IDCAJA)}}"><i class="fa fa-trash-o" > Eliminar</i></a>


                                    </td>

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
        var IDCAJA = button.data('IDCAJA');
        var modal = $(this);
        modal.find(".modal-body #txtEliminar").text("¿Estás seguro de eliminar a la Caja con IDCAJA " + IDCAJA + "?");
        modal.find(".modal-body form").attr('action', action);
    });
});
</script>

@endpush
