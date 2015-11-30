<?php

 $maindir = "../../";

require_once($maindir."fpdf/fpdf.php");
require($maindir."conexion/config.inc.php");

$sql = "SELECT * FROM (SELECT folios.NroFolio, folios.PersonaReferente, unidad_academica.NombreUnidadAcademica AS ENTIDAD, 
                          categorias_folios.NombreCategoria, DATE(folios.FechaEntrada) as FechaEntrada,folios.FechaEntrada as Fecha, folios.TipoFolio FROM folios INNER JOIN unidad_academica ON 
                          folios.UnidadAcademica = unidad_academica.Id_UnidadAcademica INNER JOIN categorias_folios ON 
                          folios.categoria = categorias_folios.Id_Categoria UNION SELECT folios.NroFolio, folios.PersonaReferente, 
                          organizacion.NombreOrganizacion AS ENTIDAD, categorias_folios.NombreCategoria, DATE(folios.FechaEntrada) as FechaEntrada, folios.FechaEntrada as Fecha ,folios.TipoFolio 
                          FROM folios INNER JOIN organizacion ON folios.Organizacion = organizacion.Id_Organizacion INNER JOIN categorias_folios ON 
                          folios.categoria = categorias_folios.Id_Categoria) T1 WHERE TipoFolio = 1 ORDER BY Fecha DESC";

 $query = $db->prepare($sql);
    //$query ->bindParam(":Id_Seguimiento",$Id_Seguimiento);
    $query->execute();
    $rows = $query->fetchAll();

$pdf = new FPDF();

$pdf->AddPage();
$pdf->SetFont('Arial', '', 18);
$pdf->Image($maindir.'assets/img/lucen-aspicio.png', 50,30,200,200, 'PNG');
$pdf->Image($maindir.'assets/img/logo_unah.png' , 10,5,20,35, 'PNG');
$pdf->Image($maindir.'assets/img/logo-cienciasjuridicas.png' , 170,8, 35 , 35,'PNG');
$pdf->Cell(18, 10, '', 0);
$pdf->SetFont('Arial', '', 18);
$pdf->Cell(5, 10, '', 0);
$pdf->Cell(143, 10, utf8_decode("Universidad Nacional Autónoma de Honduras"), 0, 0, "C");
$pdf->Ln(25);
$pdf->SetFont('Arial', 'U', 14);
$pdf->Cell(30, 8, ' ', 0,0,"C");
$pdf->Cell(133, 8, utf8_decode("Reporte de Folios de Salida"), 0,0,"C");

$pdf->SetFont('Arial', '', 12);
$pdf->Ln(10);
$pdf->Cell(190, 8, 'Fecha: '.date('Y-m-d'), 1);
$pdf->Ln(10);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(20, 8, utf8_decode("No. de Folio"), 1,0,"C");
$pdf->Cell(60, 8, utf8_decode("Persona Referente"), 1,0,"C");
$pdf->Cell(50, 8, utf8_decode("Unidad académica u Organización"), 1,0,"C");
$pdf->Cell(30, 8, utf8_decode("NombreCategoria"), 1,0,"C");
$pdf->Cell(30, 8, utf8_decode("Fecha de Entrada"), 1,0,"C");
$pdf->Ln(8);
$pdf->SetFont('Arial', '', 8);

foreach( $rows as $row ){
    if($row['TipoFolio'] == 0){
    $tipo = "Folio de entrada";
    }elseif($row['TipoFolio'] == 1){
        $tipo = "Folio de salida";
    }
        


        $cadena=$row["PersonaReferente"];


    if (strlen($cadena)<40) {
              $pdf->Cell(20, 8, utf8_decode($row['NroFolio']),1,0,"C");
              $pdf->Cell(60, 8, utf8_decode($cadena), 1,0,"C");
              $pdf->Cell(50, 8, utf8_decode($row["ENTIDAD"]),1,0,"C");
              $pdf->Cell(30, 8, utf8_decode($row['NombreCategoria']), 1,0,"C");
              $pdf->Cell(30, 8, utf8_decode($row["FechaEntrada"]), 1,0,"C");
              $pdf->Ln();
        
    } else {

        $prim="1";
        while ( strlen($cadena)>40 ) {
        $cadena2=substr($cadena,1,40);
        $ultima=substr($cadena2,-1);
        $cadena3=substr($cadena,40 , strlen($cadena));


        if ($ultima==" ") {


            if ($prim==1) {
              $pdf->Cell(20, 8, utf8_decode($row["NroFolio"]), "L,R",0,"C");
              $pdf->Cell(60, 8, utf8_decode($cadena2), "L,R",0,"C");
              $pdf->Cell(50, 8, utf8_decode($row["ENTIDAD"]), "L,R",0,"C");
              $pdf->Cell(30, 8, utf8_decode($row['NombreCategoria']), 1,0,"C");
              $pdf->Cell(30, 8, utf8_decode($row["FechaEntrada"]), "L,R",0,"C");
              $pdf->Ln();
              $prim=2;



            } else {
                
                $pdf->Cell(20, 8, utf8_decode(""), "L,R");
              $pdf->Cell(60, 8, utf8_decode($cadena2), "L,R",0,"C");
              $pdf->Cell(50, 8, utf8_decode(""), "L,R");
              $pdf->Cell(30, 8, utf8_decode(""), "L,R");
              $pdf->Cell(30, 8, utf8_decode(""), "L,R");
              $pdf->Ln();
            }
            
              
            
        } else {
            $cadena2=$cadena2."-";


            if ($prim==1) {
                $pdf->Cell(20, 8, utf8_decode($row["NroFolio"]), "L,R",0,"C");
              $pdf->Cell(60, 8, utf8_decode($cadena2), "L,R",0,"C");
              $pdf->Cell(50, 8, utf8_decode($row["ENTIDAD"]), "L,R",0,"C");
              $pdf->Cell(30, 8, utf8_decode($row['NombreCategoria']), 1,0,"C");
              $pdf->Cell(30, 8, utf8_decode($row["FechaEntrada"]), "L,R",0,"C");
              $pdf->Ln();
              $prim=2;


            } else {
                $pdf->Cell(20, 8, utf8_decode(""), "L,R");
              $pdf->Cell(60, 8, utf8_decode($cadena2), "L,R",0,"C");
              $pdf->Cell(50, 8, utf8_decode(""), "L,R");
              $pdf->Cell(30, 8, utf8_decode(""), "L,R");
              $pdf->Cell(30, 8, utf8_decode(""), "L,R");
              $pdf->Ln();
            }
            
            

            
            
        }
        $cadena=$cadena3;
        if (strlen($cadena)<40) {
            $pdf->Cell(20, 8, utf8_decode(""), "L,R,B");
              $pdf->Cell(60, 8, utf8_decode($cadena), "L,R,B",0,"C");
              $pdf->Cell(50, 8, utf8_decode(""), "L,R,B");
              $pdf->Cell(30, 8, utf8_decode(""), "L,R,B");
              $pdf->Cell(30, 8, utf8_decode(""), "L,R,B");
              $pdf->Ln();

            $cadena="";
        } 
        }
    }
    



    };

     
    




$pdf->SetFont('Arial', '', 10);


$pdf->Output('reporte.pdf','I');

?>
