@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <p><a href="tipousuario/create"><button class="btn btn-success">Nuevo</button></a></p>
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
                <div class="panel-heading">Tipo Usuarios</div>
                <div class="panel-body">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-condensed table-hover">
                                <thead>
                                <th>ID Tipo</th>
                                    <th>Detalle</th>
                                    <th>Opciones</th>
                                </thead>
                              @foreach ($tipousuarios as $tu)
                                <tr>
                                    <td>{{ $tu->IDTIPO}}</td>
                                    <td>{{ $tu->DETALLE}}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{URL::action('TipousuarioController@edit',$tu->IDTIPO)}}"><i class="fa fa-pencil-square-o" > Editar</i></a>

                                        <a class="btn btn-danger" href="{{URL::action('TipousuarioController@delete',$tu->IDTIPO)}}"><i class="fa fa-trash-o" > Eliminar</i></a>
                                        
                                    </td>
                                   </tr>
                                @endforeach
                            </table>
                        </div>
                        {{$tipousuarios->render()}}
                    </div>
                    @include('tipousuarios.delete')
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
