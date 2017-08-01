@extends('admin.template.main')
@section ('title')
   Clientes
@endsection


@section('contenido')
<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h3>Nuevo cliente</h3>
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
		<!--form action="{{url('cliente')}}" method="POST">
		<input type="hidden" name="_token" value="{{ csrf_token() }}"-->

		<form action="{{url('cliente')}}" method="POST" id="formulario">
		{{ csrf_field() }}
		<div class="form-group">

	<!--TIPO CLIENTE-->
		<div class="form-group">
			<label for="IDTIPO" class="col-lg-2 control-label">Id Tipo <font color="red">*</font></label>
			<div class="col-lg-6">
				<select name="IDTIPO" id="IDTIPO" class="form-control">
					<option value="">Seleccione el tipo de cliente</option>
					@foreach ($tipocliente as $tc)
						@if($tc->DETALLE=='EF')
							<option value="{{ $tc->IDTIPO }}">EFECTIVO</option>
						@endif
						@if($tc->DETALLE=='CR')
							<option value="{{ $tc->IDTIPO }}">CREDITO</option>
						@endif
					@endforeach
				</select>
			</div>
			<div class="col lg-4">
				<label><font color="gray">EFECTIVO/CREDITO</font></label>
			</div>
		</div>
	<!--CEDULA-->
             
		<div class="form-group">
			<label for="CEDULA" class="col-lg-2 control-label">Cédula <font color="red">*</font></label>
			<div class="col-lg-6">
			<input name="CEDULA" id="CEDULA" class="form-control" type="text" pattern="[0-2][0-9]{9}" value="{{old('CEDULA')}}" required maxlength="10" minlength="10" onkeypress="return esDigito()" placeholder="Ingrese su cédula" onchange="ValidarCedula(this.form.CEDULA.value, this.form.boton)" >
			</div>
			<div class="col lg-4">
				<label><font color="gray">Ej:1234567890</font></label>
			</div>
		</div>
		<!--NOMBRE-->
		<div class="form-group">
			<label for="NOMBRE" class="col-lg-2 control-label">Nombre <font color="red">*</font></label>
			<div class="col-lg-6">
				<input name="NOMBRE" id="NOMBRE" class="form-control" 
				pattern="[A-ZÁÉÍÓÚ][a-zñáéíóú|A-ZÁÉÍÓÚ]{1,11}|[A-ZÁÉÍÓÚ][a-zñáéíóú|A-ZÁÉÍÓÚ]{1,11} [A-ZÁÉÍÓÚ][a-zñáéíóú|A-ZÁÉÍÓÚ]{1,11}"
 type="text" value="{{old('NOMBRE')}}" required maxlength="25" placeholder="Ingrese su nombre">
			</div>
			<div class="col lg-4">
				<label><font color="gray">Ej: Juan/JUAN</font></label>
			</div>

		</div>
	<!--APELLIDO-->
		<div class="form-group">
			<label for="APELLIDO" class="col-lg-2 control-label">Apellido <font color="red">*</font></label>
			<div class="col-lg-6">
				<input name="APELLIDO" id="APELLIDO" class="form-control" pattern="[A-ZÁÉÍÓÚ][a-zñáéíóú|A-ZÁÉÍÓÚ]{1,11}|[A-ZÁÉÍÓÚ][a-zñáéíóú|A-ZÁÉÍÓÚ]{1,11} [A-ZÁÉÍÓÚ][a-zñáéíóú|A-ZÁÉÍÓÚ]{1,11}"
 type="text" value="{{old('APELLIDO')}}" required maxlength="25" placeholder="Ingrese su apellido">
			</div>
			<div class="col lg-4">
				<label><font color="gray">Ej: Perez/PEREZ</font></label>
			</div>
		</div>
	<!--NACIMIENTO-->
		<div class="form-group">
			<label for="NACIMIENTO" class="col-lg-2 control-label">Fecha de Nacimiento <font color="red">*</font></label>
			<div class="col-lg-6">
				<input name="NACIMIENTO" id="NACIMIENTO" class="form-control" type="date" value="{{old('NACIMIENTO')}}"  required min="1900-01-01" max="<?php echo date('Y-m-d'); ?>">
			</div>
			<div class="col lg-4">
				<label><font color="gray">Ej: 1991-01-01</font></label>
			</div>
		</div>
		<div class="form-group">
			<label for="CIUDAD" class="col-lg-2 control-label">Ciudad <font color="red">*</font></label>
			<div class="col-lg-6">
				<input name="CIUDAD" id="CIUDAD" class="form-control" type="text" value="{{old('CIUDAD')}}" required placeholder="Ingrese su ciudad de residencia">
			</div>
			<div class="col lg-4">
				<label><font color="gray">Ej: Ibarra/IBARRA</font></label>
			</div>
		</div>

		<div class="form-group">
			<label for="DIRECCION" class="col-lg-2 control-label">Dirección <font color="red">*</font></label>
			<div class="col-lg-6">
				<input name="DIRECCION" id="DIRECCION" class="form-control" type="text" value="{{old('DIRECCION')}}" required placeholder="Ingrese su domicilio">
			</div>
			<div class="col lg-4">
				<label><font color="gray">Ej: Av. 17 de Julio</font></label>
			</div>
		</div>

		<div class="form-group">
			<label for="TELEFONO" class="col-lg-2 control-label">Teléfono <font color="red">*</font></label>
			<div class="col-lg-6">
				<input name="TELEFONO" id="TELEFONO" class="form-control" type="tel" pattern="0[0-9]{9}" value="{{old('TELEFONO')}}" required maxlength="10" minlength="10" placeholder="Registre su número de teléfono">
			</div>
			<div class="col lg-4">
				<label><font color="gray">Ej: 062987987</font></label>
			</div>
		</div>
		<div class="form-group">
			<label for="EMAIL" class="col-lg-2 control-label">e-mail <font color="red">*</font></label>
			<div class="col-lg-6">
				<input name="EMAIL" id="EMAIL" class="form-control" type="email" value="{{old('EMAIL')}}" required placeholder="Ingrese su correo electrónico">
			</div>
			<div class="col lg-4">
				<label><font color="gray">Ej: micorreo@electronico.com</font></label>
			</div>
		</div>
		<div class="form-group">
      <label for="ESTADO" class="col-lg-2 control-label">Estado <font color="red">*</font></label>
      <div class="col-lg-6" class="col-xs-5 selectContainer">
        <select name="ESTADO" id="ESTADO" class="form-control" type="text" value="{{old('ESTADO')}}" required onchange="crear(this.value)">
        <option value="">Seleccione un Estado</option>
        <option value="A">Activo</option>
        <option value="I">Inactivo</option>
        </select>
      </div>     
      <div class="col lg-4">
				<label><font color="gray">ACTIVO/INACTIVO</font></label>
			</div>
    </div>

		<div class="form-group">
			<div class="col-lg-offset-2 col-lg-2 col-md-2 col-sm-12 col-xs-12">
              <input class="form-control btn btn-primary" type="submit" value="Añadir" />
        	</div>
        	
		</div>
	</form>
	
		<div class=" col-lg-offset-2 col-lg-2 col-md-2 col-sm-12 col-xs-12">
              <a href="{{url('cliente')}}" class="form-control btn btn-danger">Cancelar</a>
        </div>
