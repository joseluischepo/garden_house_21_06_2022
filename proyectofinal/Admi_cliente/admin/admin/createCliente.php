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
$name = $ape1 = $ape2 = $correo = $cel1 = $cel2 = $tel = $contra = $pais = $ciudad = $edo = $calle = $cruza = $num = "";
$name_err = $ape1_err = $ape2_err = $correo_err = $cel1_err = $cel2_err = $tel_err = $contra_err = $pais_err = $ciudad_err = $edo_err = $calle_err = $cruza_err = $num_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Por favor ingrese el nombre del empleado.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Por favor ingrese un nombre válido.";
    } else{
        $name = $input_name;
    }
    
    //Validar apellido1
   $input_ape1 = trim($_POST["ape1"]);
    if(empty($input_ape1)){
        $ape1_err = "Por favor ingrese su apellido.";
    } elseif(!filter_var($input_ape1, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $ape1_err = "Por favor ingrese un nombre válido.";
    } else{
        $ape1 = $input_ape1;
    }
   //Validar apellido2
   $input_ape2 = trim($_POST["ape2"]);
    if(empty($input_ape2)){
        $ape2_err = "Por favor ingrese su apellido.";
    } elseif(!filter_var($input_ape2, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $ape2_err = "Por favor ingrese un nombre válido.";
    } else{
        $ape2 = $input_ape2;
    }
    
    // Validate correo
    $input_correo = trim($_POST["correo"]);
    if(empty($input_correo)){
        $correo_err = "Por favor ingrese su correo.";     
    } else{
        $correo = $input_correo;
    }
	//Validar cel1
    $input_cel1 = trim($_POST["cel1"]);
    if(empty($input_cel1)){
        $cel1_err = "Por favor ingrese su numero de celular.";     
    } elseif(!ctype_digit($input_cel1)){
        $cel1_err = "Por favor ingrese un valor correcto y positivo.";
    } else{
        $cel1 = $input_cel1;
    }
	//Validar cel2
    $input_cel2 = trim($_POST["cel2"]);
    if(empty($input_cel2)){
        $cel2_err = "Por favor ingrese su numero de celular.";     
    } elseif(!ctype_digit($input_cel2)){
        $cel2_err = "Por favor ingrese un valor correcto y positivo.";
    } else{
        $cel2 = $input_cel2;
    }
	//Validar telefono de casa
    $input_tel = trim($_POST["tel"]);
    if(empty($input_tel)){
        $tel_err = "Por favor ingrese su numero de teléfono.";     
    } elseif(!ctype_digit($input_tel)){
        $tel_err = "Por favor ingrese un valor correcto y positivo.";
    } else{
        $tel = $input_tel;
    }
	// Validate contraseña
    $input_contra = trim($_POST["contra"]);
    if(empty($input_contra)){
        $contra_err = "Por favor ingrese su contraseña.";     
    } else{
        $contra = $input_contra;
    }
	// Validate pais
    $input_pais = trim($_POST["pais"]);
    if(empty($input_pais)){
        $pais_err = "Por favor ingrese el nombre del pais.";
    } elseif(!filter_var($input_pais, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $pais_err = "Por favor ingrese un nombre válido.";
    } else{
        $pais = $input_pais;
    }
	// Validate ciudad
    $input_ciudad = trim($_POST["ciudad"]);
    if(empty($input_ciudad)){
        $ciudad_err = "Por favor ingrese el nombre de la ciudad.";
    } elseif(!filter_var($input_ciudad, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $ciudad_err = "Por favor ingrese un nombre válido.";
    } else{
        $ciudad = $input_ciudad;
    }
	
	
	// Validate estado
    $input_edo = trim($_POST["edo"]);
    if(empty($input_edo)){
        $edo_err = "Por favor ingrese el nombre del estado.";
    } elseif(!filter_var($input_edo, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $edo_err = "Por favor ingrese un nombre válido.";
    } else{
        $edo = $input_edo;
    }
	// Validate calle
    $input_calle = trim($_POST["calle"]);
    if(empty($input_calle)){
        $calle_err = "Por favor ingrese su calle.";     
    } else{
        $calle = $input_calle;
    }
	// Validate cruzamientos
    $input_cruza = trim($_POST["cruza"]);
    if(empty($input_cruza)){
        $cruza_err = "Por favor ingrese sus cruzamientos.";     
    } else{
        $cruza = $input_cruza;
    }
	//Validar numero de casa
    $input_num = trim($_POST["num"]);
    if(empty($input_num)){
        $num_err = "Por favor ingrese su numero de casa.";     
    } elseif(!ctype_digit($input_num)){
        $num_err = "Por favor ingrese un valor correcto y positivo.";
    } else{
        $num = $input_num;
    }
	
    
    // Check input errors before inserting in database
    if(empty($name_err) && empty($ape1_err) && empty($ape2_err) && empty($correo_err) && empty($cel1_err) && empty($cel2_err) && empty($tel_err) && empty($contra_err) && empty($pais_err)  && empty($ciudad_err) && empty($edo_err) && empty($calle_err) && empty($cruza_err) && empty($num_err) ){
        // Prepare an insert statement
        $sql = "INSERT INTO cliente (name,ape1,ape2,correo,cel1,cel2,tel,contra,pais,ciudad,edo,calle,cruza,num) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssssssssss", $param_name, $param_ape1, $param_ape2, $param_correo, $param_cel1, $param_cel2, $param_tel, $param_contra, $param_pais, $param_ciudad, $param_edo, $param_calle, $param_cruza, $param_num);
            
            // Set parameters
            $param_name = $name;
            $param_ape1= $ape1;
		    $param_ape2= $ape2;
			$param_correo = $correo;
			$param_cel1 = $cel1;
			$param_cel2 = $cel2;
			$param_tel = $tel;
			$param_contra = $contra;
            $param_pais = $pais;
			$param_ciudad = $ciudad;
		    $param_edo = $edo;
			$param_calle = $calle;
			$param_cruza = $cruza;
            $param_num = $num;
            
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: indexCliente.php");
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
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.html">Administrador</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        </nav>

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
                        <div class="nav">
                            <a class="nav-link" href="indexExtras.php">
                                <div class="sb-nav-link-icon"><i class='fas fa-synagogue' style='font-size:12px'></i></div>
                                Extras
                            </a>    
                        </div> 
                        <div class="nav">
                            <a class="nav-link" href="//.php">
                                <div class="sb-nav-link-icon"><i class='fas fa-synagogue' style='font-size:12px'></i></div>
                                Cerrar sesión
                            </a>    
                        </div>
                        
                        
                        
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

                    </div>
                </main>

                    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Agregar Empleado</h2>
                    </div>
                    <p>Favor diligenciar el siguiente formulario, para agregar el empleado.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Nombre</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($ape1_err)) ? 'has-error' : ''; ?>">
                            <label>Primer apellido</label>
                             <input type="text" name="ape1" class="form-control" value="<?php echo $ape1; ?>">
                            <span class="help-block"><?php echo $ape1_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($ape2_err)) ? 'has-error' : ''; ?>">
                            <label>segundo apellido</label>
                            <input type="text" name="ape2" class="form-control" value="<?php echo $ape2; ?>">
                            <span class="help-block"><?php echo $ape2_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($correo_err)) ? 'has-error' : ''; ?>">
                            <label>correo</label>
                            <input type="text" name="correo" class="form-control" value="<?php echo $correo; ?>">
                            <span class="help-block"><?php echo $correo_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($cel1_err)) ? 'has-error' : ''; ?>">
                            <label>celular 1</label>
                            <input type="text" name="cel1" class="form-control" value="<?php echo $cel1; ?>">
                            <span class="help-block"><?php echo $cel1_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($cel2_err)) ? 'has-error' : ''; ?>">
                            <label>celular 2</label>
                            <input type="text" name="cel2" class="form-control" value="<?php echo $cel2; ?>">
                            <span class="help-block"><?php echo $cel2_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($tel_err)) ? 'has-error' : ''; ?>">
                            <label>telefono</label>
                            <input type="text" name="tel" class="form-control" value="<?php echo $tel; ?>">
                            <span class="help-block"><?php echo $tel_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($contra_err)) ? 'has-error' : ''; ?>">
                            <label>contraseña</label>
                            <input type="text" name="contra" class="form-control" value="<?php echo $contra; ?>">
                            <span class="help-block"><?php echo $contra_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($pais_err)) ? 'has-error' : ''; ?>">
                            <label>pais</label>
                            <input type="text" name="pais" class="form-control" value="<?php echo $pais; ?>">
                            <span class="help-block"><?php echo $pais_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($ciudad_err)) ? 'has-error' : ''; ?>">
                            <label>ciudad</label>
                            <input type="text" name="ciudad" class="form-control" value="<?php echo $ciudad; ?>">
                            <span class="help-block"><?php echo $ciudad_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($edo_err)) ? 'has-error' : ''; ?>">
                            <label>estado</label>
                            <input type="text" name="edo" class="form-control" value="<?php echo $edo; ?>">
                            <span class="help-block"><?php echo $edo_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($calle_err)) ? 'has-error' : ''; ?>">
                            <label>calle</label>
                            <input type="text" name="calle" class="form-control" value="<?php echo $calle; ?>">
                            <span class="help-block"><?php echo $calle_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($cruza_err)) ? 'has-error' : ''; ?>">
                            <label>cruzamientos</label>
                            <input type="text" name="cruza" class="form-control" value="<?php echo $cruza; ?>">
                            <span class="help-block"><?php echo $cruza_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($num_err)) ? 'has-error' : ''; ?>">
                            <label>numero</label>
                            <input type="text" name="num" class="form-control" value="<?php echo $num; ?>">
                            <span class="help-block"><?php echo $num_err;?></span>
                        </div>


                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="indexCliente.php" class="btn btn-default">Cancelar</a>
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