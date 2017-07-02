@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h3>Editar Factura Pendiente</h3>
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

	<form method="POST" action="http://localhost:8000/facturaspendientes/{{$facturaspendiente->IDPENDIENTE}}" accept-charset="UTF-8">
<input name="_method" type="hidden" value="PATCH">
		{{ csrf_field() }}
		<input type="hidden" name="IDPENDIENTE" value="{{$facturaspendiente->IDPENDIENTE}}">
		<!--IDCABECERA-->
		<div class="form-group">
			<label for="idcabecera" class="col-lg-2 control-label">ID-Cabecera <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="IDCABECERA" id="idcabecera" class="form-control" type="text" value="{{$facturaspendiente->IDCABECERA}}" required>
			</div>
		</div>

		<!--ABONO-->
		<div class="form-group">
			<label for="abono" class="col-lg-2 control-label">abono <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="ABONO" id="abono" class="form-control" type="text" value="{{$facturaspendiente->ABONO}}" required>
			</div>
		</div>
	
		<!--SALDO-->
		<div class="form-group">
			<label for="saldo" class="col-lg-2 control-label">saldo <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="SALDO" id="saldo" class="form-control" type="text" value="{{$facturaspendiente->SALDO}}" required>
			</div>
		</div>

		<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <input class="btn btn-primary" type="submit" value="Actualizar" />
        </div>
	</form>

</div>
@endsection