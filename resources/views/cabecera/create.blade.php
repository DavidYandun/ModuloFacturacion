@extends('admin.template.main')
@section ('title')
   Cabecera
@endsection


@section('contenido')
<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h3>Nuevo cabecera</h3>
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
		<form action="{{url('cabecera')}}" method="POST">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">



		<div class="form-group">
			<label for="IDCLIENTE" class="col-lg-2 control-label">Id Cliente <font color="red">*</font></label>
			<div class="col-lg-10">
				
				<select name="IDCLIENTE" id="IDCLIENTE" class="form-control">
				<option value="">selecciona un cliente</option>
				@foreach ($cliente as $cli)
				
				<option value="{{ $cli->IDCLIENTE }}">{{ $cli->NOMBRE }} {{ $cli->APELLIDO }}</option>
				@endforeach
				</select>

			</div>
		</div>

		<div class="form-group">
			<label for="IDCAJA" class="col-lg-2 control-label">Id Caja <font color="red">*</font></label>
			<div class="col-lg-10">
				
				<select name="IDCAJA" id="IDCAJA" class="form-control">
				<option value="">selecciona un caja</option>
				@foreach ($caja as $caj)
				<option value="{{ $caj->IDCAJA }}">{{ $caj->NUMERO }}</option>
				@endforeach
				</select>

			</div>
		</div>

		<div class="form-group">
			<label for="NUMERO" class="col-lg-2 control-label">Número <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="NUMERO" id="NUMERO" class="form-control" type="number" value="{{old('NUMERO')}}" required>
			</div>
		</div>	

		<div class="form-group">
			<label for="FECHA" class="col-lg-2 control-label">Fecha <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="FECHA" id="FECHA" class="form-control" value="<?php echo date('Y-m-d H:i:s'); ?>" value="{{old('FECHA')}}" required>
				<!--disabled="disabled"-->
			</div>
		</div>

		<div class="form-group">
			<label for="SUBTOTAL" class="col-lg-2 control-label">Sub Total <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="SUBTOTAL" id="SUBTOTAL" class="form-control" type="text" value="{{old('SUBTOTAL')}}" required>
			</div>
		</div>

		<div class="form-group">
			<label for="IVA" class="col-lg-2 control-label">Iva <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="IVA" id="IVA" class="form-control" type="text" value="{{old('IVA')}}" required>
			</div>
		</div>

		<div class="form-group">
			<label for="DESCUENTO" class="col-lg-2 control-label">Descuento <font color="#76D7C4"> (opcional)</font></label>
			<div class="col-lg-10">
				<input name="DESCUENTO" id="DESCUENTO" class="form-control" type="text" value="{{old('DESCUENTO')}}">
			</div>
		</div>
		<div class="form-group">
			<label for="TOTAL" class="col-lg-2 control-label">Total <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="TOTAL" id="TOTAL" class="form-control" type="text" value="{{old('TOTAL')}}" required>
			</div>
		</div>
		

		<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <input class="btn btn-primary" type="submit" value="Añadir" />
        </div>
	</form>
</div>
@endsection
