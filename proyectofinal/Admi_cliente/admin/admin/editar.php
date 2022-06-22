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

    $idca = $_POST['idca'];
	


    
   

	$titulo = $_POST['titulo'];
	$precio = $_POST['precio'];
/*$foto = $_FILES['foto']['name'];
	$ruta = $_FILES['foto']['tmp_name'];*/
	$sup = $_POST['sup'];
    $descri = $_POST['descri'];
    $vr = $_POST['vr'];
    $Idtipo = $_POST['Idtipo'];
    $pais = $_POST['pais'];
    $edo = $_POST['edo'];
    $muni = $_POST['muni']; 
 	$loca = $_POST['loca'];
	$col = $_POST['col'];
	$calle = $_POST['calle'];
	$cruza = $_POST['cruza'];
	$num = $_POST['num'];
	$status = $_POST['status'];
	//$dir_subida = "imagenes/".$foto;
	//$fichero_subido = $dir_subida . basename($_FILES['foto']['name']);

	
	
	
            /*if (copy($ruta,$dir_subida)) {
                $sql = "UPDATE `entrega24`.`casa2`SET `foto` = '$dir_subida' WHERE `idca` = '$idca'";
                $res = mysqli_query($conn, $sql);
            }*/


			$query = "UPDATE `entrega24`.`casa2` SET `titulo` = '$titulo', `precio` = '$precio', `sup`= '$sup' , 
                         `descri` = '$descri', `vr` = '$vr', `Idtipo` = '$Idtipo', `pais` = '$pais', `edo` = '$edo',
                         `muni` = '$muni', `loca` = '$loca', `col` = '$col', `calle` = '$calle', `cruza` = '$cruza', `num` = '$num', `status` = '$status' WHERE `idca` = '$idca'";
	
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


