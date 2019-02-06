<?php

$models = new cotizacion();
$numCotizacion = new NumCotizacion();

if(isset($_SESSION['user'])) {
	$valida =isset($_GET['mode'])? mysqli_real_escape_string(new Conexion(), $_GET['mode']) :  "";


			if($_SERVER['REQUEST_METHOD'] == "POST"){
				$id = isset($_POST['id']) ? mysqli_real_escape_string(new Conexion(), $_POST['id']) :  "";
				$cliente = isset($_POST['txtCliente']) ? mysqli_real_escape_string(new Conexion(), $_POST['txtCliente']) :  "";
				$empresa= isset($_POST['txtEmpresa']) ? mysqli_real_escape_string(new Conexion(), $_POST['txtEmpresa']) :  "";
				$telefono= isset($_POST['txtTelefono']) ? mysqli_real_escape_string(new Conexion(), $_POST['txtTelefono']) :  "";
				$correo  = isset($_POST['txtCorreo']) ? mysqli_real_escape_string(new Conexion(), $_POST['txtCorreo']) :  "";
				$subtotal= isset($_POST['txtsubtotal']) ? mysqli_real_escape_string(new Conexion(), $_POST['txtsubtotal']) :  "";
				$impuesto= isset($_POST['txtitbms']) ? mysqli_real_escape_string(new Conexion(), $_POST['txtitbms']) :  "";
				$total  = isset($_POST['txttotal']) ? mysqli_real_escape_string(new Conexion(), $_POST['txttotal']) :  "";
				$detalle=isset($_POST['table']);
        		$buscaCliente = isset($_POST['txtBuscaCliente']) ? mysqli_real_escape_string(new Conexion(), $_POST['txtBuscaCliente']) :  "";
				$valida = isset($_POST['val']) ? mysqli_real_escape_string(new Conexion(), $_POST['val']) :  "";
				//echo isset($_POST['table']);
			} 

			if(isset($_POST['table'])){

				$detalle = $_POST['table'];

			}
			//$valida = isset($_POST['val']) ? mysqli_real_escape_string(new Conexion(), $_POST['val']) :  "";
			$res = $models->buscaProductos();
			$numeroCotizacion = $numCotizacion->nuevoNumeroCotizacion();
		//if ($_POST){
			switch ($valida) {

				case "nueva": {

						include('html/cotizacion.php');

			
				}break;
				case "buscaproduct": {
					header('Content-type: application/json');
					$json = array('datos' => $models->buscaProductos());
					echo  json_encode($json);
				}break;
				case "insertaCot": {
					$result= array($models->insertaCotizacion($numeroCotizacion, $cliente, $empresa,$telefono,$correo, $subtotal, $impuesto, $total,$detalle));
					echo  json_encode($result);
				}break;
				case "search": {
					$resp = $models->buscaDatosClie($buscaCliente);
			
					if( count($resp) ==""){
						echo "0";
					}else{

						header('Content-type: application/json');
						$json = array('datos' => $resp);
						echo  json_encode($json);
						
					}
	
				}break;
				//case 'listacotizacion': listcotizacion
					case 'listcotizacion': 
					
					
					if($_POST) {
					header('Content-type: application/json');
					$json = array('datos' => $models->muestradetcotizacion());
					
					echo  json_encode($json);
					}else{
							include('html/listacotizacion.php');
					}
				break;

				case "eliminarCotizacion": {

				echo $models->eliminarCotizacion($id);
			
				}break;
				
				case "reporte":
					include('core/bin/pdf_cotizacion.php');
				break;
                        
                        
            }
         

	}else {
		 header('location: ?view=login');
	}		

				

?>