
<?php
// Include config file
require_once "conex.php";
 
// Define variables and initialize with empty values
$titulo = $precio =  $ruta = $foto = $sup = $descri = $vr = $Idtipo = $pais = $edo =$muni= $loca = $col = $calle = $cruza = $num = "";
$titulo_err = $precio_err = $foto_err = $sup_err = $descri_err = $vr_err = $Idtipo_err = $pais_err = $edo_err= $muni_err = $loca_err = $col_err = $calle_err = $cruza_err = $num_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_titulo = trim($_POST["titulo"]);
    if(empty($input_titulo)){
        $titulo_err = "Por favor ingrese el nombre del empleado.";
    } elseif(!filter_var($input_titulo, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $titulo_err = "Por favor ingrese un nombre válido.";
    } else{
        $titulo = $input_titulo;
    }
    
   //Validar precio
    $input_precio = trim($_POST["precio"]);
    if(empty($input_precio)){
        $precio_err = "Por favor ingrese el precio.";     
    } elseif(!ctype_digit($input_precio)){
        $precio_err = "Por favor ingrese un valor correcto y positivo.";
    } else{
        $precio = $input_precio;
    }
	
	//validar y copiar foto
   if(isset($_FILES["foto"])){
		$nombreImg = $_FILES['foto']['name'];
		$ruta = $_FILES['foto']['tmp_name'];
		$foto = "imagenes/".$nombreImg;
	}
	
	
   //Validar superficie
    $input_sup = trim($_POST["sup"]);
    if(empty($input_sup)){
        $sup_err = "Por favor ingrese la medida de la superficie.";     
    } elseif(!ctype_digit($input_sup)){
        $sup_err = "Por favor ingrese un valor correcto y positivo.";
    } else{
        $sup = $input_sup;
    }
	// Validate descripcion
    $input_descri = trim($_POST["descri"]);
    if(empty($input_descri)){
       $descri_err = "Por favor ingrese una descripcion de la casa.";     
    } else{
        $descri = $input_descri;
    }
	//validar venta/renta
    $input_vr = trim($_POST["cbx_vr"]);
    if(empty($input_vr)){
        $vr_err = "Por favor ingrese una categoria.";
    } else{
        $vr = $input_vr;
    }
	
	// Validate tipo de casa
    $input_Idtipo = trim($_POST["Idtipo"]);
    if(empty($input_Idtipo)){
        $Idtipo_err = "Por favor ingrese su tipo de casa.";     
    } else{
        $Idtipo = $input_Idtipo;
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
	
	// Validate estado
    $input_edo = trim($_POST["edo"]);
    if(empty($input_edo)){
        $edo_err = "Por favor ingrese el nombre del estado.";
    } elseif(!filter_var($input_edo, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $edo_err = "Por favor ingrese un nombre válido.";
    } else{
        $edo = $input_edo;
    }
	
		// Validate estado
    $input_muni = trim($_POST["muni"]);
    if(empty($input_muni)){
        $muni_err = "Por favor ingrese el nombre del municipio.";
    } elseif(!filter_var($input_muni, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $muni_err = "Por favor ingrese un nombre válido.";
    } else{
        $muni = $input_muni;
    }
	// Validate ciudad
    $input_loca = trim($_POST["loca"]);
    if(empty($input_loca)){
        $loca_err = "Por favor ingrese el nombre de la ciudad.";
    } elseif(!filter_var($input_loca, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $loca_err = "Por favor ingrese un nombre válido.";
    } else{
        $loca = $input_loca;
    }
	
	 // Validate colonia
    $input_col = trim($_POST["col"]);
    if(empty($input_col)){
        $col_err = "Por favor ingrese el nombre del pais.";
    } elseif(!filter_var($input_col, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $col_err = "Por favor ingrese un nombre válido.";
    } else{
        $col = $input_col;
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
     if(empty($titulo_err) && empty($precio_err) && copy($ruta, $foto) && empty($sup_err) && empty($descri_err) && empty($vr_err) && empty($Idtipo_err) && empty($pais_err) && empty($edo_err) && empty($muni_err) && empty($loca_err) && empty($col_err) && empty($calle_err) && empty($cruza_err) && empty($num_err)){
        // Prepare an insert statement
         $sql = "INSERT INTO casa2 (titulo,precio,foto,sup,descri,vr,Idtipo,pais,edo,muni,loca,col,calle,cruza,num) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssssssssssss", $param_titulo, $param_precio,$param_foto,$param_sup,$param_descri,$param_vr,$param_Idtipo,$param_pais,$param_edo,$param_muni,$param_loca,$param_col,$param_calle,$param_cruza,$param_num);
            
            // Set parameters
            $param_titulo = $titulo;
            $param_precio = $precio;
            $param_foto = $foto;
			$param_sup = $sup;
			$param_descri = $descri;
			$param_vr = $vr;
			$param_Idtipo = $Idtipo;
			$param_pais = $pais;
			$param_edo = $edo;
			$param_muni = $muni;
			$param_loca = $loca;
			$param_col = $col;
			$param_calle = $calle;
			$param_cruza = $cruza;
            $param_num = $num;      
            
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

<?php
/*$sqli = mysqli_query($link,"SELECT* FROM casa");
while( $row = mysqli_fetch_array($sqli))
{
    ?>
    <!--variables enviada por el methodo GET-->
    <a href="eliminar.php?id=<?php echo $row['id'];?>&ruta=<?php echo $row['ruta'];?>">
        <img src="<?php echo $row['rsuta'];?>" height="100px" width="100px" alt="">
        <span class="glyphicon glyphicon-remove-circle"></span></a>

    <?php }*/?>

<!DOCTYPE html>
<html lang="en">
  <head>

    <title>J&v-VENDER/RENTAR</title>
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
    <link rel="stylesheet" href="css/cssProyecto.css">
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
                <li><a href="index.php" class="nav-link">Home</a></li>
                <li><a href="EnVenta.php" class="nav-link">En venta</a></li>
                <li><a href="EnRenta.php" class="nav-link">En renta</a></li>
                <li><a href="VenderRentar.php" class="nav-link">Vender/rentar</a></li>
                <li><a href="AccederRegistrarme.php" class="nav-link">Acceder/Registrarme</a></li>
                <li><a href="Nosotros.php?id=1" class="nav-link">NOSOTROS</a></li>
              </ul>
            </nav>
          </div>
          <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-white float-right"><span class="icon-menu h3"></span></a></div>
        </div>
      </div>
    </header>

    
    <div class="site-blocks-cover overlay" style="background-image: url(images/hero_1.jpg);" data-aos="fade" id="home-section">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-6 mt-lg-5 text-center">
            <!--<h1>VENDE O RENTA UNA PROPIEDAD</h1>    
          </div>
        </div>
      </div>
      <a href="#listings-section" class="smoothscroll arrow-down"><span class="icon-arrow_downward"></span></a>
    </div>  


    <br><br>
    <center><h1 class="text-shadow">VENDER O RENTAR</h1></center>
    
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        <h2 class="h4 text-black mb-5">Ingrese datos</h2> 

        <div class="row form-group">
          <div class="col-md-12 mb-3 mb-md-0">
            	<div class="form-group <?php echo (!empty($titulo_err)) ? 'has-error' : ''; ?>">           
            		<label class="text-black" for="fname">Titulo</label>
            		<input type="text" name="titulo" id="titulo" class="form-control" value="<?php echo $titulo; ?>">
          			<span class="help-block"><?php echo $titulo_err;?></span>
           		</div>
          </div>
        </div>
        <div class="row form-group">
          <div class="col-md-6 mb-3 mb-md-0">
            	<div class="form-group <?php echo (!empty($precio_err)) ? 'has-error' : ''; ?>"> 
            		<label class="text-black" for="fname" placeholder="">Precio</label>
            		<input type="text" name="precio" id="precio" class="form-control" placeholder="$" value="<?php echo $precio; ?>">
          			<span class="help-block"><?php echo $precio_err;?></span>
           		</div>
          </div>
        </div>
        <div class="row form-group">
          <div class="col-md-12 mb-3 mb-md-0">
            	<div class="form-group <?php echo (!empty($foto_err)) ? 'has-error' : ''; ?> "> 
            		<label class="text-black" for="fname">ACA VA LO DE IMAGENES</label>
                <br>
                Nombre <input type="file" name="foto" ><br><br>
           		</div>
          </div>
        </div>




        <div class="row form-group">
            <div class="col-md-6">
              <div class="form-group <?php echo (!empty($sup_err)) ? 'has-error' : ''; ?>"> 
              		
                    <label class="text-black" for="email">Superficie del terreno m<sup>2</sup></label> 
              		<input type="text" name="sup" id="sup" class="form-control" placeholder="" value="<?php echo $sup; ?>">
            
            		<span class="help-block"><?php echo $sup_err;?></span>
           		</div>
            </div>
        </div>
        
        <div class="row form-group">
            <div class="col-md-12">
              	<div class="form-group <?php echo (!empty($descri_err)) ? 'has-error' : ''; ?>"> 		
                    
                    <label class="text-black" for="message">Descripción</label> 
              		<textarea  name="descri" id="descri" cols="30" rows="7" class="form-control" placeholder="Describe la propiedad..." value="<?php echo $descri; ?>" ></textarea>
            		<span class="help-block"><?php echo $descri_err;?></span>
           		</div>           
            </div>
        </div>

         <div class="row form-group">
            <div class="col-md-4 ">
            	<div class="form-group <?php echo (!empty($vr_err)) ? 'has-error' : ''; ?>"> 		 
                <label>Venta/Renta</label>
                           <select name="cbx_vr" id="cbx_vr" class="form-control">
									<option selected>Elegir</option>
									<option>Renta</option>
									<option>Venta</option>
							</select>
           		</div>
            </div>
          	<div class="col-md-4">
          		<div class="form-group <?php echo (!empty($Idtipo_err)) ? 'has-error' : ''; ?>"> 	
                  <label>Tipo</label>
                            
								<select name="Idtipo" id="Idtipo" class="form-control">
									<option value="0">Elegir</option>
                                    <?php
									$query = "SELECT idtipo, nametipo FROM tipo ORDER BY nametipo";
									$resultado=$link->query($query);
									?>
									<?php while($row = $resultado->fetch_assoc()) { ?>
									<option value="<?php echo $row['idtipo']; ?>"><?php echo $row['nametipo']; ?></option>
									<?php } ?>
								</select>
           		
                </div>
            </div>
         
         
          </div>
                 
    
    <div class="row form-group">
    	<div class="col-md-3">
          <div class="form-group  <?php echo (!empty($pais_err)) ? 'has-error' : ''; ?>"> 			
             <label>Pais</label>
              <input type="text" name="pais" id="pais" class="form-control" value="<?php echo $pais; ?>">
                 <span class="help-block"><?php echo $pais_err;?></span> 
           	
            
            </div>
        </div>
        
        <div class="col-md-3">
          	<div class="form-group  <?php echo (!empty($edo_err)) ? 'has-error' : ''; ?>"> 				<label>Estado</label>
                   <input type="text" name="edo" id="edo" class="form-control" value="<?php echo $edo; ?>">
                      <span class="help-block"><?php echo $edo_err;?></span>
                    
           	
            
            </div>
       	 </div>
        <div class="col-md-3">
          <div class="form-group  <?php echo (!empty($muni_err)) ? 'has-error' : ''; ?> "> 				<label>Municipio</label>
          		 <input type="text" name="muni" id="muni" class="form-control" value="<?php echo $muni; ?>">
                   <span class="help-block"><?php echo $muni_err;?></span>
                    
           	
            
            </div>
        </div>
        <div class="col-md-3">
          <div class="form-group <?php echo (!empty($loca_err)) ? 'has-error' : ''; ?> "> 			
                     <label>Localidad</label>
                     <input type="text" name="loca" id="loca" class="form-control" value="<?php echo $loca; ?>">
                       	    <span class="help-block"><?php echo $loca_err;?></span>
           	
            
            </div>
        </div>
  	 </div>
    
    <div class="row form-group">
    	<div class="col-md-3">
          <div class="form-group <?php echo (!empty($col_err)) ? 'has-error' : ''; ?> "> 			
                    
           	<label>Colonia</label>
                            <input type="text" name="col" id="col" class="form-control" value="<?php echo $col; ?>">
                            	<span class="help-block"><?php echo $col_err;?></span>
            
            </div>
        </div>
        
        <div class="col-md-3">
          	<div class="form-group <?php echo (!empty($calle_err)) ? 'has-error' : ''; ?>"> 			
                    
           	 <label>Calle</label>
                            <input type="text" name="calle" id="calle" class="form-control" value="<?php echo $calle; ?>">
                            	<span class="help-block"><?php echo $calle_err;?></span>
            
            </div>
       	 </div>
        <div class="col-md-3">
          <div class="form-group  <?php echo (!empty($cruza_err)) ? 'has-error' : ''; ?>"> 			
                    
           	<label>Cruzamientos</label>
                            <input type="text" name="cruza" id="cruza" class="form-control" value="<?php echo $cruza;?>">
                            	<span class="help-block"><?php echo $cruza_err;?></span>
            
            </div>
        </div>
        <div class="col-md-3">
          <div class="form-group <?php echo (!empty($num_err)) ? 'has-error' : ''; ?> "> 			
                     <label>Num.</label>
                            <input type="text" name="num" id="num" class="form-control" value="<?php echo $num; ?>">
                            	<span class="help-block"><?php echo $num_err;?></span>
           	
            
            </div>
        </div>
  	 </div>
    
    
   
   
    <div class="row form-group">
                    <div class="col-md-12">
                          <input type="submit" value="Enviar" class="btn btn-primary btn-md text-white">
                    </div>
    </div>-->
    </form>
            </div>
          </div>   
    </form>

    
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