



        
        
      <div class="col-lg-12" align="center" ><h3>EMPRESA X</h3>
                <h5>PROPIETARIO</h5>
                <h6>Dirección: Calle Los Alamos 323 y Rivadeneira</h6>
                <h6>Telf: 062-987-987 RUC: 999999999</h6>
                <h4>Reporte de Empleados</h4>
            </div>
            
            </div>
            </div>

            <div class="panel-body col-lg-12">
        <div class="container" align="center">

    <table  class="table table-striped table-bordered table-condensed table-hover col-lg-12">
                                <thead style="background:#2E9AFE; color:#000000;">
                                <tr>
                                    <th>CÉDULA</th>
                                    <th>NOMBRE</th>
                                    <th>NACIMIENTO</th>
                                    <th>CIUDAD</th>
                                    <th>DIRECCIÓN</th>
                                    <th>TELÉFONO</th>
                                    <th>ESTADO</th>    
                                    </tr>                                
                                </thead>
                              <tbody>
                                @foreach($empleados as $det)
                        <tr>
                            <td align="center">{{$det->CEDULA}}</td>
                            <td align="center">{{$det->NOMBRE}}</td>
                            <td align="right">{{$det->NACIMIENTO}}</td>
                            <td align="right">{{$det->CIUDAD}}</td>
                            <td align="right">{{$det->DIRECCION}}</td>
                            <td align="right">{{$det->TELEFONO}}</td>
                            <td align="right">{{$det->ESTADO}}</td>

                        </tr>
                                @endforeach
                            </tbody>
                            </table>                       
</div>

</div>

    