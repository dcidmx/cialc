<?php if ( ! defined( 'URL_APP' ) ) { exit; } ?>
<div class="modal fade" id="myModal" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"+ aria-hidden="true">x</button>
				<h4 class="modal-title" id="myModalLabel">
					Desloguear
				</h4>
			</div>
			<div class="modal-body" id="modal_content">
				La siguiente accion elimina la session activa del usuario, lo cual lo obligará a loguearse nuevamente.
				<br><br>¿Está seguro de continuar con esta acción?
			</div>
			<div class="modal-footer">					
				<button onclick="sign_out(<?=$id_usuario?>);" class="btn btn-ar btn-success" type="button">Desloguear usuario</button>
				<button  data-dismiss="modal" class="btn btn-ar btn-default" type="button">Cerrar</button>
			</div>
		</div>
	</div>
</div>