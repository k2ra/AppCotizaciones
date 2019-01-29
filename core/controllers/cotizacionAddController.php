<?php
//require ('C:\wamp\www\AppCotizaciones\Theme\bin\models.php');
//include 'pdf_cotizacion.php';
$models = new cotizacion();

if(isset($_SESSION['user'])) {
	$valida =isset($_GET['mode'])? mysqli_real_escape_string(new Conexion(), $_GET['mode']) :  "";

//$tabla = isset($_POST['dataTables1']) ? mysqli_real_escape_string(new Conexion(), $_POST['dataTables1']) :  "";
 //echo $_POST['1precio'];
			if($_SERVER['REQUEST_METHOD'] == "POST"){
				$id = isset($_POST['id']) ? mysqli_real_escape_string(new Conexion(), $_POST['id']) :  "";
				$cliente = isset($_POST['txtCliente']) ? mysqli_real_escape_string(new Conexion(), $_POST['txtCliente']) :  "";
				$numcotiza	 = isset($_POST['txtNumcotiza']) ? mysqli_real_escape_string(new Conexion(), $_POST['txtNumcotiza']) :  "";
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

				//echo $_POST['table']." ".$_POST['txtCliente'];
				$detalle = $_POST['table'];
			//$det = array();
			

//echo $valida;
				/*echo $detalle;
				print_r($det);
				print_r($det[0]{'descripcion'});*/
			}
			//$valida = isset($_POST['val']) ? mysqli_real_escape_string(new Conexion(), $_POST['val']) :  "";
			$res = $models->buscaProductos();

		//if ($_POST){
			switch ($valida) {

				case "dashboard": {
				if($_POST){
					header('Content-type: application/json');
					$json = array($models->cotizacionesxmes());
					
					echo  json_encode($json);
				}else{
						include('html/dashboard.php');
				}
			
				}break;
				case "nueva": {

						include('html/cotizacion.php');

			
				}break;
				case "buscaproduct": {
					header('Content-type: application/json');
					$json = array('datos' => $models->buscaProductos());
					echo  json_encode($json);
				}break;
				case "insertaCot": {
					echo $models->insertaCotizacion($numcotiza, $cliente, $empresa,$telefono,$correo, $subtotal, $impuesto, $total,$detalle);
								//echo $reportcotizacion->reporte_cotizacion($numcotiza);
								echo "Success";
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