<?php
   $maindir = "../../../"; 
   require($maindir ."conexion/config.inc.php");
   if(!isset( $_SESSION['user_id'] ))
  {
    header('Location: '.$maindir.'login/logout.php?code=100');
    exit();
  }
	
	$edificio = $_POST['dedificio'];
	$query =  "INSERT INTO edificios(descripcion) VALUES('$edificio')";
	$rec =$db->prepare($query);
    $rec->execute();
    if ($rec) {
    	echo 1;
    } else {
        echo 5;
    }
    
?>