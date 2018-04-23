<?php

//include 'C:\wamp\www\AppCotizaciones\Theme\bin\models.php';


	$models = new cotizacion();

  

        	if($_SERVER['REQUEST_METHOD'] == "POST"){
        		$usr = isset($_POST['userId']) ? mysqli_real_escape_string(new Conexion(), $_POST['userId']) :  "";
        		$password = isset($_POST['pass']) ? mysqli_real_escape_string(new Conexion(), $_POST['pass']) :  "";
        		
        	}


        if($_POST){
        	$resp = $models->validaCredenciales($usr, $password);
        	

        	if($resp){
        		//header('Location: ../../dashboard.php?resp='.$resp);
               header('Location: ?view=cotizacionAdd&mode=dashboard');
            $_SESSION['user']=$resp;
            //echo $_SESSION['user'];

        	}else if($resp="invalido") {
            header('Location: ?error=1');
               // include('login.php?error=1');
             
            
        	}
        }else{
            include('html/login.php');
        }

   

	/*switch ($valida) {
                case "newprod": {

                    echo $models->insertaProductos($descripcion, $precio, $fecha);
					
                }break;
                case "search": {
                	$resp = $models->buscaDatosClie($telefono);
                	if( count($resp) ==""){
                		echo "0 resultados";
                	}else{

                		header('Content-type: application/json');
                		$json = array('datos' => $models->buscaDatosClie($telefono));
                  		echo  json_encode($json);
                  		
                	}
					//print_r($resp);
                }break;
                
    }*/

?>