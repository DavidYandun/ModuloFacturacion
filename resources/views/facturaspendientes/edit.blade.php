@extends('admin.template.main')
@section ('title')
   Facturas Pendientes
@endsection

@section('contenido')
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

	<form method="POST" action="http://localhost:8000/facturaspendientes/{{$facturaspendiente->idpendiente}}" accept-charset="UTF-8">
<input name="_method" type="hidden" value="PATCH">
		{{ csrf_field() }}
		<input type="hidden" name="idpendiente" value="{{$facturaspendiente->idpendiente}}">
		<!--idcabecera-->
		<div class="form-group">
			<label for="idcabecera" class="col-lg-2 control-label">ID-Cabecera <font color="red">*</font></label>
			<div class="col-lg-10">
				<select name="idcabecera" id="idcabecera" class="form-control">
				@foreach ($cabecera as $cab)
				<option value="{{ $cab->idcabecera }}">{{ $cab->NUMERO }}</option>
				@endforeach
				</select>
			</div>
		</div>

		<!--ABONO-->
		<div class="form-group">
			<label for="abono" class="col-lg-2 control-label">Abono <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="abono" id="abono" class="form-control" type="text" value="{{$facturaspendiente->abono}}" required>
			</div>
		</div>
	
		<!--SALDO-->
		<div class="form-group">
			<label for="saldo" class="col-lg-2 control-label">saldo <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="saldo" id="saldo" class="form-control" type="text" value="{{$facturaspendiente->saldo}}" required>
			</div>
		</div>

		<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <input class="btn btn-primary" type="submit" value="Actualizar" />
        </div>
	</form>

</div>
@endsection