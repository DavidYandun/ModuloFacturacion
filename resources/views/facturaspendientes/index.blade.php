@extends('admin.template.main')
@section ('title')
   Facturas Pendientes
@endsection

@section('contenido')

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
                <div class="panel-heading">Facturas Pendientes</div>
                <div class="panel-body">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-condensed table-hover">
                                <thead>
                                    <th>ID_Pendiente</th>
                                    <th>ID_Cabecera</th>
                                    <th>Abono</th>
                                    <th>Saldo</th>
                                    <th>Opciones</th>
                                </thead>
                              @foreach ($facturaspendientes as $d)
                                <tr>
                                    <td>{{ $d->IDPENDIENTE}}</td>
                                    <td>{{ $d->IDCABECERA}}</td>
                                    <td>{{ $d->ABONO}}</td>
                                    <td>{{ $d->SALDO}}</td>
                                    <td>
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#miventana">abrir</button>
                                        <a class="btn btn-primary" href="{{URL::action('FacturaspendientesController@edit',$d->IDPENDIENTE)}}"><i class="fa fa-pencil-square-o" > Editar</i></a>

                                        <a class="btn btn-danger" href="{{URL::action('FacturaspendientesController@delete',$d->IDPENDIENTE)}}"><i class="fa fa-trash-o" > Eliminar</i></a>


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
<div class="modal fade" id="nuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div class="container">
    <div class="row">        
        {!!Form::open(['url'=>'facturaspendientes'])!!}     
        <!--IDCABECERA-->
        <div class="row">
       <div class="form-group">
            <label for="idcabecera" class="col-lg-2 control-label">ID-Cabecera<font color="red">*</font></label>
            <div class="col-lg-10">
                <select name="IDCABECERA" id="IDCABECERA" class="form-control">
                @foreach ($cabecera as $cab)
                <option value="{{ $cab->IDCABECERA }}">{{ $cab->NUMERO }}</option>
                @endforeach
                </select>
            </div>
        </div>
        </div>
        <div class="row"></div>

        <!--ABONO-->
        <div class="row">
        <div class="form-group">
            <label for="abono" class="col-lg-2 control-label">Abono<font color="red">*</font></label>
            <div class="col-lg-10">
                <input name="ABONO" id="abono" class="form-control" type="text" value="{{old('ABONO')}}" required>
            </div>
        </div>
        </div>
        <!--SALDO-->
        <div class="row">
        <div class="form-group">
            <label for="saldo" class="col-lg-2 control-label">Saldo<font color="red">*</font></label>
            <div class="col-lg-10">
                <input name="SALDO" id="saldo" class="form-control" type="text" value="{{old('SALDO')}}" required>
            </div>
        </div>
        </div>
        
        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <input class="btn btn-primary" type="submit" value="Añadir" />
        </div>
    {!!Form::close()!!}
</div>
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
