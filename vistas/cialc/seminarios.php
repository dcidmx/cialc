<?php if ( ! defined( 'URL_APP' ) ) { exit; } ?>
<style>
div.table-responsive div#seminarios_wrapper.dataTables_wrapper.form-inline.dt-bootstrap.no-footer div.row div.col-sm-12{
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
	<h1 class="page-title"> Seminarios
		&bull;&nbsp;<small>Administración de seminarios</small>
	</h1><br><br>
       <div class="col-md-12 column menu_header_content">
              <?php
              if($this->tiene_permiso('Cialc|agregar_seminario')){
              ?>
                     <button class="btn green" type="button" onclick="agregar_seminario();">Nuevo Seminario</button>
              <?php
              }
              ?>
       </div>
		<div class="col-md-12 column">
			<div class="table-responsive">
				<table id="seminarios" class="display table table-striped" cellspacing="0" width="100%">
					<thead>
						<tr>
              <th>ID</th>
              <th>Investigador</th>
              <th>Seminario</th>
              <th>Status</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" language="javascript" class="init">
$(document).ready(function() {
    $('#seminarios').dataTable( {
		"fnDrawCallback": function( oSettings ) {
		  $('[data-rel=tooltip]').tooltip();
		},
        "processing": true,
        "serverSide": true,
		"ajax": {
            "url": "cialc/obtener_seminarios",
            "type": "POST"
        },
        "columnDefs": [
          {
            "targets": 3,
            "render": function (status) {
              if(status == '4'){return 'Inactivo';}else{return 'Activo';}
            }
          }
        ]
    } );
} );
editar_seminario('seminarios');
</script>
