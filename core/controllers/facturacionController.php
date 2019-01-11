<?php
$models = new cotizacion();

    switch (isset($_GET['mode'])? $_GET['mode'] : null) {

        case "nueva": 
            if($_POST){
                header('Content-type: application/json');
                $json = array($models->cotizacionesxmes());
                
                echo  json_encode($json);
            }else if(isset($_GET['data'])){
                $resp =$models->detalleCotizacion();
                header('Content-type: application/json');
                echo json_encode($resp); 

            }else{
                    include('html/facturacion.php');
            }
    
        break; 
        case "lista": 
            if($_POST){
                header('Content-type: application/json');
                $json = array($models->cotizacionesxmes());
                
                echo  json_encode($json);
            }else{
                    include('html/listaFacturacion.php');
            }

        break; 
        
        default:
            include('html/facturacion.php');
        break;
        
    }
         


				

?>