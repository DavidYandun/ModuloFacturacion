@extends('admin.template.main')
@section ('title')
   Productos
@endsection

@section('contenido')
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
	<form method="POST" action="http://localhost:8000/producto/{{$producto->idproducto}}" accept-charset="UTF-8">
<input name="_method" type="hidden" value="PATCH">
		{{ csrf_field() }}
		<input type="hidden" name="idproducto" value="{{$producto->idproducto}}">
<!--CÓDIGO-->
		<div class="form-group">
			<label for="IDPRODUCTO" class="col-lg-2 control-label">Código <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="idproducto" id="IDPRODUCTO" class="form-control" type="number" value="{{$producto->idproducto}}" required disabled>
			</div>
		</div>
<!--STOCK-->
		<div class="form-group">
			<label for="STOCK" class="col-lg-2 control-label">Stock <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="stock" id="STOCK" class="form-control" type="number" step="0.01" value="{{$producto->stock}}" required>
			</div>
		</div>
<!--NOMBRE-->
		<div class="form-group">
			<label for="NOMBREP" class="col-lg-2 control-label">Nombre <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="nombrep" id="nombrep" class="form-control" type="text" value="{{$producto->nombrep}}" required>
			</div>
		</div>
<!--DESCRIPCION-->
		<div class="form-group">
			<label for="descripcion" class="col-lg-2 control-label">Cantidad <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="descripcion" id="descripcion" class="form-control" type="text" value="{{$producto->descripcion}}" required>
			</div>
		</div>

		<div class="form-group">
			<label for="VALOR" class="col-lg-2 control-label">Precio <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="valor" id="valor" class="form-control" type="text" value="{{$producto->valor}}" required>
			</div>
		</div>
		<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <input class="btn btn-primary" type="submit" value="Actualizar" />
        </div>
	</form>
</div>
@endsection