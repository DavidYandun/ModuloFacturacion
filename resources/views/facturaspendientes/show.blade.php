      <html lang="es">
<head>
    <meta charset="utf-8">
    <title>Listado de Facturas pendientes</title>
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
    </div>    
        <div class="container" align="center" id="datos">                                     
                <h4 style="color:#339;">Reporte de Facturas Pendientes</h4>                
            </div>         
            <div class="panel-body col-lg-12">
        <div class="container" align="center">

    <table  class="table table-striped table-bordered table-condensed table-hover col-lg-12">
                                <thead>
                                <tr>
                                    <th>ID FACTURA PENDIENTE</th>
                                    <th>ID CABECERA</th>
                                    <th>NOMBRE</th>
                                    <th>TOTAL</th>
                                    <th>ABONO</th>
                                    <th>SALDO</th>     
                                    </tr>                  
                                </thead>
                              <tbody>
                                @foreach($cabecera as $fac)
                        <tr>

                            <td align="center">{{$fac->idpendiente}}</td>
                            <td align="center">{{$fac->idcabecera}}</td>
                            <td align="center">{{$fac->nombre}}</td>
                            <td align="center">{{$fac->total}}</td>
                            <td align="center">{{$fac->abono}}</td>
                            <td align="center">{{$fac->saldo}}</td>  
                            </tr>
                                @endforeach
                            </tbody>
                            </table>                       
</div>

</div>
</body>
</html>

    