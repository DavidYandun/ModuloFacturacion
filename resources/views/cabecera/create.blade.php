@extends('admin.template.main')
@section('contenido')

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h3>Nueva Factura</h3>
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
{!!Form::open(array('url'=>'cabecera','method'=>'POST','autocomplete'=>'off'))!!}
{{Form::token()}}
		
        <div class="row">
            <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
        <div class="form-group">

            <label for="NUMERO">Número <font color="red">*</font></label>            
                <input name="NUMERO" id="NUMERO" class="form-control"  value="{{old('NUMERO')}}" type="number" placeholder="00001234">
            </div>
        </div>  

        <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
        <div class="form-group">
            <label for="IDCLIENTE" >Id Cliente <font color="red">*</font></label>         
                
                <select name="IDCLIENTE" id="IDCLIENTE" class="form-control selectpicker" data-live-search="true">
                <option value="">selecciona un cliente</option>
                @foreach ($cliente as $cli)
                
                <option value="{{ $cli->IDCLIENTE }}">{{ $cli->NOMBRE }} {{ $cli->APELLIDO }}</option>
                @endforeach
                </select>

            </div>
        </div>

        <div class="form-group">
        <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
            <label for="IDCAJA">Id Caja <font color="red">*</font></label>            
                <select name="IDCAJA" id="IDCAJA" class="form-control">
                <option value="">selecciona un caja</option>
                @foreach ($caja as $caj)
                <option value="{{ $caj->IDCAJA }}">{{ $caj->NUMERO }}</option>
                @endforeach
                </select>

            </div>           
        </div>
</div>
<div class="row">
        <div class="panel panel-primary">
            <div class="panel-body">
            <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                <div class="form-group">
                    <label>Producto</label>
                    <select name="pidproducto" class="form-control selectpicker" id="pidproducto" data-live-search="true">
                        @foreach ($producto as $pro)                
                <option value="{{ $pro->IDPRODUCTO }}">{{ $pro->NOMBREP }}
                </option>
                @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
     <div class="form-group">
      <label for="CANTIDAD">Cantidad</label>
      <input type="number" name="pcantidad" id="pcantidad" class="form-control" placeholder="Cantidad">
     </div>
    </div>
            <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                <div class="form-group">
                    <label for="VALOR_UNITARIO">Valor unitario</label>
                    <input type="number" name="pvalor_unitario" id="pvalor_unitario" class="form-control" placeholder="Valor_Unitario">
                </div>
            </div>            
            <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
                <div class="form-group">
                    <label for="DESCUENTO">Descuento</label>
                    <input type="number" name="pdescuento" id="pdescuento" class="form-control" placeholder="Descuento">
                </div>
            </div>
            
             <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
     <div class="form-group">      
      <button type="button" id="bt_add" class="btn btn-primary">Agregar</button>
     </div>
    </div>
            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
     <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                    <thead style="background-color: #A9D0F5">
                        <th>Opciones</th>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Valor Unitario</th>
                        <th>Descuento</th>                        
                        <th>Valor Total</th>
                    </thead>
                    <tfoot>
                    	<tr>
                    		<td colspan="4"></td>
                        	<td>SubTotal</td>
                        	<td><input type="hidden" id="SUBTOTAL" name="SUBTOTAL"></input><h4 id="subto">/. 0.00</h4></td>
                        </tr>
                        <tr>
                        <td colspan="4"></td>
                        	<td>IVA</td>
                        	<td><input type="hidden" id="IVA" name="IVA"></input><h4 id="iva">/. 0.00</h4></td>
                        </tr>
                        <tr>
                        <td colspan="4"></td>
                        	<td>Descuento</td>
                        	<td><input type="hidden" id="DESCUENTO" name="DESCUENTO"></input><h4 id="descuento"></h4></td>
                        </tr>
                    	<tr>
                    	<td colspan="4"></td>
                        	<td>Total</td>
                        	<td><input type="hidden" id="TOTAL" name="TOTAL"></input><h4 id="to">$/. 0.00</h4></td>
                        </tr>
                      </tfoot>
                        

                    	
                        
                    <tbody> 

                    </tbody>                                      
                </table>
            </div>                
        </div>
    </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" id="guardar">
            <div class="form-group">
                <input name="_token" value="{{ csrf_token() }}" type="hidden"></input>
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
        </div>
  </div>
{!!Form::close()!!}
 

@push ('scripts')
 <script>
 	$(document).ready(function () {
    $('#bt_add').click(function () { 
        agregar();

    });
});

var cont=0;
TOTAL=0;
valor_total=[];
subtotal=0;
 iva=0;
 $("#guardar").hide();



 	function agregar(){

 		IDPRODUCTO=$("#pidproducto").val(); 		
 		PRODUCTO=$("#pidproducto option:selected").text(); 		
 		CANTIDAD=$("#pcantidad").val(); 		
 		VALOR_UNITARIO=$("#pvalor_unitario").val(); 		
 		DESCUENTO=$("#pdescuento").val(); 	

 		if(IDPRODUCTO!="" && CANTIDAD!="" && CANTIDAD>0 && VALOR_UNITARIO!="") 			
 		{
 			valor_total[cont]=(CANTIDAD*VALOR_UNITARIO)-DESCUENTO; 			
 			TOTAL=(TOTAL+valor_total[cont]);
 			subtotal=TOTAL/1.12;
 			iva=TOTAL-subtotal;


 			var fila='<tr class="selected" id="fila'+cont+'">\n\
 			<td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td>\n\
 			<td><input type="hidden" name="IDPRODUCTO[]" value="'+IDPRODUCTO+'" readonly="readonly">'+PRODUCTO+'</td>\n\
 			<td><input type="number" name="CANTIDAD[]" value="'+CANTIDAD+'" readonly="readonly"></td>\n\
 			<td><input type="number" name="VALOR_UNITARIO[]" value="'+VALOR_UNITARIO+'"readonly="readonly"></td>\n\
 			<td><input type="number" name="DESCUENTO[]" value="'+DESCUENTO+'"readonly="readonly"></td>\n\
 			<td><input type="number" name="VALOR_TOTAL[]" value="'+valor_total[cont]+'"readonly="readonly"></td></tr>' 				 		
 			cont++;

 			limpiar();
 			 document.getElementById("TOTAL").value=(TOTAL);
 			 document.getElementById("SUBTOTAL").value=(subtotal);
 			  document.getElementById("IVA").value=(iva);

 			$("#TOTAL").html("$/. " + TOTAL);
 			$("#to").html("$/. " + TOTAL);
 			$("#SUBTOTAL").html("$/. " + subtotal);
 			$("#IVA").html("$/. " + iva);
 			$("#subto").html("$/. " + subtotal);
 			$("#iva").html("$/. " + iva);
 			
 			
 			evaluar();
 			$('#detalles').append(fila);
 		}
 		else
 		{
 			alert("Error al ingresar el detalle del ingreso, revise los datos del PRODUCTO");
 		}
 	}


 	function limpiar(){
 		$("#pcantidad").val("");
 		$("#pvalor_unitario").val("");
 		$("#pvalor_total").val("");
 		$("#pdescuento").val("");
 	}
 	function evaluar(){
 		if (TOTAL>0){
 			$("#guardar").show();
 		}else{
 			$("#guardar").hide();
 		}
 	}

 	function eliminar(index){
 		TOTAL=TOTAL-valor_total[index];
 		$("#TOTAL").html("$/. " + TOTAL); 		
 		$("#fila" +index).remove();
 		evaluar();
 	}
 </script>
 @endpush
@endsection 
