<?php
//Inicio onfiguracion de sesión
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

} else {
	header('Location:login.php');
	exit;
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Sistema</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper{
            width: 650px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>



    </head>



    <body class="sb-nav-fixed">
       <!--1copiar desde aqui-->
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="indexCliente.html">Usuario</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <a class="navbar-brand" href="editarperfil.php"><?php echo $_SESSION['usuario']; ?></a>
        </nav>
        <!--1copiar hasta aqui-->

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Opciones</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Propiedades
                            </a>    
                        </div>
                        <div class="nav">
                            <a class="nav-link" href="indexCliente.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Usuarios
                            </a>    
                        </div>
                        <div class="nav">
                            <a class="nav-link" href="indexNosotros.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Nosotros
                            </a>    
                        </div>
                        <div class="nav">
                            <a class="nav-link" href="indexTipo.php">
                                <div class="sb-nav-link-icon"><i class='fas fa-synagogue' style='font-size:12px'></i></div>
                                Tipo
                            </a>    
                        </div>
                        
                       <!--2copiar desde aqui-->
                     <div class="nav">
                            <a class="nav-link" href="../../cliente/cliente/cerrarsesion.php">
                                <div class="sb-nav-link-icon"><i class='fas fa-synagogue' style='font-size:12px'></i></div>
                                Cerrar sesión
                            </a>    
                        </div>
                        <!--2copiar hasta aqui-->

                        
                        
                        
                    </div>
                    

                    <div class="sb-sidenav-footer">
                        <div class="small">J&V</div>
                        Inmobiliaria
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Pagina principal</h1>   
                    </div>
                </main>

                <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Usuarios</h2>
                        <a href="createCliente.php" class="btn btn-success pull-right">Agregar nuevo </a>
                        <a href="reporte/reportecliente.php" class="btn btn-success pull-right">Generar Reporte</a>
                    </div>
                    <?php
                    // Include config file
                    require_once "conexCasa.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM cliente";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>ID CASA</th>";
                                        echo "<th>Nombre</th>";
                                        echo "<th>PRIMER APELLIDO</th>";
                                        echo "<th>SEGUNDO APELLIDO</th>";
                                        echo "<th>CORREO</th>";
                                        echo "<th>CELULAR 1</th>";
                                        echo "<th>CELULAR 2</th>";
                                        echo "<th>TELEFONO</th>";
                                        echo "<th>CONTRASEÑA</th>";
                                        echo "<th>PAIS</th>";
                                        echo "<th>CIUDAD</th>";
                                        echo "<th>ESTADO</th>";
                                        echo "<th>CALLE</th>";
                                        echo "<th>CRUZAMIENTOS</th>";
                                        echo "<th>NUMERO</th>";
										echo "<th>TIPO</th>";

                                        echo "<th>ACCIONES</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['idc'] . "</td>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['ape1'] . "</td>";
                                        echo "<td>" . $row['ape2'] . "</td>";
                                        echo "<td>" . $row['correo'] . "</td>";
                                        echo "<td>" . $row['cel1'] . "</td>";
                                        echo "<td>" . $row['cel2'] . "</td>";
                                        echo "<td>" . $row['tel'] . "</td>";
                                        echo "<td>" . $row['contra'] . "</td>";
                                        echo "<td>" . $row['pais'] . "</td>";
                                        echo "<td>" . $row['ciudad'] . "</td>";
                                        echo "<td>" . $row['edo'] . "</td>";
                                        echo "<td>" . $row['calle'] . "</td>";
                                        echo "<td>" . $row['cruza'] . "</td>";
                                        echo "<td>" . $row['num'] . "</td>";
										 echo "<td>" . $row['tipo'] . "</td>";
                                        echo "<td>";
                                            echo "<a href='readCliente.php?idc=". $row['idc'] ."' title='Ver' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                            echo "<a href='updateCliente.php?idc=". $row['idc'] ."' title='Actualizar' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            echo "<a href='deleteCliente.php?idc=". $row['idc'] ."' title='Borrar' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }
 
                    // Close connection
                    mysqli_close($link);
                    ?>
                </div>
            </div>        
        </div>
    </div>


                
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>
