<?php
	//Se recibe el nuevo valor que se asignara al campo Nombre del registro seleccionado y se guarda en la base de datos
	
	$id=$_POST['Motivo_ID'];	
	$desc=$_POST['dmotivo'];
	
	require_once("../../conexion/conn.php");  
	$conexion = mysqli_connect($host, $username, $password, $dbname);
	$query="update motivos set descripcion = '$desc' WHERE Motivo_ID='$id'";
	
	$resultado = mysqli_query($conexion, $query) or die("Error " . mysqli_error($link));
	mysqli_close($conexion);

?>