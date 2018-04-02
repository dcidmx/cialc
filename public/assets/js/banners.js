function modal_add_ban_news(){
	$(document).ready(function() {
		$.ajax({
			url: 'bannerperiodicos/agregar_banner',
			dataType: 'html',
				success: function(resp_success){
					var modal =  resp_success;
					$(modal).modal().on('shown.bs.modal',function(){
						//console.log(modal);
					}).on('hidden.bs.modal',function(){
						$(this).remove();
					});
				},
			error: function(respuesta){ alerta('Alerta!','Error de conectividad de red BAN-01');}
		});
	} );
}

function modal_add_ban_nov(){
	$(document).ready(function() {
		$.ajax({
			url: 'bannernovedades/agregar_banner',
			dataType: 'html',
				success: function(resp_success){
					var modal =  resp_success;
					$(modal).modal().on('shown.bs.modal',function(){
						//console.log(modal);
					}).on('hidden.bs.modal',function(){
						$(this).remove();
					});
				},
			error: function(respuesta){ alerta('Alerta!','Error de conectividad de red BAN-02');}
		});
	} );
}

function modal_add_ban_noti(){
	$(document).ready(function() {
		$.ajax({
			url: 'bannernoticias/agregar_banner',
			dataType: 'html',
				success: function(resp_success){
					var modal =  resp_success;
					$(modal).modal().on('shown.bs.modal',function(){
						//console.log(modal);
					}).on('hidden.bs.modal',function(){
						$(this).remove();
					});
				},
			error: function(respuesta){ alerta('Alerta!','Error de conectividad de red BAN-03');}
		});
	} );
}

function modal_add_ban_main(){
	$(document).ready(function() {
		$.ajax({
			url: 'bannermain/agregar_banner',
			dataType: 'html',
				success: function(resp_success){
					var modal =  resp_success;
					$(modal).modal().on('shown.bs.modal',function(){
						//console.log(modal);
					}).on('hidden.bs.modal',function(){
						$(this).remove();
					});
				},
			error: function(respuesta){ alerta('Alerta!','Error de conectividad de red BAN-04');}
		});
	} );
}

function modal_add_ban_act(){
	$(document).ready(function() {
		$.ajax({
			url: 'banneractividades/agregar_banner',
			dataType: 'html',
				success: function(resp_success){
					var modal =  resp_success;
					$(modal).modal().on('shown.bs.modal',function(){
						//console.log(modal);
					}).on('hidden.bs.modal',function(){
						$(this).remove();
					});
				},
			error: function(respuesta){ alerta('Alerta!','Error de conectividad de red BAN-04');}
		});
	} );
}






