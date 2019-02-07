<?php

session_start();

define('DB_HOST','localhost');
define('DB_USER','UserCotiza');
define('DB_PASS','UserCotiza');
define('DB_NAME','cotizaciones');

define('HTML_DIR','html/');
define('APP_URL','http://'. $_SERVER['SERVER_NAME'].'/demos/AppCotizaciones/');
//define('REPORTE_BANNER_FACTURA','http://'.$_SERVER['SERVER_NAME'].'/demos/AppCotizaciones/views/reports/anmar.jpg'); 
define('REPORTE_BANNER_FACTURA','C:\\wamp3\\www\\demos\\AppCotizaciones\\views\\reports\\anmar.jpg'); 
define('REPORTE_BANNER_COTIZACION','C:\\wamp3\\www\\demos\\AppCotizaciones\\views\\reports\\anmar.jpg'); 

//define('APP_URL','http://'. $_SERVER['SERVER_NAME'].'/encuesta/');



require('core/models/class.Conexion.php');
require('core/models/models.php');
require('core/bin/numFactura.php');
require('core/bin/numCotiza.php');
require('views/reports/class/tcpdf/tcpdf.php');
require("views/reports/class/PHPJasperXML.inc.php");
require('views/reports/class/setting.php');


?>