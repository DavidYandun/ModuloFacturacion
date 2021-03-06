@extends('admin.template.main')
@section ('title')
   Clientes
@endsection

@section('contenido')
<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h3>Nuevo cliente</h3>
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
	
		<form action="{{url('cliente')}}" method="POST" id="formulario" onsubmit="return check_cedula()">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">


	<!--TIPO CLIENTE-->
		<div class="form-group col-lg-12">
			<label for="idtipo" class="col-lg-2 control-label">Id Tipo <font color="red">*</font></label>
			<div class="col-lg-6">
				<select name="idtipo" id="idtipo" class="form-control">
					<option value="">Seleccione el tipo de cliente</option>
					@foreach ($tipocliente as $tc)
						@if($tc->detalle=='EF')
							<option value="{{ $tc->idtipo }}">EFECTIVO</option>
						@endif
						@if($tc->detalle=='CR')
							<option value="{{ $tc->idtipo }}">CREDITO</option>
						@endif
					@endforeach
				</select>
			</div>
			<div class="col lg-4">
				<label><font color="gray">EFECTIVO/CREDITO</font></label>
			</div>
		</div>
	<!--cedula-->
             
		<div class="form-group col-lg-12">
			<label for="cedula" class="col-lg-2 control-label">Cédula <font color="red">*</font></label>
			<div class="col-lg-6">
			<input name="cedula" id="cedula" class="form-control" type="text" pattern="[0-2][0-9]{9}" value="{{old('cedula')}}" required maxlength="10" minlength="10" onkeypress="return esDigito()" placeholder="Ingrese su cédula">
			</div>
			<div class="col lg-4">
				<label><font color="gray">Ej:1234567890</font></label>
			</div>
		</div>
		<!--nombre-->
		<div class="form-group col-lg-12">
			<label for="nombre" class="col-lg-2 control-label">Nombre <font color="red">*</font></label>
			<div class="col-lg-6">
				<input name="nombre" id="nombre" class="form-control" 
				pattern="[A-ZÁÉÍÓÚ][a-zñáéíóú|A-ZÁÉÍÓÚ]{1,11}|[A-ZÁÉÍÓÚ][a-zñáéíóú|A-ZÁÉÍÓÚ]{1,11} [A-ZÁÉÍÓÚ][a-zñáéíóú|A-ZÁÉÍÓÚ]{1,11}"
 type="text" value="{{old('nombre')}}" required maxlength="25" placeholder="Ingrese su nombre">
			</div>
			<div class="col lg-4">
				<label><font color="gray">Ej: Juan/JUAN</font></label>
			</div>

		</div>
	<!--apellido-->
		<div class="form-group col-lg-12">
			<label for="apellido" class="col-lg-2 control-label">apellido <font color="red">*</font></label>
			<div class="col-lg-6">
				<input name="apellido" id="apellido" class="form-control" pattern="[A-ZÁÉÍÓÚ][a-zñáéíóú|A-ZÁÉÍÓÚ]{1,11}|[A-ZÁÉÍÓÚ][a-zñáéíóú|A-ZÁÉÍÓÚ]{1,11} [A-ZÁÉÍÓÚ][a-zñáéíóú|A-ZÁÉÍÓÚ]{1,11}"
 type="text" value="{{old('apellido')}}" required maxlength="25" placeholder="Ingrese su apellido">
			</div>
			<div class="col lg-4">
				<label><font color="gray">Ej: Perez/PEREZ</font></label>
			</div>
		</div>
	<!--NACIMIENTO-->
		<div class="form-group col-lg-12">
			<label for="nacimiento" class="col-lg-2 control-label">Fecha de Nacimiento <font color="red">*</font></label>
			<div class="col-lg-6">
				<input name="nacimiento" id="nacimiento" class="form-control" type="date" value="{{old('nacimiento')}}"  required min="1910-01-01" max="<?php echo date('Y-m-d'); ?>">
			</div>
			<div class="col lg-4">
				<label><font color="gray">Ej: 1991-01-01</font></label>
			</div>
		</div>
		<div class="form-group col-lg-12">
			<label for="ciudad" class="col-lg-2 control-label">Ciudad <font color="red">*</font></label>
			<div class="col-lg-6">
				<input name="ciudad" id="ciudad" class="form-control" type="text" pattern="[A-ZÁÉÍÓÚ][a-zñáéíóú|A-ZÁÉÍÓÚ]{1,11}|[A-ZÁÉÍÓÚ][a-zñáéíóú|A-ZÁÉÍÓÚ]{1,11} [A-ZÁÉÍÓÚ][a-zñáéíóú|A-ZÁÉÍÓÚ]{1,11}" value="{{old('ciudad')}}" required placeholder="Ingrese su ciudad de residencia">
			</div>
			<div class="col lg-4">
				<label><font color="gray">Ej: Ibarra/IBARRA</font></label>
			</div>
		</div>

		<div class="form-group col-lg-12">
			<label for="direccion" class="col-lg-2 control-label">Dirección <font color="red">*</font></label>
			<div class="col-lg-6">
				<input name="direccion" id="direccion" class="form-control" type="text" value="{{old('direccion')}}" required placeholder="Ingrese su domicilio">
			</div>
			<div class="col lg-4">
				<label><font color="gray">Ej: Av. 17 de Julio</font></label>
			</div>
		</div>

		<div class="form-group col-lg-12">
			<label for="telefono" class="col-lg-2 control-label">Teléfono <font color="red">*</font></label>
			<div class="col-lg-6">
				<input name="telefono" id="telefono" class="form-control" type="tel" pattern="0[0-9]{9}" value="{{old('telefono')}}" required maxlength="10" minlength="10" placeholder="Registre su número de teléfono">
			</div>
			<div class="col lg-4">
				<label><font color="gray">Ej: 062987987</font></label>
			</div>
		</div>
		<div class="form-group col-lg-12">
			<label for="email" class="col-lg-2 control-label">e-mail <font color="red">*</font></label>
			<div class="col-lg-6">
				<input name="email" id="email" class="form-control" type="email" value="{{old('email')}}" required placeholder="Ingrese su correo electrónico">
			</div>
			<div class="col lg-4">
				<label><font color="gray">Ej: micorreo@electronico.com</font></label>
			</div>
		</div>
		<div class="form-group col-lg-12">
      <label for="estado" class="col-lg-2 control-label">Estado <font color="red">*</font></label>
      <div class="col-lg-6" class="col-xs-5 selectContainer">
        <select name="estado" id="estado" class="form-control" type="text" value="{{old('estado')}}" required onchange="crear(this.value)">
        <option value="">Seleccione un estado</option>
        <option value="A">Activo</option>
        <option value="I">Inactivo</option>
        </select>
      </div>     
      <div class="col lg-4">
				<label><font color="gray">ACTIVO/INACTIVO</font></label>
			</div>
    </div>

		<div class="form-group col-lg-12 ">
		<label  class="col-lg-2 control-label"></label>
			<div class="col-lg-3" >
              <input class="form-control btn btn-primary" type="submit" value="Añadir" />
        	</div>
        	<div class="col-lg-3">
              <a href="{{url('cliente')}}" class="form-control btn btn-danger">Cancelar</a>
        </div>

		</div>
		</div>
		</form>		
	</div>

    






    

    <div class="modal fade" id="nuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                
            </div>
            <div class="modal-body">
            <div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3>Nuevo empleado</h3>
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
        <form action="{{url('empleado')}}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <!--cedula-->
        <div class="form-group col-lg-12">
            <label for="cedula" class="col-lg-2 control-label">Cédula <font color="red">*</font></label>
            <div class="col-lg-6">
                <input name="cedula" id="cedula" class="form-control" type="text" pattern="[0-2][0-9]{9}" value="{{old('cedula')}}" required maxlength="10" minlength="10" placeholder="Ingrese su cédula" onchange="Validarcedula(this.form.cedula.value, this.form.boton)">
            </div>
            <div class="col-lg-4">
                <label><font color="gray">Ej:1234567890</font></label>
            </div>
        </div>
    <!--nombre-->
        <div class="form-group col-lg-12">
            <label for="nombre" class="col-lg-2 control-label">nombre <font color="red">*</font></label>
            <div class="col-lg-6">
                <input name="nombre" id="nombre" class="form-control" pattern="[A-ZÁÉÍÓÚ][a-zñáéíóú|A-ZÁÉÍÓÚ]{1,11}|[A-ZÁÉÍÓÚ][a-zñáéíóú|A-ZÁÉÍÓÚ]{1,11} [A-ZÁÉÍÓÚ][a-zñáéíóú|A-ZÁÉÍÓÚ]{1,11}" type="text" value="{{old('nombre')}}" required maxlength="25" placeholder="Ingrese su nombre">
            </div>
            <div class="col-lg-4">
                <label><font color="gray">Ej: Juan/JUAN</font></label>
            </div>
        </div>
    <!--apellido-->
        <div class="form-group col-lg-12">
            <label for="apellido" class="col-lg-2 control-label">Apellido <font color="red">*</font></label>
            <div class="col-lg-6">
                <input name="apellido" id="apellido" class="form-control" pattern="[A-ZÁÉÍÓÚ][a-zñáéíóú|A-ZÁÉÍÓÚ]{1,11}|[A-ZÁÉÍÓÚ][a-zñáéíóú|A-ZÁÉÍÓÚ]{1,11} [A-ZÁÉÍÓÚ][a-zñáéíóú|A-ZÁÉÍÓÚ]{1,11}" type="text" value="{{old('apellido')}}" required maxlength="25" placeholder="Ingrese su apellido">
            </div>
            <div class="col-lg-4">
                <label><font color="gray">Ej: Perez/PEREZ</font></label>
            </div>
        </div>
