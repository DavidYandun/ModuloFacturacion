<div class="modal fade" id="modalEliminarCabecera" tabindex="-1" role="dilog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Eliminar Cabecera</h4> 
			</div>
			<div class="modal-body">
				{{Form::open(['action'=>['CabeceraController@destroy',""],'method'=>'delete'])}}
				<h4 id="txtEliminar" class="text-center text-muted">¿Estás seguro?</h4>
				<h4 class="lead text-muted text-center" style="display: block;margin: 10px">Esta acción borrará de forma permanente el registro. ¿Desea continuar?</h4>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-primary">Aceptar</button>
				</div>
				{{Form::Close()}}
			</div>
		</div>
	</div>
</div>