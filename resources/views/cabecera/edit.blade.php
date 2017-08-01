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
		<form method="POST" action="http://localhost:8000/cabecera/{{$cabecera->idcabecera}}" accept-charset="UTF-8">
		<input name="_method" type="hidden" value="PATCH">
		{{ csrf_field() }}
		<input type="hidden" name="idcabecera" value="{{$cabecera->idcabecera}}">
		<!--NUMERO-->
		<div class="form-group">
			<label for="NUMERO" class="col-lg-2 control-label">Número <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="idcabecera" id="idcabecera" class="form-control" type="number" value="{{$cabecera->idcabecera}}" disabled>
			</div>
		<!--ID CLIENTE-->

		<div class="form-group">
			<label for="idcliente" class="col-lg-2 control-label">Cliente <font color="red">*</font></label>
			<div class="col-lg-10">
				
				<select name="idcliente" id="idcliente" class="form-control">
				@foreach ($cliente as $cli)
				@if($cli->idcliente == $cabecera->idcliente)
						<option selected='true' value="{{$cli->idcliente}}">{{ $cli->NOMBRE }} {{ $cli->APELLIDO }}</option>
					@endif
				@if($cli->idcliente != $cabecera->idcliente)
				<option value="{{ $cli->idcliente }}">{{ $cli->NOMBRE }} {{ $cli->APELLIDO }}</option>
				@endif
				@endforeach
				</select>

			</div>
		</div>
		<!--ID CAJA-->
		<div class="form-group">
			<label for="idcaja" class="col-lg-2 control-label">Id Caja <font color="red">*</font></label>
			<div class="col-lg-10">
				
				<select name="idcaja" id="idcaja" class="form-control">
				@foreach ($caja as $caj)
				@if ($caj->idcaja == $cabecera->idcaja)
				<option selected='true' value="{{ $caj->idcaja }}">{{ $caj->NUMERO }}</option>
				@endif
				@if ($caj->idcaja != $cabecera->idcaja)
				<option value="{{ $caj->idcaja }}">{{ $caj->NUMERO }}</option>
				@endif
				@endforeach
				</select>

			</div>
		</div>
		
		</div>
		<!--fecha-->
		<div class="form-group">
			<label for="fecha" class="col-lg-2 control-label">fecha <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="fecha" id="fecha" class="form-control" value="{{$cabecera->fecha}}" 	 value="{{$cabecera->fecha}}" required>
			</div>
		</div>
		<!--subtotal-->
		<div class="form-group">
			<label for="subtotal" class="col-lg-2 control-label">subtotal <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="subtotal" id="subtotal" class="form-control" type="decimal" value="{{$cabecera->subtotal}}" required>
			</div>
			<!--iva-->
		<div class="form-group">
			<label for="iva" class="col-lg-2 control-label">IVA <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="iva" id="iva" class="form-control" type="decimal" value="{{$cabecera->iva}}" required >
			</div>
		</div>
		<!--DESCUENTO-->
		<div class="form-group">
			<label for="DESCUENTO" class="col-lg-2 control-label">Descuento <font color="#76D7C4"> (opcional)</font></label>
			<div class="col-lg-10">
				<input name="DESCUENTO" id="DESCUENTO" class="form-control" type="decimal" value="{{$cabecera->DESCUENTO}}" >
			</div>
		</div>
			<!--Total-->
		<div class="form-group">
			<label for="total" class="col-lg-2 control-label">Total <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="total" id="total" class="form-control" type="decimal" value="{{$cabecera->total}}" required>
			</div>
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
              <a href="{{url('cabecera')}}" class="form-control btn btn-danger">Cancelar</a>
        </div>
</div>
@endsection