<?php
	include 'plantillaTipo.php';
	require '../conexbdCasa.php';
	
	$query = "SELECT Idtipo, nametipo FROM tipo";
	$resultado = $link->query($query);
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(60,6,'ID',1,0,'C',1);
	$pdf->Cell(70,6,'NOMBRE',1,1,'C',1);
	
	
	$pdf->SetFont('Arial','',10);
	
	while($row = $resultado->fetch_assoc())
	{
		$pdf->Cell(60,6,utf8_decode($row['Idtipo']),1,0,'C');
		$pdf->Cell(70,6,$row['nametipo'],1,1,'C');
		
	}
	$pdf->Output();
?>