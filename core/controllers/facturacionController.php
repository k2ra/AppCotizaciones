<?php
$models     = new cotizacion();
$factura    = new NumFactura();
//$reporte     = new Reporte();

    switch (isset($_GET['mode'])? $_GET['mode'] : null) {

        case "nueva": 
            if($_POST){
                header('Content-type: application/json');
                $numFactura = $factura->nuevoNumeroFactura();
                $json = array($models->insertaFactura($numFactura));
                
                echo  json_encode($json);
            }else if(isset($_GET['data'])){
                $resp =$models->detalleCotizacion();
                header('Content-type: application/json');
                echo json_encode($resp); 

            }else{
                $numFactura = $factura->nuevoNumeroFactura();
                include('html/facturacion.php');
            }
    
        break; 
        case "lista": 
                $resp = $models->listaFactura();
                include('html/listaFacturacion.php');

        break;

        case "reporte":
        
           include('core/bin/pdf_facturacion.php');
        
        break;
        
        default:
            $numFactura = $factura->nuevoNumeroFactura();
            include('html/facturacion.php');
        break;
        
    }
         


				

?>