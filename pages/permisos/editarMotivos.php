<?php
	//Se recibe el nuevo valor que se asignara al campo Nombre del registro seleccionado y se guarda en la base de datos
	require("../../conexion/config.inc.php");
	$id=$_POST['Motivo_ID'];	
	$desc=$_POST['dmotivo'];	 
	$query="update motivos set descripcion = '$desc' WHERE Motivo_ID='$id'";
	
            $rec =$db->prepare($query);
            $rec->execute();

?>