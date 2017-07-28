@extends('admin.template.main')

@section ('title')
   Clientes
@endsection
@section('TituloBanner')
Tipo Clientes
@endsection


@section('contenido')

<!--<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <p><a href="tipocliente/create"><button class="btn btn-success">Nuevo</button></a></p>
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
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
           <button class="btn btn-success" data-toggle="modal" data-target="#nuevo"><i class="glyphicon glyphicon-edit"> Nuevo</i></button>
        </div>
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Tipo Clientes</div>
                <div class="panel-body">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-condensed table-hover">
                                <thead>
                                    <th colspan="2">Opciones</th>
                                    <th>Detalle</th>
                                    
                                </thead>
                              @foreach ($tipoclientes as $tc)
                                <tr>
                                <td>
                                    <a class="btn btn-danger" href="{{URL::action('TipoclienteController@delete',$tc->IDTIPO)}}"><i class="glyphicon glyphicon-trash" ></i></a>
                                    </td>
                                <td>
                                    <a class="btn btn-primary" href="{{URL::action('TipoclienteController@edit',$tc->IDTIPO)}}"><i class="glyphicon glyphicon-pencil" ></i></a>
                                </td>
                                @if($tc->DETALLE=='EF')
                                    <td>EFECTIVO</td>
                                @endif
                                @if($tc->DETALLE=='CR')
                                    <td>CREDITO</td>
                                @endif
                                    @if($tc->DETALLE!='CR'&& $tc->DETALLE!='EF')
                                    <td>{{$tc->DETALLE}}</td>
                                @endif
                                   </tr>
                                @endforeach
                            </table>
                        </div>
                        {{$tipoclientes->render()}}
                    </div>
                    @include('tipoclientes.delete')
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
                <h3>Nuevo Tipo cliente</h3>                
            </div>
            <div class="modal-body">
            <div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            
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
        {!!Form::open(['url'=>'tipocliente'])!!}        
        <div class="form-group">
            <label for="detalle" class="col-lg-2 control-label">Id Tipo <font color="red">*</font></label>
            <div class="col-lg-10">
                <input name="DETALLE" id="detalle" class="form-control" type="text" value="{{old('DETALLE')}}" required minlength="2" maxlength="2">
            </div>
        </div>
                
        <div class="form-group">
            <div class="col-lg-offset-2 col-lg-2 col-md-2 col-sm-12 col-xs-12">
              <input class="form-control btn btn-primary" type="submit" value="Añadir" />
            </div>
            
        </div>
    {!!Form::close()!!}
    <br>
        <div class=" col-lg-offset-2 col-lg-2 col-md-2 col-sm-12 col-xs-12">
              <a href="{{url('tipocliente')}}" class="form-control btn btn-danger">Cancelar</a>
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
    })
</script>
@endpush
