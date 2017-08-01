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
		<form method="POST" action="http://localhost:8000/cliente/{{$cliente->idcliente}}" accept-charset="UTF-8">
		<input name="_method" type="hidden" value="PATCH">
		{{ csrf_field() }}
		<input type="hidden" name="idcliente" value="{{$cliente->idcliente}}">
		
		<div class="form-group">
			<label for="idtipo" class="col-lg-2 control-label">Id Tipo <font color="red">*</font></label>
			<div class="col-lg-6">
				<select name="idtipo" id="idtipo" class="form-control">
				@foreach ($tipocliente as $tc)
					@if($tc->idtipo == $cliente->idtipo)
						<option selected='true' value="{{$tc->idtipo}}">{{ $tc->detalle }}</option>
					@endif
					@if ($tc->idtipo != $cliente->idtipo)
						<option value="{{ $tc->idtipo }}">{{ $tc->detalle }}</option>
					@endif	
				@endforeach
				</select>
			</div>
			<div class="col lg-4">
				<label><font color="gray">EF:efectivo/CR:crédito</font></label>
			</div>
		</div>
<!--cedula-->
	<div class="form-group">
			<label for="cedula" class="col-lg-2 control-label">Cédula <font color="red">*</font></label>
			<div class="col-lg-6">
				<input name="cedula" id="cedula" class="form-control" type="text" pattern="[0-2][0-9]{9}" value="{{$cliente->cedula}}" required maxlength="10" minlength="10" disabled>
			</div>
			<div class="col lg-4">
				<label><font color="gray">Ej: 1234567890</font></label>
			</div>
		</div>
<!--NOMBRE-->
		<div class="form-group">
			<label for="nombre" class="col-lg-2 control-label">Nombre <font color="red">*</font></label>
			<div class="col-lg-6">
				<input name="nombre" id="nombre" class="form-control"
				pattern="[A-ZÁÉÍÓÚ][a-zñáéíóú|A-ZÁÉÍÓÚ]{1,11}|[A-ZÁÉÍÓÚ][a-zñáéíóú|A-ZÁÉÍÓÚ]{1,11} [A-ZÁÉÍÓÚ][a-zñáéíóú|A-ZÁÉÍÓÚ]{1,11}" type="text" value="{{$cliente->nombre}}" required maxlength="25">
			</div>
			<div class="col lg-4">
				<label><font color="gray">Ej: Juan/JUAN</font></label>
			</div>
		</div>
<!--apellido-->
		<div class="form-group">
			<label for="apellido" class="col-lg-2 control-label">apellido <font color="red">*</font></label>
			<div class="col-lg-6">
				<input name="apellido" id="apellido" class="form-control" pattern="[A-ZÁÉÍÓÚ][a-zñáéíóú|A-ZÁÉÍÓÚ]{1,11}|[A-ZÁÉÍÓÚ][a-zñáéíóú|A-ZÁÉÍÓÚ]{1,11} [A-ZÁÉÍÓÚ][a-zñáéíóú|A-ZÁÉÍÓÚ]{1,11}" type="text" value="{{$cliente->apellido}}" required maxlength="25">
			</div>
			<div class="col lg-4">
				<label><font color="gray">Ej: Perez/PEREZ</font></label>
			</div>
		</div>
<!--NACIMIENTO-->
		<div class="form-group">
			<label for="nacimiento" class="col-lg-2 control-label">Fecha de Nacimiento <font color="red">*</font></label>
			<div class="col-lg-6">
				<input name="nacimiento" id="nacimiento" class="form-control" type="date" value="{{$cliente->nacimiento}}" required min="1900-01-01" max="<?php echo date('Y-m-d'); ?>">
			</div>
			<div class="col lg-4">
				<label><font color="gray">Ej: 1991-01-01</font></label>
			</div>
		</div>
<!--CIUDAD-->
		<div class="form-group">
			<label for="ciudad" class="col-lg-2 control-label">Ciudad <font color="red">*</font></label>
			<div class="col-lg-6">
				<input name="ciudad" id="ciudad" class="form-control" type="text" value="{{$cliente->ciudad}}">
			</div>
			<div class="col lg-4">
				<label><font color="gray">Ej: Ibarra/IBARRA</font></label>
			</div>
		</div>
<!--DIRECCION-->
		<div class="form-group">
			<label for="direccion" class="col-lg-2 control-label">Dirección <font color="red">*</font></label>
			<div class="col-lg-6">
				<input name="direccion" id="direccion" class="form-control" type="text" value="{{$cliente->direccion}}" >
			</div>
			<div class="col lg-4">
				<label><font color="gray">Ej: Av. 17 de Julio</font></label>
			</div>
		</div>
<!--telefono-->
		<div class="form-group">
			<label for="telefono" class="col-lg-2 control-label">Teléfono <font color="red">*</font></label>
			<div class="col-lg-6">
				<input name="telefono" id="telefono" class="form-control" type="tel" pattern="0[0-9]{9}" value="{{$cliente->telefono}}" required maxlength="10" minlength="10">
			</div>
			<div class="col lg-4">
				<label><font color="gray">Ej: 062987987</font></label>
			</div>
		</div>
<!--CORREO-->
		<div class="form-group">
			<label for="email" class="col-lg-2 control-label">e-mail <font color="red">*</font></label>
			<div class="col-lg-6">
				<input name="email" id="email" class="form-control" type="email" value="{{$cliente->email}}" required>
			</div>
			<div class="col lg-4">
				<label><font color="gray">Ej: correo@electronico.com</font></label>
			</div>	
		</div>
<!--estado-->
<div class="form-group">
      <label for="estado" class="col-lg-2 control-label">Estado<font color="red">*</font></label>
      <div class="col-lg-6">
        <select name="estado" id="estado" class="form-control" type="text" value="{{$cliente->estado}}" required required onchange="crear(this.value)">
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


