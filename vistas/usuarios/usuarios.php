<?php if ( ! defined( 'URL_APP' ) ) { exit; } ?>
<style>
div.table-responsive div#usuarios_wrapper.dataTables_wrapper.form-inline.dt-bootstrap.no-footer div.row div.col-sm-12{
	padding: 0px !important;
}
.container {
    max-width: 100% !important;
	width: 100% !important;
}
body{
	padding-right: 0px !important;
}
</style>
<div class="container">
	<div class="row clearfix">
	<h1 class="page-title"> Registro de usuarios
		&bull;&nbsp;<small>Administración de usuarios y roles</small>
	</h1>
		<div class="col-md-12 column menu_header_content">
			<button class="btn green" type="button" onclick="modal_add_usr();">Nuevo Usuario</button>
			<?php
			if($this->tiene_permiso('Roles|modal_roles')){
			?>				
				<button class="btn green" type="button" onclick="modal_roles();">Roles</button>
			<?php
			}
			?>
		</div>
		<div class="col-md-12 column">
			<div class="table-responsive">
				<table id="usuarios" class="display table table-striped" cellspacing="0" width="100%">
					<thead>
						<tr>
								<th>ID</th>
								<th>Usuario</th>
								<th>Correo</th>
								<th>Nombre</th>
								<th>Apellido Paterno</th>
								<th>Apellido Materno</th>
								<th>Rol</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" language="javascript" class="init">
$(document).ready(function() {
    $('#usuarios').dataTable( {
		"fnDrawCallback": function( oSettings ) {
		  $('[data-rel=tooltip]').tooltip();
		},
        "processing": true,
        "serverSide": true,
		"ajax": {
            "url": "usuarios/obtener_usuarios",
            "type": "POST"
        }
    } );
} );
accion_de_fila('usuarios');
</script>
