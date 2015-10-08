<?php
	//Se recibe el nuevo valor que se asignara al campo Nombre del registro seleccionado y se guarda en la base de datos

	$id = $_POST['Edificio_ID'];
	$desc = $_POST['dedificio'];

	require_once("../../conexion/conn.php");  
	$conexion = mysqli_connect($host, $username, $password, $dbname);
	$query="update edificios set descripcion = '$desc' where Edificio_ID = '$id';";
	$resultado = mysqli_query($conexion, $query) or die("Error " . mysqli_error($link));
	mysqli_close($conexion);

	
	//mysql_query("update edificios set descripcion = '$desc' where Edificio_ID = '$id';", $enlace);
	
	//mysql_close($enlace);
?>