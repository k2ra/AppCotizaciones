<?php
//if($_POST){
	require('core/core.php');
	switch (isset($_GET['view'])? $_GET['view']: null) {
        case 'facturacion':
			require('core/controllers/facturacionController.php');
		break;
		
		default:
			header('location:index.php');
			
		break;
	}
//}else{
//	header('location:index.php');
//}
?>
