function salir(){
	$.ajax({
		url: url_app + 'login/salir',
		type: 'POST',
		dataType: "json",
		success: function(respuesta){
			if(respuesta[0].resp='correcto'){
				window.location = url_app +  "login";            	
			}else{
				alerta('Alerta!','Error en el sistema');
			}
		}, 
		error: function(){alerta('Alerta!','Error de conectividad de red CMMN-01');}
	});
}
function salirAlternativo(){
	$.ajax({
		url: url_app + 'login/salirAlternativo',
		type: 'POST',
		dataType: "json",
		success: function(respuesta){
			if(respuesta[0].resp='correcto'){
				window.location = url_app +  "login";            	
			}else{
				alerta('Alerta!','Error en el sistema');
			}
		}, 
		error: function(){alerta('Alerta!','Error de conectividad de red CMMN-02');}
	});
}
function valida_logeo(e,decReq,boton){

	if(valida_enter(e,decReq)==true || boton==1){
		if($('#usuario').get(0).value==""){
			alerta('Alerta!','Olvido ingresar usuario');
			return false;
		}else if($('#password').get(0).value==""){

			alerta('Alerta!','Olvido ingresar password');
			return false;
		}else{
			$.ajax({
				url: url_app + 'login/logear',
				type: 'POST',
				data: 'usuario='+$('#usuario').get(0).value+"&password="+$('#password').get(0).value,
				dataType: "json",
				success: function(respuesta){
					if(respuesta[0].resp=='acceso_correcto'){
						if(respuesta[2].via == 'correcta'){
							if(respuesta[1].dispositivo=='celular'){
								window.location = url_app + "mobile";
							}else{
								window.location = url_app + "inicio";
							}
						}else if(respuesta[2].via == 'disabled'){
							alerta('Alerta!','El logueo esta deshabilitado de manera temporal por el administrador');
						}
					}else if(respuesta[0].resp=="acceso_incorrecto"){
						$('#usuario').value="";
						$('#password').value="";
						alerta('Alerta!','Usuario o password incorrecto');          	 	     
					}else if(respuesta[0].resp=="inhabilitado"){
						$('#usuario').value="";
						$('#password').value="";
						alerta('Alerta!','Su cuenta está inhabilitada por exceder el número de intentos de acceso permitidos, notifíquelo a su administrador');  
					}
				}, 
				error: function(){ alerta('Alerta!','Error de conectividad de red CMMN-03');}
			});
		}
	}
	
}
function valida_enter(e, decReq) {
	var key = e.which;
	if (key == 13) {
		return true;
	} else {
		return false;
	}
}
function modal_sign_out(id_usuario){
	$(document).ready(function() {
		$.ajax({
			url: 'login/modal_sign_out/' + id_usuario,
			dataType: 'html',
				success: function(resp_success){			
					var modal =  resp_success;
					$(modal).modal().on('shown.bs.modal',function(){
						//console.log(modal);
					}).on('hidden.bs.modal',function(){
						$(this).remove();
					});
				},
			error: function(respuesta){ alerta('Alerta!','Error de conectividad de red CMMN-04');}	
		});
	} );
}
function sign_out(id_usuario){
	$(document).ready(function() {
		$.ajax({
			url: 'login/sign_out/' + id_usuario,
			dataType: 'json',
				success: function(resp_success){			
					if (resp_success['resp'] == true) {
						$('#myModal').modal('hide');
						$('#loginusr').DataTable().ajax.reload();
					}else{
						alerta('Alerta!','Error de conectividad de red CMMN-05');
					}
				},
			error: function(respuesta){ alerta('Alerta!','Error de conectividad de red CMMN-06');}	
		});
	} );
}
function force_all_sign_out(){
	$(document).ready(function() {
		$.ajax({
			url: 'login/modal_all_sign_out',
			dataType: 'html',
				success: function(resp_success){			
					var modal =  resp_success;
					$(modal).modal().on('shown.bs.modal',function(){
						//console.log(modal);
					}).on('hidden.bs.modal',function(){
						$(this).remove();
					});
				},
			error: function(respuesta){ alerta('Alerta!','Error de conectividad de red CMMN-07');}	
		});
	} );	
}
function sign_all_out(){
	$(document).ready(function() {
		$.ajax({
			url: 'login/sign_all_out',
			dataType: 'json',
				success: function(resp_success){			
					if (resp_success['resp'] == true) {
						$('#myModal').modal('hide');
						location.reload();
					}else{
						alerta('Alerta!','Error de conectividad de red CMMN-08');
					}
				},
			error: function(respuesta){ alerta('Alerta!','Error de conectividad de red CMMN-09');}	
		});
	} );
}
function switch_login_op(){
	$(document).ready(function() {
		var estado = document.getElementById("switch_login_op").checked;
		$.ajax({
			url: url_app + 'login/switch_login_op/' + estado ,
			dataType: 'json',
			success: function(resp_success){			
				if (resp_success['resp'] == true) {
					//alerta('Alerta!','ok');
				}
			},
			error: function(respuesta){ alerta('Alerta!','Error de conectividad de red CMMN-10');}	
		});
	} );
}