<?php   

    session_start();

    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

    } else {
        header('Location:error.php');
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

        $idn = $_GET['idn'];

        // Query sent to database
        $result = mysqli_query($conn, "SELECT tipo_h FROM nodo WHERE idn='".$idn."'");

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
                
        <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Actualizar nodo</h2>
                    </div>
                    <p>Seleccione su hortaliza.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                       	
                        <div class="form-group col-md-4 ">
                            <label>Tipo de hortaliza</label>
                            <select id="tipo_h" class="form-control"  name="tipo_h">
                                <?php

                                        include '../bd/conn.php';
                                        $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
                                        if (!$conn) {
                                            die("Connection failed: " . mysqli_connect_error());
                                        }
                                        $result = mysqli_query($conn,"SELECT id,tipo_hortaliza FROM hortalizas");
                                        $count = mysqli_num_rows($result);
                                        
                                        if ($count>0){
                                            echo "<option value='".$row['id']."'>".$row['id']."</option>";
                                            while ($fila = $result->fetch_row()) 
                                            {
                                                if($row['id']==$fila[1]){

                                                }else{
                                                    echo "<option value='".$fila[1]."'>".$fila[1]."</option>";
                                                }
                                            
                                            }
                                        }
                                        mysqli_close($conn );
                                    
                                ?>
                            </select>
                            
                            
                        </div>              
					
                        
					
                           <div class="row form-group ">
                           <input type="hidden" name="idn" value=" <?php echo $idn; ?>"/>
                           <input type="submit" class="btn btn-primary" value="Enviar">  
                            <a href="index.php" class="btn btn-default">Cancelar</a>
                            <p><a href="index.php" class="btn btn-primary">Volver</a></p>
        
                    </form>   
            
                </div>
            </div>                           
        </div>
                
      


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

        </div>   
    </body>
</html>

