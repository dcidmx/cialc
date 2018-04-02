<?php if ( ! defined( 'URL_APP' ) ) { exit; } ?>
<style>
div.table-responsive div#investigadores_wrapper.dataTables_wrapper.form-inline.dt-bootstrap.no-footer div.row div.col-sm-12{
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
	<h1 class="page-title">Investigadores
		&bull;&nbsp;<small>Administración de perfiles de investigadores</small>
	</h1><br><br>
		<div class="col-md-12 column">
			<div class="table-responsive">
				<table id="investigadores" class="display table table-striped" cellspacing="0" width="100%">
					<thead>
						<tr>
								<th>ID</th>
								<th>Usuario</th>
								<th>Nombre</th>
								<th>Apellido Paterno</th>
								<th>Apellido Materno</th>
								<th>Categoria</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" language="javascript" class="init">
$(document).ready(function() {
    $('#investigadores').dataTable( {
		"fnDrawCallback": function( oSettings ) {
		  $('[data-rel=tooltip]').tooltip();
		},
        "processing": true,
        "serverSide": true,
		"ajax": {
            "url": "usuarios/obtener_investigadores",
            "type": "POST"
        }
    } );
} );
editResearch('investigadores');
</script>
