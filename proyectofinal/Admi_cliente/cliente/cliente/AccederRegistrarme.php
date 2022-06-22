<?php
// Include config file
require_once "conex.php";
 
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
        $cel1_err = "Por favor ingrese su numero de celular.";     
    } elseif(!ctype_digit($input_cel2)){
        $cel1_err = "Por favor ingrese un valor correcto y positivo.";
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
                header("location: ../../cliente/cliente/InicioDeSesion.php"); //pendiente checar esto
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

    <title>J&v-ACCEDER/REGISTRARME</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,900|Oswald:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/style.css">
  </head>


  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  <div class="site-wrap">
    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
   
    
    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">
      <div class="container">
        <div class="row align-items-center">         
          <div class="col-6 col-xl-2">
            <h1 class="mb-0 site-logo m-0 p-0"><a href="index.php" class="mb-0">J&V</a></h1>
          </div>
          <div class="col-12 col-md-10 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li><a href="index.php" class="nav-link">Inicio</a></li>
                <li><a href="EnVenta.php" class="nav-link">En venta</a></li>
                <li><a href="EnRenta.php" class="nav-link">En renta</a></li>
               <!-- <li><a href="VenderRentar.php" class="nav-link">Vender/rentar</a></li> -->
                <li><a href="AccederRegistrarme.php" class="nav-link">Acceder/Registrarme</a></li>
                <li><a href="Nosotros.php?id=1" class="nav-link">NOSOTROS</a></li>
              </ul>
            </nav>
          </div>
          <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-white float-right"><span class="icon-menu h3"></span></a></div>
        </div>
      </div>
    </header>

    
    <div class="site-block-wrap">
      <div class="owl-carousel with-dots">
        <div class="site-blocks-cover overlay overlay-2" style="background-image: url(images/hero_1.jpg);" data-aos="fade" id="home-section">
          <div class="container">
            <div class="row align-items-center justify-content-center">
              <div class="col-md-6 mt-lg-5 text-center">
                <h1 class="text-shadow">REGISTRATE GRATIS</h1>
                <p><a href="InicioDeSesion.php" target="_blank" class="btn btn-primary px-5 py-3">Iniciar sesion</a></p>            
              </div>
            </div>
          </div>      
        </div>   
      </div>      
    </div>  


    <br><br> <!--
    <h1 class="text-shadow">REGISTRARME</h1>
    
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"  method="post"  class="p-5 bg-white" >  
        <h2 class="h4 text-black mb-5">Ingrese datos</h2> 

        <div class="row form-group">
            <div class="col-md-4 ">
              
            	<div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>"> 
              		<label class="text-black" for="fname">Nombre</label>
              		<input type="text" name="name" id="name" class="form-control" value="<?php echo $name; ?>">
           	 		<span class="help-block"><?php echo $name_err;?></span>
           		</div>
            
            </div>
            <div class="col-md-4">
            	<div class="form-group <?php echo (!empty($ape1_err)) ? 'has-error' : ''; ?>"> 
            
            
              		<label class="text-black" for="lname">Primer apellido</label>
              		<input type="text" name="ape1" id="ape1" class="form-control" value="<?php echo $ape1; ?>">
            		<span class="help-block"><?php echo $ape1_err;?></span>
           		</div>
            </div>
            <div class="col-md-4">
              	<div class="form-group <?php echo (!empty($ape2_err)) ? 'has-error' : ''; ?>"> 
                
                	<label class="text-black" for="lname">Segundo apellido</label>
                	<input type="text" name="ape2" id="ape2" class="form-control" value="<?php echo $ape2; ?>">
            		<span class="help-block"><?php echo $ape1_err;?></span>
           		</div>
            </div>
        </div>
-->
        <!-- inicia el otro grupo del formulario 
        
        
        <div class="row form-group">
          <div class="col-md-12">
           	<div class="form-group <?php echo (!empty($correo_err)) ? 'has-error' : ''; ?>"> 
            
            
            	<label class="text-black" for="email">Email</label> 
            	<input type="email" name="correo" id="correo" class="form-control" value="<?php echo $correo; ?>">
          		<span class="help-block"><?php echo $correo_err;?></span>
           	</div>
          
          </div>
        </div>

        celulares en el form 
        <div class="row form-group">
          <div class="col-md-6 mb-3 mb-md-0">
            	<div class="form-group <?php echo (!empty($cel1_err)) ? 'has-error' : ''; ?>"> 
            
            		<label class="text-black" for="fname">Teléfono 1</label>
            		<input type="text" name="cel1" id="cel1" class="form-control" value="<?php echo $cel1; ?>">
         			<span class="help-block"><?php echo $cel1_err;?></span>
           		</div>
          </div>
          <div class="col-md-6">
            	<div class="form-group <?php echo (!empty($cel2_err)) ? 'has-error' : ''; ?>"> 
            
            		<label class="text-black" for="lname">Teléfono 2</label>
            		<input type="text" name="cel2" id="cel2" class="form-control" value="<?php echo $cel2; ?>" >
          			<span class="help-block"><?php echo $cel2_err;?></span>
           		</div>
          </div>
        </div>

       telefono form
        
        
        <div class="row form-group">
            <div class="col-md-12">
              	<div class="form-group <?php echo (!empty($tel_err)) ? 'has-error' : ''; ?>"> 	
                	<label class="text-black" for="email">Teléfono de casa</label> 
              		<input type="text" name="tel" id="tel" class="form-control" value="<?php echo $tel; ?>">
            
            		<span class="help-block"><?php echo $tel_err;?></span>
           		</div>
            </div>
        </div>

        
        contraseña form
        <div class="row form-group">
            
            <div class="col-md-12">
              	<div class="form-group <?php echo (!empty($contra_err)) ? 'has-error' : ''; ?>"> 		
                	<label class="text-black" for="email">Contraseña</label> 
              		<input type="text" name="contra" id="contra" class="form-control" value="<?php echo $contra; ?>">
            
            		<span class="help-block"><?php echo $contra_err;?></span>
           		</div>
            </div>
        </div>

        datos del pais, etc 
        <div class="row form-group">
            <div class="col-md-4 ">
              	<div class="form-group <?php echo (!empty($pais_err)) ? 'has-error' : ''; ?>"> 		
              
              		<label class="text-black" for="fname">País</label>
              		<input type="text" name="pais" id="pais" class="form-control" value="<?php echo $pais; ?>">
            		<span class="help-block"><?php echo $pais_err;?></span>
           		</div>
            </div>
            <div class="col-md-4">
              	<div class="form-group <?php echo (!empty($ciudad_err)) ? 'has-error' : ''; ?>"> 			
                    <label class="text-black" for="lname">Ciudad</label>
             		<input type="text" name="ciudad" id="ciudad" class="form-control" value="<?php echo $ciudad; ?>">
            
            		<span class="help-block"><?php echo $ciudad_err;?></span>
           		</div>
            </div>
            <div class="col-md-4">
               	<div class="form-group <?php echo (!empty($edo_err)) ? 'has-error' : ''; ?>"> 			 		
                        
                     <label class="text-black" for="lname">Estado</label>
                	<input type="text" name="edo" id="edo" class="form-control" value="<?php echo $edo; ?>">
            		<span class="help-block"><?php echo $edo_err;?></span>
           		</div>
            </div>
        </div>

        Datos domiciliarios
        <div class="row form-group">
            <div class="col-md-4 ">
              	<div class="form-group <?php echo (!empty($calle_err)) ? 'has-error' : ''; ?>">
                	<label class="text-black" for="fname">Calle</label>
              		<input type="text"  name="calle" id="calle" class="form-control" value="<?php echo $calle; ?>">
            
            
            		<span class="help-block"><?php echo $calle_err;?></span>
           		</div>
            </div>
            <div class="col-md-4">
              	<div class="form-group <?php echo (!empty($cruza_err)) ? 'has-error' : ''; ?>">		
                    <label class="text-black" for="lname">Cruzamientos</label>
              		<input type="text" name="cruza" id="cruza" class="form-control" value="<?php echo $cruza; ?>">
            		<span class="help-block"><?php echo $cruza_err;?></span>
           		</div>
            </div>
            <div class="col-md-4">
               	<div class="form-group <?php echo (!empty($num_err)) ? 'has-error' : ''; ?>">		 	
                    <label class="text-black" for="lname">Número</label>
                	<input type="text" name="num" id="num" class="form-control" value="<?php echo $num; ?>">
              		<span class="help-block"><?php echo $num_err;?></span>
           		</div>
              </div>
        </div>

        <div class="row form-group">
          <div class="col-md-12">
            <input type="submit" value="Registrarme" class="btn btn-primary btn-md text-white">
          </div>
        </div>
		
		<a href="index.php" class="btn btn-primary btn-md text-white">HOME</a>
    </form>
-->
    
    <footer class="site-footer">
        <div class="container">
          <div class="row">
            <div class="col-md-8">
              <div class="row">
                <div class="col-md-5">
                  <h2 class="footer-heading mb-4">J&V</h2>
                  <p>Somos una empresa de bienes raices, decidida a darte un buen hogar a tí y tu familia.</p>
                </div>
                <div class="col-md-3 mx-auto">
                  <h2 class="footer-heading mb-4">Empresa</h2>
                  <ul class="list-unstyled">
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="EnVenta.php">EN VENTA</a></li>
                    <li><a href="EnRenta.php">EN RENTA</a></li>
                    <li><a href="VenderRentar.php">VENDER/RENTAR</a></li>
                    <li><a href="AccederRegistrarme.php">ACCEDER/REGISTRARME</a></li>
                    <li><a href="Nosotros.php">NOSOTROS</a></li>
                  </ul>
                </div>
              </div>
            </div>
            
            <div class="col-md-4">
              <div class="mb-4">
                <h2 class="footer-heading mb-4">Contactos</h2>
                <p> Numero: 9999999</p>
                <p> correo: J&V@gmail.com</p>
                <p> codigo postal: 97173</p>
              </div>
              
              <div class="">
                <h2 class="footer-heading mb-4">Follow Us</h2>
                  <a href="#" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                  <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                  <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                  <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
              </div>
            </div>
          </div>
          <div class="row pt-5 mt-5 text-center">
            <div class="col-md-12">
              <div class="border-top pt-5">
              <p class="copyright">
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              J&V INMOBILIARA &copy;<script>document.write(new Date().getFullYear());</script> </a>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              </p>
              </div>
            </div>
            
          </div>
        </div>
      </footer>

  </div> <!-- .site-wrap -->
  <a href="#top" class="gototop"><span class="icon-angle-double-up"></span></a> 
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/jquery.sticky.js"></script>
  <script src="js/main.js"></script>


  </body>
</html>