<?php
	include 'plantilla1.php';
	require '../conexbdCasa.php';
	
	$sql = "SELECT  titulo, precio, sup, vr, Idtipo, pais, edo, muni, col, calle, cruza, num, status  FROM casa2 ";
	$resultado = $link->query($sql);
	
	$pdf = new PDF();

	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',7);
    $pdf->Cell(16,6,'TITULO',1,0,'C',1);
	$pdf->Cell(13,6,' PRECIO',1,0,'C',1);
    $pdf->Cell(18,6,'SUPER',1,0,'C',1);
    $pdf->Cell(13,6,'VER',1,0,'C',1);
    $pdf->Cell(10,6,'TIPO',1,0,'C',1);
    $pdf->Cell(15,6,'PAIS',1,0,'C',1);
	$pdf->Cell(13,6,'ESTADO',1,0,'C',1);
    $pdf->Cell(15,6,'MUNICIPIO ',1,0,'C',1);
	$pdf->Cell(12,6,'COLONIA',1,0,'C',1);
    $pdf->Cell(10,6,'CALLE',1,0,'C',1);
	$pdf->Cell(12,6,'CRUZA',1,0,'C',1);
	$pdf->Cell(8,6,'NUM',1,0,'C',1);
	$pdf->Cell(15,6,'ESTATUS',1,1,'C',1);
	
	
	
	
	$pdf->SetFont('Arial','',6);
	while($row = $resultado->fetch_assoc())
	{
		$pdf->Cell(16,20,$row['titulo'],1,0,'C');
        $pdf->Cell(13,20,utf8_decode($row['precio']),1,0,'C');
		$pdf->Cell(18,20,$row['sup'],1,0,'C');
        $pdf->Cell(13,20,utf8_decode($row['vr']),1,0,'C');
		$pdf->Cell(10,20,$row['Idtipo'],1,0,'C');
        $pdf->Cell(15,20,utf8_decode($row['pais']),1,0,'C');
        $pdf->Cell(13,20,utf8_decode($row['edo']),1,0,'C');
        $pdf->Cell(15,20,$row['muni'],1,0,'C');
        $pdf->Cell(12,20,utf8_decode($row['col']),1,0,'C');
        $pdf->Cell(10,20,$row['calle'],1,0,'C');
		$pdf->Cell(12,20,$row['cruza'],1,0,'C');
		$pdf->Cell(8,20,$row['num'],1,0,'C');
		$pdf->Cell(15,20,$row['status'],1,1,'C');
	}
	$pdf->Output();
?>
