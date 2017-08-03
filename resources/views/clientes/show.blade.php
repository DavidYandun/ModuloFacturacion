    <html lang="es">
<head>
    <meta charset="utf-8">
    <title>Listado de Clientes</title>
    <style type="text/css">
        /* estilos para el footer y el numero de pagina */
        @page { margin: 180px 25px; }
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
                <h4 style="color:#339;">Reporte de Clientes</h4>                
            </div>         
 <div class="panel-body col-lg-10" >
        <div class="container" align="center">
    <table   class="table table-striped table-bordered table-condensed table-hover col-lg-10">
                                <thead>
                                <tr>
                                    <th>TIPO</th>
                                    <th>CÉDULA</th>
                                    <th>NOMBRE</th>
                                    <th>NACIMIENTO</th>
                                    <th>CIUDAD</th>
                                    <th>DIRECCIÓN</th>
                                    <th>TELÉFONO</th>
                                    <th>EMAIL</th>
                                    <th>ESTADO</th>    
                                    </tr>                                
                                </thead>
                              <tbody>
                                @foreach($clientes as $cli)
                        <tr>
                             <!--{{$codtipo=$cli->idtipo}}-->
                                    <?php
                                        $nombreTipo = App\TipoCliente::find($codtipo);
                                    ?>
                                    @if(($nombreTipo->detalle)=='CR')
                                    <td>CREDITO</td>
                                    @endif
                                    @if(($nombreTipo->detalle)=='EF')
                                    <td>CREDITO</td>
                                    @endif    
                            <td align="center">{{$cli->cedula}}</td>
                            <td align="center">{{$cli->nombre}}</td>
                            <td align="center">{{$cli->nacimiento}}</td>
                            <td align="center">{{$cli->ciudad}}</td>
                            <td align="center">{{$cli->direccion}}</td>
                            <td align="center">{{$cli->telefono}}</td>
                            <td align="center">{{$cli->email}}</td>
                            <td align="center">{{$cli->estado}}</td>                      
                        </tr>
                                @endforeach
                            </tbody>
                </table>
                </div>

</div>                       
    </body>
</html>

    