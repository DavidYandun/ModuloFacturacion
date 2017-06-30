@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h3>Editar producto</h3>
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
	<form method="POST" action="http://localhost:8000/producto/{{$producto->idProducto}}" accept-charset="UTF-8">
<input name="_method" type="hidden" value="PATCH">
		{{ csrf_field() }}
		<input type="hidden" name="idProducto" value="{{$producto->idProducto}}">
		<div class="form-group">
			<label for="nombre" class="col-lg-2 control-label">Nombre <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="nombre" id="nombre" class="form-control" type="text" value="{{$producto->nombre}}" required>
			</div>
		</div>
		<div class="form-group">
			<label for="precio" class="col-lg-2 control-label">Precio <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="precio" id="precio" class="form-control" type="number" step="0.01" value="{{$producto->precio}}" required>
			</div>
		</div>
		<div class="form-group">
			<label for="codigo" class="col-lg-2 control-label">Código <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="codigo" id="codigo" class="form-control" type="text" value="{{$producto->codigo}}" required>
			</div>
		</div>
		<div class="form-group">
			<label for="cantidad" class="col-lg-2 control-label">Cantidad <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="cantidad" id="cantidad" class="form-control" type="number" value="{{$producto->cantidad}}" required>
			</div>
		</div>
				<div class="form-group">
			<label for="minStock" class="col-lg-2 control-label">minStock <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="minStock" id="minStock" class="form-control" type="number" value="{{$producto->minStock}}" required>
			</div>
		</div>
		<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <input class="btn btn-primary" type="submit" value="Actualizar" />
        </div>
	</form>
</div>
@endsection