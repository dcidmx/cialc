<?php if ( ! defined( 'URL_APP' ) ) { exit; } ?>
<!DOCTYPE html>
<html  lang="es">
<head>
		<meta charset="utf-8">
		<meta name="viewport"
			  content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">

		<link rel="apple-touch-icon" sizes="57x57" href="<?=FW7?>assets/img/favicons/apple-touch-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="<?=FW7?>assets/img/favicons/apple-touch-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="<?=FW7?>assets/img/favicons/apple-touch-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="<?=FW7?>assets/img/favicons/apple-touch-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="<?=FW7?>assets/img/favicons/apple-touch-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="<?=FW7?>assets/img/favicons/apple-touch-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="<?=FW7?>assets/img/favicons/apple-touch-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="<?=FW7?>assets/img/favicons/apple-touch-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="<?=FW7?>assets/img/favicons/apple-touch-icon-180x180.png">
		
		<link rel="icon" type="image/png" href="<?=FW7?>assets/img/favicons/favicon-32x32.png" sizes="32x32">
		<link rel="icon" type="image/png" href="<?=FW7?>assets/img/favicons/android-chrome-192x192.png" sizes="192x192">
		<link rel="icon" type="image/png" href="<?=FW7?>assets/img/favicons/favicon-96x96.png" sizes="96x96">
		<link rel="icon" type="image/png" href="<?=FW7?>assets/img/favicons/favicon-16x16.png" sizes="16x16">
		<!--<link rel="manifest" href="<?=FW7?>assets/img/favicons/manifest.json">-->
		<meta name="msapplication-TileColor" content="#2b5797">
		<meta name="msapplication-TileImage" content="<?=FW7?>assets/img/favicons/mstile-144x144.png">
		<meta name="theme-color" content="#ffffff">
		
        <title><?=SITE_NAME?></title>
        <link href="<?=MATERIAL?>vendors/bower_components/animate.css/animate.min.css" rel="stylesheet">
        <link href="<?=MATERIAL?>vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">
        <link href="<?=MATERIAL?>css/app.min.1.css" rel="stylesheet">
    </head>
    <body class="login-content">
		<div style="font-weight: 100; font-size:2em; color:#ffffff; z-index:9; position:absolute; top:40px; width:100%; text-align:center;">
			<br><br><img height="40px" src="assets/images/framedev.png">
		</div>
		
		<div class="lc-block toggled" id="l-login">
            <div class="input-group m-b-20">
                <span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
                <div class="fg-line">
                    <input id="usuario" name="usuario" type="text" class="form-control" placeholder="Usuario">
                </div>
            </div>
            <div class="input-group m-b-20">
                <span class="input-group-addon"><i class="zmdi zmdi-lock"></i></span>
                <div class="fg-line">
                    <input id="password" name="password" type="password" class="form-control" placeholder="Contraseña">
                </div>
            </div>
			<div class="checkbox">
				<label>
					<input checked id="remember" name="remember" type="checkbox">
					<i class="input-helper"></i>
					Recordar
				</label>
			</div>
            <div class="clearfix"></div>
            <a onclick="valida_logeo(event,'noDec','1');" href="#" class="btn btn-login btn-danger btn-float"><i class="zmdi zmdi-arrow-forward"></i></a>
        </div>
		
		<div class="lc-block toggled hidden" id="alertWindow">
            <div class="input-group m-b-20">
				<div class="titlelert">
                    Alerta
                </div>
				<br>
                <div class="tipalert" id="tipalert">
                    Algo salió mal, no se que es pero seguro que algo fallará o ya falló
                </div>
            </div>
            <div class="clearfix"></div>
            <a onclick="hideAlert();" href="#" class="btn btn-login btn-danger btn-float"><i class="zmdi zmdi-notifications-active animated infinite pulse zmdi-hc-fw mdc-text-blue" style="position:relative; top:2px; left:-1px;"></i></a>
        </div>
		
		<script>var url_app = '<?=URL_APP?>';</script>
        <script src="<?=MATERIAL?>vendors/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="<?=MATERIAL?>vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="<?=MATERIAL?>vendors/bower_components/Waves/dist/waves.min.js"></script>
        <script src="<?=MATERIAL?>js/functions.js"></script>
		<script src="<?=MATERIAL?>js/common.js"></script>
		
		<script src="<?=MATERIAL?>js/indexeddb.js"></script>
		
		<?php if(DEVELOPMENT){ ?>
		<style>
			body.login-content:before {
				background: #FFFFFF;
			}			
		</style>
		<?php } ?>		
    </body>
</html>