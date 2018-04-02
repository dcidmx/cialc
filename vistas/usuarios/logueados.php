<?php if ( ! defined( 'URL_APP' ) ) { exit; } ?>
<style>
div.table-responsive div#loginusr_wrapper.dataTables_wrapper.form-inline.dt-bootstrap.no-footer div.row div.col-sm-12{
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
	<h1 class="page-title"> Usuarios logueados
		&bull;&nbsp;<small>Logins y manejo de sesiones</small>
	</h1>
		<div class="col-md-12 column menu_header_content">
			<?php
			if($this->tiene_permiso('Login|switch_login_op')){
				
				$acceso = Controlador::getConfig(1,'login_permitido');
				if($acceso['valor'] == 1){$checked = 'checked';}else{$checked = '';}
				
			?>	
				<input class="make-switch" data-size="mini" data-on-color="success" data-on-text="&nbsp;LOGIN ON&nbsp;&nbsp;" data-off-text="&nbsp;LOGIN OFF&nbsp;" onchange='switch_login_op()' id="switch_login_op" name="switch_login_op" type="checkbox" <?php echo $checked; ?>/>
				<span class="lbl">&nbsp;&nbsp;</span>
						<script>
						$(".make-switch").bootstrapSwitch();
						</script>				
			<?php
			}
			if($this->tiene_permiso('Login|force_all_sign_out')){
			?>				
				<button class="btn btn-xs green" type="button" onclick="force_all_sign_out();">Desloguear a todos</button>
			<?php
			}
			?>
		</div>		
		<div class="col-md-12 column">
			<div class="table-responsive">
				<table id="loginusr" class="display table table-striped" cellspacing="0" width="100%">
					<thead>
						<tr>
								<th>ID</th>
								<th>Usuario</th>
								<th>Nombre</th>
								<th>Inicio</th>
								<th>Verificacion</th>
								<th>IP</th>
								<th>session</th>
								<th>Acciones</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" language="javascript" class="init">
$(document).ready(function() {
    $('#loginusr').dataTable( {
		"fnDrawCallback": function( oSettings ) {
		  $('[data-rel=tooltip]').tooltip();
		},
        "processing": true,
        "serverSide": true,
		"ajax": {
            "url": "usuarios/logueados_get",
            "type": "POST"
        },
		"columnDefs": [
			{
				"targets": 7,
				"searchable":false,
				"visible":true,
				"render": function (status) {
					return  status ;				
				}
			},
			{
				"targets": 6,
				"searchable":false,
				"visible":true
			}
		]
    } );
} );
</script>
