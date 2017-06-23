@extends('layouts.app')
@section('content')
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
		<form action="{{url('cliente')}}" method="POST">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">

		<div class="form-group">
			<label for="IDTIPO" class="col-lg-2 control-label">Id Tipo <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="IDTIPO" id="IDTIPO" class="form-control" type="number" value="{{old('IDTIPO')}}" required>
			</div>
		</div>
		<div class="form-group">
			<label for="CEDULA" class="col-lg-2 control-label">Cédula <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="CEDULA" id="CEDULA" class="form-control" type="number" value="{{old('CEDULA')}}" required>
			</div>
		</div>

		<div class="form-group">
			<label for="NOMBRE" class="col-lg-2 control-label">Nombre <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="NOMBRE" id="NOMBRE" class="form-control" type="text" value="{{old('NOMBRE')}}">
			</div>
		</div>

		<div class="form-group">
			<label for="APELLIDO" class="col-lg-2 control-label">Apellido <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="APELLIDO" id="APELLIDO" class="form-control" type="text" value="{{old('APELLIDO')}}" required>
			</div>
		</div>

		<div class="form-group">
			<label for="NACIMIENTO" class="col-lg-2 control-label">Fecha de Nacimiento <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="NACIMIENTO" id="NACIMIENTO" class="form-control" type="Fecha" value="{{old('NACIMIENTO')}}" required>
			</div>
		</div>
		<div class="form-group">
			<label for="CIUDAD" class="col-lg-2 control-label">Ciudad <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="CIUDAD" id="CIUDAD" class="form-control" type="text" value="{{old('CIUDAD')}}" >
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
				<input name="TELEFONO" id="TELEFONO" class="form-control" type="number" value="{{old('TELEFONO')}}" required>
			</div>
		</div>
		<div class="form-group">
			<label for="EMAIL" class="col-lg-2 control-label">e-mail <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="EMAIL" id="EMAIL" class="form-control" type="text" value="{{old('EMAIL')}}" >
			</div>
		</div>
		<div class="form-group">
			<label for="ESTADO" class="col-lg-2 control-label">ESTADO <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="ESTADO" id="ESTADO" class="form-control" type="text" value="{{old('ESTADO')}}" >
			</div>
		</div>

		<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <input class="btn btn-primary" type="submit" value="Añadir" />
        </div>
	</form>
</div>
@endsection
