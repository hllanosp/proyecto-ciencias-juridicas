<?php
	//Se recibe el nuevo valor que se asignara al campo Nombre del registro seleccionado y se guarda en la base de datos
	
	$id = $_POST['Edificio_ID'];
	
	require_once("../../conexion/conn.php");  
	$conexion = mysqli_connect($host, $username, $password, $dbname);
	//$query=" SELECT * FROM  permisos where id_Usuario = '$idusuario'";
	$query="";
	//$resultado = mysqli_query($conexion, $query) or die("Error " . mysqli_error($link));
	//mysqli_close($conexion);

?>