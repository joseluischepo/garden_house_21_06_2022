<!DOCTYPE html>
<html lang="en">
  <head>

    <title>J&v-EN RENTA</title>
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
            <h1 class="mb-0 site-logo m-0 p-0"><a href="index.html" class="mb-0">J&V</a></h1>
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

    
    <div class="site-blocks-cover overlay" style="background-image: url(images/hero_1.jpg);" data-aos="fade" id="home-section">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-6 mt-lg-5 text-center">
            <h1>¿Listo para rentar una propiedad?</h1>    
          </div>
        </div>
      </div>
      <a href="#listings-section" class="smoothscroll arrow-down"><span class="icon-arrow_downward"></span></a>
    </div>  


    <br><br>
    <center><h1 class="text-shadow">Propiedades en renta</h1></center>

    <br><br>
   <div class="site-section" id="properties-section">
      <div class="container">
      <div class='row' style="padding: 10px">
		      <div class='col-lg-12'>
			      <div class="form-row">

          <?php
 require "conex.php";
 // Include config file
 $sql = "SELECT idca, titulo, precio, foto FROM casa2 WHERE vr = 'Renta' AND status = 'publicar'";
 if($result = mysqli_query($link, $sql)){
   if(mysqli_num_rows($result) > 0){
     while($row = mysqli_fetch_array($result)){
      echo "<div class='col-md-4'>
      <div class='ftco-media-1'>
        <div class='ftco-media-1-inner'>
          <a href='VerPropiedad.php?idca=". $row['idca'] ."' class='d-inline-block mb-4'><img  width='500px' height='500px' src='../../admin/admin/". $row['foto'] ."' alt='FImageo 'class='img-fluid'></a> 
          <div class='ftco-media-details'>
            <h3>". $row['titulo'] ."</h3>
            <strong>$". $row['precio'] ."</strong>";
          echo "</div>
        </div> 
      </div>
    </div>";
     }
     mysqli_free_result($result);
   } else{
     echo "<p class='lead'><em>No se han encontrado datos.</em></p>";
   }
 } else{
   echo "ERROR: No se pudo ejecutar $sql. " . mysqli_error($link);
 }
 mysqli_close($link);
 ?>
	</div>
  </div>
  </div>
  </div>
</div>					
    
    


    
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