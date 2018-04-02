<?php if ( ! defined( 'URL_APP' ) ) { exit; } ?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title><?=SITE_NAME?> - Ingreso</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Framedev"
            name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="<?=URL_PUBLIC?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=URL_PUBLIC?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=URL_PUBLIC?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=URL_PUBLIC?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?=URL_PUBLIC?>assets/global/plugins/ladda/ladda-themeless.min.css" rel="stylesheet" type="text/css" />
		<link href="<?=URL_PUBLIC?>assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=URL_PUBLIC?>assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?=URL_PUBLIC?>assets/global/css/components-md.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?=URL_PUBLIC?>assets/global/css/plugins-md.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="<?=URL_PUBLIC?>assets/pages/css/login-5.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class=" login">
        <!-- BEGIN : LOGIN PAGE 5-1 -->
        <div class="user-login-5">
            <div class="row bs-reset">
                <div class="col-md-6 bs-reset mt-login-5-bsfix">
                    <div class="login-bg" style="background-image:url(<?=URL_PUBLIC?>assets/pages/img/login/bg1.jpg)">
                        <img class="login-logo" height="30px" src="<?=URL_PUBLIC?>assets/images/framedev.svg" /> </div>
                </div>
                <div class="col-md-6 login-container bs-reset mt-login-5-bsfix">
                    <div class="login-content">
                        <img height="40px" src="<?=URL_PUBLIC?>assets/images/framedev.svg">
                        <p> Para ingresar identifiquese con sus credenciales. </p>
                        <form action="javascript:;" class="login-form" id="login">
                            <div class="alert alert-danger display-hide">
                                <button class="close" data-close="alert"></button>
                                <span>Debe escribir sus credenciales. </span>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <input class="form-control form-control-solid placeholder-no-fix form-group" type="text" autocomplete="off" placeholder="Usuario" name="usuario" id="usuario" onkeypress="valida_logeo(event,'noDec','2');" required/> </div>
                                <div class="col-xs-6">
                                    <input class="form-control form-control-solid placeholder-no-fix form-group" type="password" autocomplete="off" placeholder="Contraseña" name="password" id="password"  onkeypress="valida_logeo(event,'noDec','2');" required/> </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="rem-password">
                  										<div class="md-checkbox">
                  											<input type="checkbox" id="checkbox1" class="md-check">
                  											<label for="checkbox1">
                  												<span></span>
                  												<span class="check"></span>
                  												<span class="box"></span> Recordarme </label>
                  										</div>
                                    </div>
                                </div>
                                <div class="col-sm-8 text-right">
                                    <button onclick="valida_logeo(event,'noDec','1');" class="btn green">Enviar</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 text-left">
                                    <div class="forgot-password">
                                      <ul style="font-size:1.1em;margin-top:20px;line-height: 2em">
                                          <li><a href="<?=URL_APP?>site" class="forget-password">Sitio</a></li>
                                          <!--<li><a href="javascript:;" id="register-form" class="forget-password">Registrarse</a></li>
                                          <li><a href="javascript:;" id="forget-password" class="forget-password">¿Olvidó su contraseña?</a></li>-->
                                      </ul>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- BEGIN FORGOT PASSWORD FORM -->
                        <!--<form action="javascript:;"  class="forget-form" id="pass_forg">
                            <h3 class="font-green">¿ Olvidó su contraseña ?</h3>
                            <p> Ingrese su correo electronico para recuperar su contraseña. </p>
                            <div class="form-group">
                                <input id="correo" name="correo" class="form-control placeholder-no-fix form-group" type="text" autocomplete="off" placeholder="Correo electrónico de recuperación" name="email" /> </div>
                            <div class="form-actions">
                                <button type="button" id="back-btn" class="btn green btn-outline">Atras</button>
								<button id="form-submit" type="button" class="btn green mt-ladda-btn ladda-button pull-right" data-style="slide-down">
                                    <span class="ladda-label">Recuperar</span>
                                    <span class="ladda-spinner"></span>
								</button>
                            </div>
                     </form>-->
						<!--<form action="javascript:;"  class="register-form" id="register_form">
							 <h3 class="font-green">Ingrese los detalles de su cuenta</h3><br><br>
							<div class="form-group">
								<label class="control-label col-md-offset-1 col-md-4">Nombre de usuario
									<span class="required"> * </span>
								</label>
								<div class="col-md-4">
									<input type="text" class="form-control" name="username" />
									<span class="help-block"> Escriba su nombre de usuario </span>
								</div>

								<label class="control-label col-md-offset-1 col-md-4">Contraseña
									<span class="required"> * </span>
								</label>
								<div class="col-md-4">
									<input type="password" class="form-control" name="password" id="submit_form_password" />
									<span class="help-block"> Ingrese su contraseña </span>
								</div>

								<label class="control-label col-md-offset-1 col-md-4">Confirmar contraseña
									<span class="required"> * </span>
								</label>
								<div class="col-md-4">
									<input type="password" class="form-control" name="rpassword" />
									<span class="help-block"> Confirme su contraseña </span>
								</div>

								<label class="control-label col-md-offset-1 col-md-4">Correo electrónico
									<span class="required"> * </span>
								</label>
								<div class="col-md-4">
									<input type="text" class="form-control" name="email" />
									<span class="help-block"> Ingrese su correo electrónico </span>
								</div>
							</div>
                            <div class="col-md-offset-1 col-md-8 form-actions"><br><br>
                                <button type="button" id="back-btn2" class="btn green btn-outline">Atras</button>
                								<a class="btn green mt-ladda-btn ladda-button pull-right" data-style="slide-down">
                                    <span class="ladda-label">Registrarse</span>
                                    <span class="ladda-spinner"></span>
                								</a>
                            </div>
                     </form>-->
                        <!-- END FORGOT PASSWORD FORM -->
                    </div>
                    <div class="login-footer">
                        <div class="row bs-reset">
                            <div class="col-xs-5 bs-reset">
                                <ul class="login-social">
                                    <li>
                                        <a href="javascript:;">
                                            <i class="icon-social-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <i class="icon-social-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <i class="icon-social-dribbble"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-xs-7 bs-reset">
                                <div class="login-copyright text-right">
                                    <p>Copyright &copy; <?=SITE_NAME?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END : LOGIN PAGE 5-1 -->
        <!--[if lt IE 9]>
