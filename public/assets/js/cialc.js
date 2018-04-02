function agregar_proyecto(){
	$(document).ready(function() {
		$.ajax({
			url: 'cialc/agregar_proyecto',
			dataType: 'html',
				success: function(resp_success){
					var modal =  resp_success;
					$(modal).modal().on('shown.bs.modal',function(){
						//console.log(modal);
					}).on('hidden.bs.modal',function(){
						$(this).remove();
					});
				},
			error: function(respuesta){ alerta('Alerta!','Error de conectividad de red CIALC-01');}
		});
	} );
}


function editar_proyecto(id_tabla){
   $('#'+ id_tabla).dataTable();
   $('#'+ id_tabla +' tbody').on('click', 'tr', function () {
          var id = $('td', this).eq(0).text();
          $.ajax({
						url: 'cialc/editar_proyecto/' + id,
						dataType: 'html',
							success: function(resp_success){
								var modal =  resp_success;
								$(modal).modal().on('shown.bs.modal',function(){
									//console.log(modal);
								}).on('hidden.bs.modal',function(){
									$(this).remove();
								});
							},
						error: function(respuesta){ alerta('Alerta!','Error de conectividad de red CIALC-03');}
					});
   } );
}

function agregar_proyecto_do(){
  var msj_error="";
  if( $('#investigador').get(0).value == "" ) msj_error+='Olvidó ingresar el nombre del investigador.<br />';
  if( $('#lineas').get(0).value == "" )	msj_error+='Olvidó ingresar las líneas de investigación.<br />';
  if( $('#area').get(0).value == "")	msj_error+='Olvidó ingresar el área.<br />';
  if( $('#proyecto').get(0).value == "")	msj_error+='Olvidó ingresar el nombre del proyecto.<br />';
	if( $('#descripcion').get(0).value == "")	msj_error+='Olvidó ingresar la descripción del proyecto.<br />';
  if( !msj_error == "" ){
    alerta_div('error_alerta','Error en la captura de datos.',msj_error);
    return false;
  }
  $(document).ready(function() {
    $.ajax({
      url: 'cialc/agregar_proyecto_do',
      type: 'POST',
      data: $("#nuevo_proyecto").serialize(),
      dataType: 'json',
      success: function(resp_success){
        if (resp_success['resp'] == true) {
          $('#myModal').modal('hide');
          $('#proyectos').DataTable().ajax.reload();
        }else{
          alerta_div('error_alerta',resp_success['mensaje'],resp_success['error']);
        }
      },
      error: function(respuesta){ alerta('Alerta!','Error de conectividad de red CIALC-04');}
    });
  });
}

function editar_proyecto_do(){
  var msj_error="";
	if( $('#investigador').get(0).value == "" ) msj_error+='Olvidó ingresar el nombre del investigador.<br />';
  if( $('#lineas').get(0).value == "" )	msj_error+='Olvidó ingresar las líneas de investigación.<br />';
  if( $('#area').get(0).value == "")	msj_error+='Olvidó ingresar el área.<br />';
  if( $('#proyecto').get(0).value == "")	msj_error+='Olvidó ingresar el nombre del proyecto.<br />';
	if( $('#descripcion').get(0).value == "")	msj_error+='Olvidó ingresar la descripción del proyecto.<br />';
  if( !msj_error == "" ){
    alerta_div('error_alerta','Error en la captura de datos.',msj_error);
    return false;
  }
  $(document).ready(function() {
    $.ajax({
      url: 'cialc/editar_proyecto_do',
      type: 'POST',
      data: $("#editar_proyecto").serialize(),
      dataType: 'json',
      success: function(resp_success){
        if (resp_success['resp'] == true) {
          $('#myModal').modal('hide');
          $('#proyectos').DataTable().ajax.reload();
        }else{
          alerta_div('error_alerta',resp_success['mensaje'],resp_success['error']);
        }
      },
      error: function(respuesta){ alerta('Alerta!','Error de conectividad de red CIALC-05');}
    });
  });
}

function chk_stat_pyct(){
	if($("#chk_cat_elm").is(':checked')) {
		$('#cat_status').get(0).value = "3";
	} else {
		$('#cat_status').get(0).value = "4";
	}
}

function chk_stat_sem(){
	if($("#chk_cat_elm").is(':checked')) {
		$('#cat_status').get(0).value = "3";
	} else {
		$('#cat_status').get(0).value = "4";
	}
}

function editar_seminario(id_tabla){
   $('#'+ id_tabla).dataTable();
   $('#'+ id_tabla +' tbody').on('click', 'tr', function () {
          var id = $('td', this).eq(0).text();
          $.ajax({
						url: 'cialc/editar_seminario/' + id,
						dataType: 'html',
							success: function(resp_success){
								var modal =  resp_success;
								$(modal).modal().on('shown.bs.modal',function(){
									//console.log(modal);
								}).on('hidden.bs.modal',function(){
									$(this).remove();
								});
							},
						error: function(respuesta){ alerta('Alerta!','Error de conectividad de red CIALC-06');}
					});
   } );
}

function editar_seminario_do(){
  var msj_error="";
	if( $('#investigador').get(0).value == "" ) msj_error+='Olvidó ingresar el nombre del investigador.<br />';
  if( $('#seminario').get(0).value == "")	msj_error+='Olvidó ingresar el seminario.<br />';

  if( !msj_error == "" ){
    alerta_div('error_alerta','Error en la captura de datos.',msj_error);
    return false;
  }
  $(document).ready(function() {
    $.ajax({
      url: 'cialc/editar_seminario_do',
      type: 'POST',
      data: $("#editar_seminario").serialize(),
      dataType: 'json',
      success: function(resp_success){
        if (resp_success['resp'] == true) {
          $('#myModal').modal('hide');
          $('#seminarios').DataTable().ajax.reload();
        }else{
          alerta_div('error_alerta',resp_success['mensaje'],resp_success['error']);
        }
      },
      error: function(respuesta){ alerta('Alerta!','Error de conectividad de red CIALC-07');}
    });
  });
}

function agregar_seminario(){
	$(document).ready(function() {
		$.ajax({
			url: 'cialc/agregar_seminario',
			dataType: 'html',
				success: function(resp_success){
					var modal =  resp_success;
					$(modal).modal().on('shown.bs.modal',function(){
						//console.log(modal);
					}).on('hidden.bs.modal',function(){
						$(this).remove();
					});
				},
			error: function(respuesta){ alerta('Alerta!','Error de conectividad de red CIALC-08');}
		});
	} );
}

function agregar_seminario_do(){
  var msj_error="";
  if( $('#investigador').get(0).value == "" ) msj_error+='Olvidó ingresar el nombre del investigador.<br />';
  if( $('#seminario').get(0).value == "" )	msj_error+='Olvidó ingresar el seminario.<br />';
  if( !msj_error == "" ){
    alerta_div('error_alerta','Error en la captura de datos.',msj_error);
    return false;
  }
  $(document).ready(function() {
    $.ajax({
      url: 'cialc/agregar_seminario_do',
      type: 'POST',
      data: $("#nuevo_seminario").serialize(),
      dataType: 'json',
      success: function(resp_success){
        if (resp_success['resp'] == true) {
          $('#myModal').modal('hide');
          $('#seminarios').DataTable().ajax.reload();
        }else{
          alerta_div('error_alerta',resp_success['mensaje'],resp_success['error']);
        }
      },
      error: function(respuesta){ alerta('Alerta!','Error de conectividad de red CIALC-09');}
    });
  });
}
