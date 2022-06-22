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
require_once "conexbdCasa.php";
 
// Define variables and initialize with empty values
$titulo = $precio =  $ruta = $foto = $sup = $descri = $vr = $Idtipo = $pais = $edo =$muni= $loca = $col = $calle = $cruza = $num = $Idc = "";
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
  
	$idc = $_SESSION['idcli'];
    
    // Check input errors before inserting in database
     if(empty($titulo_err) && empty($precio_err) && copy($ruta, $foto) && empty($sup_err) && empty($descri_err) && empty($vr_err) && empty($Idtipo_err) && empty($pais_err) && empty($edo_err) && empty($muni_err) && empty($loca_err) && empty($col_err) && empty($calle_err) && empty($cruza_err) && empty($num_err)){
        // Prepare an insert statement
         $sql = "INSERT INTO casa2 (titulo,precio,foto,sup,descri,vr,Idtipo,pais,edo,muni,loca,col,calle,cruza,num,Idc) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssssssssssss", $param_titulo, $param_precio,$param_foto,$param_sup,$param_descri,$param_vr,$param_Idtipo,$param_pais,$param_edo,$param_muni,$param_loca,$param_col,$param_calle,$param_cruza,$param_num,$param_idc);
            
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
            $param_idc = $idc;      
            
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
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">

                       
                       
                        	<div class="form-group <?php echo (!empty($titulo_err)) ? 'has-error' : ''; ?>">
                            <label>Titulo</label>
                            <input type="text" name="titulo" id="titulo" class="form-control" value="<?php echo $titulo; ?>">
                            	<span class="help-block"><?php echo $titulo_err;?></span>
                        	</div>
                       
                        
                        
                        <div class="form-group <?php echo (!empty($precio_err)) ? 'has-error' : ''; ?>">
                            <label>Precio</label>
                            <input type="text" name="precio" id="precio" class="form-control" value="<?php echo $precio; ?>">
                            <span class="help-block"><?php echo $precio_err;?></span>
                        </div>
                        
                        <div class="row form-group">
                        <div class="col-md-12 mb-3 mb-md-0">
                                <div class="form-group <?php echo (!empty($foto_err)) ? 'has-error' : ''; ?>"> 
                                    <label class="text-black" for="fname">Imagen del lugar</label>
                                <br>
                                Nombre <input type="file" name="foto" ><br><br>
                                </div>
                        </div>
						</div>
                        <div class="form-group <?php echo (!empty($sup_err)) ? 'has-error' : ''; ?>">
                            <label>Superficie</label>
                            <input type="text" name="sup" id="sup" class="form-control" value="<?php echo $sup; ?>">
                            <span class="help-block"><?php echo $sup_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($descri_err)) ? 'has-error' : ''; ?>">
                            <label>Descripcion</label>
                            <textarea name="descri"  id="descri" class="form-control"><?php echo $descri; ?></textarea>
                            <span class="help-block"><?php echo $descri_err;?></span>
                        </div>
                        
                        <div class="form-group <?php echo (!empty($vr_err)) ? 'has-error' : ''; ?>">
                            
                            <label>Venta/Renta</label>
                           <select name="cbx_vr" id="cbx_vr" class="form-control">
									<option selected>Elegir</option>
									<option>Renta</option>
									<option>Venta</option>
								</select>
                        </div>
                        <div class="form-group <?php echo (!empty($Idtipo_err)) ? 'has-error' : ''; ?>">
                            <label>Tipo</label>
                            
								<select name="Idtipo" id="Idtipo" class="form-control">
									<option value="0">Elegir</option>
                                    <?php
								
									$query = "SELECT nametipo FROM tipo";
									$resultado=$link->query($query);
									?>
									<?php while($row = $resultado->fetch_assoc()) { ?>
									<option value="<?php echo $row['nametipo']; ?>"><?php echo $row['nametipo']; ?></option>
									<?php } ?>
								</select>
							</div>
                            
                             <div class="row form-group  col-md-3">
          				 <div class="form-group <?php echo (!empty($pais_err)) ? 'has-error' : ''; ?>">
                            <label>Pais</label>
                            <input type="text" name="pais" id="pais" class="form-control" value="<?php echo $pais; ?>">
                            	<span class="help-block"><?php echo $pais_err;?></span>
                        	</div>
                         </div>
                          <div class="col-md-3"> 
                        	<div class="form-group <?php echo (!empty($edo_err)) ? 'has-error' : ''; ?>">
                            <label>Estado</label>
                            <input type="text" name="edo" id="edo" class="form-control" value="<?php echo $edo; ?>">
                            	<span class="help-block"><?php echo $edo_err;?></span>
                        	</div>
                           </div> 
                        <div class="col-md-3 ">
							<label>Municipio</label>
                            <div class="form-group <?php echo (!empty($muni_err)) ? 'has-error' : ''; ?>">
								 <input type="text" name="muni" id="muni" class="form-control" value="<?php echo $muni; ?>">
                            <span class="help-block"><?php echo $muni_err;?></span>
								</div>
                           </div> 
                        <div class="col-md-3 ">
						 <label>Localidad</label>
						  <div class="form-group <?php echo (!empty($loca_err)) ? 'has-error' : ''; ?>">
                            <input type="text" name="loca" id="loca" class="form-control" value="<?php echo $loca; ?>">
                       	    <span class="help-block"><?php echo $loca_err;?></span>
							</div>
                        </div>
						
                        <div class=" row form-group col-md-3 ">
                                        
						 <div class="form-group <?php echo (!empty($col_err)) ? 'has-error' : ''; ?>">
							 <label>Colonia</label>
                            <input type="text" name="col" id="col" class="form-control" value="<?php echo $col; ?>">
                            	<span class="help-block"><?php echo $col_err;?></span>
                        	</div>
                         </div>                    
                   
            			<div class=" col-md-3 ">
                        	<div class="form-group <?php echo (!empty($calle_err)) ? 'has-error' : ''; ?>">
                            <label>Calle</label>
                            <input type="text" name="calle" id="calle" class="form-control" value="<?php echo $calle; ?>">
                            	<span class="help-block"><?php echo $calle_err;?></span>
                        	</div>
                        </div>
						 <div class="col-md-3">
                        	<div class="form-group <?php echo (!empty($cruza_err)) ? 'has-error' : ''; ?>">
                            <label>Cruzamientos</label>
                            <input type="text" name="cruza" id="cruza" class="form-control" value="<?php echo $cruza;?>">
                            	<span class="help-block"><?php echo $cruza_err;?></span>
                        	</div>
                        </div>
                      
						  <div class="col-md-3">
                        	<div class="form-group <?php echo (!empty($num_err)) ? 'has-error' : ''; ?>">
                            <label>Num.</label>
                            <input type="text" name="num" id="num" class="form-control" value="<?php echo $num; ?>">
                            	<span class="help-block"><?php echo $num_err;?></span>
                        	</div>
                        </div>
                       
					
                        </div>
					
                           <div class="row form-group ">
                        <input type="submit" class="btn btn-primary" value="Enviar">  
                        <a href="index.php" class="btn btn-default">Cancelar</a>
                         <p><a href="index.php" class="btn btn-primary">Volver</a></p>
     </div>
    </div>
    </form>
      


                <div class="container-fluid">
                <footer class="py-4 bg-light mt-auto">
                    
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
