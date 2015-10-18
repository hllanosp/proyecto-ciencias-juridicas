<?php
    //En este archivo se realizo mantenimiento por Alex Flores (IIIP - 2015)
    
    $maindir = '../';
    
    //Se declaran variables necesarias
    if(!isset($_SESSION))
        session_start();
    
    $id =   $_SESSION['idPOA'];
    
    //Incluimos el contenido del archivo config.inc.php
    include $maindir.'conexion/config.inc.php';
    
    $query2 = mysql_query("SELECT * FROM objetivos_institucionales where id_Poa='" . $id . "'");
?>
<div class="box-body table-responsive">
    <table id="tabla_prioridad" class='table table-bordered table-striped'>
        <thead>
            <tr>
                <th hidden></th>
                <th>Definición</th>
                <th>Área estratégica</th>
                <th>Resultado</th>
                <th>Área que pertenece</th>                                            
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
                while ($row = mysql_fetch_array($query2)) {
                    $id = $row['id_Objetivo'];
            ?>
            <tr>
                <td hidden><?php echo $id ?></td>
                <td>
                    <div class="text" id="definicion-<?php echo $id ?>">
                        <?php echo $row['definicion'] ?>
                    </div>
                </td>
                <td>
                    <div class="text" id="area-<?php echo $id ?>">
                        <?php echo $row['area_Estrategica'] ?>
                    </div>
                </td>
                <td>
                    <div class="text" id="resultado-<?php echo $id ?>">
                        <?php echo $row['resultados_Esperados'] ?>
                    </div>
                </td>
                <td>
                    <div class="text" id="campo-<?php echo $id ?>">
                        <?php echo $row['id_Area'] ?>
                    </div>
                </td>
                <td>
                    <a class="verObjetivo btn btn-success  fa fa-arrow-right "></a>
                    <a class="editarObjetivo btn btn-info fa fa-pencil "></a>
                    <a class="eliminarObjetivo btn btn-danger fa fa-trash-o"></a>
                </td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('#tabla_prioridad').dataTable({
            "order": [[0, "asc"]],
            "fnDrawCallback": function (oSettings) {},
            "language":{
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "zeroRecords": "No se han encontrado registros",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(Filtrado de _MAX_ registros)"   ,
                "search": "Buscar",
                "paginate":{
                            "previous": "Anterior",
                            "next" : "Siguiente"
                }
            }
        }); // example es el id de la tabla
    });
</script>

<!-- Script necesario para que la tabla se ajuste a el tamanio de la pag-->
<script type="text/javascript">
    // For demo to fit into DataTables site builder...
    $('#tabla_prioridad').removeClass('display').addClass('table table-striped table-bordered');
</script>