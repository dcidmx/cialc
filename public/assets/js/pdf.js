function modal_resguardo_telefonico(id_celular){
	$(document).ready(function() {
		$.ajax({
			url: 'pdf/modal_resguardo_telefonico/' + id_celular,
			dataType: 'html',
			success: function(resp_success){			
				var modal =  resp_success;
				$(modal).modal().on('shown.bs.modal',function(){
					//console.log(modal);
				}).on('hidden.bs.modal',function(){
					$(this).remove();
				});
			},
			error: function(respuesta){ alerta('Alerta!','Error de conectividad de red PDF-01');}	
		});
	} );
}

function genera_resguardo(id_celular){
	
	var msj_error="";
	if( $('#autoriza').get(0).value == "" ) msj_error+='Es necesario que seleccione a la persona que autorizará el resguardo.<br />'; 
	if ($('input[name="tiempo"]').is(':checked')) {/**/}else{ msj_error+='Seleccione el tiempo que asignará el equipo.<br />';}	
	
	if( !msj_error == "" ){
		alerta('Campos incompletos',msj_error);
		return false;
	}
	$(document).ready(function() {
		$.ajax({
			url: 'pdf/resguardo_telefonico/' + id_celular,
			type: 'POST',
			data: $("#generar_resguardo").serialize(),
			dataType: 'json',
			success: function(resp_success){
				if (resp_success['resp'] == true) {
					$('#myModal').modal('hide');
					window.open( url_app + 'tmp/' + resp_success['token'] + '.pdf');
				}else{
					alerta(resp_success['mensaje'],resp_success['error']);
				}
			},
			error: function(respuesta){ alerta('Alerta!','Error de conectividad de red PDF-02');}	
		});
	} );

}