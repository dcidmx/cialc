function salir(){
	$.ajax({
		url: url_app + 'login/salir',
		type: 'POST',
		dataType: "json",
		success: function(respuesta){
			if(respuesta[0].resp='correcto'){
				window.location = url_app +  "site";
			}else{
				alerta('Alerta!','Error en el sistema');
			}
		},
		error: function(){alerta('Alerta!','Error de conectividad de red CIALC-01');}
	});
}
function alerta(header,body){

	var modal =
	'<div class="modal fade" id="myModal" tabindex="-1" role="dialog"'+
		'aria-labelledby="myModalLabel" aria-hidden="true">'+
		'<div class="modal-dialog">'+
			'<div class="modal-content">'+
				'<div class="modal-header">'+
					'<button type="button" class="close" data-dismiss="modal"+ aria-hidden="true">×</button>'+
					'<h4 class="modal-title" id="myModalLabel">'+header+'</h4>'+
				  '</div>'+
				'<div class="modal-body">'+
					''+ body +''+
				'</div>'+
				'<div class="modal-footer">'+
					'<button data-dismiss="modal" class="btn btn-ar btn-default" type="button">Cerrar</button>'+
				'</div>'+
			'</div>'+
		'</div>'+
	'</div>';
	$(modal).modal().on('shown.bs.modal',function(){
		//console.log(modal);
	}).on('hidden.bs.modal',function(){
		$(this).remove();
	});

}
