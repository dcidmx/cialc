<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?=SITE_NAME?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Framedev"
            name="description" />
        <meta content="" name="author" />
        <link href="<?=URL_PUBLIC?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=URL_PUBLIC?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=URL_PUBLIC?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=URL_PUBLIC?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=URL_PUBLIC?>assets/global/css/components-md.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?=URL_PUBLIC?>assets/global/css/plugins-md.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=URL_PUBLIC?>assets/pages/css/coming-soon.min.css" rel="stylesheet" type="text/css" />
        <link rel="icon" href="<?=FW7?><?=URL_PUBLIC?>assets/img/favicons/favicon-32x32.png" />
	</head>
    <body class="">
        <div class="container">
            <div class="row">
                <div class="col-md-12 coming-soon-header">
                    <a class="brand" href="index.html">
                        <img height="50px" src="<?=URL_PUBLIC?>assets/images/framedev.png" class="logo-default"> </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 coming-soon-content">
                    <h1>Solicitud para reestablecer contraseña</h1>
                    <p> <?=SITE_NAME?>&nbsp; no guarda sus contraseñas por lo cual no es posible enviarle su contraseña actual, en lugar de esto debe proporcionarnos una nueva contraseña para enlazarla a su cuenta de usuario, por favor proporcione sus nuevas credenciales. </p>
                    <br>
                    <form class="form-inline" id="reset">
                        <div class="input-group input-group-lg">
						
							<div class="input-group input-group-lg">
								<span class="input-group-addon" id="sizing-addon1"><i class="fa fa-lock"></i></span>
								<input onkeypress="reset_pass(event,'noDec','2');" id="password" name="password" type="password" class="form-control" placeholder="Contraseña" aria-describedby="sizing-addon1"> 
							</div><br><br>
							
							<div class="input-group input-group-lg">
								<span class="input-group-addon" id="sizing-addon1"><i class="fa fa-lock"></i></span>
								<input onkeypress="reset_pass(event,'noDec','2');" id="password2" name="password2" type="password" class="form-control" placeholder="Confirmar contraseña" aria-describedby="sizing-addon1"> 
							</div><br><br>
							
							<input type="hidden" id="token" name="token" value="<?php echo $token_valid['token']; ?>"/>
							<input type="hidden" id="id_usuario" name="id_usuario" value="<?php echo $token_valid['id_usuario']; ?>"/>
							<input type="hidden" id="correo" name="correo" value="<?php echo $token_valid['correo']; ?>"/>	
							
							<a href="javascript:;" onclick="reset_pass(event,'noDec','1');" class="btn btn-lg green"> Restaurar </a>
							
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 coming-soon-footer"> 2017 &copy; <?=SITE_NAME?> </div>
            </div>
        </div>
        <!--[if lt IE 9]>
<script src="<?=URL_PUBLIC?>assets/global/plugins/respond.min.js"></script>
<script src="<?=URL_PUBLIC?>assets/global/plugins/excanvas.min.js"></script> 
<script src="<?=URL_PUBLIC?>assets/global/plugins/ie8.fix.min.js"></script> 
<![endif]-->
        <script src="<?=URL_PUBLIC?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?=URL_PUBLIC?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?=URL_PUBLIC?>assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="<?=URL_PUBLIC?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?=URL_PUBLIC?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?=URL_PUBLIC?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <script src="<?=URL_PUBLIC?>assets/global/plugins/countdown/jquery.countdown.min.js" type="text/javascript"></script>
        <script src="<?=URL_PUBLIC?>assets/global/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
        <script src="<?=URL_PUBLIC?>assets/global/scripts/app.min.js" type="text/javascript"></script>
		<script>
			var url_app = '<?=URL_APP?>';
			var ComingSoon = function () {

				return {
					//main function to initiate the module
					init: function () {
						var austDay = new Date();
						austDay = new Date(austDay.getFullYear() + 1, 1 - 1, 26);
						$('#defaultCountdown').countdown({until: austDay});
						$('#year').text(austDay.getFullYear());

						$.backstretch([
								url_app+"assets/pages/media/bg/1.jpg",
								url_app+"assets/pages/media/bg/2.jpg",
								url_app+"assets/pages/media/bg/3.jpg",
								url_app+"assets/pages/media/bg/4.jpg"
							], {
							fade: 1000,
							duration: 10000
					   });
					}

				};

			}();

			jQuery(document).ready(function() {    
			   ComingSoon.init(); 
			});		
		</script>
		<script src="<?=URL_PUBLIC?>assets/js/generales.js"></script>
		<script src="<?=URL_PUBLIC?>assets/js/common.js"></script>	
		<script src="<?=URL_PUBLIC?>assets/js/usuario.js"></script>	
		
    </body>

</html>
