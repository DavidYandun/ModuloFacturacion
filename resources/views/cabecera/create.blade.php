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
            <label >Id Cliente <font color="red">*</font></label>         
                
                <select name="idcliente" id="idcliente" class="form-control selectpicker" data-live-search="true" data-show-subtext="true">
                <option value="">selecciona un cliente</option>
                @foreach ($cliente as $cli)                
                <option value="{{ $cli->idcliente }}" data-subtext="{{ $cli->cedula }}">{{ $cli->nombre }} {{ $cli->apellido }}</option>
                @endforeach
                </select>

            </div>
        </div>

        <div class="form-group">
        <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
            <label for="idcaja">Id Caja <font color="red">*</font></label>            
                <select name="idcaja" id="idcaja" class="form-control">
                <option value="">selecciona un caja</option>
                @foreach ($caja as $caj)
                <option value="{{ $caj->idcaja }}">{{ $caj->numero }}</option>
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

                    <select name="pidproducto" class="form-control selectpicker" id="pidproducto" data-live-search="true" data-show-subtext="true">
                    <option value="" selected="true">selecciona un Producto</option>
                        @foreach ($producto as $pro)   
                        @if (($pro->stock) > 0)          
                         <option value="{{ $pro->idproducto}}_{{ $pro->stock}}_{{ $pro->valor}}" data-subtext="{{ $pro->idproducto }}">{{ $pro->nombrep }}</option>
                 @endif   
                @endforeach
                    </select>
                </div>
            </div><div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
     <div class="form-group">
      <label for="cantidad">cantidad</label>
      <input type="number" name="pcantidad" id="pcantidad" class="form-control" placeholder="cantidad">
     </div>
    </div>
            <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                <div class="form-group">
                    <label for="valor_unitario">Valor unitario</label>
                    <input type="text" disabled name="pvalor_unitario" id="pvalor_unitario" class="form-control" placeholder="Valor_Unitario">
                </div>
            </div>            
            <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
                <div class="form-group">
                    <label for="STOCK">Stock</label>
                    <input type="number" disabled name="pstock" id="pstock" class="form-control" placeholder="Stock">
                </div>
            </div>
            <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
        <div class="form-group">
            <label>Tipo de PAgo<font color="red">*</font></label>         
                
                <select name="IDTIPO" id="IDTIPO" disabled="false" class="form-control selectpicker" data-live-search="true" data-show-subtext="true">
                <option value="" selected>selecciona tipo de pago</option>
                @foreach ($cliente as $cli) 
                 <!--{{$codcliente=$cli->idtipo}}-->
                                    <?php
                                        $nombretipo = App\Tipocliente::find($codcliente);
                                    ?>               
                <option value="{{ $cli->IDTIPO }}" >{{ $nombretipo->detalle }}</option>
                @endforeach
                </select>

            </div>
        </div>
            
             <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
     <div class="form-group">      
      <button type="button" id="bt_add"  class="btn btn-primary">Agregar</button>
     </div>
    </div>
            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
     <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                    <thead style="background-color: #A9D0F5">
                        <th>Opciones</th>
                        <th>cantidad</th>
                        <th>Producto</th>                        
                        <th>Valor Unitario</th>                       
                        <th>Valor Total</th>
                    </thead>
                    <tfoot>
                    	<tr>
                    		<td colspan="3"></td>
                        	<td>SubTotal</td>
                        	<td><input type="hidden" id="subtotal" name="subtotal"></input><h4 id="subto">/. 0.00</h4></td>
                        </tr>
                        <tr>
                        <td colspan="3"></td>
                        	<td>IVA</td>
                        	<td><input type="hidden" id="iva" name="iva"></input><h4 id="iva">/. 0.00</h4></td>
                        </tr>
                       
                    	<tr>
                    	<td colspan="3"></td>
                        	<td>Total</td>
                        	<td><input type="hidden" id="total" name="total"></input><h4 id="to">$/ 0.00</h4></td>
                             <input type="hidden" id="estado" name="estado" value="A">                          
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
                <a href="cabecera/create" class="btn btn-danger" type="reset">Cancelar</a>
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
total=0;
valor_total=[];
subtotal=0;
iva=0;
 $("#guardar").hide();
$("#pidproducto").change(mostrarValores);
function mostrarValores(){
    datosProducto=document.getElementById('pidproducto').value.split('_');
    document.getElementById("pstock").value=(datosProducto[1]);
    document.getElementById("pvalor_unitario").value=(datosProducto[2]);
    
}

