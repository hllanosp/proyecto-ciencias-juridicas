<?php 
require_once("../../conexion/conn.php");  
//$conexion = mysqli_connect($host, $username, $password, $dbname);

$conectar = new mysqli($host,$username,$password,$dbname);
//$cn = mysql_connect("localhost","root","");
//mysql_select_db("poa", $cn);

$enlace = mysql_connect($host, $username, $password);
mysql_select_db($dbname, $enlace);
if (!$enlace) {
    die('No se pudo conectar: ' . mysql_error());
}



?>
