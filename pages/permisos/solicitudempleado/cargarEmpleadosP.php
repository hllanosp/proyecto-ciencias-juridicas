<?php
//Este codigo hace una validación de la sesión del usuario y del tiempo que esta lleva inactiva, para proceder a cerrarla
$maindir = "../../../";
require($maindir . "conexion/config.inc.php");

if (isset($_GET['contenido'])) {
    $contenido = $_GET['contenido'];
} else {
    $contenido = 'gestion_de_folios';
}

require_once($maindir . "funciones/check_session.php");

require_once($maindir . "funciones/timeout.php");
?>

<?php
	//Esta seccion obtiene el nombre de usuario que ha iniciado sesión y lo guarda en una variable
	if(!isset( $_SESSION['user_id'] ))
  {
    header('Location: '.$maindir.'login/logout.php?code=100');
    exit();
  }else
  {

    $idusuario = $_SESSION['user_id'];
  }



?>

<?php

 $ql1=" SELECT empleado.No_Empleado,empleado.N_identidad,persona.Primer_nombre,
 persona.Primer_apellido, departamento_laboral.nombre_departamento FROM empleado
 inner join persona on empleado.N_identidad=persona.N_identidad 
 inner join departamento_laboral on departamento_laboral.Id_departamento_laboral =empleado.Id_departamento
  ";







 //$query = mysql_query(" SELECT empleado.No_Empleado,empleado.N_identidad,persona.Primer_nombre,
 //persona.Primer_apellido, departamento_laboral.nombre_departamento FROM empleado
 //inner join persona on empleado.N_identidad=persona.N_identidad 
 //inner join departamento_laboral on departamento_laboral.Id_departamento_laboral =empleado.Id_departamento
//	");

?>


<html lang="en">
    
    <head>
        
        <meta charset="UTF-8">
        
       

        
        <script>

              /* 
               * To change this license header, choose License Headers in Project Properties.
               * To change this template file, choose Tools | Templates
               * and open the template in the editor.
               */



            var x;
            x = $(document);
            x.ready(inicio);



            function inicio()
            {

                var x;
                x = $(".selecionar_empleado");
                x.click(selecionar_empleado);

             }     ;


            function selecionar_empleado()
            {
                var pid = $(this).parents("tr").find("td").eq(0).html();
				var id = $(this).parents("tr").find("td").eq(1).html();
				var nombre = $(this).parents("tr").find("td").eq(2).html();
				
         
                data = {no_empleado: pid};

				
                $.ajax({
                    async: true,
                    type: "POST",
                    //dataType: "html",
                    //contetType: "application/x-www-form-urlencoded",
                    url:"pages/permisos/solicitudempleado/Solicitud_E.php",  
                    beforeSend: function()
                    {
                      $(".alert").remove();
                      var me='<div class="alert alert-info alert-error"><a href="#" class="close" data-dismiss="alert">&times;</a><strong> Informacion   </strong>"cargando .............."</div>';
                      $("#proceso").append(me);


                    },
                      success:function()
                      {
                      $("#contenedor").empty();
                      $("#contenedor").load('pages/permisos/solicitudempleado/Solicitud_E.php', data);


                      },
                    timeout: 4000,
                    error : function(result) {
                   $(".alert").remove();
                  var me='<div class="alert alert-success" role="alert"> <a href="#" class="close" data-dismiss="alert">&times;</a>  <strong>'+result.status + ' ' + result.statusText+'</strong></div>';
                  $("#proceso").append(me);
        
                 }
                });
              }


            



        
          

   


        </script>

        
        
      <script type="text/javascript" charset="utf-8">
  $(document).ready(function() {
    $('#tabla_empleados').dataTable(); // example es el id de la tabla
    } );
    </script>
    
 <script type="text/javascript">
  // For demo to fit into DataTables site builder...
  $('#tabla_empleados')
    .removeClass( 'display' )
    .addClass('table table-striped table-bordered');
</script>
           
    </head>

    <body>
      <div id="proceso"></div>
        
             <div class="row">
                <div class="col-lg-12">

                    <h1 class="page-header">Lista de Empleados para Solicitud:</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
        
       
                   
          <div class="box">
           <div class="box-header">
           
           </div><!-- /.box-header -->
           <div class="box-body table-responsive">
               <?php
              
                   echo <<<HTML
                                    <table id="tabla_empleados" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>                                            
                                            <th>No empleado</th>
                                            <th>No identidad</th>
                                            <th>nombre</th>
                                            <th>Apellido</th>
                                            <th>Departamento</th>
                                            <th>Seleccionar</th>
                                        
                                        </tr>
                                        </thead>
                                        <tbody>
HTML;
            

              $rec =$db->prepare($ql1);
              $rec->execute();
            while ($row = $rec->fetch()) {

            $Noempleado = $row['No_Empleado'];
            $Noidentidad = $row['N_identidad'];
            $nombre = $row['Primer_nombre'];
            $apellido=$row['Primer_apellido'];
            $departamento=$row['nombre_departamento'];
            
                echo "<tr data-id='".$Noempleado."'>";
                echo <<<HTML
                <td>$Noempleado</td>

HTML;
                //echo <<<HTML <td><a href='javascript:ajax_("'$url'");'>$NroFolio</a></td>HTML;
                echo <<<HTML
                <td>$Noidentidad</td>

HTML;
                echo <<<HTML
                <td>$nombre</td>
HTML;
                echo <<<HTML
                <td>$apellido</td>
HTML;
                echo <<<HTML
                <td>$departamento</td>                        

               
            
             
                        
                 <td><center>
					<button class="selecionar_empleado btn btn-primary glyphicon glyphicon-edit"  title="selecionar_empleado">
                </center></td>       
        
                    
             
                        
                        
HTML;
                echo "</tr>";

            }

                   echo <<<HTML
                                        </tbody>
                                        <tfoot>
                                        <tr>                                            
                                            <th>No empleado</th>
                                            <th>No identidad</th>
                                            <th>nombre</th>
                                            <th>Apellido</th>
                                            <th>Departamento</th>
                                            <th>Seleccionar</th>
                                            
                                        </tr>
                                        </tfoot>
									</table>
HTML;
             
               ?>
           </div><!-- /.box-body -->
       </div><!-- /.box -->
                           
                            <!-- /.table-responsive -->
    </body>
    

    
    
</html>