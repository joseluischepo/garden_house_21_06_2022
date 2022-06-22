<?php
//Inicio onfiguracion de sesión
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

} else {
	header('Location:login.php');
	exit;
}
?>

<!-- esta es la de J&V_YafuncionaBDRegistro_23-06-20/admin/create.php -->
<?php
// Include config file
require_once "conex.php";
 
// Define variables and initialize with empty values
$tipo_h = $idu = "";
$tipo_h_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
	
	// Validate tipo de casa
    $input_tipo_h = trim($_POST["tipo_h"]);
    if(empty($input_tipo_h)){
        $tipo_h_err = "Por favor ingrese su tipo de casa.";     
    } else{
        $tipo_h = $input_tipo_h;
    }
	
   
  
	$idu = $_SESSION['iduser'];
    
    // Check input errors before inserting in database
     if(empty($tipo_h_err)){
        // Prepare an insert statement
         $sql = "INSERT INTO nodo (tipo_h,idu) VALUES (?,?)";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_tipo_h, $param_idu);
            
            // Set parameters
            $param_tipo_h = $tipo_h;           
            $param_idu = $idu;      
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: index.php"); //pendiente checar esto
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
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
            <a class="navbar-brand" href="index.html">Usuario</a>
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
                                Nodos
                            </a>    
                        </div>
                        <?php
                        if($_SESSION['tipo'] == 1){
                            echo "<div class='nav'>
                            <a class='nav-link' href='indexUsuarios.php'>
                                <div class='sb-nav-link-icon'><i class='fas fa-tachometer-alt'></i></div>
                                Usuarios
                            </a>    
                        </div>
                        <div class='nav'>
                            <a class='nav-link' href='indexhortalizas.php'>
                                <div class='sb-nav-link-icon'><i class='fas fa-tachometer-alt'></i></div>
                                Hortalizas
                            </a>    
                        </div>
                        <div class='nav'>
                            <a class='nav-link' href='GHAM.php'>
                                <div class='sb-nav-link-icon'><i class='fas fa-tachometer-alt'></i></div>
                                Grafica Humedad Ambiental
                            </a>    
                        </div>
                        <div class='nav'>
                            <a class='nav-link' href='GNA.php'>
                                <div class='sb-nav-link-icon'><i class='fas fa-tachometer-alt'></i></div>
                                Grafica Nivel Agua
                            </a>    
                        </div>
                        <div class='nav'>
                            <a class='nav-link' href='GHT.php'>
                                <div class='sb-nav-link-icon'><i class='fas fa-tachometer-alt'></i></div>
                                Grafica Humedad de la Tierra
                            </a>    
                        </div>
                        <div class='nav'>
                            <a class='nav-link' href='GTA.php'>
                                <div class='sb-nav-link-icon'><i class='fas fa-synagogue' style='font-size:12px'></i></div>
                                Grafica Temperatura del Agua
                            </a>    
                        </div>";
                        }
                        ?>
                        
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
                        <div class="small">CRIP-IOT</div>
                        IOT
                    </div>
                    
                </nav>
            </div>
            <div id="layoutSidenav_content">
                
        <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Agregar planta</h2>
                    </div>
                    <p>Seleccione su hortaliza.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                       	
                        <div class="form-group <?php echo (!empty($tipo_h_err)) ? 'has-error' : ''; ?>">
                            <label>Tipo</label>
                            
								<select name="tipo_h" id="tipo_h" class="form-control">
									<option value="0">Elegir</option>
                                    <?php
								
									$query = "SELECT titulo FROM hortalizas";
									$resultado=$link->query($query);
									?>
									<?php while($row = $resultado->fetch_assoc()) { ?>
									<option value="<?php echo $row['titulo']; ?>"><?php echo $row['titulo']; ?></option>
									<?php } ?>
								</select>
						</div>
                            
                            
                       
					
                        
					
                           <div class="row form-group ">
                        <input type="submit" class="btn btn-primary" value="Registrar">  
                        <a href="index.php" class="btn btn-default">Cancelar</a>

        
                    </form>   
            
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

        </div>   
    </body>
</html>
