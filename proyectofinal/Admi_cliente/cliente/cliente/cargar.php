<?php
include ("conexion.php");

if(isset($_FILES['img'])){

    $nombreImg = $_FILES['img']['name'];
    $ruta = $_FILES['img']['tmp_name'];
    $destino = "imagenes/".$nombreImg;
   
      if (copy($ruta,$destino)) {

            $sql = "INSERT INTO `imagenes`(`nombre`, `ruta`) VALUES ('$nombreImg','$destino')";
            $res = mysqli_query($cn, $sql);
            if ($res) {
                echo "<script>alert('Agregado Correctamente');window.location='VenderRentar.php'</script>";
            } else {
                die("Problemas al insertar".mysqli_error($cn));
            }

        }
}

?>



