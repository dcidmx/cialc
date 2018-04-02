function accion_controller(id_tabla){
	$(document).ready(function() {
		$('#'+ id_tabla).dataTable();
		$('#'+ id_tabla +' tbody').on('click', 'tr', function () {
			var id = $('td', this).eq(0).text();
			$.ajax({
				url: 'controllers/data_controller/' + id,
				dataType: 'html',
				success: function(resp_success){			
					var modal =  resp_success;
					$(modal).modal().on('shown.bs.modal',function(){
						//console.log(modal);
					}).on('hidden.bs.modal',function(){
						$(this).remove();
					});
				},
				error: function(respuesta){ alerta('Alerta!','Error de conectividad de red CNTR-01');}	
			});
		} );
	} );
}
function editar_metodo(){
	var msj_error="";
	if( $('#controlador').get(0).value == "" )	msj_error+='El Controlador es requerido.<br />';
	if( $('#metodo').get(0).value == "")	msj_error+='El modelo es requerido.<br />';
	if( !msj_error == "" ){
		alerta_div('error_alerta','Error en la captura de datos.',msj_error);
		return false;
	}
	$(document).ready(function() {
		$.ajax({
			url: 'controllers/editar_metodo',
			type: 'POST',
			data: $("#edita_modelo").serialize(),
			dataType: 'json',
			success: function(resp_success){
				if (resp_success['resp'] == true) {
					$('#myModal').modal('hide');
					$('#controllers').DataTable().ajax.reload();
				}else{
					alerta_div('error_alerta',resp_success['mensaje'],resp_success['error']);
				}
			},
			error: function(respuesta){ alerta('Alerta!','Error de conectividad de red CNTR-02');}	
		});
	} );
}
function eliminar_par(){
	$(document).ready(function() {
		var id = $('#id_metodo').get(0).value;
		$.ajax({
			url: 'controllers/eliminar_par/' + id,
			dataType: 'json',
			success: function(resp_success){
				if (resp_success['resp'] == true) {
					$('#myModal').modal('hide');
					$('#controllers').DataTable().ajax.reload();
				}else{
					alerta_div('error_alerta',resp_success['mensaje'],resp_success['error']);
				}
			},
			error: function(respuesta){ alerta('Alerta!','Error de conectividad de red CNTR-03');}	
		});
	} );
}
function modal_add_metodo(){
	$(document).ready(function() {
		$.ajax({
			url: 'controllers/modal_add_metodo',
			dataType: 'html',
			success: function(resp_success){			
				var modal =  resp_success;
				$(modal).modal().on('shown.bs.modal',function(){
					//console.log(modal);
				}).on('hidden.bs.modal',function(){
					$(this).remove();
				});
			},
			error: function(respuesta){ alerta('Alerta!','Error de conectividad de red CNTR-04');}	
		});
	} );
}
function agregar_metodo(){
	var msj_error="";
	if( $('#controlador').get(0).value == "" )	msj_error+='El Controlador es requerido.<br />';
	if( $('#metodo').get(0).value == "")	msj_error+='El modelo es requerido.<br />';
	if( !msj_error == "" ){
		alerta_div('error_alerta','Error en la captura de datos.',msj_error);
		return false;
	}
	$(document).ready(function() {
		$.ajax({
			url: 'controllers/agregar_metodo',
			type: 'POST',
			data: $("#nuevo_modelo").serialize(),
			dataType: 'json',
			success: function(resp_success){
				if (resp_success['resp'] == true) {
					$('#myModal').modal('hide');
					$('#controllers').DataTable().ajax.reload();
				}else{
					alerta_div('error_alerta',resp_success['mensaje'],resp_success['error']);
				}
			},
			error: function(respuesta){ alerta('Alerta!','Error de conectividad de red CNTR-05');}
		});
	} );

}