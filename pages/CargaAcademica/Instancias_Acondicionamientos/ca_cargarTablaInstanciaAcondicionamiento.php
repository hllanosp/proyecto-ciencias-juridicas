 <?php
  include '../../../Datos/conexion.php';
?>    
<?php

        if(isset($_POST['nombreInstanciaA']))
        {
            $codIA = $_POST['nombreInstanciaA'];
        }
        
	$resultado=mysql_query("CALL SP_OBTENER_INSTANCIAS_ACONDICIONAMIENTOS(".$codIA.")");
	while ($row = mysql_fetch_array($resultado)) 
	{
		$codigo = $row['codigo'];
		$nom=$row['cod_acondicionamiento'];
		?>
		<tr height="50px">
			<td id="codigo">
				<?php echo $codigo ?>
			</td>
			<td id="nombreT">
				<?php echo $nom ?>
			</td>
			<td>
				<center>
				  <button type="button"  id="eliminar" href="#" class="elimina btn btn-danger glyphicon glyphicon-trash"></button>
				</center>
			</td>
		</tr>
		<?php
	} 
?>


