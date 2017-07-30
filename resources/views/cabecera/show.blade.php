@extends('admin.template.main')
@section('contenido')	
		<h1>FACTURA #{{$cabecera->IDCABECERA}}</h1>
        

        <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
        <div class="form-group">
            <label for="IDCLIENTE" >Cliente <font color="red">*</font></label> 
            <!--{{$codcliente=$cabecera->IDCLIENTE}}-->
            <?php
            $nombreCliente = App\Cliente::find($codcliente);
            ?>        
               <input name="NUMERO" disabled id="NUMERO" class="form-control"  value="{{$nombreCliente->NOMBRE}} {{ $nombreCliente->APELLIDO}} " type="text" >

            </div>
        </div>

        <div class="form-group">
        <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
            <label for="IDCAJA">Caja <font color="red">*</font></label>            
                 <input name="NUMERO" disabled id="NUMERO" class="form-control"  value="{{$cabecera->IDCAJA}}" type="number" >

            </div>           
        </div>
        <div class="form-group">
        <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
            <label for="IDCAJA">Fecha <font color="red">*</font></label>            
                 <input name="FECHA" disabled id="FECHA" class="form-control" value="{{$cabecera->FECHA}}" >

            </div>           
        </div>
        <div class="form-group">
        <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
            <label for="IDCAJA">Estado <font color="red">*</font></label>   
             @if($cabecera->ESTADO=="A")         
                 <input name="FECHA" disabled id="FECHA" class="form-control" value="Activo" >

                @endif
                @if($cabecera->ESTADO=="I") 
                 <input name="FECHA" disabled id="FECHA" class="form-control" value="Desactiva" >
                @endif         
                
            </div>           
        </div>
                

            
           
           
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
     <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
     <h2>DETALLES</h2>
                    <thead style="background-color: #A9D0F5">
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Valor Unitario</th>                       
                        <th>Valor Total</th>
                    </thead>
                    <tfoot>
                        <tr>
                            <td colspan="2"></td>
                            <td>SubTotal</td>
                            <td><input type="hidden" id="SUBTOTAL" name="SUBTOTAL"></input><h4 id="subto">/. {{$cabecera->TOTAL}}</h4></td>
                        </tr>
                        <tr>
                        <td colspan="2"></td>
                            <td>IVA</td>
                            <td><input type="hidden" id="IVA" name="IVA"></input><h4 id="iva">/. {{$cabecera->IVA}}</h4></td>
                        </tr>
                       
                        <tr>
                        <td colspan="2"></td>
                            <td>Total</td>
                            <td><input type="hidden" id="TOTAL" name="TOTAL"></input><h4 id="to">$/ {{$cabecera->SUBTOTAL}}</h4></td>
                                                       
                        </tr>
                      </tfoot><tbody> 
                    @foreach ($detalle as $det)
                    <!--{{$prod=$det->IDPRODUCTO}}-->
                    <?php
                    $producto = App\Producto::find($prod);
                     ?>   
                    @if(($det->IDCABECERA)==($cabecera->IDCABECERA))                       
                    <tr>
                    <td>{{$producto->NOMBREP}}</td>
                    <td>{{$det->CANTIDAD}}</td>
                    <td>{{$det->VALOR_UNITARIO}}</td>
                    <td>{{$det->VALOR_TOTAL}}</td>
                    </tr>
                    @endif
                    @endforeach
                    </tbody>                                      
                </table>
            </div>  
            @endsection 