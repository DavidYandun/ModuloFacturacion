<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Listado de Facturas</title>
    <style type="text/css">
        /* estilos para el footer y el numero de pagina */
        @page { margin: 180px 75px; }
        #header {
            position: fixed;
            left: 0px;
            top: -170px;
            right: 0px;
            height: 50px;        
            color: #2E2E2E;
            text-align: center;
            font-family: "Cambria", Georgia, serif;
        }
       
        .page-break {
            page-break-after: always;
        }
        img.cabeceraImagen{
            float:left;
            width: 108px;
            height: 83px;  
        }
        .texto {
            color: #848484;
        }
        #datos {
            color: #848484;
             font-family: "Cambria", Georgia, serif;
        }
     body {font-family: "Cambria", Georgia, serif;}
table {     font-family: "Cambria", Georgia, serif;
    font-size: 12px;    margin-right:50px;     width: 700px; text-align: center;    border-collapse:   collapse; }
th {     font-size: 13px;     font-weight: normal;     padding: 8px;   
    border-top: 4px solid #aabcfe;    border-bottom: 1px solid #fff; color: #039; }
td {    padding: 8px;         border-bottom: 1px solid #fff;
    color: #669;    border-top: 1px solid transparent; }
tr:hover td { color: #339; }
    </style>
</head>
<body>
    <!--header para cada pagina-->
    <div id="header">
                        
                    <h1 style="color:#339;">MODULO FACTURACIÓN</h1>
                     <h2 style="color:#339;"> FACTURA N°000&nbsp;{{$cabecera->idcabecera}}</h2>
              
    </div>
      
    <table>
       
            <tr>
                <td colspan="4">
                    <div align="center" ><h2>EMPRESA X</h2>
                    <h5>PROPIETARIO</h5>
                    <h5>Dirección: Calle Los Alamos 323 y Rivadeneira</h5>
                    <h5>Telf: 062-987-987  RUC: 999999999</h5>
                   
                    </div>
                </td>                
            </tr>
            <tr>
                <td colspan="2"><label class="control-label">Cliente:&nbsp;&nbsp;{{$cabecera->nombre}} {{$cabecera->apellido}} </label></td>                
                <td colspan="2"><label class="control-label">Cédula:&nbsp;&nbsp;{{$cabecera->cedula}}</label></td>                
            </tr>
            <tr>
                <td colspan="2"><label class="control-label">Dirección:&nbsp;&nbsp;{{$cabecera->direccion}}</label></td>                
                <td colspan="2"><label class="control-label">Fecha:&nbsp;&nbsp;{{$cabecera->fecha}}</label></td>
            </tr>
        <thead style="background: #e8edff; color:#000000;">
        <tr>
                                    <th>Cantidad</th>
                                    <th>Detalle de producto</th>
                                    <th>V.Unitario</th>
                                    <th>V.total</th>   
                                    </tr>                                 
                                </thead>

                             <tbody border="1">
                                 @foreach($detalles as $det)
                        <tr>
                            <td align="center">{{$det->cantidad}}</td>
                            <td align="center">{{$det->nombrep}}</td>
                            <td align="center">{{$det->valor_unitario}}</td>
                            <td align="center">{{$det->valor_total}}</td>
                        </tr>
                                @endforeach                              
                        <tr>
                            <td  rowspan="3" colspan="2"></td>
                            <td align="center"><h4>Subtotal</h4></td>
                            <td align="center"><h4 id="subto">{{$cabecera->subtotal}}</h4></td>
                        </tr>
                        <tr>
                            
                            <td align="center"><h4>Iva</h4></td>
                            <td align="center"><h4 id="iva">{{$cabecera->iva}}</h4></td>
                        </tr>
                        <tr>
                           
                            <td align="center"><h3>Total</h3></td>
                            <td align="center"><h3>{{$cabecera->total}}</h3></td>
                        </tr>
                                  </tbody>                                                                     
                            </table>                       
</body>
</html>