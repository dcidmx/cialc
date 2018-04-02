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
        <link href="../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/css/components-md.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="../assets/global/css/plugins-md.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/pages/css/lock-2.min.css" rel="stylesheet" type="text/css" />
        <link rel="icon" href="<?=FW7?>assets/img/favicons/favicon-32x32.png" />
    <body class="">
        <div class="page-lock">
            <div class="page-logo">
                <a class="brand" href="index.html">
                    <img height="30px" src="../assets/images/framedev.png" class="logo-default"> </a>
            </div>
            <div class="page-body">
                <img class="page-lock-img" src="../plugs/timthumb.php?src=tmp/<?=$avatar?>&w=300" alt="">
                <div class="page-lock-info">
                    <h1><?=$usuario_name?></h1>
                    <span class="email"><?=$correo?></span>
                    <span class="locked"> Sesión asegurada </span>
                    <form class="form-inline">
                        <div class="input-group input-medium">
                            <input type="hidden" name="usuario" id="usuario" value="<?=$username?>"/>
							
							<input class="form-control" type="password" placeholder="Contraseña" name="password" id="password"  onkeypress="valida_logeo(event,'noDec','2');" required/>

                            <span class="input-group-btn">
                                <a onclick="valida_logeo(event,'noDec','1');" class="btn green icn-only">
                                    <i class="m-icon-swapright m-icon-white"></i>
                                </a>
                            </span>
                        </div>
                        <div class="relogin">
                            <a href="../">¿ No eres  <?=$usuario['nombres']?> ?</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="page-footer-custom"> 2017 &copy; <?=SITE_NAME?> </div>
        </div>
        <!--[if lt IE 9]>
		<script src="../assets/global/plugins/respond.min.js"></script>
		<script src="../assets/global/plugins/excanvas.min.js"></script> 
		<script src="../assets/global/plugins/ie8.fix.min.js"></script> 
		<![endif]-->
        <script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
        <script src="../assets/global/scripts/app.min.js" type="text/javascript"></script>
        <script src="../assets/pages/scripts/lock-2.js" type="text/javascript"></script>
		
		<script>var url_app = '<?=URL_APP?>';</script>

		<script src="<?=URL_PUBLIC?>assets/js/generales.js"></script>
		<script src="<?=URL_PUBLIC?>assets/js/common.js"></script>			
    </body>

</html>