</div>
@endsection
@push('scripts')
<script src="{{asset('js\validaciones.js')}}"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#formulario').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            cedula_ruc: {
                validators: {
                    stringLength: {
                        min: 10,
                        message: 'Ingrese su cédula correctamente'
                    }
                }
            },
            nombres: {
                validators: {
                    stringLength: {
                        min: 7,
                        message: 'Escriba sus 2 Nombres'
                    }
                }
            },
            apellidos: {
                validators: {
                    stringLength: {
                        min: 7,
                        message: 'Escriba sus 2 Apellidos'
                    }
                }
            },
            ciudadNac: {
                validators: {
                    stringLength: {
                        min: 3,
                        message: 'Escriba su Ciudad de Nacimiento'
                    }
                }
            },
            direccion: {
                validators: {
                    stringLength: {
                        min: 10,
                        message: 'Escriba su dirección de Domicilio'
                    }
                }
            },
             telefono: {
                validators: {
                    stringLength: {
                        min: 10,
                        message: 'Escriba su Número Telefónico'
                    }
                }
            },
            email: {
                validators: {
                    emailAddress: {
                        message: 'Su Email no es válido, Ejm: usuario@dominio.com'
                    }
                }
            },
            fechaNac: {
                validators: {
                    date: {
                        format: 'DD/MM/YYYY',
                        message: 'La fecha no es válida'
                    }
                }
            },
            idUser: {
                    validators: {
                        notEmpty: {
                            message: 'El usuario es requerido'
                        }
                    }
                },
            estado: {
                    validators: {
                        notEmpty: {
                            message: 'El estado es Requerido'
                        }
                    }
                }
        }
    });
});
</script>

@endpush