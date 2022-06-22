<?php
// Include config file
require_once "conex.php";
 
//Inicio onfiguracion de sesión
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
                        <h1 class="mt-4">Grafica de Niveles de Agua</h1>   
                    </div>
                </main>
				
                <canvas id="myChart" style="position: relative; height: 40vh; width: 80vw;"></canvas>

               


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    
    
    <script>
        
        
        var ctx = document.getElementById('myChart')
        var myChart = new Chart(ctx, {
            type:'bar',
            data:{
                datasets: [{
                    label: 'Humedad Ambiental',
                    backgroundColor: ['#6bf1ab','#63d69f', '#438c6c', '#509c7f', '#1f794e', '#34444c', '#90CAF9', '#64B5F6', '#42A5F5', '#2196F3', '#0D47A1'],
                    borderColor: ['black'],
                    //backgroundColor: 'rgba(255, 159, 64, 0.2)',
                    //borderColor: 'rgba(255, 159, 64, 1)',
                    borderWidth:1
                }]
            },
            options:{
                scales:{
                    yAxes:[{
                        ticks: {
                            beginAtZero:true
                        }
                        
                    }]
                }
            }
        })

       
        let urlhumam = 'https://localhost/garden_house/proyectofinal/Admi_cliente/admin/admin/models/apirest_php/articulos.php'
        fetch(urlhumam)
            .then( response => response.json() )
            .then( datos => mostrarhuma(datos) )
           // .then( humedadT => mostrar(humedadT) )
            .catch( error => console.log(error) )


        //const mostrar = (articulos) =>{
            const mostrarhuma = (nodo) =>{
            //articulos.forEach(element => {
                nodo.forEach(element => {
                //myChart.data['labels'].push(element.descripcion)
                myChart.data['labels'].push(element.Fecha)
                //myChart.data['datasets'][0].data.push(element.stock)
                //myChart.data['datasets'][0].data.push(element.nivel_a)   
                myChart.data['datasets'][0].data.push(element.nivel_a) 
                //myChart.data['datasets'][1].data.push(element.humedad_t)   
                myChart.update()
            });
            
            //2da grafica intento
            
           // nodo.forEach(element => {
                //myChart.data['labels'].push(element.descripcion)
                //myChart.data['labels'].push(element.Fecha)
                //myChart.data['datasets'][0].data.push(element.stock)
                //myChart.data['datasets'][0].data.push(element.nivel_a)   
                //myChart.data['datasets'][0].data.push(element.humedad_t)   
                //myChart.update()
            //});

            console.log(myChart.data)
        }    

        



    </script>

         			<p><a href="index.php" class="btn btn-primary">Volver</a></p>
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