@extends('admin.template.main')
@section ('title')
   Clientes
@endsection

@section('contenido')
<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h3>Editar Caja</h3>
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
		<form method="POST" action="http://localhost:8000/caja/{{$caja->idcaja}}" accept-charset="UTF-8">
		<input name="_method" type="hidden" value="PATCH">
		{{ csrf_field() }}
		<input type="hidden" name="idcaja" value="{{$caja->idcaja}}">
		
		<div class="form-group">
			<label for="idusuario" class="col-lg-2 control-label">Id Usuario <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="idusuario" id="idusuario" class="form-control" type="number" value="{{$caja->idusuario}}" required>
			</div>
		</div>

	<div class="form-group">
			<label for="numero" class="col-lg-2 control-label">Número <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="numero" id="numero" class="form-control" type="number" value="{{$caja->numero}}" required>
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
              <a href="{{url('caja')}}" class="form-control btn btn-danger">Cancelar</a>
        </div>
</div>
@endsection


