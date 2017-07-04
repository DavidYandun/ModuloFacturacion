@extends('admin.template.main')
@section ('title')
   Detalle
@endsection

@section('contenido')
<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h3>Editar Detalle</h3>
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

	<form method="POST" action="http://localhost:8000/detalle/{{$detalle->IDDETALLE}}" accept-charset="UTF-8">
<input name="_method" type="hidden" value="PATCH">
		{{ csrf_field() }}
		<input type="hidden" name="IDDETALLE" value="{{$detalle->IDDETALLE}}">
		<!--IDCABECERA-->
		<div class="form-group">
			<label for="idcabecera" class="col-lg-2 control-label">ID-Cabecera <font color="red">*</font></label>
			<div class="col-lg-10">
				<select name="IDCABECERA" id="detalle" class="form-control">
				@foreach ($cabecera as $cab)
				<option value="{{ $cab->IDCABECERA }}">{{ $cab->NUMERO }}</option>
				@endforeach
				</select>
			</div>
		</div>
		<!--IDPRODUCTO-->
		<div class="form-group">
			<label for="idproducto" class="col-lg-2 control-label">ID-producto <font color="red">*</font></label>
			<div class="col-lg-10">
				<select name="IDCAIDPRODUCTO" id="detalle" class="form-control">
				@foreach ($producto as $pro)
				<option value="{{ $pro->IDCAIDPRODUCTO }}">{{ $pro->IDPRODUCTO }}</option>
				@endforeach
				</select>
			</div>
		</div>
		<!--CANTIDAD-->
		<div class="form-group">
			<label for="cantidad" class="col-lg-2 control-label">cantidad <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="CANTIDAD" id="cantidad" class="form-control" type="text" value="{{$detalle->CANTIDAD}}" required>
			</div>
		</div>
		<!--VALOR_UNITARIO-->
		<div class="form-group">
			<label for="valor_unitario" class="col-lg-2 control-label">Valor Unitario <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="VALOR_UNITARIO" id="valor_unitario" class="form-control" type="text" value="{{$detalle->VALOR_UNITARIO}}" required>
			</div>
		</div>
		<!--VALOR_TOTAL-->
		<div class="form-group">
			<label for="valor_total" class="col-lg-2 control-label">Valor Total <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="VALOR_TOTAL" id="valor_total" class="form-control" type="text" value="{{$detalle->VALOR_TOTAL}}" required>
			</div>
		</div>
		<!--DESCUENTO-->
		<div class="form-group">
			<label for="descuento" class="col-lg-2 control-label">descuento <font color="#76D7C4"> (opcional)</font></label>
			<div class="col-lg-10">
				<input name="DESCUENTO" id="descuento" class="form-control" type="text" value="{{$detalle->DESCUENTO}}">
			</div>
		</div>

		<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <input class="btn btn-primary" type="submit" value="Actualizar" />
        </div>
	</form>

</div>
@endsection