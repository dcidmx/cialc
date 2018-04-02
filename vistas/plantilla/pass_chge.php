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
        <link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/css/components-md.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="assets/global/css/plugins-md.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/pages/css/coming-soon.min.css" rel="stylesheet" type="text/css" />
        <link rel="icon" href="<?=FW7?>assets/img/favicons/favicon-32x32.png" />
	</head>
    <body class="">
        <div class="container">
            <div class="row">
                <div class="col-md-12 coming-soon-header">
                    <a class="brand" href="index.html">
                        <img height="50px" src="assets/images/framedev.png" class="logo-default"> </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 coming-soon-content">
                    <h1>Se requiere cambio de contraseña</h1>
                    <p> Para continuar usando su cuenta es necesario que realice un cambio de contraseña, el cambio de contraseña le permitirá tener mayor seguridad al usar su cuenta y asegurarse que solo usted tiene acceso a ella. </p>
                    <br>
                    <form class="form-inline" id="chge_pass">
                        <div class="input-group input-group-lg">
							<div class="input-group input-group-lg">
								<span class="input-group-addon" id="sizing-addon1"><i class="fa fa-lock"></i></span>
								<input id="password1" name="password1" type="password" class="form-control" placeholder="Contraseña" aria-describedby="sizing-addon1"> 
							</div><br><br>
							<div class="input-group input-group-lg">
								<span class="input-group-addon" id="sizing-addon1"><i class="fa fa-lock"></i></span>
								<input id="password2" name="password2" type="password" class="form-control" placeholder="Confirmar contraseña" aria-describedby="sizing-addon1"> 
							</div><br><br>
							<a href="javascript:;" onclick="cambiar_pass();" class="btn btn-lg green"> Cambiar </a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 coming-soon-footer"> 2017 &copy; <?=SITE_NAME?> </div>
            </div>
        </div>
        <!--[if lt IE 9]>
<script src="assets/global/plugins/respond.min.js"></script>
<script src="assets/global/plugins/excanvas.min.js"></script> 
<script src="assets/global/plugins/ie8.fix.min.js"></script> 
<![endif]-->
        <script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/countdown/jquery.countdown.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
        <script src="assets/global/scripts/app.min.js" type="text/javascript"></script>
        <script src="assets/pages/scripts/coming-soon.min.js" type="text/javascript"></script>
		
		<script>
			var url_app = '<?=URL_APP?>';
		</script>
		<script src="<?=URL_PUBLIC?>assets/js/generales.js"></script>
		<script src="<?=URL_PUBLIC?>assets/js/common.js"></script>	
		<script src="<?=URL_PUBLIC?>assets/js/usuario.js"></script>	
		
    </body>

</html>
