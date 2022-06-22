
<?php
include_once 'userS.php';
include_once 'sesiones.php';

$userSession = new UserSession();
$user = new user();

if(isset($_SESSION['user'])){
    echo "hay sessio";

}elseif(isset($_POST['username']) && isset($_POST['password'])){
    echo "validaciion";

}else{

    echo "InicioDeSesion"; 
}



?>