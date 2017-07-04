@extends('admin.template.main')
@section ('title')
   Cabecera
@endsection
@section('TituloBanner')
Cabecera
@endsection

@section('contenido')
<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h3>Editar cabecera</h3>
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
		<form method="POST" action="http://localhost:8000/cabecera/{{$cabecera->IDCABECERA}}" accept-charset="UTF-8">
		<input name="_method" type="hidden" value="PATCH">
		{{ csrf_field() }}
		<input type="hidden" name="IDCABECERA" value="{{$cabecera->IDCABECERA}}">
		<!--ID CLIENTE-->

		<div class="form-group">
			<label for="IDCLIENTE" class="col-lg-2 control-label">Id Cliente <font color="red">*</font></label>
			<div class="col-lg-10">
				
				<select name="IDCLIENTE" id="IDCLIENTE" class="form-control">
				@foreach ($cliente as $cli)
				<option value="{{ $cli->IDCLIENTE }}">{{ $cli->NOMBRE }} {{ $cli->APELLIDO }}</option>
				@endforeach
				</select>

			</div>
		</div>
		<!--ID CAJA-->
		<div class="form-group">
			<label for="IDCAJA" class="col-lg-2 control-label">Id Caja <font color="red">*</font></label>
			<div class="col-lg-10">
				
				<select name="IDCAJA" id="IDCAJA" class="form-control">
				@foreach ($caja as $caj)
				<option value="{{ $caj->IDCAJA }}">{{ $caj->NUMERO }}</option>
				@endforeach
				</select>

			</div>
		</div>
		<!--NUMERO-->
		<div class="form-group">
			<label for="NUMERO" class="col-lg-2 control-label">Número <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="NUMERO" id="NUMERO" class="form-control" type="number" value="{{$cabecera->NUMERO}}" required >
			</div>
		</div>
		<!--FECHA-->
		<div class="form-group">
			<label for="FECHA" class="col-lg-2 control-label">Fecha <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="FECHA" id="FECHA" class="form-control" value="<?php echo date('Y-m-d H:i:s'); ?>" 	 value="{{$cabecera->FECHA}}" required>
			</div>
		</div>
		<!--SUBTOTAL-->
		<div class="form-group">
			<label for="SUBTOTAL" class="col-lg-2 control-label">Subtotal <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="SUBTOTAL" id="SUBTOTAL" class="form-control" type="number" value="{{$cabecera->SUBTOTAL}}" required>
			</div>
			<!--IVA-->
		<div class="form-group">
			<label for="IVA" class="col-lg-2 control-label">IVA <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="IVA" id="IVA" class="form-control" type="number" value="{{$cabecera->IVA}}" required >
			</div>
		</div>
		<!--DESCUENTO-->
		<div class="form-group">
			<label for="DESCUENTO" class="col-lg-2 control-label">Descuento <font color="#76D7C4"> (opcional)</font></label>
			<div class="col-lg-10">
				<input name="DESCUENTO" id="DESCUENTO" class="form-control" type="number" value="{{$cabecera->DESCUENTO}}" >
			</div>
		</div>
			<!--Total-->
		<div class="form-group">
			<label for="TOTAL" class="col-lg-2 control-label">Total <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="TOTAL" id="TOTAL" class="form-control" type="number" value="{{$cabecera->TOTAL}}" required>
			</div>
		</div>


		</div>



		<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <input class="btn btn-primary" type="submit" value="Actualizar" />
        </div>
	</form>
</div>
@endsection