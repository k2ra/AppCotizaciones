<?php

	$numfactura =isset($_GET['factura']) ? $_GET['factura'] :  "";;
	
	$xml =  simplexml_load_file("views/reports/detalleFactura.jrxml");

	//echo REPORTE_BANNER_FACTURA;
	//unlink(filename,context)
	$PHPJasperXML = new PHPJasperXML();
	$PHPJasperXML->arrayParameter=array("banner1" => REPORTE_BANNER_FACTURA, "numfactura" => "'".$numfactura."'");
	$PHPJasperXML->debugsql=false;
	$PHPJasperXML->xml_dismantle($xml);

	$PHPJasperXML->transferDBtoArray(DB_HOST,DB_USER,DB_PASS,DB_NAME);
	//$PHPJasperXML->outpage('F',$fileNL); //page output method I:standard output D:Download file, F =save as filename and submit 2nd parameter as destinate file name 
	$PHPJasperXML->outpage("I");    //page output method I:standard output  D:Download file
	

?>