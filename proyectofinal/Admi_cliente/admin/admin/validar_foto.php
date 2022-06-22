<?php
require_once 'conex.php';
$nom=$_REQUEST["txtnom"];
$foto=$_FILES["imagen_hortaliza"]["name"];
$ruta=$_FILES["imagen_hortaliza"]["tmp_name"];
$destino="imagenes/plantas/".$foto;
copy($ruta,$destino);
mysql_query("insert into hortalizas (tipo_foto,imagen_hortaliza) values('$nom','$destino')");
header("Location: indexhortalizas.php");
?>