<script src="<?=URL_PUBLIC?>assets/global/plugins/respond.min.js"></script>
<script src="<?=URL_PUBLIC?>assets/global/plugins/excanvas.min.js"></script>
<script src="<?=URL_PUBLIC?>assets/global/plugins/ie8.fix.min.js"></script>
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="<?=URL_PUBLIC?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?=URL_PUBLIC?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?=URL_PUBLIC?>assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="<?=URL_PUBLIC?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?=URL_PUBLIC?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?=URL_PUBLIC?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?=URL_PUBLIC?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="<?=URL_PUBLIC?>assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="<?=URL_PUBLIC?>assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <script src="<?=URL_PUBLIC?>assets/global/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?=URL_PUBLIC?>assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?=URL_PUBLIC?>assets/pages/scripts/login-5.js" type="text/javascript"></script>
        <script src="<?=URL_PUBLIC?>assets/global/plugins/ladda/spin.min.js" type="text/javascript"></script>
        <script src="<?=URL_PUBLIC?>assets/global/plugins/ladda/ladda.min.js" type="text/javascript"></script>
		<script src="<?=URL_PUBLIC?>assets/pages/scripts/ui-buttons.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <!-- END THEME LAYOUT SCRIPTS -->
		<script>
			var url_app = '<?=URL_APP?>';
		</script>
		<script src="<?=URL_PUBLIC?>assets/js/generales.js"></script>
		<script src="<?=URL_PUBLIC?>assets/js/common.js"></script>
    </body>

</html>
