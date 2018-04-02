function modal_add_usr(){
	$(document).ready(function() {
		$.ajax({
			url: 'usuarios/modal_add_usr',
			dataType: 'html',
				success: function(resp_success){
					var modal =  resp_success;
					$(modal).modal().on('shown.bs.modal',function(){
						//console.log(modal);
					}).on('hidden.bs.modal',function(){
						$(this).remove();
					});
				},
			error: function(respuesta){ alerta('Alerta!','Error de conectividad de red USR-01');}
		});
	} );
}

function editar_perfil(){
	var msj_error="";
	if( $('#nombres').get(0).value == "" )	msj_error+='Olvidó ingresar Nombre.<br />';
	if( $('#apellido_paterno').get(0).value == "")	msj_error+='Olvidó ingresar el apellido paterno.<br />';
	if( $('#apellido_materno').get(0).value == "")	msj_error+='Olvidó ingresar el apellido materno.<br />';

	if( $('#correo').get(0).value == "" )	msj_error+='Olvidó ingresar Correo.<br />';
    var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
  if (!regex.test($('#correo').val().trim())) msj_error+='El correo tiene un formato inválido.<br />';
	if( $('#password').get(0).value != $('#password2').get(0).value) msj_error+='Las contraseñas no empatan.<br />';

	if( !msj_error == "" ){
		alerta('Faltan datos', msj_error);
		return false;
	}
	$(document).ready(function() {
		$.ajax({
			url: url_app + 'usuarios/editar_perfil',
			type: 'POST',
			data: $("#editar_perfil").serialize(),
			dataType: 'json',
			success: function(resp_success){
				if (resp_success['resp'] == true) {
					$('#name_top').html(resp_success['new_name']);
					alerta('Anuncio!', resp_success['mensaje']);
				}else{
					alerta('Alerta!', resp_success['mensaje']);
				}
			},
			error: function(respuesta){ alerta('Alerta!','Error de conectividad de red USR-02');}
		});
	} );
}

function editar_research(){
	var msj_error="";
	if( $('#investigador').get(0).value == "" )	msj_error+='El nombre del investigador es requerido.<br />';
    if( $('#linea_investigacion').get(0).value == "")	msj_error+='La categoría de investigación es requerida.<br />';
    if( $('#tipo_investigador').get(0).value == "")	msj_error+='El tipo de investigador es requerido.<br />';
    var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
    if (!regex.test($('#correo_publico').val().trim())) msj_error+='El correo tiene un formato inválido.<br />';

	if( !msj_error == "" ){
		alerta('Faltan datos', msj_error);
		return false;
	}
	$(document).ready(function() {
		$.ajax({
			url: url_app + 'usuarios/editar_perfil',
			type: 'POST',
			data: $("#editar_perfil").serialize(),
			dataType: 'json',
			success: function(resp_success){
				if (resp_success['resp'] == true) {
					alerta('Anuncio!', resp_success['mensaje']);
				}else{
					alerta('Alerta!', resp_success['mensaje']);
				}
			},
			error: function(respuesta){ alerta('Alerta!','Error de conectividad de red USR-02-inv');}
		});
	} );
}

function editar_permisos(){
	var id = $('#id_usuario').get(0).value;
	carga_archivo('contenedor_principal',url_app + "usuarios/permisos_usuario/" + id)
}
function accion_de_fila(id_tabla){
	$(document).ready(function() {
		$('#'+ id_tabla).dataTable();
		$('#'+ id_tabla +' tbody').on('click', 'tr', function () {
			var user_id = $('td', this).eq(0).text();
			$.ajax({
				url: 'usuarios/datos_usuario/' + user_id,
				dataType: 'html',
				success: function(resp_success){
					var modal =  resp_success;
					$(modal).modal().on('shown.bs.modal',function(){
						//console.log(modal);
					}).on('hidden.bs.modal',function(){
						$(this).remove();
					});
				},
				error: function(respuesta){ alerta('Alerta!','Error de conectividad de red USR-03');}
			});
		} );
	} );
}

