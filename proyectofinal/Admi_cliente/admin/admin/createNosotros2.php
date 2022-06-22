<?php
// Include config file
require_once "conexbdCasa.php";
 
//Inicio onfiguracion de sesión
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

} else {
	header('Location:login.php');
	exit;
}
// Define variables and initialize with empty values
$nosotroscol = $mision = $vision = $integrante1 = $integrante2 = $integrante3 = $integrante4 = $prof1 = $prof2 = $prof3 = $prof4 = $i1descri = $i2descri = $i3descri = $i4descri = "";
$nosotroscol_err = $mision_err = $vision_err = $integrante1_err = $integrante2_err = $integrante3_err = $integrante4_err = $prof1_err = $prof2_err = $prof3_err = $prof4_err = $i1descri_err = $i2descri_err = $i3descri_err = $i4descri_err = "";               
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate nosotroscol
    $input_nosotroscol = trim($_POST["nosotroscol"]);
    if(empty($input_nosotroscol)){
        $nosotroscol_err = "Por favor ingrese la descripcion.";
    } elseif(!filter_var($input_nosotroscol, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $nosotroscol_err = "Por favor ingrese una descripcion válida.";
    } else{
        $nosotroscol = $input_nosotroscol;
    }
    
	 // Validate mision
    $input_mision = trim($_POST["mision"]);
    if(empty($input_mision)){
        $mision_err = "Por favor ingrese el nombre del empleado.";
    } elseif(!filter_var($input_mision, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $mision_err = "Por favor ingrese un nombre válido.";
    } else{
        $mision = $input_mision;
    }
	
	// Validate vision
    $input_vision = trim($_POST["vision"]);
    if(empty($input_vision)){
        $vision_err = "Por favor ingrese el nombre del empleado.";
    } elseif(!filter_var($input_vision, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $vision_err = "Por favor ingrese un nombre válido.";
    } else{
        $vision = $input_vision;
    }
	
	// Validate integrante1
    $input_integrante1 = trim($_POST["integrante1"]);
    if(empty($input_integrante1)){
        $integrante1_err = "Por favor ingrese el nombre del empleado.";
    } elseif(!filter_var($input_integrante1, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $integrante1_err = "Por favor ingrese un nombre válido.";
    } else{
        $integrante1 = $input_integrante1;
    }
   
   // Validate integrante2
    $input_integrante2 = trim($_POST["integrante2"]);
    if(empty($input_integrante2)){
        $integrante2_err = "Por favor ingrese el nombre del empleado.";
    } elseif(!filter_var($input_integrante2, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $integrante2_err = "Por favor ingrese un nombre válido.";
    } else{
        $integrante2 = $input_integrante2;
    }
	// Validate integrante3
    $input_integrante3 = trim($_POST["integrante3"]);
    if(empty($input_integrante3)){
        $integrante3_err = "Por favor ingrese el nombre del empleado.";
    } elseif(!filter_var($input_integrante3, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $integrante3_err = "Por favor ingrese un nombre válido.";
    } else{
        $integrante3 = $input_integrante3;
    }
	
	// Validate integrante4
    $input_integrante4 = trim($_POST["integrante4"]);
    if(empty($input_integrante4)){
        $integrante4_err = "Por favor ingrese el nombre del empleado.";
    } elseif(!filter_var($input_integrante4, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $integrante4_err = "Por favor ingrese un nombre válido.";
    } else{
        $integrante4 = $input_integrante4;
    }
	// Validate prof1
    $input_prof1 = trim($_POST["prof1"]);
    if(empty($input_prof1)){
        $prof1_err = "Por favor ingrese el nombre del empleado.";
    } elseif(!filter_var($input_prof1, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $prof1_err = "Por favor ingrese un nombre válido.";
    } else{
        $prof1 = $input_prof1;
    }
	// Validate prof2
    $input_prof2 = trim($_POST["prof2"]);
    if(empty($input_prof2)){
        $prof2_err = "Por favor ingrese el nombre del empleado.";
    } elseif(!filter_var($input_prof2, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $prof2_err = "Por favor ingrese un nombre válido.";
    } else{
        $prof2 = $input_prof2;
    }
	// Validate prof3
    $input_prof3 = trim($_POST["prof3"]);
    if(empty($input_prof3)){
        $prof3_err = "Por favor ingrese el nombre del empleado.";
    } elseif(!filter_var($input_prof3, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $prof3_err = "Por favor ingrese un nombre válido.";
    } else{
        $prof3 = $input_prof3;
    }
   
  // Validate prof4
    $input_prof4 = trim($_POST["prof4"]);
    if(empty($input_prof4)){
        $prof4_err = "Por favor ingrese el nombre del empleado.";
    } elseif(!filter_var($input_prof4, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $prof4_err = "Por favor ingrese un nombre válido.";
    } else{
        $prof4 = $input_prof4;
    }
	// Validate i1descri
    $input_i1descri = trim($_POST["i1descri"]);
    if(empty($input_i1descri)){
        $i1descri_err = "Por favor ingrese el nombre del empleado.";
    } elseif(!filter_var($input_i1descri, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $i1descri_err = "Por favor ingrese un nombre válido.";
    } else{
        $i1descri = $input_i1descri;
    }
	// Validate i2descri
    $input_i2descri = trim($_POST["i2descri"]);
    if(empty($input_i2descri)){
        $i2descri_err = "Por favor ingrese el nombre del empleado.";
    } elseif(!filter_var($input_i2descri, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $i2descri_err = "Por favor ingrese un nombre válido.";
    } else{
        $i2descri = $input_i2descri;
    }
	// Validate i3descri
    $input_i3descri = trim($_POST["i3descri"]);
    if(empty($input_i3descri)){
        $i3descri_err = "Por favor ingrese el nombre del empleado.";
    } elseif(!filter_var($input_i3descri, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $i3descri_err = "Por favor ingrese un nombre válido.";
    } else{
        $i3descri = $input_i3descri;
    }
	// Validate i4descri
    $input_i4descri = trim($_POST["i4descri"]);
    if(empty($input_i4descri)){
        $i4descri_err = "Por favor ingrese el nombre del empleado.";
    } elseif(!filter_var($input_i4descri, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $i4descri_err = "Por favor ingrese un nombre válido.";
    } else{
        $i4descri = $input_i4descri;
    }
	
    
    // Check input errors before inserting in database
    if(empty($nosotroscol_err) && empty($mision_err) && empty($vision_err) && empty($integrante1_err) && empty($integrante2_err) && empty($integrante3_err) && empty($integrante4_err) && empty($prof1_err) && empty($prof2_err) && empty($prof3_err) && empty($prof4_err) && empty($i1descri_err) && empty($i2descri_err) && empty($i3descri_err) && empty($i4descri_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO nosotros (nosotroscol,mision,vision,integrante1,integrante2,integrante3,integrante4,prof1,prof2,prof3,prof4,i1descri,i2descri,i3descri,i4descri) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssssssssssss", $param_nosotroscol, $param_mision,$param_vision,$param_integrante1,$param_integrante2,$param_integrante3,$param_integrante4,$param_prof1,$param_prof2,$param_prof3,$param_prof4,$param_i1descri,$param_i2descri,$param_i3descri,$param_i4descri);
            
            // Set parameters
            $param_nosotroscol = $nosotroscol;
            $param_mision = $mision;
			$param_vision = $vision;
			$param_integrante1 = $integrante1;
			$param_integrante2 = $integrante2;
			$param_integrante3 = $integrante3;
			$param_integrante4 = $integrante4;
			$param_prof1 = $prof1; 
			$param_prof2 = $prof2;
			$param_prof3 = $prof3;
			$param_prof4 = $prof4; 
			$param_i1descri = $i1descri;
			$param_i2descri = $i2descri; 
			$param_i3descri = $i3descri;
			$param_i4descri = $i4descri;
			              
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: indexNosotros.php"); //pendiente checar esto
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
                    <div class="page-header">
                        <h2>Agregar casa</h2>
                    </div>
                    <p>Escriba sin dejar los campos vacios.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">

                         <div class="form-group <?php echo (!empty($nosotroscol_err)) ? 'has-error' : ''; ?>">
                            <label>Nosotros</label>
                            <textarea name="nosotroscol" class="form-control"><?php echo $nosotroscol; ?></textarea>
                            <span class="help-block"><?php echo $nosotroscol_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($mision_err)) ? 'has-error' : ''; ?>">
                            <label>Mision</label>
                            <textarea name="mision" class="form-control"><?php echo $mision; ?></textarea>
                            <span class="help-block"><?php echo $mision_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($vision_err)) ? 'has-error' : ''; ?>">
                            <label>Vision</label>
                            <textarea name="vision" class="form-control" ><?php echo $vision; ?></textarea>
                            <span class="help-block"><?php echo $vision_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($integrante1_err)) ? 'has-error' : ''; ?>">
                            <label>integrante1</label>
                            <textarea name="integrante1" class="form-control"><?php echo $integrante1; ?></textarea>
                            <span class="help-block"><?php echo $integrante1_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($integrante2_err)) ? 'has-error' : ''; ?>">
                            <label>integrante2</label>
                            <input type="text" name="integrante2" class="form-control" value="<?php echo $integrante2; ?>">
                            <span class="help-block"><?php echo $integrante2_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($integrante3_err)) ? 'has-error' : ''; ?>">
                            <label>integrante3</label>
                            <input type="text" name="integrante3" class="form-control" value="<?php echo $integrante3; ?>">
                            <span class="help-block"><?php echo $integrante3_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($integrante4_err)) ? 'has-error' : ''; ?>">
                            <label>integrante4</label>
                            <input type="text" name="integrante4" class="form-control" value="<?php echo $integrante4; ?>">
                            <span class="help-block"><?php echo $integrante4_err;?></span>
                        </div>
                        
                         <div class="form-group <?php echo (!empty($prof1_err)) ? 'has-error' : ''; ?>">
                            <label>prof1</label>
                            <input type="text" name="prof1" class="form-control" value="<?php echo $prof1; ?>">
                            <span class="help-block"><?php echo $prof1_err;?></span>
                        </div>
                        
                         <div class="form-group <?php echo (!empty($prof2_err)) ? 'has-error' : ''; ?>">
                            <label>prof2</label>
                            <input type="text" name="prof2" class="form-control" value="<?php echo $prof2; ?>">
                            <span class="help-block"><?php echo $prof2_err;?></span>
                        </div>
                        
                         <div class="form-group <?php echo (!empty($prof3_err)) ? 'has-error' : ''; ?>">
                            <label>prof3</label>
                            <input type="text" name="prof3" class="form-control" value="<?php echo $prof3; ?>">
                            <span class="help-block"><?php echo $prof3_err;?></span>
                        </div>
                        
                         <div class="form-group <?php echo (!empty($prof4_err)) ? 'has-error' : ''; ?>">
                            <label>prof4</label>
                            <input type="text" name="prof4" class="form-control" value="<?php echo $prof4; ?>">
                            <span class="help-block"><?php echo $prof4_err;?></span>
                        </div>
                        
                         <div class="form-group <?php echo (!empty($i1descri_err)) ? 'has-error' : ''; ?>">
                            <label>i1descri</label>
                            <input type="text" name="i1descri" class="form-control" value="<?php echo $i1descri; ?>">
                            <span class="help-block"><?php echo $i1descri_err;?></span>
                        </div>
                        
                         <div class="form-group <?php echo (!empty($i2descri_err)) ? 'has-error' : ''; ?>">
                            <label>i2descri</label>
                            <input type="text" name="i2descri" class="form-control" value="<?php echo $i2descri; ?>">
                            <span class="help-block"><?php echo $i2descri_err;?></span>
                        </div>
                        
                         <div class="form-group <?php echo (!empty($i3descri_err)) ? 'has-error' : ''; ?>">
                            <label>i3descri</label>
                            <input type="text" name="i3descri" class="form-control" value="<?php echo $i3descri; ?>">
                            <span class="help-block"><?php echo $i3descri_err;?></span>
                        </div>
                        
                         <div class="form-group <?php echo (!empty($i4descri_err)) ? 'has-error' : ''; ?>">
                            <label>i4descri</label>
                            <input type="text" name="i4descri" class="form-control" value="<?php echo $i4descri; ?>">
                            <span class="help-block"><?php echo $i4descri_err;?></span>
                        </div>

                        <input type="hidden" name="idnosotros" value="<?php echo $idnosotros; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Enviar">
                        <a href="indexNosotros.php" class="btn btn-default">Cancelar</a>
                         
                    </form>
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