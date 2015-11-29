<?php

    $maindir = "../../";

  if(isset($_GET['contenido']))
    {
      $contenido = $_GET['contenido'];
    }
  else
    {
      $contenido = 'secretaria_academica';
    }

  require_once($maindir."funciones/check_session.php");

  require_once($maindir."funciones/timeout.php");

  require_once($maindir."pages/navbar.php");

if(!isset( $_SESSION['user_id'] ))
  {
    header('Location: '.$maindir.'login/logout.php?code=100');
    exit();
  }


?>
<!-- Seccion para cargar los roles para restringir el mantenimiento -->
              
<!-- Esta seccion contiene el menu contextual el cual esta integrado para mandar a llamar a todas las paginoas 
  que forman parte de este modulo.

 NOTA: De este Menu se hace el llamado hacia todas las paginas. -->
<html lang="es">
    <head>    
        
    <meta charset="utf-8">
    
    </head>
      <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3">
                <ul class="list-unstyled">
                   <li  class="nav-header active"> <a id="SecretariaAcademica" href="#"><i class="glyphicon glyphicon-home"></i> Inicio Secretaria Academica</a></li>
                   <hr>
                   <!-- Seccion Gestion de Estudiantes-->
                   <li class="nav-header"> <a href="#" data-toggle="collapse" data-target="#userMenu">
                     <h5><i class="fa fa-user"></i> Gestión de Estudiantes<i class="glyphicon glyphicon-chevron-down"></i></h5>
                        </a>
                        <!-- Ingreso de sub menu para la seccion de gestion de estudiantes -->
                        <ul class="list-unstyled collapse in" id="userMenu">
                          <li>
                            <a id="elementoMenuEstudiantes" href="#"><i class="glyphicon glyphicon-edit"></i>Estudiantes</a>
                          </li>                        
                          <li>
                            <a id="TipoEstudiante"  href="#"><i class="fa fa-user fa-fw"></i> Actualización de nivel educativo</a>
                          </li>
                        </ul>
                    </li>
                    <!-- Seccion Manejo de solicitudes -->

                    <li class="nav-header"> <a href="#" data-toggle="collapse" data-target="#userMenu2">
                      <h5><i class="fa fa-users "></i> Gestión de solicitudes<i class="glyphicon glyphicon-chevron-down"></i></h5>
                      </a>
                        <!--Ingreso sub menu seccion de Gestion de solicitudes  -->
                        <ul class="list-unstyled collapse in" id="userMenu2">     
                           
                            <li><a id="SolicitudEstudiante" href="#"><i class="fa fa-user fa-fw"></i> Solicitudes</a></li> 
                        </ul>
                    </li>

                     <!-- seccion de reportes -->
                    <li class="nav-header"> <a href="#" data-toggle="collapse" data-target="#userMenu2">
                      <h5><i class="glyphicon glyphicon-list-alt "></i> Modulo de Reportes<i class="glyphicon glyphicon-chevron-down"></i></h5>
                      </a>
                        <!--Ingreso sub menu seccion de Gestion de solicitudes  -->
                        <ul class="list-unstyled collapse in" id="userMenu2">     
                           
                            <li><a id="secre_reportes" href="#"><i class="fa fa-file fa-fw"></i> Reportes</a></li> 
                        </ul>
                         <ul class="list-unstyled collapse in" id="userMenu2">     
                           
                            <li><a id="secre_generacion_documentos" href="#"><i class="glyphicon glyphicon-save-file"></i> Generacion de Documentos</a></li> 
                        </ul>
                    </li>
                    <!-- Seccion Manejo de docmumentos -->
<!--                    <li id = "ManejoDocuementos" class="nav-header"> <a href="#">
                      <h5><i class="glyphicon glyphicon-file"></i> Manejo de documentos</h5>
                      </a>
                    </li>-->
                    <!-- Seccion Busqueda Avanzada -->
                    <li id = "BusquedaAvanzada" class="nav-header"> <a href="#">
                      <h5><i class="glyphicon glyphicon-search"></i> Búsqueda avanzada</h5>
                      </a>
                    </li>

                    <!-- Seccion de Mantenimiento -->
                    <li class="nav-header" id = "Mantenimiento"> <a href="#" data-toggle="collapse" data-target="#userMenu3">
                        <?php
                           if(isset($_SESSION)){
                              if($_SESSION["user_rol"] == 100 || $_SESSION["user_rol"] == 40  ){
                                echo <<<HTML
            <h5><i class="glyphicon glyphicon-cog"></i> Mantenimiento<i class="glyphicon glyphicon-chevron-down"></i></h5>
                          </a>
                            <ul class="list-unstyled collapse in" id="userMenu3">     
                              <!-- Ingreso de sub meno de la seccion de Mantenimiento -->
                                <li><a id="ciudadOrigen" href="#"><i class="glyphicon glyphicon-globe"></i> Ciudades de origen</a></li>
                                <li><a id="planesEstudio" href="#"><i class="glyphicon glyphicon-book"></i> Planes de estudio</a></li> 
                                <li><a id="mencionHonorifica" href="#"><i class="glyphicon glyphicon-star"></i> Menciones Honorificas</a></li>
                                <li><a id="Orientaciones" href="#"><i class="glyphicon glyphicon-education"></i> Orientaciones</a></li>  
                                <li><a id="periodosAcademicos" href="#"><i class="glyphicon glyphicon-list"></i> Periodos Académicos</a></li>  
                                <li><a id="nuevaSolicitud" href="#"><i class="fa fa-suitcase"></i> Tipos de solicitudes</a></li>
                                <li><a id="tiposEstudiantes"  href="#"><i class="fa fa-user fa-fw"></i>Niveles Educativos</a></li>
                            </ul>
HTML;
                              }
                            }
                        ?>
                    </li>
                </ul>
            </div>
            <!-- Contenedor donde montamos todas las paginas requeridas para este modulo -->
             <div class="col-sm-9">
                <div id="contenedor" class="content-panel">
                  
                     <?php require_once($maindir . 'pages/SecretariaAcademica/Graficos/pantallaPrincipal.php');         ?>
                </div>
            </div> 
            <!-- Fin del contenedor -->
        </div>
      </div>
      <!-- La siguiente direccion es la parte Javascript del archivo de cual llamamos todas las pag.
      Y son ingresadas dentro del contendor mencionado anteriormente -->
<script type="text/javascript" src = "pages/SecretariaAcademica/menu.js" />