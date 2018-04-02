function clonar_rol(){
	$(document).ready(function() {
		var id_rol = $('#id_rol_clone').get(0).value;
		var transfer = $('#role').get(0).value;
		$.ajax({
			url: 'roles/clonar/' + id_rol + '/' + transfer,
			dataType: 'html',
			success: function(resp_success){
				carga_archivo('contenedor_principal','roles/permisos/' + transfer);
			},
			error: function(respuesta){ alerta('Alerta!','Error de conectividad de red RLS-01');}	
		});
	} );
}
function modal_roles(){
	$(document).ready(function() {
		$.ajax({
			url: 'roles/modal_roles',
			dataType: 'html',
			success: function(resp_success){
				var modal =  resp_success;
				$(modal).modal().on('shown.bs.modal',function(){
					$('#roles').dataTable({
						"dom": '<"top"p>'
					});

					$( "#add" ).click(function() {
						$("#add_field").css({ display: "" });
						$("#add").css({ display: "none" });
					});	
				}).on('hidden.bs.modal',function(){
					$(this).remove();
				});	
			},
			error: function(respuesta){ alerta('Alerta!','Error de conectividad de red RLS-02');}	
		});
	} );
}
function graba_rol(){
	$(document).ready(function() {
		$.ajax({
			url: 'roles/agregar_rol',
			type: 'POST',
			data: $("#nuevo_rol").serialize(),
			dataType: 'json',
			success: function(resp_success){			
				if (resp_success['resp'] == true) {
					$("#add_field").addClass("hidden");
					$('#myModal').modal('hide');
				}
			},
			error: function(respuesta){ alerta('Alerta!','Error de conectividad de red RLS-03');}	
		});
	} );
}
function setPermission(id_metodo) {
	$(document).ready(function() {
		var metodo = escape(id_metodo);
		var estado = document.getElementById("permission_" + metodo).checked;
		var role = document.getElementById("role").value;
		$.ajax({
			url: url_app + 'roles/establecer_permiso/' + role + '/' + metodo + '/' + estado ,
			dataType: 'json',
			success: function(resp_success){			
				if (resp_success['resp'] == true) {
					//alerta('Alerta!','ok');
				}
			},
			error: function(respuesta){ alerta('Alerta!','Error de conectividad de red RLS-04');}	
		});
	} );
}

function vincular_rol(rol) {
	$(document).ready(function() {
		var access = escape(rol);
		var estado = document.getElementById("accessrol" + access).checked;
		var id_rol = document.getElementById("role").value;
		$.ajax({
			url: url_app + 'roles/establecer_acceso/' + id_rol + '/' + access + '/' + estado ,
			dataType: 'json',
			success: function(resp_success){			
				if (resp_success['resp'] == true) {
					//alerta('Alerta!','ok');
				}
			},
			error: function(respuesta){ alerta('Alerta!','Error de conectividad de red RLS-05');}	
		});
	} );
}




























