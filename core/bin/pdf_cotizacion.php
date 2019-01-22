<?php
define('DB_HOST','localhost');
define('DB_USER','UserCotiza');
define('DB_PASS','UserCotiza');
define('DB_NAME','cotizaciones');

require('../models/class.Conexion.php');
$db = new Conexion();

include_once('../../views/reports/class/tcpdf/tcpdf.php');
include_once("../../views/reports/class/PHPJasperXML.inc.php");
include_once('../../views/reports/class/setting.php');
//include 'models.php';
//$connect = new cotizacion();

	
//$connect = new cotizacion();

//Create object that referer a web services 
//$client = new nusoap_client($wsdl,true); 
 
 //$connect=mysqli_connect($server,$user,$pass,$db);

	$numcotiza = isset($_GET['num']) ? $_GET['num'] :  "";
    /*$id_aportacion = isset($_GET['id']) ? mysqli_real_escape_string($connect, $_GET['id']) :  "";
	$id_vivienda = isset($_GET['idv']) ? mysqli_real_escape_string($connect, $_GET['idv']) :  "";*/
	
 
	// $connect->connect();
	  
 			$xml =  simplexml_load_file("../../views/reports/cotizacion.jrxml");
	
//echo "aqui entre ";
			//unlink(filename,context)
			$PHPJasperXML = new PHPJasperXML();
			$PHPJasperXML->arrayParameter=array("numcotiza" => "'".$numcotiza."'");
			$PHPJasperXML->debugsql=false;
			$PHPJasperXML->xml_dismantle($xml);

			$PHPJasperXML->transferDBtoArray(DB_HOST,DB_USER,DB_PASS,DB_NAME);
			//$PHPJasperXML->outpage('F',$fileNL); //page output method I:standard output D:Download file, F =save as filename and submit 2nd parameter as destinate file name 
			$PHPJasperXML->outpage("I");    //page output method I:standard output  D:Download file
 

?>