// Initialize app
var myApp = new Framework7({
    swipeBackPage: !1,
    pushState: false,
	pushStatePreventOnLoad: true,
    swipePanel: "left",
    modalTitle: "Title",
	uniqueHistory: true,
	precompileTemplates: true
}), $$ = Dom7;

var mainView = myApp.addView(".view-main", {dynamicNavbar: !0});

$$("body").on("click", ".salir", function() {
	$.ajax({
		url: url_app + 'login/salirAlternativo',
		type: 'POST',
		dataType: "json",
		success: function(respuesta){
			if(respuesta[0].resp='correcto'){
				window.location = url_app +  "login";
			}else{
				myApp.alert('Intente finalizar el servicio cuando tenga datos', 'Sin conexión');
			}
		}, 
		error: function(){
			myApp.alert('Intente finalizar el servicio cuando tenga datos', 'Sin conexión');
		}
	});
});