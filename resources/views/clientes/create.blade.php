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
		<!--form action="{{url('cliente')}}" method="POST">
		<input type="hidden" name="_token" value="{{ csrf_token() }}"-->

		<form action="{{url('cliente')}}" method="POST">
		{{ csrf_field() }}
		<div class="form-group">

	<!--TIPO CLIENTE-->
		<div class="form-group">
			<label for="IDTIPO" class="col-lg-2 control-label">Id Tipo <font color="red">*</font></label>
			<div class="col-lg-10">
				<select name="IDTIPO" id="IDTIPO" class="form-control">
					<option value="">Seleccione el tipo de cliente</option>
					@foreach ($tipocliente as $tc)
						<option value="{{ $tc->IDTIPO }}">{{ $tc->DETALLE }}</option>
					@endforeach
				</select>
			</div>
		</div>
	<!--CEDULA-->
		<div class="form-group">
			<label for="CEDULA" class="col-lg-2 control-label">Cédula <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="CEDULA" id="CEDULA" class="form-control" type="text" pattern="[0-2][0-9]{9}" value="{{old('CEDULA')}}" required maxlength="10" minlength="10" placeholder="Ingrese su cédula">
			</div>
		</div>
		<!--NOMBRE-->
		<div class="form-group">
			<label for="NOMBRE" class="col-lg-2 control-label">Nombre <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="NOMBRE" id="NOMBRE" class="form-control" pattern="[A-ZÁÉÍÓÚ][a-zñáéíóú|A-ZÁÉÍÓÚ]{2,11}"
 type="text" value="{{old('NOMBRE')}}" required maxlength="25" placeholder="Ingrese su nombre">
			</div>
		</div>
	<!--APELLIDO-->
		<div class="form-group">
			<label for="APELLIDO" class="col-lg-2 control-label">Apellido <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="APELLIDO" id="APELLIDO" class="form-control" pattern="[A-ZÁÉÍÓÚ][a-zñáéíóú|A-ZÁÉÍÓÚ]{2,11}"
 type="text" value="{{old('APELLIDO')}}" required maxlength="25" placeholder="Ingrese su apellido">
			</div>
		</div>
	<!--NACIMIENTO-->
		<div class="form-group">
			<label for="NACIMIENTO" class="col-lg-2 control-label">Fecha de Nacimiento <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="NACIMIENTO" id="NACIMIENTO" class="form-control" type="date" value="{{old('NACIMIENTO')}}"  required min="1900-01-01" max="<?php echo date('Y-m-d'); ?>" value="1991-01-01">
			</div>
		</div>
		<div class="form-group">
			<label for="CIUDAD" class="col-lg-2 control-label">Ciudad <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="CIUDAD" id="CIUDAD" class="form-control" type="text" value="{{old('CIUDAD')}}" required placeholder="Ingrese su ciudad de residencia">
			</div>
		</div>

		<div class="form-group">
			<label for="DIRECCION" class="col-lg-2 control-label">Dirección <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="DIRECCION" id="DIRECCION" class="form-control" type="text" value="{{old('DIRECCION')}}" required placeholder="Ingrese su domicilio">
			</div>
		</div>

		<div class="form-group">
			<label for="TELEFONO" class="col-lg-2 control-label">Teléfono <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="TELEFONO" id="TELEFONO" class="form-control" type="tel" pattern="0[0-9]{9}" value="{{old('TELEFONO')}}" required maxlength="10" minlength="10" placeholder="Registre su número de teléfono">
			</div>
		</div>
		<div class="form-group">
			<label for="EMAIL" class="col-lg-2 control-label">e-mail <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="EMAIL" id="EMAIL" class="form-control" type="email" value="{{old('EMAIL')}}" required placeholder="Ingrese su correo electrónico">
			</div>
		</div>
		<div class="form-group">
      <label for="ESTADO" class="col-lg-2 control-label">Estado <font color="red">*</font></label>
      <div class="col-lg-10" class="col-xs-5 selectContainer">
        <select name="ESTADO" id="ESTADO" class="form-control" type="text" value="{{old('ESTADO')}}" required onchange="crear(this.value)">
        <option value="">Seleccione un Estado</option>
        <option value="A">Activo</option>
        <option value="I">Inactivo</option>
        </select>
      </div>
    </div>

		<div class="form-group">
			<div class="col-lg-offset-2 col-lg-2 col-md-2 col-sm-12 col-xs-12">
              <input class="form-control btn btn-primary" type="submit" value="Añadir" />
        	</div>
        	
		</div>
	</form>
	<br>
		<div class=" col-lg-offset-2 col-lg-2 col-md-2 col-sm-12 col-xs-12">
              <a href="{{url('cliente')}}" class="form-control btn btn-danger">Cancelar</a>
        </div>
</div>
@endsection
