@extends('admin.template.main')
@section('contenido')


        
        
        <div class="container">
            <div class="container " style="background:#2E9AFE; color:#000000;">
            <div class="col-lg-9" align="center" ><h3>EMPRESA X</h3>
                <h5>PROPIETARIO</h5>
                <h6>Dirección: Calle Los Alamos 323 y Rivadeneira</h6>
                <h6>Telf: 062-987-987 &nbsp &nbsp &nbsp RUC: 999999999</h6>
            </div>
            <div class="col-lg-3" >
                <label><h4> FACTURA N°<br>000{{$cabecera->idcabecera}}</h4></label>
            </div>
            </div>
            <div class="col-lg-6 form-group">
                <label class="control-label">Cliente: </label>
                <input class="form-control" type="text" value="{{$cabecera->NOMBRE}} {{$cabecera->APELLIDO}}" disabled>
            </div>
            <div class="col-lg-6 form-group">
                <label class="control-label">Cédula/RUC: </label>
                <input class="form-control" type="text" value="{{$cabecera->CEDULA}}" disabled>
            </div>
            <div class=" col-lg-6 form-group">
                <label class="control-label">Dirección: </label>
                <input class="form-control" type="text" value="{{$cabecera->DIRECCION}}" disabled>
            </div>
            <div class=" col-lg-6 form-group">
                <label class="control-label">Fecha: </label>
                <input class="form-control" type="text" value="{{$cabecera->FECHA}}" disabled>
            </div>
            
            
        </div>

<div class="panel-body">
    <div class="table-responsive">

     <table class="table table-striped table-bordered table-condensed table-hover">
                                <thead style="background:#2E9AFE; color:#000000;">
                                    <th>Cantidad</th>
                                    <th>Detalle de producto</th>
                                    <th>V.Unitario</th>
                                    <th>V.Total</th>
                                    
                                </thead>
                               <tfoot>
                        <tr>
                            <td  rowspan="4" colspan="2"></td>
                            <td align="right">Subtotal</td>
                            <td align="right"><input type="hidden" id="subtotal" name="subtotal"><h4 id="subto">{{$cabecera->subtotal}}</h4></td>
                        </tr>
                        <tr>
                        
                            <td align="right">IVA</td>
                            <td align="right"><input type="hidden" id="iva" name="iva"><h4 id="iva">{{$cabecera->iva}}</h4></td>
                        </tr>
                        <tr>
                        
                            <td align="right">Total</td>
                            <td align="right">
                            <input type="hidden" id="total" name="total"><h3>{{$cabecera->total}}</h3></td>
                        </tr>
                      </tfoot>
                                @foreach($detalles as $det)
                        <tr>
                            <td align="center">{{$det->CANTIDAD}}</td>
                            <td align="center">{{$det->NOMBREP}}</td>
                            <td align="right">{{$det->VALOR_UNITARIO}}</td>
                            <td align="right">{{$det->VALOR_total}}</td>
                        </tr>
                                @endforeach
                            </table>                       
</div>

</div>
<div id="#HTMLtoPDF">
<h2>hola mundo</h2>
</div>
<a href="#" onclick="HTMLtoPDF()">Download PDF</a>     

     
    

@endsection 
    

    <html lang="es">
<head>
    <meta charset="utf-8">
    <title>Clientes con sus Movimientos</title>
    <style type="text/css">
        /* estilos para el footer y el numero de pagina */
        @page { margin: 180px 75px; }
        #header {
            position: fixed;
            left: 0px;
            top: -170px;
            right: 0px;
            height: 90px;
            background-color: #FFFFFF;
            color: #2E2E2E;
            text-align: center;
        }
        #footer {
            position: fixed;
            left: 0px;
            bottom: -180px;
            right: 0px;
            height: 50px;
            background-color: #FFFFFF;
            color: #2E2E2E;
        }
        #footer2 {
            position: fixed;
            left: 0px;
            bottom: -130px;
            right: 0px;
            height: 5px;
            background-color: #A9D0F5;
            color: #2E2E2E;
        }
        #footer .page:after {
            content: counter(page, decimal);
            float:right;
            color: #848484;
        }
        .page-break {
            page-break-after: always;
        }
        img.alineadoTextoImagenCentro{
            float:left;
            width: 108px;
            height: 83px;
  /* Ojo vertical-align: text-middle no existe*/
        }
        .texto {
            color: #848484;
        }
        #datos {
            color: #848484;
             font-family: "Lucida Sans Unicode";
        }
     body {font-family: Arial, Helvetica, sans-serif;}
table {     font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
    font-size: 12px;    margin-right:50px;     width: 700px; text-align: center;    border-collapse: collapse; }
th {     font-size: 13px;     font-weight: normal;     padding: 8px;     background: #b9c9fe;
    border-top: 4px solid #aabcfe;    border-bottom: 1px solid #fff; color: #039; }
td {    padding: 8px;     background: #e8edff;     border-bottom: 1px solid #fff;
    color: #669;    border-top: 1px solid transparent; }
tr:hover td { background: #d0dafd; color: #339; }
    </style>
</head>
<body>
    <!--header para cada pagina-->
    <div id="header">
        <img class="alineadoTextoImagenCentro" src="https://caiutn.files.wordpress.com/2015/05/logo-utn.png?w=480"/><p><b>      UNIVERSIDAD TÉCNICA DEL NORTE<br>
                FACULTAD DE INGENIERÍA EN CIENCIAS APLICADAS<br>
                    CARRERA DE INGENIERÍA EN SISTEMAS COMPUTACIONALES
                </b>
            </p>
    </div>

       <h1>{{$texto}}</h1>
    <div id="datos">
        <caption >Reporte del Cliente con sus movimientos</caption> <br><br>
<label for="" >Nombres: </label><br><br>
<label for="" >Cédula: </label><br><br>



</div>
  <table >


 <div> 

   

   </div>
<tr> 
    <th>Pago</th> 
    <th>Descripción</th> 
    <th>Fecha Pago</th>
<th>Total Pago</th> 

</tr>
<tr> <td>Pago-001</td> <td>tarjeta</td> <td>12/2012/1999</td> <td>23,89</td> 
</tr>
<tr> <td>Pago-002</td> <td>contado</td> <td>12/2012/2000</td> <td>23,89</td> 
</tr>
<tr> <td>Pago-003</td> <td>tarjeta</td> <td>12/2012/1993</td> <td>23,89</td> 
</tr>
<tr> <td>Pago-004</td> <td>tarjeta</td> <td>12/2012/1993</td> <td>23,89</td> 
</tr>
</table>



    <!--footer para cada pagina-->
    <div id="footer">
        <!--aqui se muestra el numero de la pagina en numeros romanos-->
        <p class="page"><small class="texto">MÓDULO DE CUENTAS POR COBRAR</small></p>
    </div>
    <div id="footer2">
        <!--aqui se muestra el numero de la pagina en numeros romanos-->
    </div>
<div class="page-break"></div>
<h1>Page 2</h1>
</body>
</html>