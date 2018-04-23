<?php

$models = new cotizacion();

if($_SESSION['user']) {
  //  echo $_SESSION['user'];
    $valida =isset($_GET['mode'])? mysqli_real_escape_string(new Conexion(), $_GET['mode']) :  "";

	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$nombre = isset($_POST['txtNombre']) ? mysqli_real_escape_string(new Conexion(), $_POST['txtNombre']) :  "";
		$empresa = isset($_POST['txtEmpresa']) ? mysqli_real_escape_string(new Conexion(), $_POST['txtEmpresa']) :  "";
		$cedula = isset($_POST['txtCedula']) ? mysqli_real_escape_string(new Conexion(), $_POST['txtCedula']) :  "";
		$correo = isset($_POST['txtCorreoClie']) ? mysqli_real_escape_string(new Conexion(), $_POST['txtCorreoClie']) :  "";
		$direccion = isset($_POST['txtDireccion']) ? mysqli_real_escape_string(new Conexion(), $_POST['txtDireccion']) :  "";
		$telefono = isset($_POST['txtTelefonoClie']) ? mysqli_real_escape_string(new Conexion(), $_POST['txtTelefonoClie']) :  "";
		//$telefonoBusca = isset($_POST['txtTelefono']) ? mysqli_real_escape_string(new Conexion(), $_POST['txtTelefono']) :  "";
		$buscaCliente = isset($_POST['txtBuscaCliente']) ? mysqli_real_escape_string(new Conexion(), $_POST['txtBuscaCliente']) :  "";
        $buscaClienteII = isset($_POST['txtClienteSearch']) ? mysqli_real_escape_string(new Conexion(), $_POST['txtClienteSearch']) :  "";
        $id = isset($_POST['id']) ? mysqli_real_escape_string(new Conexion(), $_POST['id']) :  "";
		$valida =isset($_POST['val']) ? mysqli_real_escape_string(new Conexion(), $_POST['val']) :  "";

        /******************************UPDATE***********************/
         $idEdit = isset($_POST['txtIdEdit']) ? mysqli_real_escape_string(new Conexion(), $_POST['txtIdEdit']) :  "";
        $nombreEdit = isset($_POST['txtNombreEdit']) ? mysqli_real_escape_string(new Conexion(), $_POST['txtNombreEdit']) :  "";
        $empresaEdit = isset($_POST['txtEmpresaEdit']) ? mysqli_real_escape_string(new Conexion(), $_POST['txtEmpresaEdit']) :  "";
        $cedulaEdit = isset($_POST['txtCedulaEdit']) ? mysqli_real_escape_string(new Conexion(), $_POST['txtCedulaEdit']) :  "";
        $correoEdit=isset($_POST['txtCorreoClieEdit']) ? mysqli_real_escape_string(new Conexion(), $_POST['txtCorreoClieEdit']) :  "";
        $direccionEdit=isset($_POST['txtDireccionEdit']) ? mysqli_real_escape_string(new Conexion(), $_POST['txtDireccionEdit']) :  "";
        $telefonoEdit=isset($_POST['txtTelefonoClieEdit']) ? mysqli_real_escape_string(new Conexion(), $_POST['txtTelefonoClieEdit']) :  "";


	}
	/*$resp = $models->buscaDatosClie($buscaCliente);
	header('Content-type: application/json');
                		$json = array('datos' =>$resp);
                  		echo  json_encode($json);*/
/*print_r($resp) ;*/
//echo $id;

	switch ($valida) {

                case "nuevo": {

                   include('html/cliente.php');
                    
                }break;
                case "buscar": {

                   include('html/buscarcliente.php');
                    
                }break;

                case "new": {

                    echo $models->insertaClients($nombre, $empresa, $cedula,$correo,$direccion, $telefono);
					
                }break;
                
                case "buscarCliente": {

                   $data= $models->buscaDatosClie($buscaClienteII);
                    if( count($data) ==""){
                        echo "0";
                    }else{

                        header('Content-type: application/json');
                        $json = array('datos' => $data);
                        echo  json_encode($json);
                        
                    }
                    
                }break;
                case "eliminarCliente": {

                    echo $models->eliminarClients($id);
                    
                }break;
                case "updateCliente": {

                    echo $models->updateClients($idEdit,$nombreEdit,$empresaEdit,$cedulaEdit,$correoEdit,$direccionEdit,$telefonoEdit );
                    
                }break;
                
    }

}else{

   header("location:?view=login"); 
}

?>