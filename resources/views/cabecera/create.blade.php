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
	
		<form action="{{url('cabecera')}}" method="POST" class="">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">

		<div class="form-group">
			<label for="IDCABECERA" class="col-lg-2  col-md-12 col-sm-12 col-xs-12 control-label">Número <font color="red">*</font></label>

			<div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
				<input name="IDCABECERA" id="IDCABECERA" class="form-control"  value="{{old('IDCABECERA')}}" required type="number" placeholder="00001234">
			</div>
		</div>	

		<div class="form-group">
			<label for="IDCLIENTE" class="col-lg-2 col-md-12 col-sm-12 col-xs-12 control-label">Id Cliente <font color="red">*</font></label>
			<div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
				
				<select name="IDCLIENTE" id="IDCLIENTE" class="form-control">
				<option value="">selecciona un cliente</option>
				@foreach ($cliente as $cli)
				
				<option value="{{ $cli->IDCLIENTE }}">{{ $cli->NOMBRE }} {{ $cli->APELLIDO }}</option>
				@endforeach
				</select>

			</div>
		</div>

		<div class="form-group">
			<label for="IDCAJA" class="col-lg-2 col-md-12 col-sm-12 col-xs-12 control-label">Id Caja <font color="red">*</font></label>
			<div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
				
				<select name="IDCAJA" id="IDCAJA" class="form-control">
				<option value="">selecciona un caja</option>
				@foreach ($caja as $caj)
				<option value="{{ $caj->IDCAJA }}">{{ $caj->NUMERO }}</option>
				@endforeach
				</select>

			</div>
		</div>

		

		<div class="form-group">
			<label for="FECHA" class="col-lg-2 col-md-12 col-sm-12 col-xs-12 control-label">Fecha <font color="red">*</font></label>
			<div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
				<input name="FECHA" id="FECHA" class="form-control"  value="<?php echo date('Y-m-d'); ?>" value="{{old('FECHA')}}" required disabled="disabled">
				<!--disabled="disabled"-->
			</div>
		</div>

		<div class="form-group">
			<label for="SUBTOTAL" class="col-lg-2  col-md-12 col-sm-12 col-xs-12 control-label">Sub Total <font color="red">*</font></label>
			<div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
				<input name="SUBTOTAL" id="SUBTOTAL" class="form-control" type="number" value="{{old('SUBTOTAL')}}" required placeholder="0.00">
			</div>
		</div>

		<div class="form-group">
			<label for="IVA" class="col-lg-2 col-md-12 col-sm-12 col-xs-12 control-label">Iva <font color="red">*</font></label>
			<div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
				<input name="IVA" id="IVA" class="form-control" type="text" value="{{old('IVA')}}" required type="number" placeholder="0.00">
			</div>
		</div>

		<div class="form-group">
			<label for="DESCUENTO" class="col-lg-2 col-md-12 col-sm-12 col-xs-12  control-label">Descuento <font color="#76D7C4"> (opcional)</font></label>
			<div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
				<input name="DESCUENTO" id="DESCUENTO" class="form-control" type="number" placeholder="0.00" value="{{old('DESCUENTO')}}">
			</div>
		</div>
		<div class="form-group">
			<label for="TOTAL" class="col-lg-2 col-md-12 col-sm-12 col-xs-12 control-label">Total <font color="red">*</font></label>
			<div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
				<input name="TOTAL" id="TOTAL" class="form-control" type="number" placeholder="0.00" value="{{old('TOTAL')}}" required>
			</div>
		</div>
		<br>
		<div class="form-group">
			<div class="col-lg-offset-2 col-lg-2 col-md-2 col-sm-12 col-xs-12">
              <input class="form-control btn btn-primary" type="submit" value="Añadir" />
        	</div>
        	
		</div>
		
	</form>
	<br>
		<div class=" col-lg-offset-2 col-lg-2 col-md-2 col-sm-12 col-xs-12">
              <a href="{{url('cabecera')}}" class="form-control btn btn-danger">Cancelar</a>
        </div>
</div>
@endsection
