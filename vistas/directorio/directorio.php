<?php if ( ! defined( 'URL_APP' ) ) { exit; } ?>
<style>
div.table-responsive div#directorio_wrapper.dataTables_wrapper.form-inline.dt-bootstrap.no-footer div.row div.col-sm-12{
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
	<h1 class="page-title"> Directorio
		&bull;&nbsp;<small>Administración de directorio</small>
	</h1><br><br>
       <div class="col-md-12 column menu_header_content">
              <?php
              if($this->tiene_permiso('Directorio|agregar_directorio')){
              ?>
                     <button class="btn green" type="button" onclick="modal_add_dir();">Nuevo Elemento</button>
              <?php
              }
              ?>
       </div>
		<div class="col-md-12 column">
			<div class="table-responsive">
				<table id="directorio" class="display table table-striped" cellspacing="0" width="100%">
					<thead>
						<tr>
								<th>ID</th>
								<th>Menú</th>
								<th>Filtro</th>
								<th>Nombre</th>
								<th>Cargo</th>
								<th>Información</th>
                                                        <th>Correo</th>
                                                        <th>Teléfono</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" language="javascript" class="init">
$(document).ready(function() {
    $('#directorio').dataTable( {
		"fnDrawCallback": function( oSettings ) {
		  $('[data-rel=tooltip]').tooltip();
		},
        "processing": true,
        "serverSide": true,
		"ajax": {
            "url": "directorio/obtener_directorio",
            "type": "POST"
        }
    } );
} );
editDirectorio('directorio');
</script>
