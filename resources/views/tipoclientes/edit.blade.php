@extends('admin.template.main')

@section ('title')
   Clientes
@endsection
@section('TituloBanner')
Tipo Clientes
@endsection


@section('contenido')
<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h3>Editar Tipo Cliente</h3>
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
	<form method="POST" action="http://localhost:8000/tipocliente/{{$tipocliente->idtipo}}" accept-charset="UTF-8">
<input name="_method" type="hidden" value="PATCH">
		{{ csrf_field() }}
		<input type="hidden" name="IDTIPO" value="{{$tipocliente->IDTIPO}}">
		<div class="form-group">
			<label for="detalle" class="col-lg-2 control-label">Detalle <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="DETALLE" id="detalle" class="form-control" type="text" value="{{$tipocliente->detalle}}" required maxlength="2" minlength="2">
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
              <a href="{{url('tipocliente')}}" class="form-control btn btn-danger">Cancelar</a>
        </div>
</div>
@endsection