function graba_user(){

	var msj_error="";
	if( $('#usuario').get(0).value == "" ){ msj_error+='Olvidó ingresar Usuario.<br />'; /*$('#usuario').css({background:'#F4CECD'}); */ }
	if( $('#nombres').get(0).value == "" )	msj_error+='Olvidó ingresar Nombre.<br />';
	if( $('#apellido_paterno').get(0).value == "")	msj_error+='Olvidó ingresar el apellido paterno.<br />';
	if( $('#apellido_materno').get(0).value == "")	msj_error+='Olvidó ingresar el apellifo materno.<br />';
	if( $('#correo').get(0).value == "" )	msj_error+='Olvidó ingresar Correo.<br />';
	if( $('#password').get(0).value == "" )	msj_error+='Olvidó ingresar Contraseña.<br />';
	if( $('#password2').get(0).value == "") msj_error+='Olvidó ingresar Confimación de contraseña.<br />';
	if( $('#id_rol').get(0).value == "" )	msj_error+='Olvidó seleccionar Rol de usuario.<br />';
	if( $('#id_ubicacion').get(0).value == "" )	msj_error+='Olvidó seleccionar la ubicacion del usuario.<br />';

	if( !msj_error == "" ){
		alerta_div('error_alerta','Error en la captura de datos.',msj_error);
		return false;
	}

	$(document).ready(function() {
		$.ajax({
			url: 'usuarios/agregar_usuario',
			type: 'POST',
			data: $("#nuevo_usuario").serialize(),
			dataType: 'json',
			success: function(resp_success){
				if (resp_success['resp'] == true) {
					$('#myModal').modal('hide');
					$('#usuarios').DataTable().ajax.reload();
				}else{
					alerta_div('error_alerta',resp_success['mensaje'],resp_success['error']);
					$('#password').get(0).value = "";
					$('#password2').get(0).value = "";
				}
			},
			error: function(respuesta){ alerta('Alerta!','Error de conectividad de red USR-04');}
		});
	} );

}

function alerta_div(id_div,error_head,error_content){
	var div_error = '<div class="alert alert-danger" id="error_new_user">';
	div_error += '<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>';
	div_error += '<strong><i class="fa fa-comments-o"></i>'+error_head+'</strong>';
	div_error += '<br />'+error_content;
	div_error += '</div>';
	$('#'+id_div).html(div_error);
}

function editar_usuario(){
	var msj_error="";
	if( $('#nombres').get(0).value == "" )	msj_error+='Olvidó ingresar Nombre.<br />';
	if( $('#apellido_paterno').get(0).value == "")	msj_error+='Olvidó ingresar el apellido paterno.<br />';
	if( $('#apellido_materno').get(0).value == "")	msj_error+='Olvidó ingresar el apellido materno.<br />';
	if( $('#correo').get(0).value == "" )	msj_error+='Olvidó ingresar Correo.<br />';
	if( $('#id_rol').get(0).value == "" )	msj_error+='Olvidó seleccionar Rol de usuario.<br />';
	if( $('#password').get(0).value != $('#password2').get(0).value) msj_error+='Las contraseñas no empatan.<br />';
	if( $('#id_ubicacion').get(0).value == "" )	msj_error+='Olvidó Seleccionar la Ubicación.<br />';


	if( !msj_error == "" ){
		alerta('Faltan datos', msj_error);
		return false;
	}
	$(document).ready(function() {
		$.ajax({
			url: 'usuarios/editar_usuario',
			type: 'POST',
			data: $("#edita_usuario").serialize(),
			dataType: 'json',
			success: function(resp_success){
				if (resp_success['resp'] == true) {
					$('#myModal').modal('hide');
					$('#usuarios').DataTable().ajax.reload();
				}else{
					alerta_div('error_alerta',resp_success['mensaje'],resp_success['error']);
				}
			},
			error: function(respuesta){ alerta('Alerta!','Error de conectividad de red USR-05');}
		});
	} );
}

