<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$mkdir = "../../../../";
include($mkdir."conexion/config.inc.php");

$statement = $db->prepare('CALL SP_OBTENER_SOLICITUDES_REPORTES(@pcMensajeError)');
$statement->execute();

$contadorFilas = $statement->rowCount();

if($contadorFilas >= 1){
    $tabla = $statement->fetchAll(PDO::FETCH_ASSOC);
}

$statement->nextRowSet();
$statement->closeCursor();

?>

<div class="panel panel-primary">
    <div class="panel-heading">
        <label><span class="glyphicon glyphicon-file" aria-hidden="true"></span> Generar Constancias </label>
    </div>
    <div class="panel-body ">
<!--        <div class="page-header">
            <h3>Filtros</h3>
        </div>
        <label  class="checkbox-inline">
            <input  class="toggle-vis" data-column="0" type="checkbox" id="checkboxEnLinea1" value="opcion_1"> Codigo
        </label>
        <label class="checkbox-inline">
            <input class="toggle-vis" data-column="1" type="checkbox" type="checkbox" id="checkboxEnLinea2" value="opcion_2"> Estudiante
        </label>
        <label class="checkbox-inline">
            <input class="toggle-vis" data-column="2" type="checkbox"type="checkbox" id="checkboxEnLinea3" value="opcion_3"> Observaciones
        </label>

        <label class="checkbox-inline">
            <input class="toggle-vis" data-column="3" type="checkbox" type="checkbox" id="checkboxEnLinea3" value="opcion_3"> Estado
        </label>

        <label class="checkbox-inline">
            <input class="toggle-vis" data-column="4" type="checkbox" type="checkbox" id="checkboxEnLinea3" value="opcion_3"> DNI
        </label>

        <label class="checkbox-inline">
            <input class="toggle-vis" data-column="5" type="checkbox"type="checkbox" id="checkboxEnLinea3" value="opcion_3"> Tipo Solicitud
        </label>
        <label class="checkbox-inline">
            <input class="toggle-vis" data-column="6" type="checkbox" type="checkbox" id="checkboxEnLinea3" value="opcion_3" > Himno
        </label>-->
        <div class="col-md-12 well">
            <div class="table-responsive">
                <table id="lista_solicitudes" class="table table-striped table-bordered table-hover">
                    <thead class="well">
                        <tr>
                            <th>Cod</th>
                            <th>Estudiante</th>
                            <th>DNI</th>
                            <th>Fecha</th>
                            <th>Tipo Solicitud</th>
                            <th style="width: 40px">Exportar</th>
                        </tr>
                    <!--<a class="fa fa-file-pdf-o"></a>-->
                    </thead>
                    <tbody id="tablaBody">
                        <?php
                        foreach ($tabla as $fila){
                            echo '<tr>'.
                                    '<td>'.$fila['CODIGO'].'</td>'.
                                    '<td>'.$fila['NOMBRE'].'</td>'.
                                    '<td class="'.$fila['DNI'].'">'.$fila['DNI'].'</td>'.
                                    '<td>'.$fila['FECHA'].'</td>'.
                                    '<td>'.$fila['TIPOSOLICITUD'].'</td>'.
                                    '<td><center><a title="'.$fila['TIPOSOLICITUD'].'" class="'.$fila['TIPOSOLICITUD'].' btn btn-danger fa fa-file-pdf-o"></a></center></td>'.
                                    '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div>
            <button class="btn btn-default" id="btnExportarDocumentos1">Constancia de Conducta</button>
            <button class="btn btn-default" id="btnExportarDocumentos2">Constancia de Himno </button>
            <button class="btn btn-default" id="btnExportarDocumentos3">Constancia de Egresado</button>
            <button class="btn btn-default" id="btnExportarDocumentos4">Constancia de PPS</button>    
        </div>
    </div>    
</div>

<script>
    $(document).ready(function(){
        var table = $("#lista_solicitudes").DataTable();
        
        $(".Constancia.de.Conducta").click(function(){
            var DNI = $(this).parents("tr").find("td").eq(2).attr('class'); 
            var cadena = "treintaiún dias del mes de octubre de dos mil quince.";
            submit_post_via_hidden_form(
                'pages/SecretariaAcademica/ConstanciaConducta.php',
                {
                    DNI: DNI,
                    cadena: cadena
                }
            );
            //alert($(this).parents("tr").find("td").eq(2).attr('class'));
        });
        
        $(".Certificación.para.PPS").click(function(){
            window.open('pages/SecretariaAcademica/ConstanciaPPS.php');
        });
        
        //PROVISIONAL los eventos click siguientes
        $("#btnExportarDocumentos1").click(function(){
            window.open('pages/SecretariaAcademica/ConstanciaConducta.php');
        });

        $("#btnExportarDocumentos2").click(function(){
            window.open('pages/SecretariaAcademica/ConstanciaHimno.php');

            //window.open('pages/SecretariaAcademica/GeneracionReportes/DocumentosReporte/LeerRTFs.php');
        });

        $("#btnExportarDocumentos3").click(function(){
            window.open('pages/SecretariaAcademica/ConstanciaEgresado.php');
            //window.open('pages/SecretariaAcademica/GeneracionReportes/DocumentosReporte/LeerRTFs.php');
        });    

        $("#btnExportarDocumentos4").click(function(){
            window.open('pages/SecretariaAcademica/ConstanciaPPS.php');
            //window.open('pages/SecretariaAcademica/GeneracionReportes/DocumentosReporte/LeerRTFs.php');
        });

    //    $("#btnExportarDocumentos").click(function(){
    //        window.open('pages/SecretariaAcademica/ConstanciaConducta.php');
    //        //window.open('pages/SecretariaAcademica/GeneracionReportes/DocumentosReporte/LeerRTFs.php');
    //    });
    });
    
                        
    function submit_post_via_hidden_form(url, params) {
        var f = $("<form target='_blank' method='POST' style='display:none;'></form>").attr({
            action: url
        }).appendTo(document.body);

        for (var i in params) {
            if (params.hasOwnProperty(i)) {
                $('<input type="hidden" />').attr({
                    name: i,
                    value: params[i]
                }).appendTo(f);
            }
        }

        f.submit();

        f.remove();
    }
</script>