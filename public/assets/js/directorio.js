function modal_add_dir(){
	$(document).ready(function() {
		$.ajax({
			url: 'directorio/modal_add_dir',
			dataType: 'html',
				success: function(resp_success){
					var modal =  resp_success;
					$(modal).modal().on('shown.bs.modal',function(){
						//console.log(modal);
					}).on('hidden.bs.modal',function(){
						$(this).remove();
					});
				},
			error: function(respuesta){ alerta('Alerta!','Error de conectividad de red DIR-01');}
		});
	} );
}
function chk_stat_elm(){
	if($("#chk_cat_elm").is(':checked')) {
		$('#cat_status').get(0).value = "3";
	} else {
		$('#cat_status').get(0).value = "4";
	}
}
function graba_dir(){

	var msj_error="";
	if( $('#nivel_primario').get(0).value == "" ) msj_error+='Olvidó ingresar el Nivel primario.<br />';
	if( $('#nivel_filtro').get(0).value == "" )	msj_error+='Olvidó ingresar el nivel de filtro.<br />';
	if( $('#nombre').get(0).value == "")	msj_error+='Olvidó ingresar el nombre.<br />';
	if( $('#cargo').get(0).value == "")	msj_error+='Olvidó ingresar el cargo.<br />';


	if( !msj_error == "" ){
		alerta_div('error_alerta','Error en la captura de datos.',msj_error);
		return false;
	}

	$(document).ready(function() {
		$.ajax({
			url: 'directorio/agregar_elemento',
			type: 'POST',
			data: $("#nuevo_elemento").serialize(),
			dataType: 'json',
			success: function(resp_success){
				if (resp_success['resp'] == true) {
					$('#myModal').modal('hide');
					$('#directorio').DataTable().ajax.reload();
				}else{
					alerta_div('error_alerta',resp_success['mensaje'],resp_success['error']);
					$('#nivel_primario').get(0).value = "";
					$('#nivel_filtro').get(0).value = "";
                                   $('#nombre').get(0).value = "";
                                   $('#cargo').get(0).value = "";
				}
			},
			error: function(respuesta){ alerta('Alerta!','Error de conectividad de red DIR-02');}
		});
	});
}
function editDirectorio(id_tabla){
   $('#'+ id_tabla).dataTable();
   $('#'+ id_tabla +' tbody').on('click', 'tr', function () {
          var id_directorio = $('td', this).eq(0).text();
          $.ajax({
						url: 'directorio/editar_directorio/' + id_directorio,
						dataType: 'html',
							success: function(resp_success){
								var modal =  resp_success;
								$(modal).modal().on('shown.bs.modal',function(){
									//console.log(modal);
								}).on('hidden.bs.modal',function(){
									$(this).remove();
								});
							},
						error: function(respuesta){ alerta('Alerta!','Error de conectividad de red DIR-03');}
					});
   } );
}
function guardar_dir(){

	var msj_error="";
	if( $('#nivel_primario').get(0).value == "" ) msj_error+='Olvidó ingresar el Nivel primario.<br />';
	if( $('#nivel_filtro').get(0).value == "" )	msj_error+='Olvidó ingresar el nivel de filtro.<br />';
	if( $('#nombre').get(0).value == "")	msj_error+='Olvidó ingresar el nombre.<br />';
	if( $('#cargo').get(0).value == "")	msj_error+='Olvidó ingresar el cargo.<br />';


	if( !msj_error == "" ){
		alerta_div('error_alerta','Error en la captura de datos.',msj_error);
		return false;
	}

	$(document).ready(function() {
		$.ajax({
			url: 'directorio/editar_elemento',
			type: 'POST',
			data: $("#elemento_editado").serialize(),
			dataType: 'json',
			success: function(resp_success){
				if (resp_success['resp'] == true) {
					$('#myModal').modal('hide');
					$('#directorio').DataTable().ajax.reload();
				}else{
					alerta_div('error_alerta',resp_success['mensaje'],resp_success['error']);
					$('#nivel_primario').get(0).value = "";
					$('#nivel_filtro').get(0).value = "";
                                   $('#nombre').get(0).value = "";
                                   $('#cargo').get(0).value = "";
				}
			},
			error: function(respuesta){ alerta('Alerta!','Error de conectividad de red DIR-04');}
		});
	});
}
