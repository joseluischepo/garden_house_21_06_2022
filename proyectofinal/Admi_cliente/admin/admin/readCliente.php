<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

} else {
	header('Location:login.php');
	exit;
}
// Check existence of id parameter before processing further
if(isset($_GET["idc"]) && !empty(trim($_GET["idc"]))){
    // Include config file
    require_once "conexCasa.php";
    
    // Prepare a select statement
    $sql = "SELECT * FROM cliente WHERE idc = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_idc);
        
        // Set parameters
        $param_idc = trim($_GET["idc"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                // Retrieve individual field value
                $name = $row["name"];
                $ape1 = $row["ape1"];
                $ape2 = $row["ape2"];
                $correo = $row["correo"];
                $cel1 = $row["cel1"];
                $cel2 = $row["cel2"];
                $tel = $row["tel"];
                $contra = $row["contra"];
                $pais = $row["pais"];
                $ciudad = $row["ciudad"];
                $edo = $row["edo"];
                $calle = $row["calle"];
                $cruza = $row["cruza"];
                $num = $row["num"];


            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: errorCliente.php");
                exit();
            }
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($link);
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: errorCliente.php");
    exit();
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
            <a class="navbar-brand" href="index.html">Sistema administrator</a>
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
                                Cerrar sesi??n
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
                    <div class="page-header">
                        <h1>Ver Empleado</h1>
                    </div>
					<div class="form-group">
                    <label>Nombre</label>
                        <p class="form-control-static"><?php echo $row["name"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Primer apellido</label>
                        <p class="form-control-static"><?php echo $row["ape1"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Segundo apellido</label>
                        <p class="form-control-static"><?php echo $row["ape2"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Correo</label>
                        <p class="form-control-static"><?php echo $row["correo"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Celular 1</label>
                        <p class="form-control-static"><?php echo $row["cel1"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Telefono</label>
                        <p class="form-control-static"><?php echo $row["tel"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Contrase??a</label>
                        <p class="form-control-static"><?php echo $row["contra"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Pais</label>
                        <p class="form-control-static"><?php echo $row["pais"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Ciudad</label>
                        <p class="form-control-static"><?php echo $row["ciudad"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Estado</label>
                        <p class="form-control-static"><?php echo $row["edo"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Calle</label>
                        <p class="form-control-static"><?php echo $row["calle"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Cruzamientos</label>
                        <p class="form-control-static"><?php echo $row["cruza"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Numero</label>
                        <p class="form-control-static"><?php echo $row["num"]; ?></p>
                    </div>

         			  <p><a href="indexCliente.php" class="btn btn-primary">Volver</a></p>
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