function chk_stat_pass(){
	if($("#chk_change_pass").is(':checked')) {
		$('#change_pass').get(0).value = "132";
	} else {
		$('#change_pass').get(0).value = "133";
	}
}

function chk_stat_user(){
	if($("#chk_cat_status").is(':checked')) {
		$('#cat_status').get(0).value = "3";
	} else {
		$('#cat_status').get(0).value = "4";
	}
}

function baja_usuario(){
	$(document).ready(function() {
		var id = $('#id_usuario').get(0).value;
		$.ajax({
			url: 'usuarios/baja_usuario/' + id,
			dataType: 'json',
			success: function(resp_success){
				if (resp_success['resp'] == true) {
					$('#myModal').modal('hide');
					$('#usuarios').DataTable().ajax.reload();
				}else{
					alerta_div('error_alerta',resp_success['mensaje'],resp_success['error']);
				}
			},
			error: function(respuesta){ alerta('Alerta!','Error de conectividad de red USR-06');}
		});
	} );
}
function tyc(stat) {
	if(stat == 'SI'){
		$.ajax({
			url: 'usuarios/tyc/' + stat,
			dataType: 'json',
			success: function(resp_success){
				if (resp_success['resp'] == true) {
					console.log(resp_success['resp']);
					if(resp_success['dispositivo']=='celular'){
						window.location ="mobile";
					}else{
						window.location ="inicio";
					}
				}else{
					console.log(resp_success['resp']);
					window.location ="inicio";
				}
			},
			error: function(respuesta){ console.log('Error en el proceso TYC');}
		});
	}else{
		salirAlternativo();
	}
}
function cambiar_pass(){
		$.ajax({
			url: 'usuarios/cambiar_password',
			type: 'POST',
			data: $("#chge_pass").serialize(),
			dataType: 'json',
			success: function(resp_success){
				if (resp_success['resp'] == true) {
					console.log(resp_success['resp']);
					if(resp_success['dispositivo']=='celular'){
						window.location ="mobile";
					}else{
						window.location ="inicio";
					}
				}else{
					alerta('Alerta!','Error en el proceso PASS_CHGE 01');
				}
			},
			error: function(respuesta){ alerta('Alerta!','Error en el proceso PASS_CHGE 02');}
		});
}
function reset_pass(e,decReq,boton){

   	if(valida_enter(e,decReq)==true || boton==1){
   		if($('#password').get(0).value==""){
   			alerta('Alerta!','Se requiere ingresar los dos campos para las contraseñas');
   			return false;
   		}else if($('#password2').get(0).value==""){
			alerta('Alerta!','Se requiere ingresar los dos campos para las contraseñas');
			return false;
        }else if ($('#password').get(0).value != $('#password2').get(0).value){
			alerta('Alerta!','Los campos no coinciden');
			return false;
		}else{
               $.ajax({
                url: url_app + 'usuarios/setpassword_lost',
                type: 'POST',
                data: $("#reset").serialize(),
                dataType: "json",
                success: function(respuesta){
				console.log(respuesta);
          	        if(respuesta['resp']==true){
						alerta('Alerta!',respuesta['mensaje']);
						setTimeout(function(){window.location.href = url_app}, 3000);
					}
          	        if(respuesta['resp']=="false"){
						$('#password').value="";
						$('#password2').value="";
						alerta('Alerta!',respuesta[0].mensaje);
          	        }
          	        if(respuesta['test']=="salida_extra"){alerta('Alerta!','MSG 003');}
               },
               error: function(){ alerta('Alerta!','Ocurrio un error');}
              });
            }
         }
}
function editResearch(id_tabla){
	$(document).ready(function() {
		$('#'+ id_tabla).dataTable();
		$('#'+ id_tabla +' tbody').on('click', 'tr', function () {
		var user_id = $('td', this).eq(0).text();	
			
			carga_archivo('contenedor_principal', url_app + 'usuarios/perfilresearch/' + user_id);
			
		} );
	} );
}