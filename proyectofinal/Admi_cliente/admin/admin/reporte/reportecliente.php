<?php
	include 'plantilla.php';
	require '../conexbdCasa.php';
	
	$sql = "SELECT idc,name,ape1, ape2, correo,cel1, cel2, tel, pais, ciudad, edo, calle, cruza, tipo  FROM cliente WHERE tipo = 2";
	$resultado = $link->query($sql);
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',6);
    $pdf->Cell(4,6,'ID',1,0,'C',1);
    $pdf->Cell(10,6,'NOMBRE',1,0,'C',1);
	$pdf->Cell(13,6,'APELLIDO 1',1,0,'C',1);
    $pdf->Cell(13,6,'APELLIDO 2',1,0,'C',1);
    $pdf->Cell(30,6,'CORREO',1,0,'C',1);
	$pdf->Cell(15,6,'CELULAR 1',1,0,'C',1);
    $pdf->Cell(15,6,'CELULAR 2',1,0,'C',1);
    $pdf->Cell(15,6,'TELEFONO',1,0,'C',1);
	$pdf->Cell(13,6,'PAIS',1,0,'C',1);
    $pdf->Cell(15,6,'CIUDAD ',1,0,'C',1);
    $pdf->Cell(15,6,'ESTADO',1,0,'C',1);
	$pdf->Cell(8,6,'CALLE',1,0,'C',1);
    $pdf->Cell(13,6,'CRUZA',1,0,'C',1);
	$pdf->Cell(5,6,'TIPO',1,1,'C',1);
	
	
	
	$pdf->SetFont('Arial','',8);
	
	while($row = $resultado->fetch_assoc())
	{
		$pdf->Cell(4,6,utf8_decode($row['idc']),1,0,'C');
		$pdf->Cell(10,6,$row['name'],1,0,'C');
        $pdf->Cell(13,6,utf8_decode($row['ape1']),1,0,'C');
        $pdf->Cell(13,6,utf8_decode($row['ape2']),1,0,'C');
		$pdf->Cell(30,6,$row['correo'],1,0,'C');
        $pdf->Cell(15,6,utf8_decode($row['cel1']),1,0,'C');
        $pdf->Cell(15,6,utf8_decode($row['cel2']),1,0,'C');
		$pdf->Cell(15,6,$row['tel'],1,0,'C');
        $pdf->Cell(13,6,utf8_decode($row['pais']),1,0,'C');
        $pdf->Cell(15,6,$row['ciudad'],1,0,'C');
		$pdf->Cell(15,6,$row['edo'],1,0,'C');
        $pdf->Cell(8,6,utf8_decode($row['calle']),1,0,'C');
        $pdf->Cell(13,6,utf8_decode($row['cruza']),1,0,'C');
		$pdf->Cell(5,6,$row['tipo'],1,1,'C');
		
	}
	$pdf->Output();
?>
