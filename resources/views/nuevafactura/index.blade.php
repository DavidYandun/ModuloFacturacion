@extends('admin.template.main')

@section ('title')
   Nueva Factura
@endsection
@section('TituloBanner')
Nueva Factura
@endsection


@section('contenido')
<div class="container">
    <div>
    <!--Cabecera-->
        <form class="form-inline">
            <div class="form-group col-lg-4" >
                <label class="control-label">Selecciona un Cliente:</label>
                <input class="form-control" type="text" name="cliente">
            </div>
            <div class="form-group col-lg-4"> 
                <label class="control-label">Fecha:</label>
                <input class="form-control" type="text" name="fecha">
            </div>
            <div class="col-lg-4">
            <input type="submit" value="Guardar Factura">
            </div>
        </form>
        <!--Fin Cabecera-->
    <!--Detalle-->
        <form class="form-inline">
            <div class="form-group col-lg-4">
                <label class="control-label">Escoge producto:</label>
                <input class="form-control" type="text" name="producto">
            </div>
            <div class="form-group col-lg-4">
                <label class="control-label">Cantidad:</label>
                <input class="form-control" type="text" name="cantidad">
            </div>
            <div class="col-lg-4">
            <input type="submit" value="Añadir">
            </div>
        </form>
        <!--Fin Detalle-->
    </div>
    <div>
        <table class="table table-striped table-bordered table-condensed table-hover"> 
            <thead>
                <tr>
                    <th>CANTIDAD</th>
                    <th>DETALLE</th>
                    <th>VALOR UNITARIO</th>
                    <th>VALOR TOTAL</th>
                    <th>OPCIONES<th>
                </tr>
            </thead>
            <tbody>
            
               <?php
               for($i=0;$i<10;$i++){
                echo "<tr>";
                echo "<td>$i</td>";
                echo "<td>arroz</td>";
                echo "<td>10.00</td>";
                echo "<td>200.00</td>";
                echo "<td><a href='#'>deshacer</a></td>";
                echo "</tr>";
               }
               ?>
               <tr>
                   <td colspan="3">SUBTOTAL</td>
                   <td colspan="2">1000.00</td>
               </tr>
               <tr>
                   <td colspan="3">IVA</td>
                   <td colspan="2">120.00</td>
               </tr>
               <tr>
                   <td colspan="3">DESCUENTO</td>
                   <td colspan="2">20.00</td>
               </tr>
               <tr>
                   <td colspan="3">TOTAL</td>
                   <td colspan="2">1100.00</td>
               </tr>
            </tbody>

        </table>
    </div>
</div>
@endsection