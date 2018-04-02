<?php
define('DEVELOPMENT', false, true);
define('DIR_FILES','/var/www/html/cialc',true);

define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'cialc');
define('DB_USER', 'root');
define('DB_PASS', 'kls2qr824');

define('DOMAIN','www.cialc.unam.mx');
define('URL_APP','http://'.DOMAIN.'/',true);
define('SITE_NAME','CIALC',true);
define('SLOGAN_NAME','Centro de Investigaciones sobre América Latina y el Caribe',true);


/*Configuracion para envio de correo via perl mail*/
define('MAIL_HOST','smtp.gmail.com');
define('MAIL_USERNAME','*************');
define('MAIL_PASSWORD','*************');
define('MAIL_FROM','CIALC');


/*Zona horaria*/
date_default_timezone_set('America/Mexico_City');

/*Variables*/
define('URL_MAIN','../',true);
define('URL_CONTROLADOR','../Framedev/Controladores/',true);
define('URL_MODELO','../Framedev/Modelos/',true);
define('URL_VISTA','../vistas/',true);
define('URL_TEMPLATE','../vistas/plantilla/',true);
define('SITE','../vistas/site/',true);
define('URL_PUBLIC',URL_APP.'',true);


/*Móvil*/
define('URL_TEMPLATE_FW7','../vistas/framework7/',true);
define('FW7',URL_PUBLIC.'fw7/',true);
define('MATERIAL',URL_PUBLIC.'material/',true);

//API DE GOOGLE MAPS
define('GOOGLE_MAPS','XXXXXXXXXXXXXXXXXXXXXXX',false);
?>
