

<?php

    $maindir = "../../";

  if(isset($_GET['contenido']))
    {
      $contenido = $_GET['contenido'];
    }
  else
    {
      $contenido = 'carga_academica';
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
 
<html lang="es">
    <head>    
    <meta charset="utf-8">
    </head>
      <div class="container-fluid">
        <div class = "row">
          <div class = "col-sm-3" >
            <ul class="list-unstyled">
                
               
               <hr>
               <li class="nav-header"> <a href="#" data-toggle="collapse" data-target="#userMenu">

                 <h5><i class="glyphicon glyphicon-book"></i> Gestión de Clases<i class="glyphicon glyphicon-chevron-down"></i></h5>
                    </a>
                    <ul class="list-unstyled collapse in" id="userMenu">
                       <li  class="nav-header active"> <a id="CargaAcademica" href="#"><i class="glyphicon glyphicon-home"></i>Cargas académicas</a></li>                        
                      <li>
                        <a id="Acondicionamientos"  href="#"><i class="glyphicon glyphicon-equalizer"></i> Acondicionamientos</a>
                      </li>
                      <li>
                          <a id="seccionesMenu" href="#"><i class="glyphicon glyphicon-ok"></i> Secciones</a>
                      </li>                      
                      <li>
                        <a id="AsignacionClases"  href="#"><i class="glyphicon glyphicon-calendar"></i> Asignacion de clases</a>
                      </li> 
                    </ul>
                </li>
<!--                <li id = "RegistroDocentes" class="nav-header"> <a href="#" data-target="#userMenu2">
                  <h5><i class="glyphicon glyphicon-edit"></i> Registro de docentes</h5>
                  </a>
                </li>-->
                <li class="nav-header"> <a href="#" data-toggle="collapse" data-target="#userMenu2">
                  <h5><i class="glyphicon glyphicon-folder-open"></i> Gestión de Proyecto<i class="glyphicon glyphicon-chevron-down"></i></h5>
                  </a>
                    <ul class="list-unstyled collapse in" id="userMenu2">       
                        <li><a id="AsigancionProyecto" href="#"><i class="glyphicon glyphicon-ok"></i> Asignacion de proyecto</a></li> 
                                            </ul>
                </li>
                <li class="nav-header" id = "Mantenimiento"> <a href="#" data-toggle="collapse" data-target="#userMenu3">
                        <h5><i class="glyphicon glyphicon-folder-open"></i>Mantenimiento<i class="glyphicon glyphicon-chevron-down"></i></h5>
                    </a>     
                    <ul class="list-unstyled collapse in" id="userMenuNa">
                        <li><a id="Periodos" href="#"><i class="glyphicon glyphicon-ok"></i> Periodos</a></li>
                        <li><a id="Facultad" href="#"><i class="glyphicon glyphicon-ok"></i> Facultad</a></li>
                        <li><a id="AreasProyecto" href="#"><i class="glyphicon glyphicon-ok"></i> Areas de proyecto</a></li> 
                        <li><a id="AreasVinculacion" href="#"><i class="glyphicon glyphicon-ok"></i> Areas de vinculacion</a></li> 
                        <li><a id="Proyectos" href="#"><i class="glyphicon glyphicon-ok"></i> Proyecto</a></li> 
                      <li>
                        <a id="Edificios"  href="#"><i class="glyphicon glyphicon-equalizer"></i> Edificios</a>
                      </li>          
<li  class="nav-header active"> <a id="estadosCargas" href="#"><i class="glyphicon glyphicon-home"></i>Estados cargas académicas</a></li>                      
                    </ul>   
                </li>                
                <li id = "busquedaCargaAcademica" class="nav-header"> <a href="#" data-toggle="collapse" data-target="#userMenu2">
                  <h5><i class="glyphicon glyphicon-search"></i> Busqueda avanzada - Carga Académica</h5>
                  </a>
                </li>
                <li id = "BusquedaAvanzadaProyectos" class="nav-header"> <a href="#" data-toggle="collapse" data-target="#userMenu2">
                  <h5><i class="glyphicon glyphicon-search"></i> Busqueda avanzada - Proyectos</h5>
                  </a>
                </li>     
            </ul>
          </div>
            <div class="col-sm-9">
                <div id="contenedor" class="content-panel">
                </div>
            </div>
      </div> 
    </div>
<script type="text/javascript" src = "pages/CargaAcademica/menu.js" />
