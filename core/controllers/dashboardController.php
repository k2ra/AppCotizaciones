<?php
$models = new cotizacion();

    switch (isset($_GET['mode'])? $_GET['mode'] : null) {
        case 'data':
            header('Content-type: application/json');
            $json[]= array("cotizaciones" => $models->cotizacionesxmes());
            $json[]= array("facturas" => $models->facturasxmes());
					
			echo  json_encode($json);
        break;
        default:
            include('html/dashboard.php');
        break;
    }
?>