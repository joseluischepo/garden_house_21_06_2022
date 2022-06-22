<?php
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    require_once "conex.php";
    
    $sql = "SELECT * FROM nosotros WHERE id = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        $param_id = trim($_GET["id"]);
        
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
              $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
              $nosotroscol = $row["nosotroscol"];
              $mision = $row["mision"];
              $vision = $row["vision"];
              $integrante1 = $row["integrante1"];
              $integrante2 = $row["integrante2"];
              $integrante3 = $row["integrante3"];
              $integrante4 = $row["integrante4"];
              $prof1 = $row["prof1"];
              $prof2 = $row["prof2"];
			        $prof3 = $row["prof3"];
              $prof4 = $row["prof4"];
			        $i1descri = $row["i1descri"];
              $i2descri = $row["i2descri"];
			        $i3descri = $row["i3descri"];
              $i4descri = $row["i4descri"];
				
            } else{
                header("location: error.php");
                exit();
            }
            
        } else{
            echo "Oops! Algo ha salido mal. Por favor, intentelo de nuevo más tarde uwu.";
        }
    }
     
    mysqli_stmt_close($stmt);
    
    mysqli_close($link);
} else{
    header("location: error.php");
    exit();
}
?>



<!DOCTYPE html>
<html lang="en">
  <head>

    <title>J&V-NOSOTROS </title>
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
                <li><a href=< "Nosotros.php?id=1" class="nav-link">NOSOTROS</a></li> 
              </ul>
            </nav>
          </div>
          <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-white float-right"><span class="icon-menu h3"></span></a></div>
        </div>
      </div>
    </header>

    
   <div class="site-block-wrap">
    <div class="owl-carousel with-dots">
      <div class="site-blocks-cover overlay overlay-2" style="background-image: url(images/hero_2.jpg);" data-aos="fade" id="home-section">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-6 mt-lg-5 text-center">
              <h1 class="text-shadow">NOSOTROS</h1>
              <input type="hidden" name="id" id="id" value="<?php echo $param_id['id'];?>">
              <p class="mb-5 text-shadow">Las mejores propiedades en J&V</p>      
            </div>
          </div>
        </div> 
      </div>  
    </div>      
  </div>  


<br><br>
 <center><h1 class="text-shadow">Nosotros</h1></center>


  <div class="site-section" id="properties-section">
      <div class="container">
        <div class="row large-gutters">
            <?php echo $nosotroscol ?>
        </div>
      </div>
    </div>
    
    
    <br><br>
 <center><h1 class="text-shadow">Mision</h1></center>


  <div class="site-section" id="properties-section">
      <div class="container">
        <div class="row large-gutters">
           <?php echo $mision ?>
        </div>
      </div>
    </div>
     <br><br>
 <center><h1 class="text-shadow">Vision</h1></center>


  <div class="site-section" id="properties-section">
      <div class="container">
        <div class="row large-gutters">
           <?php echo $vision ?>
        </div>
      </div>
    </div>



<section class="site-section testimonial-wrap" id="testimonials-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12 text-center">
            <h2 class="section-title mb-3">Equipo<h2>
          </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="ftco-testimonial-1">
                  <div class="ftco-testimonial-vcard d-flex align-items-center mb-4">
                    <img src="images/person_1.jpg" alt="Image" class="img-fluid mr-3">
                    <div>
                      <h3><?php echo $integrante1 ?></h3>
                      <span><?php echo $prof1 ?></span>
                    </div>
                  </div>
                  <div>
                    <p><?php echo $i1descri ?></p>
                  </div>
                </div>
              </div>
              <div class="col-md-6 mb-4">
                  <div class="ftco-testimonial-1">
                      <div class="ftco-testimonial-vcard d-flex align-items-center mb-4">
                        <img src="images/person_2.jpg" alt="Image" class="img-fluid mr-3">
                        <div>
                          <h3><?php echo $integrante2 ?> </h3>
                          <span><?php echo $prof2 ?></span>
                        </div>
                      </div>
                      <div>
                        <p><?php echo $i2descri ?></p>
                      </div>
                    </div>
              </div> 

              <div class="col-md-6 mb-4">
                  <div class="ftco-testimonial-1">
                    <div class="ftco-testimonial-vcard d-flex align-items-center mb-4">
                      <img src="images/person_3.jpg" alt="Image" class="img-fluid mr-3">
                      <div>
                        <h3><?php echo $integrante3 ?> </h3>
                        <span><?php echo $prof3 ?></span>
                      </div>
                    </div>
                    <div>
                      <p><?php echo $i3descri ?></p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="ftco-testimonial-1">
                        <div class="ftco-testimonial-vcard d-flex align-items-center mb-4">
                          <img src="images/person_1.jpg" alt="Image" class="img-fluid mr-3">
                          <div>
                            <h3><?php echo $integrante4 ?> </h3>
                            <span><?php echo $prof4 ?></span>
                          </div>
                        </div>
                        <div>
                          <p><?php echo $i4descri ?></p>
                        </div>
                      </div>
                </div> 
        </div>
      </div>
    </section>

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
                    <li><a href="Nosotros.php?id=1">NOSOTROS</a></li>
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