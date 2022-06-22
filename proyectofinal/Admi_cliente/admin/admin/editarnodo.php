<?php   
 session_start();  
 ?>  
<?php
	include '../bd/conn.php';
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

    $idn = $_POST['idn'];
	


    
   

	
    $tipo_h = $_POST['tipo_h'];
    
	//$dir_subida = "imagenes/".$foto;
	//$fichero_subido = $dir_subida . basename($_FILES['foto']['name']);

	
	
	
            /*if (copy($ruta,$dir_subida)) {
                $sql = "UPDATE `entrega24`.`casa2`SET `foto` = '$dir_subida' WHERE `idca` = '$idca'";
                $res = mysqli_query($conn, $sql);
            }*/


			$query = "UPDATE `garden_house`.`nodo` SET `tipo_h` = '$tipo_h' WHERE `idn` = '$idn'";
	
			if (mysqli_query($conn, $query)) {
				$result = mysqli_query($conn, $query);
				$row = mysqli_fetch_assoc($result);
    			echo "Datos guardados";
    			header('Location: index.php');
				} else {
        		echo "Error: " . $query . "<br>" . mysqli_error($conn);
			}	
			mysqli_close($conn);
?>
