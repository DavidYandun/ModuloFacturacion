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
				<input type="hidden" name="idcabecera" id="idcab">
				<select  id="idcabecera" class="form-control" onchange="Saldo();">
				@foreach ($cabecera as $cab)
				<option value="{{ $cab->idcabecera }}_{{$cab->total}}">{{ $cab->idcabecera }} </option>
				@endforeach
				</select>
				
				<div id='resultado'>
					
				</div>
			</div>
		</div>
		
		<!--ABONO-->
		<div class="form-group">
			<label for="abono" class="col-lg-2 control-label">Abono<font color="red">*</font></label>
			<div class="col-lg-10">
				<input name="abono" id="abono" class="form-control" type="text" value="0" required onkeyup="Saldo();">
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

<script type="text/javascript">
	function Saldo(){
		//alert('hola');
		var cabecera=document.getElementById("idcabecera").value.split('_');
		document.getElementById("idcab").value=cabecera['0'];
		
		var total = parseFloat(cabecera['1']);
		var abono = parseFloat(document.getElementById("abono").value);
		document.getElementById("saldo").value=total-abono;

		 //document.getElementById("resultado").innerHTML=" \
		 //<span>"+cabecera[0]+"</span>";
	}
	

</script>