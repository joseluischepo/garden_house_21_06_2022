<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

} else {
	header('Location:login.php');
	exit;
}
// Include config file
require_once "conex.php";
 
// Define variables and initialize with empty values
$name = $apellido = $correo = $numero = $contra = $tipo = "";
$name_err = $apellido_err = $correo_err = $numero_err = $contra_err = $tipo_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["idus"]) && !empty($_POST["idus"])){
    // Get hidden input value
    $idus = $_POST["idus"];
    
    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Por favor ingrese el nombre del usuario.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Por favor ingrese un nombre válido.";
    } else{
        $name = $input_name;
    }

    // Validate apellido1 (ape1)
    $input_apellido = trim($_POST["apellido"]);
    if(empty($input_apellido)){
        $apellido_err = "Por favor ingrese el apellido del usuario.";
    } elseif(!filter_var($input_apellido, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $apellido_err = "Por favor ingrese un nombre válido.";
    } else{
        $apellido = $input_apellido;
    }

    // Validate correo
    // Validate correo
    $input_correo = trim($_POST["correo"]);
    if(empty($input_correo)){
        $correo_err = "Por favor ingrese su correo.";     
    } else{
        $correo = $input_correo;
    }
    
   //Validar celular 1 (cel1)
    $input_numero = trim($_POST["numero"]);
    if(empty($input_numero)){
        $numero_err = "Por favor ingrese su numero.";     
    } elseif(!ctype_digit($input_numero)){
        $numero_err = "Por favor ingrese un valor correcto y positivo.";
    } else{
        $numero= $input_numero;
    }
   
    // Validate contraseña (contra)
     $input_contra = trim($_POST["contra"]);
    if(empty($input_contra)){
        $contra_err = "Por favor ingrese su contraseña.";     
    } else{
        $contra = $input_contra;
    }	
	// Validate tipo de usuario
    $input_tipo = trim($_POST["tipo"]);
    if(empty($input_tipo)){
        $tipo_err = "Por favor seleccione el tipo de usuario.";
    }else{
        $tipo = $input_tipo;
    }

    
 
    
    // Check input errors before inserting in database
    if(empty($name_err) && empty($apellido_err) && empty($correo_err) && empty($numero_err) && empty($contra_err) && empty($tipo_err)){
        // Prepare an update statement
        $sql = "UPDATE usuarios SET name=?, apellido=?, correo=?, numero=?, contra=?, tipo=?  WHERE idus=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssi",$param_name,$param_apellido,$param_correo,$param_numero,$param_contra,$param_tipo,$param_idus);
            
            // Set parameters
            $param_name = $name;
            $param_apellido= $apellido;
			$param_correo = $correo;
			$param_numero = $numero;			
			$param_contra = $contra;
            $param_tipo = $tipo;       
			$param_idus = $idus;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: indexUsuarios.php");
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
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["idus"]) && !empty(trim($_GET["idus"]))){
        // Get URL parameter
        $idus =  trim($_GET["idus"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM usuarios WHERE idus = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_idus);
            
            // Set parameters
            $param_idus = $idus;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                     $name = $row["name"];
                     $apellido = $row["apellido"];
				     $correo = $row["correo"];
                     $numero = $row["numero"];
                     $contra = $row["contra"];
					 $tipo = $row["tipo"];
                     

                 } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: errorUsuario.php");
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
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: errorCliente.php");
        exit();
    }
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
                                Nodos
                            </a>    
                        </div>
                        <div class='nav'>
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
                        <div class="small">CRIP-IOT</div>
                        IOT
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
                        <h2>Actualizar Usuario</h2>
                    </div>
                    <p>Edite los valores de entrada y envíe para actualizar el registro.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="row form-group">
          <div class="col-md-12 mb-3 mb-md-0">
            	<div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>"> 
            
            
            		<label class="text-black" for="fname">Nombre</label>
            		<input type="text" name="name" id="name" class="form-control" value="<?php echo $name; ?>">
          			<span class="help-block"><?php echo $name_err;?></span>
           		</div>
          </div>
        </div>

        <div class="row form-group">
          <div class="col-md-6 mb-3 mb-md-0">
            	<div class="form-group <?php echo (!empty($apellido_err)) ? 'has-error' : ''; ?>"> 
            
            
            		<label class="text-black" for="fname" placeholder="">Apellido</label>
            		<input type="text" name="apellido" id="apellido" class="form-control" value="<?php echo $apellido; ?>">
          			<span class="help-block"><?php echo $apellido_err;?></span>
           		</div>
          </div>
        </div>  
        
        <div class="row form-group">
            <div class="col-md-12">
              	<div class="form-group <?php echo (!empty($correo_err)) ? 'has-error' : ''; ?>"> 		
                    
                    <label class="text-black" for="email">correo</label> 
              		<input type="email" name="correo" id="correo" class="form-control" placeholder="" value="<?php echo $correo; ?>">
            		<span class="help-block"><?php echo $correo_err;?></span>
           		</div>
            
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-12 mb-3 mb-md-0">
            	<div class="form-group <?php echo (!empty($numero_err)) ? 'has-error' : ''; ?>"> 		
                        <label class="text-black" for="fname">Numero </label>
              			<input type="text" name="numero" id="numero" class="form-control" value="<?php echo $numero; ?>">
            		<span class="help-block"><?php echo $numero_err;?></span>
           		</div>        
            </div>
          	
         
         
        </div>
                 
        <div class="row form-group">
            <div class="col-md-12">
              	<div class="form-group <?php echo (!empty($contra_err)) ? 'has-error' : ''; ?>"> 		
                    
                    <label class="text-black" for="fname">contraseña</label> 
              		<input type="text" name="contra" id="contra" class="form-control" placeholder="" value="<?php echo $contra; ?>">
            		<span class="help-block"><?php echo $contra_err;?></span>
           		</div>
            
            </div>
        </div>
   
       <div class="row form-group">
         <div class="col-md-12"
            <div class="form-group <?php echo (!empty($tipo_err)) ? 'has-error' : ''; ?>"> 		
                <select name="tipo" class="form-control">
                    <?php
                        if($tipo == 1){
                            echo "<option selected value=1>Administrator</option>
                            <option value=2>Vendedor</option>";
                        }elseif($tipo == 2){
                            echo "
                            <option value=1>Administrator</option>
                            <option selected value=2>Vendedor</option>";
                        }
                    ?>
                </select>
           	</div>
         	
         
        </div>
        
    
    
    
    
   
                        <input type="hidden" name="idus" value="<?php echo $idus; ?>"/>
                        <input type="submit"  class="btn btn-primary" value="Enviar">
                        <a href="indexUsuarios.php" class="btn btn-default">Cancelar</a>
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
