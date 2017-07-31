



        
        
        <div class="container">
            <div class="container " style="background:#2E9AFE; color:#000000;">
<<<<<<< HEAD
            <div class="col-lg-9" align="center" ><h3>EMPRESA X</h3>
                <h5>PROPIETARIO</h5>
                <h6>Dirección: Calle Los Alamos 323 y Rivadeneira</h6>
                <h6>Telf: 062-987-987 &nbsp &nbsp &nbsp RUC: 999999999</h6>
            </div>
            
            </div>
            <div class="col-lg-6 form-group">
                <label class="control-label">CEDULA: </label>
                <input class="form-control" type="text" value="{{$empleados->CEDULA}} " disabled>
            </div>
            <div class="col-lg-6 form-group">
                <label class="control-label">NOMBRE/RUC: </label>
                <input class="form-control" type="text" value="{{$empleados->NOMBRE}}  {{$empleados->APELLIDO}}" disabled>
            </div>
           
            <div class=" col-lg-6 form-group">
                <label class="control-label">NACIMIENTO: </label>
                <input class="form-control" type="text" value="{{$empleados->NACIMIENTO}}" disabled>
            </div>
            <div class=" col-lg-6 form-group">
                <label class="control-label">CIUDAD: </label>
                <input class="form-control" type="text" value="{{$empleados->CIUDAD}}" disabled>
            </div>
            <div class=" col-lg-6 form-group">
                <label class="control-label">DIRECCION: </label>
                <input class="form-control" type="text" value="{{$empleados->DIRECCION}}" disabled>
            </div>
            <div class=" col-lg-6 form-group">
                <label class="control-label">TELEFONO: </label>
                <input class="form-control" type="text" value="{{$empleados->TELEFONO}}" disabled>
            </div>
            <div class=" col-lg-6 form-group">
                <label class="control-label">ESTADO: </label>
                <input class="form-control" type="text" value="{{$empleados->ESTADO}}" disabled>
            </div>
            
        </div>



</div>

=======
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





>>>>>>> reportepdf
    