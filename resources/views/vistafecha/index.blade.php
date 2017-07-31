@extends('admin.template.main')
@section ('title')
   Cabecera
@endsection

@section('contenido')
<div class="container">
    <div class="row">

     
      <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <p><a href="{{URL::action('CabeceraController@create')}}"><button class="btn btn-success"> Nuevo</button></a></p>

        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Facturas</h2></div>
                <div class="panel-body">
                
                <div class="container">
                <label>Listar Facturas por: </label>
                 <!--POR CLIENTES-->
                <?php $client = App\Cliente::all();?>
                        <input type="button" value="Por Cliente" onclick="$('#capa').css('display', 'block')" class="btn btn-success">
                        <div id="capa" style="display: none;padding: 10px;">
                        <select id="seleccion" onchange="capturar()"> 
                            @foreach ($client as $cli)                
                                <option value="{{$cli->IDCLIENTE}}">
                                    {{ $cli->NOMBRE }} {{ $cli->APELLIDO }}
                                </option>
                            @endforeach
                        </select>                
                        </div>
                <!--FIN POR CLIENTES-->
                    <a href="{{url('cabecera')}}" class="btn btn-success">TODO</a>
                    <a href="{{url('cabecera')}}" class="btn btn-success">PRODUCTO</a>
                    <button class="btn btn-success">PRODUCTO</button>
                    <button class="btn btn-success">FECHA</button>
                </div>

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
                                
                                @if($c->IDCLIENTE==$cliente->IDCLIENTE)
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
                                    <td align="center">
                                    <a class="btn btn-primary" href="{{URL::action('CabeceraController@show',$c->IDCABECERA)}}"><i class="glyphicon glyphicon-list-alt"></i></a>
                                    </td>
                                    <td>{{ $c->IDCABECERA}}</td>
                                    <td>{{ $nombreCliente->NOMBRE}} {{ $nombreCliente->APELLIDO}}</td>
                                    <td>{{ $c->IDCAJA}}</td>
                                    <td>{{ $c->FECHA}}</td>
                                    <td>{{ $c->SUBTOTAL}}</td>
                                    <td>{{ $c->IVA}}</td>
                                    <td>{{ $c->TOTAL}}</td>                                                                                
                                   </tr>
                                   @endif
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
  
<script type="text/javascript">
    function capturar(){
        var cod=document.getElementById("seleccion").value;
        //window.location = "vistacliente/"+cod;
        window.location = ""+cod;
        //window.location = "{{URL::action('VistaclienteController@show',"+ cod +")}}";
    }
    
</script>
@endsection
