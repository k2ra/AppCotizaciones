<?php 

require('core/core.php');
//if(isset($_SESSION['user'])){
	if(isset($_GET['view']) ){
		if(file_exists('core/controllers/'. $_GET['view'].'Controller.php')){
			include('core/controllers/'. $_GET['view'].'Controller.php');
			
		}
		
	}
	else{
	
		include('html/login.php');
	}
//}
/* else{
	include('html/login.php');
} */



?>