<?php
$models = new cotizacion();
$factura = new NumFactura();

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
            if($_POST){
                header('Content-type: application/json');
                $json = array($models->cotizacionesxmes());
                
                echo  json_encode($json);
            }else{
                    $resp = $models->listaFactura();
                    
                    include('html/listaFacturacion.php');
            }

        break; 
        
        default:
            $numFactura = $factura->nuevoNumeroFactura();
            include('html/facturacion.php');
        break;
        
    }
         


				

?>