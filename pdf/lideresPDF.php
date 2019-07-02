<?php
 require_once 'fpdf/fpdf.php';
    

    $pdf = new FPDF();
    $pdf = AddPage();
    $pdf ->SetFont('Arial','B','15');
    $pdf->Cell(100, 10,'hola');
    $pdf = Output();


?>