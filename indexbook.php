<?php
require_once 'mysql_login.php';
$servername=HOSTNAME;
$database=DATABASE;
$username=USERNAME;
$password=PASSWORD;
$conexion = mysqli_connect($servername,$username,$password,$database);      
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>DPC: Página Web</title>
  <meta name="theme-color" content="#820215" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Facebook Opengraph integration: https://developers.facebook.com/docs/sharing/opengraph -->
  <meta property="og:title" content="Distruggere Per Creare">
  <meta property="og:image" content="https://distruggerepercreare.000webhostapp.com/img/min.jpg">
  <meta property="og:url" content="">
  <meta property="og:site_name" content="">
  <meta property="og:description" content="Página de presentación de Distruggere Per Creare">
  
  <!-- Twitter Cards integration: https://dev.twitter.com/cards/  -->
  <meta name="twitter:card" content="summary">
  <meta name="twitter:site" content="">
  <meta name="twitter:title" content="">
  <meta name="twitter:description" content="">
  <meta name="twitter:image" content="">
  
  <!-- Place your favicon.ico and apple-touch-icon.png in the template root directory -->
  <link href="favicon.ico" rel="shortcut icon" type="image/x-icon" >
  
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet"> 
  
  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate-css/animate.min.css" rel="stylesheet">
  
  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">
  
<!-- =======================================================
  Theme Name: Imperial
  Theme URL: https://bootstrapmade.com/imperial-free-onepage-bootstrap-theme/
  Author: BootstrapMade.com
  Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>

<body>
  <!--==========================
  Testimonials Section
  ============================--> 
  <section id="testimonials">
    <div class="container wow fadeInUp">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title">Libros propuestos de Lectura</h3>
          <div class="section-title-divider"></div>
          <p class="section-description">Aquí encontrarás los libros propuestos para leer este mes.</p>
        </div>
      </div>
      <?php
      if($conexion){
        $resultados = mysqli_query($conexion,"select * from Libro");
        if($resultados){
          $total = mysqli_query($conexion,"select SUM(voto) as Suma from Libro");
          $dimint = mysqli_fetch_assoc($total);
          $dim = $dimint['Suma'];
          FOR($i=1; $i<=$row = mysqli_fetch_array($resultados,MYSQLI_ASSOC); $i++){
            $nombrelib = $row['nombreLibro'];
            $escritorlib = $row['escritor'];
            $sinopsislib = $row['sinopsis'];
            $fraselib = $row['frase'];
            $imagenlib = $row['imagen'];
            $votolib = $row['voto'];
            $porcentaje = ($votolib*100)/$dim;
            if (($i%2)!=0) {
              echo '
              <div class="row">
                <div class="col-md-3">
                  <div class="profile">
                    <div class="pic"><img src="books/'.$imagenlib.'" alt=""></div>
                    <h4>'.$nombrelib.'</h4>
                    <span>'.$escritorlib.'</span>
                  </div>
                </div>
                <div class="col-md-9">
                  <div class="quote ">
                    <p class="text-justify">'.$sinopsislib.'</p>
                    <b><img src="img/quote_sign_left.png" alt=""></b>'.$fraselib.'<small><img src="img/quote_sign_right.png" alt=""></small>
                    <div class="progress">
                      <div class="progress-bar progress-bar-striped active progress-bar-danger" role="progressbar" aria-valuenow="'.$porcentaje.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$porcentaje.'%">'.$porcentaje.'%</div>
                    </div>
                  </div>
                </div>
              </div>';
            }else{
              echo '
              <div class="row">
                <div class="col-md-9">
                  <div class="quote">
                    <p class="text-justify">'.$sinopsislib.'</p>
                    <b><img src="img/quote_sign_left.png" alt=""></b>'.$fraselib.'<small><img src="img/quote_sign_right.png" alt=""></small>
                    <div class="progress">
                      <div class="progress-bar progress-bar-striped active progress-bar-danger" role="progressbar" aria-valuenow="'.$porcentaje.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$porcentaje.'%">'.$porcentaje.'%</div>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="profile">
                    <div class="pic"><img src="books/'.$imagenlib.'" alt=""></div>
                    <h4>'.$nombrelib.'</h4>
                    <span>'.$escritorlib.'</span>
                  </div>
                </div>
              </div>';
            }
          }
        }
      }
      ?>
    </div>
    <div class="quote " >
      <div class="section-title-divider"></div>
      <p class="section-description">Vota por tu libro favorito.</p>
      <div class="form">
        <div class="center-block">
          <form action="vote.php" method="post" role="form" class="contactForm" >
            <div class="form-group">

              <?php
              if($conexion){
                $resultados = mysqli_query($conexion,"select * from Libro");
                if($resultados){
                  FOR($i=1; $i<=$row = mysqli_fetch_array($resultados,MYSQLI_ASSOC); $i++){
                    $idlib = $row['idLibro'];
                    $nombrelib = $row['nombreLibro'];
                    $escritorlib = $row['escritor'];
                    $sinopsislib = $row['sinopsis'];
                    $fraselib = $row['frase'];
                    $imagenlib = $row['imagen'];
                    $votolib = $row['voto'];
                    echo '          
                    <div class="radio">
                      <label><input type="radio" name="book" value="'.$idlib.'">'.$nombrelib.' - '.$escritorlib.'</label>
                    </div>';
                  }
                }
              }
              ?>
            </div>
            <div class="text-center">
            <button type="submit">Votar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!--==========================
  Footer
  ============================--> 
  <footer id="footer">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="copyright">
            &copy; Desarrollado por <strong>Code Siders</strong>. Todos los derechos reservados.
          </div>
          <div class="credits">
            Bootstrap Themes by <a href="https://bootstrapmade.com/">BootstrapMade</a>
          </div>
        </div>
      </div>
    </div>
  </footer><!-- #footer -->
  
  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- Required JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
  <script src="lib/morphext/morphext.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/stickyjs/sticky.js"></script>
  <script src="lib/easing/easing.js"></script>
  
  <!-- Template Specisifc Custom Javascript File -->
  <script src="js/custom.js"></script>
  
  <script src="contactform/contactform.js"></script>
  

</body>
</html>