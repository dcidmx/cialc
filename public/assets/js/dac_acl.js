function set_acl_extension(extension){
	var extension = escape(extension);
	var estado = document.getElementById(extension).checked;
	var user = document.getElementById("user").value;
	$.ajax({
		url: url_app + 'usuarios/set_acl_extension/' + user + '/' + extension + '/' + estado ,
		dataType: 'json',
		success: function(resp_success){			
			if (resp_success['resp'] == true) {
				check_extension(extension,resp_success['estado']);
			}
		},
		error: function(respuesta){ alerta('Alerta!','Error de conectividad de red DCL-01');}	
	});
}
function set_acl_par(par){
	var par = escape(par);
	var estado = document.getElementById(par).checked;
	var user = document.getElementById("user").value;
	$.ajax({
		url: url_app + 'usuarios/set_acl_controlador/' + user + '/' + par + '/' + estado ,
		dataType: 'json',
		success: function(resp_success){			
			if (resp_success['resp'] == true) {
				check_controller(par,resp_success['estado']);
			}
		},
		error: function(respuesta){ alerta('Alerta!','Error de conectividad de red DCL-02');}	
	});
}
function set_acl_tercio(tercio){
	var tercio = escape(tercio);
	var estado = document.getElementById(tercio).checked;
	var user = document.getElementById("user").value;
	$.ajax({
		url: url_app + 'usuarios/set_acl_metodo/' + user + '/' + tercio + '/' + estado ,
		dataType: 'json',
		success: function(resp_success){			
			if (resp_success['resp'] == true) {
				check_metodo(tercio,resp_success['estado']);
			}
		},
		error: function(respuesta){ alerta('Alerta!','Error de conectividad de red DCL-03');}	
	});
}
function check_extension(extension,stat){
	if(stat == 'true'){
		$("[id^='"+extension+"']").prop("checked", "checked");
	}else if (stat == 'false'){
		$("[id^='"+extension+"']").prop("checked", "");
	}
}
function check_controller(par,stat){
	
	var ext_cont = par.split("-");
	var extension = ext_cont[0];	
	var estado;
	if(stat == 'true'){
		$("[id^='"+par+"']").prop("checked", "checked");
		$("#" + extension).prop("checked", "checked");
	}else if (stat == 'false'){
		$("[id^='"+par+"']").prop("checked", "");
		estado = verificar_arbol(extension);
		if(estado == true){
			$("#" + extension).prop("checked", "checked");
		}else{
			$("#" + extension).prop("checked", "");
		}		
	}
}
function check_metodo(tercio,stat){
	var ext_cont = tercio.split("-");
	var extension = ext_cont[0];
	var controlador = ext_cont[0] +'-'+ ext_cont[1];	
	var estado;
	var estado2;
	if(stat == 'true'){
		$("#" + extension).prop("checked", "checked");
		$("#" + controlador).prop("checked", "checked");
	}else if (stat == 'false'){
		estado = verificar_arbol(controlador);
		if(estado == true){
			$("#" + extension).prop("checked", "checked");
			$("#" + controlador).prop("checked", "checked");
		}else{
			$("#" + controlador).prop("checked", "");
				estado2 = verificar_arbol(extension);
				if(estado2 == true){
					$("#" + extension).prop("checked", "checked");
				}else{
					$("#" + extension).prop("checked", "");
				}
		}
	}
}
function inicializar_estados(extension,controlador){
	var estado;
	var estado2;
	var controlador = extension +'-'+ controlador;
	estado = verificar_arbol(controlador);
	if(estado == true){
		$("#" + extension).prop("checked", "checked");
		$("#" + controlador).prop("checked", "checked");
	}else{
		$("#" + controlador).prop("checked", "");
			estado2 = verificar_arbol(extension);
			if(estado2 == true){
				$("#" + extension).prop("checked", "checked");
			}else{
				$("#" + extension).prop("checked", "");
			}
	}
}
function verificar_arbol(id){
	var select = false;
	$("[id^='"+id+"-']").get().forEach(function(entry) {
		if($("#" + entry.id).prop("checked") == true){
			select = true;
		}
	});
	return select;
}