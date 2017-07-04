@extends('admin.template.main')
@section ('title')
   Detalle
@endsection


@section('contenido')
<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h3>Nuevo Detalle</h3>
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

		{!!Form::open(['url'=>'detalle'])!!}		
		<!--IDCABECERA-->
		<div class="form-group">
			<label for="idcabecera" class="col-lg-2 control-label">ID-Cabecera<font color="red">*</font></label>
			<div class="col-lg-10">
				<select name="IDCABECERA" id="detalle" class="form-control">
				<option value="">Seleccione una Factura</option>
				@foreach ($cabecera as $cab)
				<option value="{{ $cab->IDCABECERA }}">{{ $cab->NUMERO }}</option>
				@endforeach
				</select>
			</div>
		</div>
	
		<!--IDPRODUCTO-->
		<div class="form-group">
			<label for="idproducto" class="col-lg-2 control-label">ID-Producto<font color="red">*</font></label>
			<div class="col-lg-10">
				<select name="IDPRODUCTO" id="detalle" class="form-control">
				<option value="">Seleccione un Producto</option>
				@foreach ($producto as $p)
				<option value="{{ $p->IDPRODUCTO }}">{{ $p->IDPRODUCTO }}</option>
				@endforeach
				</select>
			</div>
		</div>
		<!--CANTIDAD-->
		<div class="form-group">
			<label for="cantidad" class="col-lg-2 control-label">Cantidad<font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="CANTIDAD" id="cantidad" class="form-control" type="text" value="{{old('CANTIDAD')}}" required>
			</div>
		</div>
		<!--VALOR_UNITARIO-->
		<div class="form-group">
			<label for="valor_unitario" class="col-lg-2 control-label">Valor Unitario<font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="VALOR_UNITARIO" id="valor_unitario" class="form-control" type="text" value="{{old('VALOR_UNITARIO')}}" required>
			</div>
		</div>
		
		<!--DESCUENTO-->
		<div class="form-group">
			<label for="descuento" class="col-lg-2 control-label">Descuento<font color="#76D7C4"> (opcional)</font></label>
			<div class="col-lg-10">
				<input name="DESCUENTO" id="descuento" class="form-control" type="text" value="{{old('DESCUENTO')}}" >
			</div>
		</div>
		<!--VALOR_TOTAL-->
		<div class="form-group">
			<label for="valor_total" class="col-lg-2 control-label">Valor Total<font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="VALOR_TOTAL" id="valor_total" class="form-control" type="text" value="{{old('VALOR_TOTAL')}}" required>
			</div>
		</div>
				
		<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <input class="btn btn-primary" type="submit" value="Añadir" />
        </div>
	{!!Form::close()!!}
</div>
@endsection