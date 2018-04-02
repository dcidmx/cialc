<?php if ( ! defined( 'URL_APP' ) ) { exit; } ?>
<style>
div.table-responsive div#catalogo_wrapper.dataTables_wrapper.form-inline.dt-bootstrap.no-footer div.row div.col-sm-12{
	padding: 0px !important;
}
.container {
    max-width: 100% !important;
	width: 100% !important;
}
</style>
<div class="container">
	<div class="row clearfix">
	<h1 class="page-title"> Catálogo general 
		&bull;&nbsp;<small>Listado catálogos</small>
	</h1>
	<div class='col-md-12 column menu_header_content'>
		<?php echo $this->tiene_permiso('Catalogo|add_elemento')?"
			<button class='btn green' type='button' onclick='modal_add_elemento();'>Nuevo elemento</button>
		":""
		?>
	</div>
			<div class="col-md-12 column">
				<div class="table-responsive">
					<table id="catalogo" class="display table table-striped" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>ID</th>
								<th>Parent</th>
								<th>Catalogo</th>
								<th>Etiqueta</th>
								<th>Activo</th>
								<th>Orden</th>
								<th>Valor</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
	</div>
</div>
<script type="text/javascript" language="javascript" class="init">
$(document).ready(function() {
    $('#catalogo').dataTable( {
		"fnDrawCallback": function( oSettings ) {
		  $('[data-rel=tooltip]').tooltip();
		},
        "processing": true,
        "serverSide": true,
		"ajax": {
            "url": "catalogo/obtener_catalogo",
            "type": "POST"
        }
    } );
} );
<?php echo $this->tiene_permiso('Catalogo|editar_catalogo')?"accion_catalogo('catalogo');":"" ?>
</script>