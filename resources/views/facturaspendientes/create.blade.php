@extends('layouts.app')
@section('content')
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
		<!--IDCABECERA-->
		<div class="form-group">
			<label for="idcabecera" class="col-lg-2 control-label">ID-Cabecera<font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="IDCABECERA" id="detalle" class="form-control" type="text" value="{{old('IDCABECERA')}}" required>
			</div>
		</div>
		
		<!--ABONO-->
		<div class="form-group">
			<label for="abono" class="col-lg-2 control-label">Abono<font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="ABONO" id="abono" class="form-control" type="text" value="{{old('ABONO')}}" required>
			</div>
		</div>
		<!--SALDO-->
		<div class="form-group">
			<label for="saldo" class="col-lg-2 control-label">Saldo<font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="SALDO" id="saldo" class="form-control" type="text" value="{{old('SALDO')}}" required>
			</div>
		</div>
		
		<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <input class="btn btn-primary" type="submit" value="Añadir" />
        </div>
	{!!Form::close()!!}
</div>
@endsection