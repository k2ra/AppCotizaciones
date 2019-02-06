<?php
	$models = new cotizacion();

 
	if($_POST){
		$usr = isset($_POST['userId']) ? mysqli_real_escape_string(new Conexion(), $_POST['userId']) :  "";
		$password = isset($_POST['pass']) ? mysqli_real_escape_string(new Conexion(), $_POST['pass']) :  "";
	
		$resp = $models->validaCredenciales($usr, $password);
	

		if($resp){
			$_SESSION['user']=$resp;
			header('Location: ?view=dashboard');
			include('html/dashboard.php');
			
		}else if($resp="invalido") {
			header('Location: ?error=1');
		}
	}else{
		include('html/login.php');
	}



?>