<!--NACIMIENTO-->
        <div class="form-group col-lg-12">
            <label for="nacimiento" class="col-lg-2 control-label">Fecha de Nacimiento <font color="red">*</font></label>
            <div class="col-lg-6">
                <input name="nacimiento" id="nacimiento" class="form-control" type="date" value="{{old('nacimiento')}}"  required min="1900-01-01" max="2017-12-31" >
            </div>
            <div class="col-lg-4">
                <label><font color="gray">Ej: 1991-01-01</font></label>
            </div>
        </div>
    <!--CIUDAD-->
        <div class="form-group col-lg-12">
            <label for="ciudad" class="col-lg-2 control-label">Ciudad <font color="red">*</font></label>
            <div class="col-lg-6">
                <input name="ciudad" id="ciudad" class="form-control" type="text" value="{{old('ciudad')}}" required placeholder="Ingrese su ciudad de residencia">
            </div>
            <div class="col-lg-4">
                <label><font color="gray">Ej: Ibarra</font></label>
            </div>
        </div>
    <!--direccion-->
        <div class="form-group col-lg-12">
            <label for="direccion" class="col-lg-2 control-label">Dirección <font color="red">*</font></label>
            <div class="col-lg-6">
                <input name="direccion" id="direccion" class="form-control" type="text" value="{{old('direccion')}}" required placeholder="Ingrese su domicilio">
            </div>
            <div class="col-lg-4">
                <label><font color="gray">Ej: Av. 17 de Julio</font></label>
            </div>
        </div>
    <!--telefono-->
        <div class="form-group col-lg-12">
            <label for="telefono" class="col-lg-2 control-label">Teléfono <font color="red">*</font></label>
            <div class="col-lg-6">
                <input name="telefono" id="telefono" class="form-control" type="tel" pattern="0[0-9]{9}" value="{{old('telefono')}}" required maxlength="10" minlength="10" placeholder="Ingrese su número de teléfono">
            </div>
            <div class="col-lg-4">
                <label><font color="gray">Ej: 062987987</font></label>
            </div>
        </div>
        <div class="form-group">
      <label for="estado" class="col-lg-2 control-label">Estado <font color="red">*</font></label>
      <div class="col-lg-6" class="col-xs-5 selectContainer">
        <select name="estado" id="estado" class="form-control" type="text" value="{{old('estado')}}" required onchange="crear(this.value)">
        <option value="">Seleccione un estado</option>
        <option value="A">Activo</option>
        <option value="I">Inactivo</option>
        </select>
      </div>
      <div class="col-lg-4">
                <label><font color="gray">.</font></label>
            </div>
    </div>

        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <input class="btn btn-primary" type="submit" value="Añadir" />
        </div>
    </form>
</div>


</div>

@endsection
@push('scripts')
<script src="{{asset('js\validaciones.js')}}"></script>
<script type="text/javascript">

function check_cedula()
{
  var cedula =  document.getElementById("cedula").value.trim();
  array = cedula.split( "" );
  num = array.length;
  if ( num == 10 )
  {
    total = 0;
    digito = (array[9]*1);
    for( i=0; i < (num-1); i++ )
    {
      mult = 0;
      if ( ( i%2 ) != 0 ) {
        total = total + ( array[i] * 1 );
      }
      else
      {
        mult = array[i] * 2;
        if ( mult > 9 )
          total = total + ( mult - 9 );
        else
          total = total + mult;
      }
    }
    decena = total / 10;
    decena = Math.floor( decena );
    decena = ( decena + 1 ) * 10;
    final = ( decena - total );
    if ( ( final == 10 && digito == 0 ) || ( final == digito ) ) {      
      return true;
    }
    else
    {
      swal(
  'Cédula incorrecta!',
  'error'
);
   
      return false     
    }
  }  
}
</script>
@endpush