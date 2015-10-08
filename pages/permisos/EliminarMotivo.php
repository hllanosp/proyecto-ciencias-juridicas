<?php
	//Se recibe el nuevo valor que se asignara al campo Nombre del registro seleccionado y se guarda en la base de datos
	
	$id=$_POST['Motivo_ID'];	
	
	require_once("../../conexion/conn.php");  
	$conexion = mysqli_connect($host, $username, $password, $dbname);
	$query=" SELECT * FROM  permisos where id_motivo = '$id'";
	echo $id;
	$resultado = mysqli_query($conexion, $query) or die("Error " . mysqli_error($link));
	if ($row = mysqli_fetch_array($resultado))
        {
        	 echo <<<HTML
                                       
									<script language='javascript'>
          alert(" no  se puede Eliminar el  motivo ") 
          </script>
HTML;
         

   
       
     } 
     else {
     	echo <<<HTML
                                       
									<script language='javascript'>
          alert(" motivo Elimido  exitosamente ...... '$id' ") 
          </script>
HTML;
      ;
     }

	
	

?>