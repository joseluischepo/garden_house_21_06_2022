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
            <a class="navbar-brand" href="index.html">Sistema administrator</a>
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
                            <a class="nav-link" href="indexUsuario.php">
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
                    </div>

                    <div class="sb-sidenav-footer">
                        <div class="small">J&V</div>
                        Inboviliaria
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Pagian principal</h1>   
                    </div>
                </main>

                <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Actualizar Registro</h2>
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
            	<div class="form-group <?php echo (!empty($ape1_err)) ? 'has-error' : ''; ?>"> 
            
            
            		<label class="text-black" for="fname" placeholder="">Primer apellido</label>
            		<input type="text" name="ape1" id="ape1" class="form-control" placeholder="$" value="<?php echo $ape1; ?>">
          			<span class="help-block"><?php echo $ape1_err;?></span>
           		</div>
          </div>
        </div>

        <div class="row form-group">
            <div class="col-md-6">
              <div class="form-group <?php echo (!empty($ape2_err)) ? 'has-error' : ''; ?>"> 
              		
                    <label class="text-black" for="fname">segundo apellido</label> 
              		<input type="text" name="ape2" id="ape2" class="form-control" placeholder="" value="<?php echo $ape2; ?>">
            
            		<span class="help-block"><?php echo $ape2_err;?></span>
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
            <div class="col-md-4 ">
            	<div class="form-group <?php echo (!empty($cel1_err)) ? 'has-error' : ''; ?>"> 		
                        <label class="text-black" for="fname">celular 1</label>
              			<input type="text" name="cel1" id="cel1" class="form-control" value="<?php echo $cel1; ?>">
            		<span class="help-block"><?php echo $cel1_err;?></span>
           		</div>        
            </div>
          	<div class="col-md-4">
          		<div class="form-group <?php echo (!empty($cel2_err)) ? 'has-error' : ''; ?>"> 
                    <label class="text-black" for="fname">celular 2</label>
              		<input type="text" name="cel2" id="cel2" class="form-control" value="<?php echo $cel2; ?>">
            
            		<span class="help-block"><?php echo $cel2_err;?></span>
           		</div>
            </div>
         
         
          </div>
                 
    
    <div class="row form-group">
    	<div class="col-md-4">
          <div class="form-group <?php echo (!empty($tel_err)) ? 'has-error' : ''; ?>"> 			
                    <label class="text-black" for="fname">Telefono</label>
              		<input type="text" name="tel" id="tel" class="form-control" value="<?php echo $tel; ?>" >
            
            	<span class="help-block"><?php echo $tel_err;?></span>
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
            <div class="col-md-12">
              	<div class="form-group <?php echo (!empty($pais_err)) ? 'has-error' : ''; ?>"> 		
                    
                    <label class="text-black" for="fname">pais</label> 
              		<input type="text" name="pais" id="pais" class="form-control" placeholder="" value="<?php echo $pais; ?>">
            		<span class="help-block"><?php echo $pais_err;?></span>
           		</div>
            
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-12">
              	<div class="form-group <?php echo (!empty($ciudad_err)) ? 'has-error' : ''; ?>"> 		
                    
                    <label class="text-black" for="fname">ciudad</label> 
              		<input type="text" name="ciudad" id="ciudad" class="form-control" placeholder="" value="<?php echo $ciudad; ?>">
            		<span class="help-block"><?php echo $ciudad_err;?></span>
           		</div>
            
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-12">
              	<div class="form-group <?php echo (!empty($edo_err)) ? 'has-error' : ''; ?>"> 		
                    
                    <label class="text-black" for="fname">estado</label> 
              		<input type="text" name="edo" id="edo" class="form-control" placeholder="" value="<?php echo $edo; ?>">
            		<span class="help-block"><?php echo $edo_err;?></span>
           		</div>
            
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-12">
              	<div class="form-group <?php echo (!empty($calle_err)) ? 'has-error' : ''; ?>"> 		
                    
                    <label class="text-black" for="fname">calle</label> 
              		<input type="text" name="calle" id="calle" class="form-control" placeholder="" value="<?php echo $calle; ?>">
            		<span class="help-block"><?php echo $calle_err;?></span>
           		</div>
            
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-12">
              	<div class="form-group <?php echo (!empty($cruza_err)) ? 'has-error' : ''; ?>"> 		
                    
                    <label class="text-black" for="fname">cruzamientos</label> 
              		<input type="text" name="cruza" id="cruza" class="form-control" placeholder="" value="<?php echo $cruza; ?>">
            		<span class="help-block"><?php echo $cruza_err;?></span>
           		</div>
            
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-12">
              	<div class="form-group <?php echo (!empty($num_err)) ? 'has-error' : ''; ?>"> 		
                    
                    <label class="text-black" for="fname">numero</label> 
              		<input type="text" name="num" id="num" class="form-control" placeholder="" value="<?php echo $num; ?>">
            		<span class="help-block"><?php echo $num_err;?></span>
           		</div>
            
            </div>
        </div>
         <div class="row form-group">
    	<div class="col-md-4">
          <div class="form-group <?php echo (!empty($tipo_err)) ? 'has-error' : ''; ?>"> 			
                    <label class="text-black" for="fname">Tipo</label>
              		<input type="text" name="tipo" id="tipo" class="form-control" value="<?php echo $tipo; ?>" >
            
            	<span class="help-block"><?php echo $tipo_err;?></span>
           	</div>
        </div>
    
    </div>
    
    
    
    
   
                        <input type="hidden" name="idc" value="<?php echo $idc; ?>"/>
                        <input type="submit"  class="btn btn-primary" value="Enviar">
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
