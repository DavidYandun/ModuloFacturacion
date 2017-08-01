@extends('admin.template.main')

@section ('title')
   Productos
@endsection
@section('TituloBanner')
Productos
@endsection


@section('contenido')
<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h3>Nuevo producto</h3>
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
		<form action="{{url('producto')}}" method="POST">
		{{ csrf_field() }}
		<div class="form-group">
		<!--STOCK-->
			<label for="STOCK" class="col-lg-2 control-label">Stock <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="stock" id="stock" class="form-control" type="number" value="{{old('stock')}}" required>
			</div>
		</div>
		<!--NOMBREP-->
		<div class="form-group">
			<label for="nombrep" class="col-lg-2 control-label">Nombre <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="nombrep" id="nombrep" class="form-control" type="text" value="{{old('nombrep')}}" required>
			</div>
		</div>
		<!--DESCRIPCION-->
		<div class="form-group">
			<label for="descripcion" class="col-lg-2 control-label">Descripción <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="descripcion" id="descripcion" class="form-control" type="text" value="{{old('descripcion')}}" required>
			</div>
		</div>
		
		<!--VALOR-->
		<div class="form-group">
			<label for="valor" class="col-lg-2 control-label">Precio <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="valor" id="valor" class="form-control" type="decimal" value="{{old('valor')}}" required>
			</div>
		</div>
		<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <input class="btn btn-primary" type="submit" value="Añadir" />
        </div>
	</form>
</div>
@endsection