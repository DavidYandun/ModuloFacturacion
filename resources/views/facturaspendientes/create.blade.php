@extends('admin.template.main')
@section ('title')
   Facturas Pendientes
@endsection

@section('contenido')
<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h3>Nueva Factura Pendiente</h3>
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
		{!!Form::open(['url'=>'facturaspendientes'])!!}		
		<!--idcabecera-->
		<div class="form-group">
			<label for="idcabecera" class="col-lg-2 control-label">ID-Cabecera<font color="red">*</font></label>
			<div class="col-lg-10">
				<select name="idcabecera" id="idcabecera" class="form-control">
				@foreach ($cabecera as $cab)
				<option value="{{ $cab->idcabecera }}">{{ $cab->idcabecera }}</option>
				@endforeach
				</select>
			</div>
		</div>
		
		<!--ABONO-->
		<div class="form-group">
			<label for="abono" class="col-lg-2 control-label">Abono<font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="abono" id="abono" class="form-control" type="text" value="{{old('abono')}}" required>
			</div>
		</div>
		<!--saldo-->
		<div class="form-group">
			<label for="saldo" class="col-lg-2 control-label">Saldo<font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="saldo" id="saldo" class="form-control" type="text" value="{{old('saldo')}}" required>
			</div>
		</div>
		
		<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <input class="btn btn-primary" type="submit" value="Añadir" />
        </div>
	{!!Form::close()!!}
</div>
@endsection