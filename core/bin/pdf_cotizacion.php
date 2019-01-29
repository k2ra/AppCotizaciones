<?php


		$numcotiza = isset($_GET['num']) ? $_GET['num'] :  "";
		  
				 $xml =  simplexml_load_file("views/reports/cotizacion.jrxml");
		
				//unlink(filename,context)
				$PHPJasperXML = new PHPJasperXML();
				$PHPJasperXML->arrayParameter=array("numcotiza" => "'".$numcotiza."'");
				$PHPJasperXML->debugsql=false;
				$PHPJasperXML->xml_dismantle($xml);
	
				$PHPJasperXML->transferDBtoArray(DB_HOST,DB_USER,DB_PASS,DB_NAME);
				//$PHPJasperXML->outpage('F',$fileNL); //page output method I:standard output D:Download file, F =save as filename and submit 2nd parameter as destinate file name 
				$PHPJasperXML->outpage("I");    //page output method I:standard output  D:Download file

?>