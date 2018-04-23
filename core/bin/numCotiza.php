<?php


define('DB_HOST','localhost');
define('DB_USER','UserCotiza');
define('DB_PASS','UserCotiza');
define('DB_NAME','cotizaciones');

require('../models/class.Conexion.php');
$db = new Conexion();



	$queryid= "SELECT MAX(id_cotizacion) AS id FROM tbl_cotizaciones order by id_cotizacion desc";

	
	$result = $db->query($queryid);
	$stringcotiza="COT_";
	//echo $result;
	if ($db->rows($result) > 0) {
    // output data of each row
    while($row = $db->recorrer($result)) {
        $numcotiza=substr ($row["id"],-4) + 1;
        $num =substr("0000" . $numcotiza,-4);
        $stringcotiza=substr ($row["id"],0,4);
        if (!$stringcotiza){
        	$stringcotiza="COT_";
        }
        echo $stringcotiza, $num;
    }
	} else {
    echo "0 results";
	}

    $db->close();
	

?>