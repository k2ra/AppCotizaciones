<?php

$models = new cotizacion();

if($_SESSION['user']) {
  
    $valida =isset($_GET['mode'])? mysqli_real_escape_string(new Conexion(), $_GET['mode']) :  "";

	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$descripcion = isset($_POST['txtDescProd']) ? mysqli_real_escape_string(new Conexion(), $_POST['txtDescProd']) :  "";
		$precio = isset($_POST['txtPrecioProd']) ? mysqli_real_escape_string(new Conexion(), $_POST['txtPrecioProd']) :  "";
		$fecha = isset($_POST['txtFechaProd']) ? mysqli_real_escape_string(new Conexion(), $_POST['txtFechaProd']) :  "";
        $producto = isset($_POST['txtBuscaProd']) ? mysqli_real_escape_string(new Conexion(), $_POST['txtBuscaProd']) :  "";
        $id = isset($_POST['id']) ? mysqli_real_escape_string(new Conexion(), $_POST['id']) :  "";
		$valida = isset($_POST['val']) ? mysqli_real_escape_string(new Conexion(), $_POST['val']) :  "";
        /******************************UPDATE***********************/
         $idEdit = isset($_POST['txtIdProdEdit']) ? mysqli_real_escape_string(new Conexion(), $_POST['txtIdProdEdit']) :  "";
        $descripcionEdit = isset($_POST['txtDescProdEdit']) ? mysqli_real_escape_string(new Conexion(), $_POST['txtDescProdEdit']) :  "";
        $precioEdit = isset($_POST['txtPrecioProdEdit']) ? mysqli_real_escape_string(new Conexion(), $_POST['txtPrecioProdEdit']) :  "";
        $fechaEdit = isset($_POST['txtFechaProdEdit']) ? mysqli_real_escape_string(new Conexion(), $_POST['txtFechaProdEdit']) :  "";

	}

 
	switch ($valida) {

                case "nuevo": {

                    include('html/producto.php');
                    
                }break;
                case "buscar": {

                    include('html/buscarproducto.php');
                    
                }break;
                case "newprod": {

                    echo $models->insertaProductos($descripcion, $precio, $fecha);
					
                }break;
                case "buscaProductoXdesc": {
                	$resp = $models->buscaProductosXdesc($producto);
                	if( count($resp) ==""){
                		echo "0";
                	}else{

                		header('Content-type: application/json');
                		$json = array('datos' => $resp);
                  		echo  json_encode($json);
                  		
                	}
					//print_r($resp);
                }break;
                case "eliminarProducto": {

                    echo $models->eliminarProducts($id);
                    
                }break;
                case "updateProducto": {

                    echo $models->updateProducts($idEdit,$descripcionEdit,$precioEdit,$fechaEdit );
                    
                }break;
                
    }

}else{
    header("location:?view=login");
}

?>