<?php
include ("conexion.php");

if(isset($_GET))
{

    $id=0;
    $ruta='';
    $id=$_GET['id'];
    $ruta=$_GET['ruta'];
    $sql="DELETE FROM `tbimg` WHERE id='".$id."'";
    //si el query encontro un resultado entoces eliminada de la ruta $ruta-contiene la ruta de la imagen
    $res=mysqli_query($cn,$sql);
    if($res)
    {
        //elimina y redirecciona al archivo index.php
        unlink($ruta);
        echo '<script>alert("Eliminado Correctamente"); window.location="../VenderRentar.php";</script>';
    }

}

?>