function agregar(){    
        datosProducto=document.getElementById('pidproducto').value.split('_');
        idproducto=(datosProducto[0]);
        STOCK=parseFloat($("#pstock").val());        
        PRODUCTO=$("#pidproducto option:selected").text();      
        cantidad=parseFloat($("#pcantidad").val());             
        valor_unitario=$("#pvalor_unitario").val(); 
         
    //  DESCUENTO=$("#pdescuento").val(); 
                
            if(idproducto!="" && cantidad!="" && cantidad>0 && valor_unitario!="" && STOCK!="")        
        {
            

            if((STOCK)>=(cantidad)){
            valor_total[cont]=cantidad*valor_unitario;          
            total=(total+valor_total[cont]);
            subtotal=total/1.12;
            iva=total-subtotal;
            alert("Error"+iva);   

            var fila='<tr class="selected" id="fila'+cont+'">\n\
            <td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td>\n\
            <td><input type="hidden" name="cantidad[]" value="'+cantidad+'" readonly="readonly">'+cantidad+'</td>\n\
            <td><input type="hidden" name="idproducto[]" value="'+idproducto+'" readonly="readonly">'+PRODUCTO+'</td>\n\
            <td><input type="hidden" name="valor_unitario[]" value="'+valor_unitario+'"readonly="readonly">'+valor_unitario+'</td>\n\
            <td><input type="hidden" name="valor_total[]" value="'+valor_total[cont]+'"readonly="readonly">'+valor_total[cont]+'</td></tr>'                      
            cont++;
           
            document.getElementById("total").value=(total);
            document.getElementById("subtotal").value=(subtotal);
            document.getElementById("iva").value=(iva);
            $("#total").html("$/. " + total);
            $("#to").html("$/. " + total);
            $("#subtotal").html("$/. " + subtotal);
            $("#iva").html("$/. " + iva);
            $("#subto").html("$/. " + subtotal);
            $("#iva").html("$/. " + iva);
             limpiar();         
             evaluar();
            $('#detalles').append(fila);
            }
           else
        {
            alert("Error");
        }
        }
        else
        {
            alert("Error al ingresar el detalle del ingreso, revise los datos del PRODUCTO");
        }
        
        
    
    }


    function limpiar(){
        $("#pcantidad").val("");
        mostrarValores();
    }
    function evaluar(){
        if (total>0){
            $("#guardar").show();
        }else{
            $("#guardar").hide();
        }
    }

    function eliminar(index){
        total=total-valor_total[index];
        subtotal=total/1.12;
        iva=total-subtotal;

            $("#total").html("$/. " + total);
            $("#to").html("$/. " + total);
            $("#subtotal").html("$/. " + subtotal);
            $("#iva").html("$/. " + iva);
            $("#subto").html("$/. " + subtotal);
            $("#iva").html("$/. " + iva);       
        $("#fila" +index).remove();
        evaluar();
    }
//$("#idcliente").change(mostrarValor);
/* function existe(idproducto){
    if(cont>0){
        $("#detalles tbody tr").each(function () {
            var celdas=($this).find('td');
            console.log($celdas[1].val+", "+idproducto);
            if($(celdas[1].val()==idproducto)){
                return true;
            }

            });
        }
    }
    return false;
 }
 function mostrarValor(){
    datoscliente=document.getElementById('idcliente').value.split('_');
   if((datoscliente[1])=="1"){ 
    alert("Elproducto");  
    document.getElementById('IDTIPO').disabled=true;                
    
    }
    
    
    
}
 /*function activartipo(){
    alert("La cantidad a vender supera el Stock");
    datoscliente=document.getElementBy('idcliente').value.split('_');

        if((datoscliente[1])=="2"){        
        $("#IDTIPO").attr('disabled', true);
    }
 }*/
 

 /*function existe() {


    if (cont > 0) {
        $("#detalles tbody tr").each(function () {
            /* Obtener todas las celdas */             
            /*var celdas = $(this).find('td');            
             console.log($(celdas[1]).val()+", "+idproducto);
             $producto=$(celdas[2]).val();             
            
            /*if ($(celdas[1]).val() === idproducto) {
                return true;
            }
        });
    }
    return false;
}*/

 </script>
 @endpush
@endsection 
