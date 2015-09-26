<?php

$maindir = '../../../';
include $maindir . 'fpdf/fpdf.php';
include $maindir . 'Datos/conexion.php';
include($maindir . "conexion/config.inc.php");

$identi = NULL;
$pfecha = NULL;
$tipoSolicitud = NULL;

if(isset($_SESSION["N_IDENTIDAD"]))
{
    $identi = $_SESSION["N_IDENTIDAD"];
}

if(isset($_SESSION["FECHA"]))
{
    $pfecha = $_SESSION["FECHA"];
}

if(isset($_SESSION["TIPO_SOLICITUD"]))
{
    $tipoSolicitud = $_SESSION["TIPO_SOLICITUD"];
}



            
$pdf = new FPDF();

$pdf->AddPage();
$pdf->SetFont('Arial', '', 18);
$pdf->Image($maindir.'assets/img/cabecera.png', -2,5,212,30, 'PNG');
$pdf->Image($maindir.'assets/img/lucen-aspicio.png', 78,85,200,200, 'PNG');
$pdf->Cell(18, 10, '', 0);
$pdf->Ln(30);
$pdf->SetFont('Arial', 'U', 14);
$pdf->Cell(30, 8, ' ', 0,0,"C");
$pdf->Cell(130, 8, ' Reporte de Estudiantes', 0,0,"C");
$pdf->Rect(2, 55, 206, 200 ,'D');
$pdf->SetFont('Arial', '', 12);
$pdf->Ln(15);
$pdf->Cell(115, 15, 'Fecha: '.date('Y-m-d'), 0);
$pdf->Ln(7);
$pdf->Ln(5);
$pdf->SetFont('Arial', 'B', 8);

$pdf->Cell(25, 8, 'Cuenta',1, 0,"C");
$pdf->Cell(30, 8, 'Identidad',1, 0,"C");
$pdf->Cell(45, 8, 'Estudiante',1, 0,"C");
$pdf->Cell(40, 8, 'Correo',1, 0,"C");
$pdf->Cell(10, 8, 'Indice',1, 0,"C");
$pdf->Cell(33, 8, 'Mencion Horifica',1, 0,"C");
$pdf->Cell(10, 8, 'Cant',1, 0,"C");
$pdf->Ln(8);
$pdf->SetFont('Arial', '', 8);

if($identi == NULL)
{
    $identi = 'NULL';
}
else
{
    $identi = "'" . $identi . "'";
}

if($pfecha == NULL)
{
    $pfecha = 'NULL';
}
else
{
    $pfecha = "'" . $pfecha . "'";
}                    

if($tipoSolicitud == NULL)
{
    $tipoSolicitud = 'NULL';
}                     

$query = 'select * from sa_estudiantes';

$result = mysql_query($query);

$json = array();
$contadorIteracion = 0;


while ($fila = mysql_fetch_array($result)) 
{
    $estudiante = obtenerEstudiante($fila['dni']);
    $correo = obtenerCorreo($fila['dni']);
    $mencion = obtenerMencion($fila['dni']);
    $solicitudes = obtenercantidadSolicitudes($fila['dni']);
    $pdf->Cell(25, 8, $fila['no_cuenta'],1,0,"C");
    $pdf->Cell(30, 8, $fila['dni'],1,0,"C");
    $pdf->Cell(45, 8, $estudiante,1,0,"C");
    $pdf->Cell(40, 8, $correo,1,0,"C");
    $pdf->Cell(10, 8, $fila['indice_academico']."%",1,0,"C");
    $pdf->Cell(33, 8, $mencion,1,0,"C");
    $pdf->Cell(10, 8, $solicitudes,1,0,"C");

    $pdf->Ln(8);   
    
    //$pdf->Cell($w, $h, $txt, $border)
}

$pdf->SetFont('Arial', '', 10);
$pdf->Image($maindir.'assets/img/pieDepagina.png', -2,260,212,40, 'PNG');
$pdf->Output();   

    function obtenerEstudiante($dni){
        $queryString = "SELECT Primer_nombre,Primer_apellido FROM 
                        persona p INNER JOIN sa_estudiantes e ON p.N_Identidad = e.dni WHERE e.dni = '".$dni."'";
        $query = mysql_query($queryString);
        $row = mysql_fetch_assoc($query);
        return $row['Primer_nombre']." ".$row["Primer_apellido"];
    }

    function obtenerCorreo($dni){
        $queryString = "SELECT correo from sa_estudiantes_correos where dni_estudiante ='".$dni."'";
        $query = mysql_query($queryString);
        $row = mysql_fetch_assoc($query);       
        return $row['correo'];
    }

    function obtenerMencion($dni){
        $queryString = "SELECT descripcion FROM sa_menciones_honorificas WHERE codigo in (SELECT cod_mencion FROM sa_estudiantes_menciones_honorificas WHERE dni_estudiante ='".$dni."')";
        
        $query = mysql_query($queryString);
        $row = mysql_fetch_assoc($query);       
        return $row['descripcion'];
    }

    function obtenercantidadSolicitudes($dni){
        $queryString = "SELECT COUNT(*) AS cuenta FROM sa_solicitudes WHERE dni_estudiante ='".$dni."'";
        
        $query = mysql_query($queryString);
        $row = mysql_fetch_assoc($query);       
        return $row['cuenta'];
    }

?>