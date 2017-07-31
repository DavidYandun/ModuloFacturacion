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
                <label><h4> FACTURA N°<br>000{{$cabecera->IDCABECERA}}</h4></label>
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
                            <td align="right">SubTotal</td>
                            <td align="right"><input type="hidden" id="SUBTOTAL" name="SUBTOTAL"><h4 id="subto">{{$cabecera->SUBTOTAL}}</h4></td>
                        </tr>
                        <tr>
                        
                            <td align="right">IVA</td>
                            <td align="right"><input type="hidden" id="IVA" name="IVA"><h4 id="iva">{{$cabecera->IVA}}</h4></td>
                        </tr>
                        <tr>
                        
                            <td align="right">Total</td>
                            <td align="right">
                            <input type="hidden" id="TOTAL" name="TOTAL"><h3>{{$cabecera->TOTAL}}</h3></td>
                        </tr>
                      </tfoot>
                                @foreach($detalles as $det)
                        <tr>
                            <td align="center">{{$det->CANTIDAD}}</td>
                            <td align="center">{{$det->NOMBREP}}</td>
                            <td align="right">{{$det->VALOR_UNITARIO}}</td>
                            <td align="right">{{$det->VALOR_TOTAL}}</td>
                        </tr>
                                @endforeach
                            </table>                       
</div>


@endsection 
