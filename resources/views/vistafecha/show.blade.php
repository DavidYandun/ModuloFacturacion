
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
                
                        <input type="button" value="Por Cliente" onclick="$('#capa').css('display', 'block')" class="btn btn-success">
                        <div id="capa" style="display: none;padding: 10px;">
                        <select id="seleccion" onchange="capturar()"> 
                            @foreach ($cliente as $cli)                
                                <option value="{{$cli->idcliente}}">
                                    {{ $cli->nombre }} {{ $cli->apellido }}
                                </option>
                            @endforeach
                        </select>                
                        </div>
                <!--FIN POR CLIENTES-->
                <!--FECHAS-->                
                       <input id="lf" type="button" value="Listar por Fecha" class="btn btn-success">
                    <div id="fech" style="display: none;padding: 10px;">
                
                        <div class="form-group">
                            @php
                            $hoy=date('Y-m-d');
                            @endphp
                            <label for="fechaini" class="control-label col-md-3 col-sm-3 col-xs-12">Fecha inicial <font color="red">*</font></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input name="fechaini" id="fechaini" class="form-control" type="date" value="{{old('fechaini')}}" required min="1980-01-01" max="{{$hoy}}">
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="fechafin" class="control-label col-md-3 col-sm-3 col-xs-12">Fecha final <font color="red">*</font></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input name="fechafin" id="fechafin" class="form-control" type="date" value="{{old('fechafin')}}"  required min="1980-01-01" max="{{$hoy}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4"> <br>
                                <button type="submit" class="btn btn-primary" onclick="fechas()">Generar</button>
                            </div>
                        </div>
                 
                    </div>
                
                <!--FIN FECHAS-->
                </div>
        <!--FIN BUSQUEDA-->



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
                                @if($c->idcliente==$cliente->idcliente)                                
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
                                     <input type="hidden" id="ESTADO" name="ESTADO" value="I"> 
                                     @endif
                                     @if($c->estado=="I") 
                                     <h5>ANULADA</h5>
                                      @endif
                                    </td>
                                    <td align="center">
                                    <a class="btn btn-primary" href="{{URL::action('CabeceraController@show',$c->idcabecera)}}"><i class="glyphicon glyphicon-list-alt"></i></a>
                                    </td>
                                    <td>{{ $c->idcabecera}}</td>
                                    <td>{{ $nombreCliente->nombre}} {{ $nombreCliente->apellido}}</td>
                                    <td>{{ $c->idcaja}}</td>
                                    <td>{{ $c->fecha}}</td>
                                    <td>{{ $c->subtotal}}</td>
                                    <td>{{ $c->iva}}</td>
                                    <td>{{ $c->total}}</td>                                                                                
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
