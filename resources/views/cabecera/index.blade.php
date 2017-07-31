@extends('admin.template.main')
@section ('title')
   Cabecera
@endsection

@section('contenido')
<div class="container">
    <div class="row">

     
      <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <p><a href="cabecera/create"><button class="btn btn-success"> Nuevo</button></a></p>

        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Facturas</h2></div>
                <div class="panel-body">
                
                
                <!--BUSQUEDA-->
                <div class="container" style="background:#CEF6F5 ">
                <div class="col-lg-2">
                <label>Listar Facturas por: </label>
                </div>
                <!--Todo-->
                <div class="col-lg-2">
                    <a href="{{url('cabecera')}}" class="btn btn-success">Todas las Facturas</a>
                </div>
                <!--FIN Todo-->

                <!--POR CLIENTES-->
                <div class="col-lg-2">
                
                <?php $client = App\Cliente::all();?>
                        <input type="button" value="Listar por Cliente" onclick="$('#capa').css('display', 'block')" class="btn btn-success">
                        <div id="capa" style="display: none;padding: 10px;">
                        <select class="selectpicker" data-live-search="true" id="seleccion" onchange="capturar()"> 
                            <option>Seleccione un cliente</option>
                            @foreach ($client as $cli)                
                                <option value="{{$cli->IDCLIENTE}}" data-subtext="{{ $cli->CEDULA }}">
                                    {{ $cli->NOMBRE }} {{ $cli->APELLIDO }}
                                </option>
                            @endforeach
                        </select>                
                        </div>
                </div>
                <!--FIN POR CLIENTES-->
                <!--FECHAS-->
                <div class="col-lg-2">
                        <input type="button" value="Listar por Fecha" onclick="$('#capa1').css('display', 'block')" class="btn btn-success">
                        <div id="capa1" style="display: none;padding: 10px;">
                        <input type="date" name="">
                        </div>
                </div>
                <!--FIN FECHAS-->
                </div>
        <!--FIN BUSQUEDA-->

                

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-condensed table-hover">
                                <thead>
                                    <th colspan="3">Opciones</th>
                                    <th>Número</th>
                                    <th>Cliente</th>
                                    <th>Caja</th>
                                    <th>Fecha</th>
                                    <th>Sub Total</th>
                                    <th>Iva</th>                                    
                                    <th>Total</th>                                    
                                </thead>
                               @foreach ($cabecera as $c)
                                <!--{{$codcliente=$c->IDCLIENTE}}-->
                                    <?php
                                        $nombreCliente = App\Cliente::find($codcliente);
                                    ?>
                                <tr>
                                    <td align="center">
                                    
                                     <a class="btn btn-info" href="#"><i class="glyphicon glyphicon-print"></i></a>
                                    
                                        
                                    </td>
                                    <td align="center">                                        

                                    @if($c->ESTADO=="A")
                                     <a class="btn btn-danger" href="{{URL::action('CabeceraController@actualizar',$c->IDCABECERA)}}"><i class="glyphicon glyphicon-trash">ANULAR</i></a>
                                     <input type="hidden" id="ESTADO" name="ESTADO" value="I"> 
                                     @endif
                                     @if($c->ESTADO=="I") 
                                     <h5>ANULADA</h5>
                                      @endif
                                    </td>
                                   
                                    <td>{{ $c->IDCABECERA}}</td>
                                    <td>{{ $nombreCliente->NOMBRE}} {{ $nombreCliente->APELLIDO}}</td>
                                    <td>{{ $c->IDCAJA}}</td>
                                    <td>{{ $c->FECHA}}</td>
                                    <td>{{ $c->SUBTOTAL}}</td>
                                    <td>{{ $c->IVA}}</td>
                                    <td>{{ $c->TOTAL}}</td>                                                                                
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
<div class="modal fade" id="nuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3>Nuevo cabecera</h3>
                
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
    
        <form action="{{url('cabecera')}}" method="POST" class="">

        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row">

        <div class="form-group">
            <label for="IDCABECERA" class="col-lg-2  col-md-12 col-sm-12 col-xs-12 control-label">Número <font color="red">*</font></label>

            <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
                <input name="IDCABECERA" id="IDCABECERA" class="form-control"  value="{{old('IDCABECERA')}}" type="number" placeholder="00001234">
            </div>
        </div>  

        <div class="form-group">
            <label for="IDCLIENTE" class="col-lg-2 col-md-12 col-sm-12 col-xs-12 control-label">Id Cliente <font color="red">*</font></label>
            <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
                
                <select name="IDCLIENTE" id="IDCLIENTE" class="form-control">
                <option value="">selecciona un cliente</option>
                @foreach ($cliente as $cli)
                
                <option value="{{ $cli->IDCLIENTE }}">{{ $cli->NOMBRE }} {{ $cli->APELLIDO }}</option>
                @endforeach
                </select>

            </div>
        </div>

        <div class="form-group">
            <label for="IDCAJA" class="col-lg-2 col-md-12 col-sm-12 col-xs-12 control-label">Id Caja <font color="red">*</font></label>
            <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
                
                <select name="IDCAJA" id="IDCAJA" class="form-control">
                <option value="">selecciona un caja</option>
                @foreach ($caja as $caj)
                <option value="{{ $caj->IDCAJA }}">{{ $caj->NUMERO }}</option>
                @endforeach
                </select>

            </div>
        </div>

        

        <div class="form-group">
            <label for="FECHA" class="col-lg-2 col-md-12 col-sm-12 col-xs-12 control-label">Fecha <font color="red">*</font></label>
            <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
                <input name="FECHA" id="FECHA" class="form-control"  value="<?php echo date('Y-m-d'); ?>" value="{{old('FECHA')}}" OnFocus="this.blur()">
            </div>
        </div>

        <div class="form-group">
            <label for="SUBTOTAL" class="col-lg-2  col-md-12 col-sm-12 col-xs-12 control-label">Sub Total <font color="red">*</font></label>
            <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
                <input name="SUBTOTAL" id="SUBTOTAL" class="form-control" type="number"  value="{{old('SUBTOTAL')}}" required placeholder="0.00" onkeyup="fIva();">
            </div>
        </div>

        <div class="form-group">
            <label for="IVA" class="col-lg-2 col-md-12 col-sm-12 col-xs-12 control-label">Iva <font color="red">*</font></label>
            <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
                <input name="IVA" id="IVA" class="form-control" type="number" value="{{old('IVA')}}" required type="number" placeholder="0.00" onkeyup="fIva();" OnFocus="this.blur()">
            </div>
        </div>

        <div class="form-group">
            <label for="DESCUENTO" class="col-lg-2 col-md-12 col-sm-12 col-xs-12  control-label">Descuento <font color="#76D7C4"> (opcional)</font></label>
            <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
                <input name="DESCUENTO" id="DESCUENTO" class="form-control" type="number" placeholder="0.00" value="0" onkeyup="fIva();" >
            </div>
        </div>
        </div>
        <div class="row">
        <div class="form-group">
            <label for="TOTAL" class="col-lg-2 col-md-12 col-sm-12 col-xs-12 control-label">Total <font color="red">*</font></label>
            <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
                <input name="TOTAL" id="TOTAL" class="form-control" type="number" placeholder="0.00" value="{{old('TOTAL')}}" required OnFocus="this.blur()">
            </div>
        </div>
        </div>
        <br>
        <div class="form-group">
            <div class="col-lg-offset-2 col-lg-2 col-md-2 col-sm-12 col-xs-12">
              <input class="form-control btn btn-primary" type="submit" value="Añadir" />
            </div>
            
        </div>
        
    </form>
    <br>
        <div class=" col-lg-offset-2 col-lg-2 col-md-2 col-sm-12 col-xs-12">
              <a href="{{url('cabecera')}}" class="form-control btn btn-danger">Cancelar</a>
        </div>
</div>


</div>
        </div>
    </div>
</div>

@endsection
<script type="text/javascript">
    function fIva() {
    document.getElementById("IVA").value = (parseFloat(document.getElementById("SUBTOTAL").value)*12)/100;
    document.getElementById("TOTAL").value = parseFloat(document.getElementById("SUBTOTAL").value) + parseFloat(document.getElementById("IVA").value)-parseFloat(document.getElementById("DESCUENTO").value);
    }

 </script>

<script type="text/javascript">
    function fIva() {
    document.getElementById("IVA").value = (parseFloat(document.getElementById("SUBTOTAL").value)*12)/100;
    document.getElementById("TOTAL").value = parseFloat(document.getElementById("SUBTOTAL").value) + parseFloat(document.getElementById("IVA").value)-parseFloat(document.getElementById("DESCUENTO").value);
    }

 </script>

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
<script type="text/javascript">
    function capturar(){
        var cod=document.getElementById("seleccion").value;
        window.location = "vistacliente/"+cod;
    }
    
</script>
@endpush