function editPeriodicos(id_tabla){
	$('#'+ id_tabla).dataTable();
	$('#'+ id_tabla +' tbody').on('click', 'tr', function () {

				 $.ajax({
					 url: 'bannerperiodicos/editbanner/' + $('td', this).eq(0).text(),
					 dataType: 'html',
						 success: function(resp_success){
							 var modal =  resp_success;
							 $(modal).modal().on('shown.bs.modal',function(){
								 //console.log(modal);
							 }).on('hidden.bs.modal',function(){
								 $(this).remove();
							 });
						 },
					 error: function(respuesta){ alerta('Alerta!','Error de conectividad de red BAN-05');}
				 });
	} );
}
function editNovedades(id_tabla){
	$('#'+ id_tabla).dataTable();
	$('#'+ id_tabla +' tbody').on('click', 'tr', function () {

				 $.ajax({
					 url: 'bannernovedades/editbanner/' + $('td', this).eq(0).text(),
					 dataType: 'html',
						 success: function(resp_success){
							 var modal =  resp_success;
							 $(modal).modal().on('shown.bs.modal',function(){
								 //console.log(modal);
							 }).on('hidden.bs.modal',function(){
								 $(this).remove();
							 });
						 },
					 error: function(respuesta){ alerta('Alerta!','Error de conectividad de red BAN-06');}
				 });
	} );
}
function editNoticias(id_tabla){
	$('#'+ id_tabla).dataTable();
	$('#'+ id_tabla +' tbody').on('click', 'tr', function () {

				 $.ajax({
					 url: 'bannernoticias/editbanner/' + $('td', this).eq(0).text(),
					 dataType: 'html',
						 success: function(resp_success){
							 var modal =  resp_success;
							 $(modal).modal().on('shown.bs.modal',function(){
								 //console.log(modal);
							 }).on('hidden.bs.modal',function(){
								 $(this).remove();
							 });
						 },
					 error: function(respuesta){ alerta('Alerta!','Error de conectividad de red BAN-07');}
				 });
	} );
}
function editMain(id_tabla){
	$('#'+ id_tabla).dataTable();
	$('#'+ id_tabla +' tbody').on('click', 'tr', function () {

				 $.ajax({
					 url: 'bannermain/editbanner/' + $('td', this).eq(0).text(),
					 dataType: 'html',
						 success: function(resp_success){
							 var modal =  resp_success;
							 $(modal).modal().on('shown.bs.modal',function(){
								 //console.log(modal);
							 }).on('hidden.bs.modal',function(){
								 $(this).remove();
							 });
						 },
					 error: function(respuesta){ alerta('Alerta!','Error de conectividad de red BAN-08');}
				 });
	} );
}
function editActividades(id_tabla){
	$('#'+ id_tabla).dataTable();
	$('#'+ id_tabla +' tbody').on('click', 'tr', function () {

				 $.ajax({
					 url: 'banneractividades/editbanner/' + $('td', this).eq(0).text(),
					 dataType: 'html',
						 success: function(resp_success){
							 var modal =  resp_success;
							 $(modal).modal().on('shown.bs.modal',function(){
								 //console.log(modal);
							 }).on('hidden.bs.modal',function(){
								 $(this).remove();
							 });
						 },
					 error: function(respuesta){ alerta('Alerta!','Error de conectividad de red BAN-09');}
				 });
	} );
}






function chk_stat_elm(){
	if($("#chk_cat_elm").is(':checked')) {
		$('#status').get(0).value = "3";
	} else {
		$('#status').get(0).value = "4";
	}
}


function guardar_banner_act(){

	var msj_error="";
	if( $('#name').get(0).value == "" ) msj_error+='Olvidó ingresar el nombre para identificar el banner.<br />';
	if( $('#status').get(0).value == "" ) msj_error+='Error al procesar la solicitud BAN-10.<br />';

	if( !msj_error == "" ){
		alerta_div('error_alerta','Error en la captura de datos.',msj_error);
		return false;
	}

	$(document).ready(function() {
		$.ajax({
			url: 'banneractividades/agregar_banner_do',
			type: 'POST',
			data: $("#nuevo_banner").serialize(),
			dataType: 'json',
			success: function(resp_success){
				if (resp_success['resp'] == true) {
					$('#myModal').modal('hide');
					$('#actividades').DataTable().ajax.reload();
				}else{
					alerta_div('error_alerta',resp_success['mensaje'],resp_success['error']);
					$('#name').get(0).value = "";
					$('#alternativo').get(0).value = "";
					$('#descripcion').get(0).value = "";
				}
			},
			error: function(respuesta){ alerta('Alerta!','Error de conectividad de red BAN-11');}
		});
	});
}

function guardar_banner_main(){

	var msj_error="";
	if( $('#name').get(0).value == "" ) msj_error+='Olvidó ingresar el nombre para identificar el banner.<br />';
	if( $('#status').get(0).value == "" ) msj_error+='Error al procesar la solicitud BAN-12.<br />';

	if( !msj_error == "" ){
		alerta_div('error_alerta','Error en la captura de datos.',msj_error);
		return false;
	}

	$(document).ready(function() {
		$.ajax({
			url: 'bannermain/agregar_banner_do',
			type: 'POST',
			data: $("#nuevo_banner").serialize(),
			dataType: 'json',
			success: function(resp_success){
				if (resp_success['resp'] == true) {
					$('#myModal').modal('hide');
					$('#main').DataTable().ajax.reload();
				}else{
					alerta_div('error_alerta',resp_success['mensaje'],resp_success['error']);
					$('#name').get(0).value = "";
					$('#alternativo').get(0).value = "";
					$('#descripcion').get(0).value = "";
				}
			},
			error: function(respuesta){ alerta('Alerta!','Error de conectividad de red BAN-13');}
		});
	});
}

