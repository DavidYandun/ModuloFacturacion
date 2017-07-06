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
			<label for="idcabecera" class="col-lg-2 control-label">Cabecera <font color="red">*</font></label>
			<div class="col-lg-10">
				<select name="IDCABECERA" id="detalle" class="form-control">
				@foreach ($cabecera as $cab)
					@if($cab->IDCABECERA == $detalle->IDCABECERA)
					<option selected='true' value="{{ $cab->IDCABECERA }}">{{ $cab->NUMERO }}</option>
					@endif
					@if($cab->IDCABECERA != $detalle->IDCABECERA)
					<option value="{{ $cab->IDCABECERA }}">{{ $cab->NUMERO }}</option>
					@endif
				@endforeach
				</select>
			</div>
		</div>
		<!--IDPRODUCTO-->
		<div class="form-group">
			<label for="idproducto" class="col-lg-2 control-label">ID-Producto <font color="red">*</font></label>
			<div class="col-lg-10">
				<select name="IDPRODUCTO" id="detalle" class="form-control">
				@foreach ($producto as $pro)
					@if($pro->IDPRODUCTO==$detalle->IDPRODUCTO)
						<option selected= 'true' value="{{ $pro->IDPRODUCTO }}">{{ $pro->IDPRODUCTO }}</option> 
					@endif
					@if($pro->IDPRODUCTO!=$detalle->IDPRODUCTO)
						<option value="{{ $pro->IDPRODUCTO }}">{{ $pro->IDPRODUCTO }}</option>
					@endif
					
				@endforeach
				</select>
			</div>
		</div>
		<!--CANTIDAD-->
		<div class="form-group">
			<label for="cantidad" class="col-lg-2 control-label">Cantidad <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="CANTIDAD" id="cantidad" class="form-control" type="number" value="{{$detalle->CANTIDAD}}" required>
			</div>
		</div>
		<!--VALOR_UNITARIO-->
		<div class="form-group">
			<label for="valor_unitario" class="col-lg-2 control-label">Valor Unitario <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="VALOR_UNITARIO" id="valor_unitario" class="form-control" type="number" value="{{$detalle->VALOR_UNITARIO}}" required>
			</div>
		</div>
		<!--VALOR_TOTAL-->
		<div class="form-group">
			<label for="valor_total" class="col-lg-2 control-label">Valor Total <font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="VALOR_TOTAL" id="valor_total" class="form-control" type="number" value="{{$detalle->VALOR_TOTAL}}" required>
			</div>
		</div>
		<!--DESCUENTO-->
		<div class="form-group">
			<label for="descuento" class="col-lg-2 control-label">Descuento <font color="#76D7C4"> (opcional)</font></label>
			<div class="col-lg-10">
				<input name="DESCUENTO" id="descuento" class="form-control" type="number" value="{{$detalle->DESCUENTO}}">
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
              <a href="{{url('detalle')}}" class="form-control btn btn-danger">Cancelar</a>
        </div>

</div>
@endsection