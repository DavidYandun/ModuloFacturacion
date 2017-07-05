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
			<div class="col-lg-10">
			

				<select name="IDTIPO" id="IDTIPO" class="form-control">
				@foreach ($tipocliente as $tc)
					@if($tc->IDTIPO == $cliente->IDTIPO)
						<option selected='true' value="$tc->IDTIPO">{{ $tc->DETALLE }}</option>
					@endif
					@if ($tc->IDTIPO != $cliente->IDTIPO)
						<option value="{{ $tc->IDTIPO }}">{{ $tc->DETALLE }}</option>
					@endif	
				@endforeach
				</select>
			</div>
		</div>

	<div class="form-group">
			<label for="CEDULA" class="col-lg-2 control-label">Cédula <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="CEDULA" id="CEDULA" class="form-control" type="text" pattern="[0-2][0-9]{9}" value="{{$cliente->CEDULA}}" required maxlength="10" minlength="10">
			</div>
		</div>

		<div class="form-group">
			<label for="NOMBRE" class="col-lg-2 control-label">Nombre <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="NOMBRE" id="NOMBRE" class="form-control"
				pattern="[A-ZÁÉÍÓÚ][a-zñáéíóú]{2,11}"

				 type="text" value="{{$cliente->NOMBRE}}" required maxlength="25">
			</div>
		</div>

		<div class="form-group">
			<label for="APELLIDO" class="col-lg-2 control-label">Apellido <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="APELLIDO" id="APELLIDO" class="form-control" pattern="[A-ZÁÉÍÓÚ][a-zñáéíóú]{2,11}" type="text" value="{{$cliente->APELLIDO}}" required maxlength="25">
			</div>
		</div>

		<div class="form-group">
			<label for="NACIMIENTO" class="col-lg-2 control-label">Fecha de Nacimiento <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="NACIMIENTO" id="NACIMIENTO" class="form-control" type="date" value="{{$cliente->NACIMIENTO}}" required min="1985-01-01" max="2017-12-31">
			</div>
		</div>
		<div class="form-group">
			<label for="CIUDAD" class="col-lg-2 control-label">Ciudad <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="CIUDAD" id="CIUDAD" class="form-control" type="text" value="{{$cliente->CIUDAD}}">
			</div>
		</div>

		<div class="form-group">
			<label for="DIRECCION" class="col-lg-2 control-label">Dirección <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="DIRECCION" id="DIRECCION" class="form-control" type="text" value="{{$cliente->DIRECCION}}" >
			</div>
		</div>

		<div class="form-group">
			<label for="TELEFONO" class="col-lg-2 control-label">Teléfono <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="TELEFONO" id="TELEFONO" class="form-control" type="text" pattern="09[0-9]{8}" value="{{$cliente->TELEFONO}}" required maxlength="10" minlength="10">
			</div>
		</div>
		<div class="form-group">
			<label for="EMAIL" class="col-lg-2 control-label">e-mail <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="EMAIL" id="EMAIL" class="form-control" type="text" value="{{$cliente->EMAIL}}" required>
			</div>
		</div>
<div class="form-group">
      <label for="ESTADO" class="col-lg-2 control-label">Estado<font color="red">*</font></label>
      <div class="col-lg-10">
        <select name="ESTADO" id="ESTADO" class="form-control" type="text" value="{{$cliente->ESTADO}}" required required onchange="crear(this.value)">
        <option value="A">Activo</option>
        <option value="I">Inactivo</option>
        </select>
      </div>
    </div>

		<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <input class="btn btn-primary" type="submit" value="Actualizar" />
        </div>
	</form>
</div>
@endsection


