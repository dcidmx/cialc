function carga_archivo(div_contenedor,ruta,parametros){
	$('#preloader').html('<span><img src="public/img/loading.gif"></span>');
	$('#'+div_contenedor).load(ruta,parametros, function(){
		$('#preloader').html('');
	});
}
function limpia_div(div){
	$('#'+div).html('');
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
function set_menu_active(id_menu) {
	$("#sidebar li").each(function(indice, elemento) {
		$(this).removeClass("active");
	});
	$( "#"+id_menu ).addClass( "active" );
}

var normalize = (function() {
  var from = "ÃÀÁÄÂÈÉËÊÌÍÏÎÒÓÖÔÙÚÜÛãàáäâèéëêìíïîòóöôùúüûÑñÇç", 
      to   = "AAAAAEEEEIIIIOOOOUUUUaaaaaeeeeiiiioooouuuunncc",
      mapping = {};
 
  for(var i = 0, j = from.length; i < j; i++ )
      mapping[ from.charAt( i ) ] = to.charAt( i );
 
  return function( str ) {
      var ret = [];
      for( var i = 0, j = str.length; i < j; i++ ) {
          var c = str.charAt( i );
          if( mapping.hasOwnProperty( str.charAt( i ) ) )
              ret.push( mapping[ c ] );
          else
              ret.push( c );
      }      
      return ret.join( '' );
  }
 
})();

$(function() {
	$('#form-submit').click(function(e){
	 	e.preventDefault();
	 	var l = Ladda.create(this);
	 	l.start();
               $.ajax({
                url: url_app + 'login/recuperar_datos',
                type: 'POST',
                data: 'correo='+$('#correo').get(0).value,
                dataType: "json",
                success: function(respuesta){ 
          	        if(respuesta[0].resp=='enviado'){
						$('#correo').value="";
						alerta('Alerta!','Se le ha enviado un correo con las instrucciones para ingresar a su cuenta.');  
					}else if(respuesta[0].resp=='insert'){
						$('#correo').value="";
						alerta('Alerta!','Pear no esta instalado en el sistema, se inserto la consulta pero no se ha enviado el correo'); 
					}else if(respuesta[0].resp=="no_existe"){
          		      $('#correo').value="";
          		      alerta('Alerta!','No existe ninguna cuenta relacionada al correo');          	 	     
          	        }

               }, 
               error: function(){ alerta('Alerta!','Ocurrio un error, verifique la instalación de Pear.');l.stop(); }
              }).always(function() { l.stop(); });
	 	return false;
	});
});