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
                                <option value="{{$cli->idcliente}}" data-subtext="{{ $cli->cedula }}">
                                    {{ $cli->nombre }} {{ $cli->apellido }}
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
                                <!--{{$codcliente=$c->idcliente}}-->
                                    <?php
                                        $nombreCliente = App\Cliente::find($codcliente);
                                    ?>
                                <tr>
                                    <td align="center">
                                    
                                     <a class="btn btn-info" href="#"><i class="glyphicon glyphicon-print"></i></a>
                                    
                                        
                                    </td>
                                    <td align="center">                                        

                                    @if($c->estado=="A")
                                     <a class="btn btn-danger" href="{{URL::action('CabeceraController@actualizar',$c->idcabecera)}}"><i class="glyphicon glyphicon-trash">ANULAR</i></a>
                                     <input type="hidden" id="estado" name="estado" value="I"> 
                                     @endif
                                     @if($c->estado=="I") 
                                     <h5>ANULADA</h5>
<<<<<<< HEAD
                                      @endif
                                    </td>
<<<<<<< HEAD
                                   <td align="center">
                                    <a class="btn btn-primary" href="{{URL::action('CabeceraController@show',$c->IDCABECERA)}}"><i class="glyphicon glyphicon-list-alt"></i></a>
                                    </td>
                                    <td>{{ $c->idcabecera}}</td>
                                    <td>{{ $nombreCliente->nombre}} {{ $nombreCliente->apellido}}</td>
=======
                                   
                                    <td>{{ $c->idcabecera}}</td>

                                    <td align="center">
                                    <a class="btn btn-primary" href="{{URL::action('CabeceraController@show',$c->IDCABECERA)}}"><i class="glyphicon glyphicon-list-alt"></i></a>
                                    </td>
                                    <td>{{ $c->IDCABECERA}}</td>
                         
=======
                                      @endif                                


                                   
                                    

                                  
                                    <a class="btn btn-primary" href="{{URL::action('CabeceraController@show',$c->IDCABECERA)}}"><i class="glyphicon glyphicon-list-alt"></i></a>
                                    </td>                                   
                 
>>>>>>> 67dd893275fee43072f9d0c1864aace9f8f85921
                                    <td>{{ $c->idcabecera}}</td>

                                    <td>{{ $nombreCliente->NOMBRE}} {{ $nombreCliente->APELLIDO}}</td>
>>>>>>> c54a04804c57b8ffe1d3051227ed135d730d9e4a
                                    <td>{{ $c->idcaja}}</td>
                                    <td>{{ $c->fecha}}</td>
                                    <td><span maxlength="4">{{ $c->subtotal}}</span></td>
                                    <td>{{ $c->iva}}</td>
                                    <td>{{ $c->total}}</td>                                                                                
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
            <label for="idcabecera" class="col-lg-2  col-md-12 col-sm-12 col-xs-12 control-label">Número <font color="red">*</font></label>

            <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
                <input name="idcabecera" id="idcabecera" class="form-control"  value="{{old('idcabecera')}}" type="number" placeholder="00001234">
            </div>
        </div>  

        <div class="form-group">
            <label for="idcliente" class="col-lg-2 col-md-12 col-sm-12 col-xs-12 control-label">Id Cliente <font color="red">*</font></label>
            <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
                
                <select name="idcliente" id="idcliente" class="form-control">
                <option value="">selecciona un cliente</option>
                @foreach ($cliente as $cli)
                
                <option value="{{ $cli->idcliente }}">{{ $cli->nombre }} {{ $cli->apellido }}</option>
                @endforeach
                </select>

            </div>
        </div>

        <div class="form-group">
            <label for="idcaja" class="col-lg-2 col-md-12 col-sm-12 col-xs-12 control-label">Id Caja <font color="red">*</font></label>
            <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
                
                <select name="idcaja" id="idcaja" class="form-control">
                <option value="">selecciona un caja</option>
                @foreach ($caja as $caj)
                <option value="{{ $caj->idcaja }}">{{ $caj->NUMERO }}</option>
                @endforeach
                </select>

            </div>
        </div>

        

        <div class="form-group">
            <label for="fecha" class="col-lg-2 col-md-12 col-sm-12 col-xs-12 control-label">Fecha <font color="red">*</font></label>
            <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
                <input name="fecha" id="fecha" class="form-control"  value="<?php echo date('Y-m-d'); ?>" value="{{old('fecha')}}" OnFocus="this.blur()">
            </div>
        </div>

        <div class="form-group">
            <label for="subtotal" class="col-lg-2  col-md-12 col-sm-12 col-xs-12 control-label">Sub Total <font color="red">*</font></label>
            <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
                <input name="subtotal" id="subtotal" class="form-control" type="number"  value="{{old('subtotal')}}" required placeholder="0.00" onkeyup="fIva();">
            </div>
        </div>

        <div class="form-group">
            <label for="iva" class="col-lg-2 col-md-12 col-sm-12 col-xs-12 control-label">Iva <font color="red">*</font></label>
            <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
                <input name="iva" id="iva" class="form-control" type="number" value="{{old('iva')}}" required type="number" placeholder="0.00" onkeyup="fIva();" OnFocus="this.blur()">
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
                <input name="total" id="total" class="form-control" type="number" placeholder="0.00" value="{{old('total')}}" required OnFocus="this.blur()">
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
    document.getElementById("IVA").value = (parseFloat(document.getElementById("subtotal").value)*12)/100;
    document.getElementById("total").value = parseFloat(document.getElementById("subtotal").value) + parseFloat(document.getElementById("IVA").value)-parseFloat(document.getElementById("DESCUENTO").value);
    }

 </script>

<script type="text/javascript">
    function fIva() {
    document.getElementById("IVA").value = (parseFloat(document.getElementById("subtotal").value)*12)/100;
    document.getElementById("total").value = parseFloat(document.getElementById("subtotal").value) + parseFloat(document.getElementById("IVA").value)-parseFloat(document.getElementById("DESCUENTO").value);
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
