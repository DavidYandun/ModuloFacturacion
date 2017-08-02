@extends('admin.template.main')
@section ('title')
   Empleados
@endsection

@section('contenido')
<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h3>Editar empleado</h3>
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
		<form method="POST" action="http://localhost:8000/empleado/{{$empleado->idempleado}}" accept-charset="UTF-8">
		<input name="_method" type="hidden" value="PATCH">
		{{ csrf_field() }}
		<input type="hidden" name="idempleado" value="{{$empleado->idempleado}}">
			

	<div class="form-group col-lg-12">
			<label for="cedula" class="col-lg-2 control-label">Cédula <font color="red">*</font></label>
			<div class="col-lg-6">
				<input name="cedula" id="cedula" class="form-control" type="text" pattern="[0-2][0-9]{9}" value="{{$empleado->cedula}}" required maxlength="10" minlength="10" disabled>
			</div>
			<div class="col-lg-4">
				<label><font color="gray">Ej:1234567890</font></label>
			</div>
		</div>

		<div class="form-group col-lg-12">
			<label for="nombre" class="col-lg-2 control-label">Nombre <font color="red">*</font></label>
			<div class="col-lg-6">
				<input name="nombre" id="nombre" class="form-control"
				pattern="[A-ZÁÉÍÓÚ][a-zñáéíóú]{2,11}"
				 type="text" value="{{$empleado->nombre}}" required maxlength="25">
			</div>
			<div class="col-lg-4">
				<label><font color="gray">Ej: Juan/JUAN</font></label>
			</div>
		</div>

		<div class="form-group col-lg-12">
			<label for="apellido" class="col-lg-2 control-label">Apellido <font color="red">*</font></label>
			<div class="col-lg-6">
				<input name="apellido" id="apellido" class="form-control" pattern="[A-ZÁÉÍÓÚ][a-zñáéíóú]{2,11}" type="text" value="{{$empleado->apellido}}" required maxlength="25">
			</div>
			<div class="col-lg-4">
				<label><font color="gray">Ej: Perez/PEREZ</font></label>
			</div>
		</div>

		<div class="form-group col-lg-12">
			<label for="nacimiento" class="col-lg-2 control-label">Fecha de Nacimiento <font color="red">*</font></label>
			<div class="col-lg-6">
				<input name="nacimiento" id="nacimiento" class="form-control" type="date" value="{{$empleado->nacimiento}}" required min="1910-01-01" max="2017-12-31">
			</div>
			<div class="col-lg-4">
				<label><font color="gray">Ej: 1991-01-01</font></label>
			</div>
		</div>
		<div class="form-group col-lg-12">
			<label for="ciudad" class="col-lg-2 control-label">Ciudad <font color="red">*</font></label>
			<div class="col-lg-6">
				<input name="ciudad" id="ciudad" class="form-control" type="text" value="{{$empleado->ciudad}}">
			</div>
			<div class="col-lg-4">
				<label><font color="gray">Ej: Ibarra</font></label>
			</div>
		</div>

		<div class="form-group col-lg-12">
			<label for="DIRECCION" class="col-lg-2 control-label">Dirección <font color="red">*</font></label>
			<div class="col-lg-6">
				<input name="direccion" id="direccion" class="form-control" type="text" value="{{$empleado->direccion}}" >
			</div>
			<div class="col-lg-4">
				<label><font color="gray">Ej: Av. 17 de Julio</font></label>
			</div>
		</div>

		<div class="form-group col-lg-12">
			<label for="telefono" class="col-lg-2 control-label">Teléfono <font color="red">*</font></label>
			<div class="col-lg-6">
				<input name="telefono" id="telefono" class="form-control" type="text" pattern="09[0-9]{8}" value="{{$empleado->telefono}}" required maxlength="10" minlength="10">
			</div>
			<div class="col-lg-4">
				<label><font color="gray">Ej: 062987987</font></label>
			</div>
		</div>
	
	<div class="form-group col-lg-12">
      <label for="estado" class="col-lg-2 control-label">Estado<font color="red">*</font></label>
      <div class="col-lg-6">
        <select name="estado" id="estado" class="form-control" type="text" value="{{$empleado->estado}}" required required onchange="crear(this.value)">
        <option value="A">Activo</option>
        <option value="I">Inactivo</option>
        </select>
      </div>
      <div class="col-lg-4">
				<label><font color="gray">.</font></label>
			</div>
    </div>


		<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <input class="btn btn-primary" type="submit" value="Actualizar" />
        </div>
	</form>
</div>
@endsection


