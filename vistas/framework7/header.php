<?php if ( ! defined( 'URL_APP' ) ) { exit; } ?>
<!DOCTYPE html>
<html lang="es">
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

    <link rel="stylesheet" href="<?=FW7?>libs/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=FW7?>libs/framework7/dist/css/framework7.ios.min.css">
    <link rel="stylesheet" href="<?=FW7?>libs/swipebox/src/css/swipebox.css">

    <link rel="stylesheet" href="<?=FW7?>assets/css/app.css?v="<?=$token_cache?>>
	<?php if(DEVELOPMENT){ ?>
	<style>
		.navbar-inner, .toolbar-inner {
			color: #ffffff;
			background-color: #FF6C00;
		}			
	</style>
	<?php } ?>		
</head>
<?php
include_once('body.php');
?>
</html>