function guardar_banner_noti(){

	var msj_error="";
	if( $('#name').get(0).value == "" ) msj_error+='Olvidó ingresar el nombre para identificar el banner.<br />';
	if( $('#status').get(0).value == "" ) msj_error+='Error al procesar la solicitud BAN-14.<br />';

	if( !msj_error == "" ){
		alerta_div('error_alerta','Error en la captura de datos.',msj_error);
		return false;
	}

	$(document).ready(function() {
		$.ajax({
			url: 'bannernoticias/agregar_banner_do',
			type: 'POST',
			data: $("#nuevo_banner").serialize(),
			dataType: 'json',
			success: function(resp_success){
				if (resp_success['resp'] == true) {
					$('#myModal').modal('hide');
					$('#noticias').DataTable().ajax.reload();
				}else{
					alerta_div('error_alerta',resp_success['mensaje'],resp_success['error']);
					$('#name').get(0).value = "";
					$('#alternativo').get(0).value = "";
					$('#descripcion').get(0).value = "";
				}
			},
			error: function(respuesta){ alerta('Alerta!','Error de conectividad de red BAN-15');}
		});
	});
}

function guardar_banner_nov(){

	var msj_error="";
	if( $('#name').get(0).value == "" ) msj_error+='Olvidó ingresar el nombre para identificar el banner.<br />';
	if( $('#status').get(0).value == "" ) msj_error+='Error al procesar la solicitud BAN-16.<br />';

	if( !msj_error == "" ){
		alerta_div('error_alerta','Error en la captura de datos.',msj_error);
		return false;
	}

	$(document).ready(function() {
		$.ajax({
			url: 'bannernovedades/agregar_banner_do',
			type: 'POST',
			data: $("#nuevo_banner").serialize(),
			dataType: 'json',
			success: function(resp_success){
				if (resp_success['resp'] == true) {
					$('#myModal').modal('hide');
					$('#novedades').DataTable().ajax.reload();
				}else{
					alerta_div('error_alerta',resp_success['mensaje'],resp_success['error']);
					$('#name').get(0).value = "";
					$('#alternativo').get(0).value = "";
					$('#descripcion').get(0).value = "";
				}
			},
			error: function(respuesta){ alerta('Alerta!','Error de conectividad de red BAN-17');}
		});
	});
}

function guardar_banner_news(){

	var msj_error="";
	if( $('#name').get(0).value == "" ) msj_error+='Olvidó ingresar el nombre para identificar el banner.<br />';
	if( $('#status').get(0).value == "" ) msj_error+='Error al procesar la solicitud BAN-18.<br />';

	if( !msj_error == "" ){
		alerta_div('error_alerta','Error en la captura de datos.',msj_error);
		return false;
	}

	$(document).ready(function() {
		$.ajax({
			url: 'bannerperiodicos/agregar_banner_do',
			type: 'POST',
			data: $("#nuevo_banner").serialize(),
			dataType: 'json',
			success: function(resp_success){
				if (resp_success['resp'] == true) {
					$('#myModal').modal('hide');
					$('#periodicos').DataTable().ajax.reload();
				}else{
					alerta_div('error_alerta',resp_success['mensaje'],resp_success['error']);
					$('#name').get(0).value = "";
					$('#alternativo').get(0).value = "";
					$('#descripcion').get(0).value = "";
				}
			},
			error: function(respuesta){ alerta('Alerta!','Error de conectividad de red BAN-19');}
		});
	});
}










