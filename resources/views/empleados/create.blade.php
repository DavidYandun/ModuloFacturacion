@extends('admin.template.main')
@section ('title')
   Empleados
@endsection

@section('contenido')
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

	
		<div class="form-group">
			<label for="CEDULA" class="col-lg-2 control-label">Cédula <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="CEDULA" id="CEDULA" class="form-control" type="text" pattern="[0-2][0-9]{9}" value="{{old('CEDULA')}}" required maxlength="10" minlength="10">
			</div>
		</div>

		<div class="form-group">
			<label for="NOMBRE" class="col-lg-2 control-label">Nombre <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="NOMBRE" id="NOMBRE" class="form-control" pattern="[A-ZÁÉÍÓÚ][a-zñáéíóú]{2,11}"
 type="text" value="{{old('NOMBRE')}}" required maxlength="25">
			</div>
		</div>

		<div class="form-group">
			<label for="APELLIDO" class="col-lg-2 control-label">Apellido <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="APELLIDO" id="APELLIDO" class="form-control" pattern="[A-ZÁÉÍÓÚ][a-zñáéíóú]{2,11}"
 type="text" value="{{old('APELLIDO')}}" required maxlength="25">
			</div>
		</div>

		<div class="form-group">
			<label for="NACIMIENTO" class="col-lg-2 control-label">Fecha de Nacimiento <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="NACIMIENTO" id="NACIMIENTO" class="form-control" type="date" value="{{old('NACIMIENTO')}}"  required min="1991-01-01" max="2017-12-31" value="1991-01-01">
			</div>
		</div>
		<div class="form-group">
			<label for="CIUDAD" class="col-lg-2 control-label">Ciudad <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="CIUDAD" id="CIUDAD" class="form-control" type="text" value="{{old('CIUDAD')}}" required>
			</div>
		</div>

		<div class="form-group">
			<label for="DIRECCION" class="col-lg-2 control-label">Dirección <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="DIRECCION" id="DIRECCION" class="form-control" type="text" value="{{old('DIRECCION')}}" required>
			</div>
		</div>

		<div class="form-group">
			<label for="TELEFONO" class="col-lg-2 control-label">Teléfono <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="TELEFONO" id="TELEFONO" class="form-control" type="text" pattern="09[0-9]{8}" value="{{old('TELEFONO')}}" required maxlength="10" minlength="10">
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

		<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <input class="btn btn-primary" type="submit" value="Añadir" />
        </div>
	</form>
</div>
@endsection
