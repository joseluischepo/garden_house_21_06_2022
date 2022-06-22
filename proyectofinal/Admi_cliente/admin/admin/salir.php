<?php
session_start();
session_destroy();

header('location: ../../cliente/cliente/index.php');


?>