function editar_banner_main(){
	var msj_error="";
	if( $('#name').get(0).value == "" ) msj_error+='Olvidó ingresar el nombre para identificar el banner.<br />';
	if( $('#status').get(0).value == "" ) msj_error+='Error al procesar la solicitud BAN-20.<br />';
	if( !msj_error == "" ){
		alerta_div('error_alerta','Error en la captura de datos.',msj_error);
		return false;
	}
	$(document).ready(function() {
		$.ajax({
			url: 'bannermain/editbanner_do',
			type: 'POST',
			data: $("#elemento_editado").serialize(),
			dataType: 'json',
			success: function(resp_success){
				if (resp_success['resp'] == true) {
					$('#myModal').modal('hide');
					$('#main').DataTable().ajax.reload();
				}else{
					alerta_div('error_alerta',resp_success['mensaje'],resp_success['error']);
				}
			},
			error: function(respuesta){ alerta('Alerta!','Error de conectividad de red BAN-21');}
		});
	});
}
function editar_banner_act(){
	var msj_error="";
	if( $('#name').get(0).value == "" ) msj_error+='Olvidó ingresar el nombre para identificar el banner.<br />';
	if( $('#status').get(0).value == "" ) msj_error+='Error al procesar la solicitud BAN-22.<br />';
	if( !msj_error == "" ){
		alerta_div('error_alerta','Error en la captura de datos.',msj_error);
		return false;
	}
	$(document).ready(function() {
		$.ajax({
			url: 'banneractividades/editbanner_do',
			type: 'POST',
			data: $("#elemento_editado").serialize(),
			dataType: 'json',
			success: function(resp_success){
				if (resp_success['resp'] == true) {
					$('#myModal').modal('hide');
					$('#actividades').DataTable().ajax.reload();
				}else{
					alerta_div('error_alerta',resp_success['mensaje'],resp_success['error']);
				}
			},
			error: function(respuesta){ alerta('Alerta!','Error de conectividad de red BAN-23');}
		});
	});
}

function editar_banner_noti(){
	var msj_error="";
	if( $('#name').get(0).value == "" ) msj_error+='Olvidó ingresar el nombre para identificar el banner.<br />';
	if( $('#status').get(0).value == "" ) msj_error+='Error al procesar la solicitud BAN-24.<br />';
	if( !msj_error == "" ){
		alerta_div('error_alerta','Error en la captura de datos.',msj_error);
		return false;
	}
	$(document).ready(function() {
		$.ajax({
			url: 'bannernoticias/editbanner_do',
			type: 'POST',
			data: $("#elemento_editado").serialize(),
			dataType: 'json',
			success: function(resp_success){
				if (resp_success['resp'] == true) {
					$('#myModal').modal('hide');
					$('#noticias').DataTable().ajax.reload();
				}else{
					alerta_div('error_alerta',resp_success['mensaje'],resp_success['error']);
				}
			},
			error: function(respuesta){ alerta('Alerta!','Error de conectividad de red BAN-25');}
		});
	});
}

function editar_banner_nov(){
	var msj_error="";
	if( $('#name').get(0).value == "" ) msj_error+='Olvidó ingresar el nombre para identificar el banner.<br />';
	if( $('#status').get(0).value == "" ) msj_error+='Error al procesar la solicitud BAN-26.<br />';
	if( !msj_error == "" ){
		alerta_div('error_alerta','Error en la captura de datos.',msj_error);
		return false;
	}
	$(document).ready(function() {
		$.ajax({
			url: 'bannernovedades/editbanner_do',
			type: 'POST',
			data: $("#elemento_editado").serialize(),
			dataType: 'json',
			success: function(resp_success){
				if (resp_success['resp'] == true) {
					$('#myModal').modal('hide');
					$('#novedades').DataTable().ajax.reload();
				}else{
					alerta_div('error_alerta',resp_success['mensaje'],resp_success['error']);
				}
			},
			error: function(respuesta){ alerta('Alerta!','Error de conectividad de red BAN-27');}
		});
	});
}

function editar_banner_news(){
	var msj_error="";
	if( $('#name').get(0).value == "" ) msj_error+='Olvidó ingresar el nombre para identificar el banner.<br />';
	if( $('#status').get(0).value == "" ) msj_error+='Error al procesar la solicitud BAN-28.<br />';
	if( !msj_error == "" ){
		alerta_div('error_alerta','Error en la captura de datos.',msj_error);
		return false;
	}
	$(document).ready(function() {
		$.ajax({
			url: 'bannerperiodicos/editbanner_do',
			type: 'POST',
			data: $("#elemento_editado").serialize(),
			dataType: 'json',
			success: function(resp_success){
				if (resp_success['resp'] == true) {
					$('#myModal').modal('hide');
					$('#periodicos').DataTable().ajax.reload();
				}else{
					alerta_div('error_alerta',resp_success['mensaje'],resp_success['error']);
				}
			},
			error: function(respuesta){ alerta('Alerta!','Error de conectividad de red BAN-29');}
		});
	});
}
