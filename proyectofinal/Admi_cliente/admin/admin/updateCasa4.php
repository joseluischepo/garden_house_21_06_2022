<?php   

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

<?php
	include '../bd/conn.php';
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	$idca = $_GET['idca'];

    // Query sent to database
    $result = mysqli_query($conn, "SELECT titulo, precio, foto, sup, descri, vr, Idtipo, pais, edo, muni, loca, col, calle, cruza, num, status FROM casa2 WHERE idca='".$idca."'");

    // Variable $row hold the result of the query
    $row = mysqli_fetch_assoc($result);


	mysqli_close($conn);

?>

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
                        <?php
                        if($_SESSION['tipo'] == 1){
                            echo "<div class='nav'>
                            <a class='nav-link' href='indexCliente.php'>
                                <div class='sb-nav-link-icon'><i class='fas fa-tachometer-alt'></i></div>
                                Usuarios
                            </a>    
                        </div>
                        <div class='nav'>
                            <a class='nav-link' href='indexNosotros.php'>
                                <div class='sb-nav-link-icon'><i class='fas fa-tachometer-alt'></i></div>
                                Nosotros
                            </a>    
                        </div>
                        <div class='nav'>
                            <a class='nav-link' href='indexTipo.php'>
                                <div class='sb-nav-link-icon'><i class='fas fa-synagogue' style='font-size:12px'></i></div>
                                Tipo
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
                        <h2>Actualizar Registro</h2>
                    </div>
                    <p>Edite los valores de entrada y envíe para actualizar el registro.</p>
                   <form enctype="multipart/form-data" action="editar.php" method="post"  >
                    <input id="idca" name="idca" type="hidden" value="<?php echo $idca; ?>" />
                       <div class="form-group">
                            <label>Titulo</label>
							<input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo $row['titulo']; ?>" required>

                        	</div>
                       
                        
                        
                        <div class="form-group">
                           <label>Precio</label>
							<input type="text" class="form-control" id="precio" name="precio" value="<?php echo $row['precio']; ?>" required>

                        </div>
                        
                        <div class="row form-group">
                        <!--<div class="col-md-12 mb-3 mb-md-0">
                                <div class="form-group <?php echo (!empty($foto_err)) ? 'has-error' : ''; ?>"> 
                                    <label class="text-black" for="fname">Imagen del lugar</label>
                                <br>
                                Nombre <input type="file" name="foto" ><br><br>
                                </div>
                        </div>-->
						</div>
                        
                         <div class="form-group">
                            <label>Superficie</label>
							<input type="text" class="form-control" id="sup" name="sup" value="<?php echo $row['sup']; ?>" required>

                        </div>
                        <div class="form-group ">
                            <label>Descripcion</label>
							<textarea class="form-control" id="descri" name="descri" required><?php echo $row['descri']; ?></textarea>

                        </div>
                        <div class="col-md-4 ">
								                            
                            <label>Venta/Renta</label>
                           <select name="vr" id="cbx_vr" class="form-control">
									<option selected>Elegir</option>
									<?php
									if ($row['vr'] == "Renta") {
										echo "<option Selected>Renta</option>
											<option>Venta</option>";
									}elseif ($row['vr'] == "Venta"){
										echo "<option>Renta</option>
											<option Selected>Venta</option>";
									}
									?>
								</select>
                        </div>
                            
                            <div class="form-group col-md-4 ">
								 <label>Tipo de casa</label>
                            <select id="Idtipo" class="form-control"  name="Idtipo">
                            <?php

							include '../bd/conn.php';
							$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
							if (!$conn) {
								die("Connection failed: " . mysqli_connect_error());
							}
							$resultAutores = mysqli_query($conn,"SELECT idtipo,nametipo FROM tipo");
							$count = mysqli_num_rows($resultAutores);
							
							if ($count>0){
								echo "<option value='".$row['Idtipo']."'>".$row['Idtipo']."</option>";
								while ($fila = $resultAutores->fetch_row()) 
								{
									if($row['Idtipo']==$fila[1]){

									}else{
										echo "<option value='".$fila[1]."'>".$fila[1]."</option>";
									}
								
								}
							}
							mysqli_close($conn );
							
							?>
						</select>
					</div>
                    <div class="row form-group  col-md-3">
          				 <div class="form-group">
                         
                            <label>Pais</label>
							<input type="text" class="form-control" id="pais" name="pais" value="<?php echo $row['pais']; ?>" required>

                        	</div>
                         </div>
                          <div class="col-md-3"> 
                        	<div class="form-group">
                            <label>Estado</label>
							<input type="text" class="form-control" id="edo" name="edo" value="<?php echo $row['edo']; ?>" required>

                        	</div>
                           </div> 
                        <div class="col-md-3 ">
							
                            <div class="form-group ">
								<label>Municipio</label>
							<input type="text" class="form-control" id="muni" name="muni" value="<?php echo $row['muni']; ?>" required>

								</div>
                           </div> 
                        <div class="col-md-3 ">
						 
						  <div class="form-group">
                            <label>Localidad</label>
							<input type="text" class="form-control" id="loca" name="loca" value="<?php echo $row['loca']; ?>" required>

							</div>
                        </div>
                        
                        
                          <div class="row form-group  col-md-3">
          				 <div class="form-group">
                            <label>Colonia</label>
							<input type="text" class="form-control" id="col" name="col" value="<?php echo $row['col']; ?>" required>

                        	</div>
                         </div>
                          <div class="col-md-3"> 
                        	<div class="form-group">
                            <label>Calle</label>
							<input type="text" class="form-control" id="calle" name="calle" value="<?php echo $row['calle']; ?>" required>

                        	</div>
                           </div> 
                        <div class="col-md-3 ">
							
                            <div class="form-group ">
								<label>Cruzamientos</label>
							<input type="text" class="form-control" id="cruza" name="cruza" value="<?php echo $row['cruza']; ?>" required>

								</div>
                           </div> 
                        <div class="col-md-3 ">
						 
						  <div class="form-group ">
                            <label>Numero</label>
							<input type="text" class="form-control" id="num" name="num" value="<?php echo $row['num']; ?>" required>

							</div>
                        </div>
                        
        
          <div class="form-group">
			  <div class="col-md-3">             
             <?php
                if($_SESSION['tipo'] == 1){
                    if($row['status'] == "sin publicar"){
                        echo "<select name='status' class='form-control'>
                            <option>publicar</option>
                            <option selected>sin publicar</option>
                        </select>";
                    }elseif($row['status'] == "publicar")
                    echo "<select name='status' class='form-control'>
                            <option selected>publicar</option>
                            <option>sin publicar</option>
                    </select>";
                }elseif($_SESSION['tipo'] == 2){
                    echo "
                    <input type='hidden' class='form-control' id='status' name='status' value=".$row['status'].">";
                }
            ?>
           		</div>
           	</div>
        </div>
    
    
    
   					    <div class="row form-group ">
      						<input type="hidden" name="idca" value=" <?php echo $idca; ?>"/>  
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

