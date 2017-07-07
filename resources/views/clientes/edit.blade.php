@extends('admin.template.main')
@section ('title')
   Clientes
@endsection
@section('TituloBanner')
Clientes
@endsection

@section('contenido')
<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h3>Editar cliente</h3>
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
		<form method="POST" action="http://localhost:8000/cliente/{{$cliente->IDCLIENTE}}" accept-charset="UTF-8">
		<input name="_method" type="hidden" value="PATCH">
		{{ csrf_field() }}
		<input type="hidden" name="IDCLIENTE" value="{{$cliente->IDCLIENTE}}">
		
		<div class="form-group">
			<label for="IDTIPO" class="col-lg-2 control-label">Id Tipo <font color="red">*</font></label>
			<div class="col-lg-6">
				<select name="IDTIPO" id="IDTIPO" class="form-control">
				@foreach ($tipocliente as $tc)
					@if($tc->IDTIPO == $cliente->IDTIPO)
						<option selected='true' value="{{$tc->IDTIPO}}">{{ $tc->DETALLE }}</option>
					@endif
					@if ($tc->IDTIPO != $cliente->IDTIPO)
						<option value="{{ $tc->IDTIPO }}">{{ $tc->DETALLE }}</option>
					@endif	
				@endforeach
				</select>
			</div>
			<div class="col lg-4">
				<label><font color="gray">EF:efectivo/CR:crédito</font></label>
			</div>
		</div>
<!--CEDULA-->
	<div class="form-group">
			<label for="CEDULA" class="col-lg-2 control-label">Cédula <font color="red">*</font></label>
			<div class="col-lg-6">
				<input name="CEDULA" id="CEDULA" class="form-control" type="text" pattern="[0-2][0-9]{9}" value="{{$cliente->CEDULA}}" required maxlength="10" minlength="10" disabled>
			</div>
			<div class="col lg-4">
				<label><font color="gray">Ej: 1234567890</font></label>
			</div>
		</div>
<!--NOMBRE-->
		<div class="form-group">
			<label for="NOMBRE" class="col-lg-2 control-label">Nombre <font color="red">*</font></label>
			<div class="col-lg-6">
				<input name="NOMBRE" id="NOMBRE" class="form-control"
				pattern="[A-ZÁÉÍÓÚ][a-zñáéíóú|A-ZÁÉÍÓÚ]{1,11}|[A-ZÁÉÍÓÚ][a-zñáéíóú|A-ZÁÉÍÓÚ]{1,11} [A-ZÁÉÍÓÚ][a-zñáéíóú|A-ZÁÉÍÓÚ]{1,11}" type="text" value="{{$cliente->NOMBRE}}" required maxlength="25">
			</div>
			<div class="col lg-4">
				<label><font color="gray">Ej: Juan/JUAN</font></label>
			</div>
		</div>
<!--APELLIDO-->
		<div class="form-group">
			<label for="APELLIDO" class="col-lg-2 control-label">Apellido <font color="red">*</font></label>
			<div class="col-lg-6">
				<input name="APELLIDO" id="APELLIDO" class="form-control" pattern="[A-ZÁÉÍÓÚ][a-zñáéíóú|A-ZÁÉÍÓÚ]{1,11}|[A-ZÁÉÍÓÚ][a-zñáéíóú|A-ZÁÉÍÓÚ]{1,11} [A-ZÁÉÍÓÚ][a-zñáéíóú|A-ZÁÉÍÓÚ]{1,11}" type="text" value="{{$cliente->APELLIDO}}" required maxlength="25">
			</div>
			<div class="col lg-4">
				<label><font color="gray">Ej: Perez/PEREZ</font></label>
			</div>
		</div>
<!--NACIMIENTO-->
		<div class="form-group">
			<label for="NACIMIENTO" class="col-lg-2 control-label">Fecha de Nacimiento <font color="red">*</font></label>
			<div class="col-lg-6">
				<input name="NACIMIENTO" id="NACIMIENTO" class="form-control" type="date" value="{{$cliente->NACIMIENTO}}" required min="1900-01-01" max="<?php echo date('Y-m-d'); ?>">
			</div>
			<div class="col lg-4">
				<label><font color="gray">Ej: 1991-01-01</font></label>
			</div>
		</div>
<!--CIUDAD-->
		<div class="form-group">
			<label for="CIUDAD" class="col-lg-2 control-label">Ciudad <font color="red">*</font></label>
			<div class="col-lg-6">
				<input name="CIUDAD" id="CIUDAD" class="form-control" type="text" value="{{$cliente->CIUDAD}}">
			</div>
			<div class="col lg-4">
				<label><font color="gray">Ej: Ibarra/IBARRA</font></label>
			</div>
		</div>
<!--DIRECCION-->
		<div class="form-group">
			<label for="DIRECCION" class="col-lg-2 control-label">Dirección <font color="red">*</font></label>
			<div class="col-lg-6">
				<input name="DIRECCION" id="DIRECCION" class="form-control" type="text" value="{{$cliente->DIRECCION}}" >
			</div>
			<div class="col lg-4">
				<label><font color="gray">Ej: Av. 17 de Julio</font></label>
			</div>
		</div>
<!--TELEFONO-->
		<div class="form-group">
			<label for="TELEFONO" class="col-lg-2 control-label">Teléfono <font color="red">*</font></label>
			<div class="col-lg-6">
				<input name="TELEFONO" id="TELEFONO" class="form-control" type="tel" pattern="0[0-9]{9}" value="{{$cliente->TELEFONO}}" required maxlength="10" minlength="10">
			</div>
			<div class="col lg-4">
				<label><font color="gray">Ej: 062987987</font></label>
			</div>
		</div>
<!--CORREO-->
		<div class="form-group">
			<label for="EMAIL" class="col-lg-2 control-label">e-mail <font color="red">*</font></label>
			<div class="col-lg-6">
				<input name="EMAIL" id="EMAIL" class="form-control" type="email" value="{{$cliente->EMAIL}}" required>
			</div>
			<div class="col lg-4">
				<label><font color="gray">Ej: correo@electronico.com</font></label>
			</div>	
		</div>
<!--ESTADO-->
<div class="form-group">
      <label for="ESTADO" class="col-lg-2 control-label">Estado<font color="red">*</font></label>
      <div class="col-lg-6">
        <select name="ESTADO" id="ESTADO" class="form-control" type="text" value="{{$cliente->ESTADO}}" required required onchange="crear(this.value)">
        <option value="A">Activo</option>
        <option value="I">Inactivo</option>
        </select>
      </div>
      <div class="col lg-4">
				<label><font color="gray">.</font></label>
			</div>
    </div>

		<div class="form-group">
			<div class="col-lg-offset-2 col-lg-2 col-md-2 col-sm-12 col-xs-12">
              <input class="form-control btn btn-primary" type="submit" value="Actualizar" />
        	</div>
        	
		</div>
	</form>
	<br>
		<div class=" col-lg-offset-2 col-lg-2 col-md-2 col-sm-12 col-xs-12">
              <a href="{{url('cliente')}}" class="form-control btn btn-danger">Cancelar</a>
        </div>
</div>
@endsection


