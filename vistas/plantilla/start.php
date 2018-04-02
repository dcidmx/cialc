<?php if ( ! defined( 'URL_APP' ) ) { exit; } ?>
<!DOCTYPE html>
<html lang="es">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
       <title><?=SITE_NAME?></title>
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
		<link href="<?=URL_PUBLIC?>assets/global/plugins/bootstrap-touchspin/bootstrap.touchspin.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->

        <link href="<?=URL_PUBLIC?>assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
        <link href="<?=URL_PUBLIC?>assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=URL_PUBLIC?>assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />

		<link href="<?=URL_PUBLIC?>assets/pages/css/profile.min.css" rel="stylesheet" type="text/css" />

		<link href="<?=URL_PUBLIC?>assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=URL_PUBLIC?>assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />

        <link href="<?=URL_PUBLIC?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=URL_PUBLIC?>assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=URL_PUBLIC?>assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=URL_PUBLIC?>assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=URL_PUBLIC?>assets/global/plugins/clockface/css/clockface.css" rel="stylesheet" type="text/css" />
		<link href="<?=URL_PUBLIC?>assets/global/plugins/bootstrap-summernote/summernote.css" rel="stylesheet" type="text/css" />

        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?=URL_PUBLIC?>assets/global/css/components-md.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?=URL_PUBLIC?>assets/global/css/plugins-md.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="<?=URL_PUBLIC?>assets/layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=URL_PUBLIC?>assets/layouts/layout/css/themes/light2.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="<?=URL_PUBLIC?>assets/layouts/layout/css/custom.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
    <!-- END HEAD -->

		<!--Icon-->
		<link rel="icon" href="<?=FW7?><?=URL_PUBLIC?>assets/img/favicons/favicon-32x32.png" />

		<!-- Estilo de sitio -->
		<link rel="stylesheet" href="<?=URL_PUBLIC?>assets/css/aplicacion.css" >
		<link rel="stylesheet" href="<?=URL_PUBLIC?>assets/css/animate.min.css" media="screen">

		<!-- Javascript -->
		<script>var url_app = '<?=URL_APP?>';</script>

		<?php if(DEVELOPMENT){ ?>
		<style>
			.navbar {
				background: #FF6C00;
			}
			.ace-nav > li.light-blue > a {
				background-color: #FF6C00;
			}
			.ace-nav > li.light-blue > a:hover, .ace-nav > li.light-blue > a:focus, .ace-nav > li.open.light-blue > a {
				background-color: #FF6C00;
			}
		</style>
		<?php } ?>
	</head>
	<?php include ('body.php');?>
</html>
