@extends('layouts.app')
@section('content')
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
				<input name="IDCLIENTE" id="IDCLIENTE" class="form-control" type="number" value="{{old('IDCLIENTE')}}" required>
				{!! Form::label('clientes', 'CLIENTES') !!}
				{!! Form::select('IDCLIENTE', $clientes) !!}
			</div>
		</div>
		<div class="form-group">
			<label for="IDCAJA" class="col-lg-2 control-label">Id Caja <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="IDCAJA" id="IDCAJA" class="form-control" type="number" value="{{old('IDCAJA')}}" required>
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
<<<<<<< HEAD
				<input name="FECHA" id="FECHA" class="form-control" type="date" value="{{old('FECHA')}}" required>
=======
				<input name="FECHA" id="FECHA" class="form-control" type="text" value="{{old('FECHA')}}" required>
>>>>>>> 3ed065e5894645cb6d61318aa697099c2cd95716
			</div>
		</div>

		<div class="form-group">
			<label for="SUBTOTAL" class="col-lg-2 control-label">Sub Total <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="SUBTOTAL" id="SUBTOTAL" class="form-control" type="text" value="{{old('SUBTOTAL')}}" >
			</div>
		</div>

		<div class="form-group">
			<label for="IVA" class="col-lg-2 control-label">Iva <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="IVA" id="IVA" class="form-control" type="text" value="{{old('IVA')}}" required>
			</div>
		</div>

		<div class="form-group">
			<label for="DESCUENTO" class="col-lg-2 control-label">Descuento <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="DESCUENTO" id="DESCUENTO" class="form-control" type="text" value="{{old('DESCUENTO')}}" required>
			</div>
		</div>
		<div class="form-group">
			<label for="TOTAL" class="col-lg-2 control-label">Total <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="TOTAL" id="TOTAL" class="form-control" type="text" value="{{old('TOTAL')}}" >
			</div>
		</div>
		

		<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <input class="btn btn-primary" type="submit" value="Añadir" />
        </div>
	</form>
</div>
@endsection
