function valida_logeo(e,decReq,boton){
	
   	if(valida_enter(e,decReq)==true || boton==1){
   		if($('#usuario').get(0).value==""){
   			showAlert('Olvido ingresar usuario');
   			return false;
   		}else if($('#password').get(0).value==""){
        		showAlert('Olvido ingresar password');
        		return false;
        }else{
			$.ajax({
				url: url_app + 'login/logear',
				type: 'POST',
				data: 'usuario='+$('#usuario').val()+"&password="+$('#password').val(),
				dataType: "json",
				success: function(respuesta){
					if(respuesta[0].resp=='acceso_correcto'){
						
						if($("#remember").is(':checked') == true){storeCredentials();}else{deleteCredentials();}
						
						if(respuesta[2].via=='incorrecta'){
							showAlert('Sus credenciales son correctas, sin embargo es necesario que ingrese desde su celular');
						}else if(respuesta[2].via=='disabled'){
							showAlert('Inhabilitado temporalmente');
						}else if(respuesta[2].via=='incompleto'){
							showAlert('Su cuenta está incompleta, notifique a su administrador');
						}else{
							if(respuesta[1].dispositivo=='celular'){
								window.location ="mobile";
							}else{
								window.location ="inicio";
							}
						}
					}
					if(respuesta[0].resp=="acceso_incorrecto"){
						$('#usuario').value="";
						$('#password').value="";
						showAlert('Usuario o password incorrecto');          	 	     
					}else if(respuesta[0].resp=="inhabilitado"){
						showAlert('Su cuenta está inhabilitada por exceder el número de intentos de acceso permitidos, notifíquelo a su administrador');  
					}
				}, 
				error: function(){ showAlert('Error de conectividad de red CMMN-02');}
			});
		}
	}
}
function hideAlert(){
	$("#l-login").removeClass("hidden");
	$("#alertWindow").addClass("hidden");
}
function showAlert(mensaje){
	$("#l-login").addClass("hidden");
	$("#alertWindow").removeClass("hidden");
	$("#tipalert").html(mensaje);
}
function valida_enter(e, decReq) {
	var key = e.which;
	if (key == 13) {
		return true;
	} else {
		return false;
	}
}