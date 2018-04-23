<?php 

require('core/core.php');

if(isset($_GET['view']) ){
	if(file_exists('core/controllers/'. $_GET['view'].'Controller.php')){
        include('core/controllers/'. $_GET['view'].'Controller.php');
        
  	}
	
}
else{

  //header("location:login.php");
	include('html/login.php');
}



?>