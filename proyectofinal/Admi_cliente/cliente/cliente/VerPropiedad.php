<?php
if(isset($_GET["idca"]) && !empty(trim($_GET["idca"]))){
    require_once "conex.php";
    
    $sql = "SELECT casa2.titulo, casa2.precio, casa2.foto, casa2.sup, casa2.descri, casa2.vr, casa2.Idtipo, concat(casa2.pais, ', ', casa2.edo, ', ', casa2.muni, ', ', casa2.loca, ', ', casa2.col, ', ', casa2.calle, ', ', casa2.cruza, ', ', casa2.num) as 'direc', cliente.correo FROM casa2 inner join cliente on casa2.Idc = cliente.idc WHERE idca = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        $param_id = trim($_GET["idca"]);
        
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
              $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
              $titulo = $row["titulo"];
              $precio = $row["precio"];
              $foto = $row["foto"];
              $sup = $row["sup"];
              $descri = $row["descri"];
              $vr = $row["vr"];
              $nametipo = $row["Idtipo"];
              $direc = $row["direc"];
              $correo = $row["correo"];
				
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
    <title>Warehouse &mdash; Website Template by Colorlib</title>
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
                <!-- <li><a href="VenderRentar.php" class="nav-link">Vender/RENTAR</a></li> -->
                <li><a href="AccederRegistrarme.php" class="nav-link">Acceder/Registrarme</a></li>
                <li><a href="Nosotros.php?id=1" class="nav-link">NOSOTROS</a></li> 
              </ul>
            </nav>
          </div>
          <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-white float-right"><span class="icon-menu h3"></span></a></div>
        </div>
      </div>
    </header>

    
    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(images/hero_1.jpg);" data-aos="fade">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-5 mx-auto mt-lg-5 text-center">
            <h1><?php echo $titulo ?></h1>
            <p class="mb-5"><strong class="text-white">$<?php echo $precio ?></strong></p>
          </div>
        </div>
      </div>
      <a href="#property-details" class="smoothscroll arrow-down"><span class="icon-arrow_downward"></span></a>
    </div>  

    
    <div class="site-section" id="property-details">
      <div class="container">
        <div class="row">
          <div class="col-lg-7">
            <div class="owl-carousel slide-one-item with-dots">
              <div><img src="../../admin/admin/<?php echo $foto ?>" alt="Image" class="img-fluid"></div>
            </div>
          </div>
          <div class="col-lg-5 pl-lg-5 ml-auto">
            <div class="mb-5">
              <h3 class="text-black mb-4">Detalles de la propiedad</h3>
              <p>Direcccion: <?php echo $direc ?> </p>
              <p>Superficie: <?php echo $sup ?>m2</p>
              <p>Descripción: <?php echo $descri ?></p>
              <p>Vivienda en: <?php echo $vr ?></p>
              <p>Tipo de vivienda: <?php echo $nametipo ?></p>
            </div>
            <div class="mb-5">
              
              <div class="mt-5">
                <h4 class="text-black">Email del vendedor</h4>
                <p><?php echo $correo ?></p>
                <p><a href="#" class="btn btn-primary btn-sm">Contactar vendedor</a></p>
              </div>
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