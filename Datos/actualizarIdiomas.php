<?php
      
	require_once('funciones.php');
	

	

	If(isset($_POST['codigo'])){
		
		 $idioma=$_POST['idioma'];
		 $codigo=$_POST['codigo'];
                 
                 
		 
	$query= mysql_query("UPDATE idioma SET Idioma='$idioma' WHERE ID_Idioma='$codigo'");
	
	
	
	if($query){
	
		//echo '<META HTTP-EQUIV="REFRESH" CONTENT="2">' ;
		echo mensajes('Actualizado con Exito','verde');
	
	
	
	}else{}
	
	

	
	}
        
    
?>