@extends('admin.template.main')
@section ('title')
   Clientes
@endsection

@section('contenido')
<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h3>Nueva Caja</h3>
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
		<form action="{{url('caja')}}" method="POST">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">

		<div class="form-group">
			<label for="idusuario" class="col-lg-2 control-label">ID Usuario <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="idusuario" id="idusuario" class="form-control" type="number" value="{{old('idusuario')}}" required>
			</div>
		</div>
		<div class="form-group">
			<label for="numero" class="col-lg-2 control-label">Número <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="numero" id="numero" class="form-control" type="number" value="{{old('numero')}}" required placeholder="ejemplo: 8">
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
              <a href="{{url('caja')}}" class="form-control btn btn-danger">Cancelar</a>
        </div>
</div>
@endsection
