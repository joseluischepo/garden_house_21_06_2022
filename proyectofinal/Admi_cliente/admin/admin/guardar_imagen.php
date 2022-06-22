<?php

    include("conex.php");
    $tipo_hortaliza = $_POST['tipo_hortaliza'];
    $imagen = addslashes(file_get_contents($_FILES['imagen_hortaliza']['tmp_name']));
    $query = "INSERT INTO hortalizas(tipo_hortaliza,imagen_hortaliza) VALUES('$tipo_hortaliza','$imagen')";
    
    $resultado = $conexion->query($query);

?>