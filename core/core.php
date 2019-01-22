<?php

session_start();

define('DB_HOST','localhost');
define('DB_USER','UserCotiza');
define('DB_PASS','UserCotiza');
define('DB_NAME','cotizaciones');
/*produccion
define('DB_USER','solution_survey');
define('DB_PASS','solution_survey');
define('DB_NAME','solution_survey');
*/
define('HTML_DIR','html/');
define('APP_URL','http://'. $_SERVER['SERVER_NAME'].'/demos/AppCotizaciones/');
//define('APP_URL','http://'. $_SERVER['SERVER_NAME'].'/encuesta/');

//define('QUANTITY_QTS',3);

require('core/models/class.Conexion.php');
require('core/models/models.php');
require('core/bin/numFactura.php');
require('views/reports/class/tcpdf/tcpdf.php');
require("views/reports/class/PHPJasperXML.inc.php");
require('views/reports/class/setting.php');

?>