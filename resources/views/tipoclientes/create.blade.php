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
			<h3>Nuevo Tipo cliente</h3>
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
		{!!Form::open(['url'=>'tipocliente'])!!}		
		<div class="form-group">
			<label for="detalle" class="col-lg-2 control-label">Id Tipo <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="DETALLE" id="detalle" class="form-control" type="text" value="{{old('DETALLE')}}" required>
			</div>
		</div>
				
		<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <input class="btn btn-primary" type="submit" value="Añadir" />
        </div>
	{!!Form::close()!!}
</div>
@endsection