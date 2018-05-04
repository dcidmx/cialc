<?php if ( ! defined( 'URL_APP' ) ) { exit; } ?>
<style>
div.table-responsive div#noticias_wrapper.dataTables_wrapper.form-inline.dt-bootstrap.no-footer div.row div.col-sm-12{
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
	<h1 class="page-title"> Noticias
		&bull;&nbsp;<small>Administración del banner</small>
	</h1><br><br>
       <div class="col-md-12 column menu_header_content">
              <?php
              if($this->tiene_permiso('Bannernoticias|agregar_banner')){
              ?>
                     <button class="btn green" type="button" onclick="modal_add_ban_noti();">Nuevo Banner</button>
              <?php
              }
              ?>
       </div>
		<div class="col-md-12 column">
			<div class="table-responsive">
				<table id="noticias" class="display table table-striped" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>ID</th>
							<th>Nombre</th>
							<th>Descripcion</th>
							<th>Alternativo</th>
							<th>URL</th>
							<th>Alto</th>
							<th>Ancho</th>
							<th>Status</th>
							<th>Creación</th>
							<th>Actualización</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" language="javascript" class="init">
$(document).ready(function() {
    $('#noticias').dataTable( {
		"fnDrawCallback": function( oSettings ) {
		  $('[data-rel=tooltip]').tooltip();
		},
        "processing": true,
        "serverSide": true,
		"ajax": {
            "url": "bannernoticias/obtener_banners",
            "type": "POST"
        },
		"columnDefs": [
			{
				"targets": 4,
				"searchable":false,
				"visible":false
			},
			{
				"targets": 7,
				"render": function (status) {
					if(status == '4'){return 'Inactivo';}else{return 'Activo';}
				}
			}
		]
    } );
} );
editNoticias('noticias');
</script>
