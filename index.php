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
  <div id="preloader"></div>
  
<!--==========================
  Hero Section
============================-->
  <section id="hero">
    <div class="hero-container">
      <div class="wow fadeIn">
        <div class="hero-logo">
          <img class="" src="img/logo.png" alt="Imperial">
        </div>
        
        <h1>Bienvenidos a la Página Web del Grupo</h1>
        <h2><span class="rotating">
        <?php
          if($conexion){
            $resultados = mysqli_query($conexion,"select * from Frase");
            if($resultados){
              FOR($i=1; $i<=$row = mysqli_fetch_array($resultados,MYSQLI_ASSOC); $i++){
                echo $row['frase'].'#';
              }
            }
          }
        ?>
        </span></h2>
        <div class="actions">
          <a href="#about" class="btn-get-started">¿Quienes somos?</a>
          <a href="#testimonials" class="btn-services">Libros de Lectura</a>
        </div>
      </div>
    </div>
  </section>
  
<!--==========================
  Header Section
============================-->
  <header id="header">
    <div class="container">
    
      <div id="logo" class="pull-left">
        <a href="#hero"><img src="img/logo.png" alt="" title="" /></img></a>
        <!-- Uncomment below if you prefer to use a text image -->
        <!--<h1><a href="#hero">Header 1</a></h1>-->
      </div>
        
      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="#hero">Inicio</a></li>
          <li><a href="#about">Bienvenido al Grupo</a></li>
          <li><a href="#services">Áreas</a></li>
          <li><a href="#testimonials">Libros</a></li>
          <li><a href="#team">Integrantes</a></li>
          <li><a href="#access">Admin</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->
    
<!--==========================
  About Section
============================-->
  <section id="about">
    <div class="container wow fadeInUp">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title">Bienvenido al grupo</h3>
          <div class="section-title-divider"></div>
          <p class="section-description">Te damos la bienvenida al grupo integrado por varios amigos de distintos países de habla hispana.</p>
        </div>
      </div>
    </div>
    <div class="container about-container wow fadeInUp">
      <div class="row">
        <div class="col-md-6 col-md-push-6 about-content">
          <h2 class="about-title">(Destruir para Crear)</h2>
          <p class="about-text">
            Aquí tratamos temas de Ciencia, Arte, Filosofía, Literatura y más; con la intención de difundir, conocer y compartir conocimiento.
          </p>
          <p class="about-text">
            No hay limitaciones de temas ni de contenido a compartir
        <br>Excepto tres reglas:</br>
          </p>
          <p class="about-text">
            <b>1.- NO SE ACEPTARÁ ACOSO, AGRAVIO O INSULTO A NINGÚN INTEGRANTE (INCLUSO POR CHAT PRIVADO)</b>
          </p>
          <p class="about-text">
            <b>2.- ES TERMINANTEMENTE PROHIBIDO CONTENIDO SEXUAL, REFERENCIA SEXUAL O CONTENIDO EXPLÍCITO</b>
          </p>
          <p class="about-text">
            <b>3.- PROHIBIDO HACER CAMBIOS EN LA IMAGEN O NOMBRE DEL GRUPO</b>
          </p>
          <p class="about-text">
            <b>EN CASO DE NO CUMPLIR CON LAS REGLAS ESTABLECIDAS SERÁ ELIMINADO</b>
          </p>
          <p class="about-text">
            <i>Este grupo se creó con la finalidad de compartir información, aprender y discutir acerca de temas diversos, por eso mismo nos reservamos el derecho de conservar solo a las personas adecuadas para el fin ya mencionado.</i>
          </p>
          <p class="text-center">
            <a class="subscribe-btn" href="register.html">Registrarse en ésta página</a>
          </p>
        </div>
      </div>
    </div>
  </section>
 
<!--==========================
  Services Section
============================-->
  <section id="services">
    <div class="container wow fadeInUp">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title">Áreas que generalmente se debaten</h3>
          <div class="section-title-divider"></div>
          <p class="section-description">Nos encantaría que aportaras a éstas y agregaramos más por ti.</p>
        </div>
      </div>
        
      <div class="row">
        <div class="col-md-4 service-item">
          <div class="service-icon"><i class="fa fa-align-center"></i></div>
          <h4 class="service-title"><a href="">Psicología</a></h4>
          <p class="service-description">Estudio de conductas, emociones, pensamientos, síntomas y afecciones.</p>
        </div>
        <div class="col-md-4 service-item">
          <div class="service-icon"><i class="fa fa-universal-access"></i></div>
          <h4 class="service-title"><a href="">Filosofía</a></h4>
          <p class="service-description">Estudio de las formulaciones lógicas del pensamiento humano en la búsqueda del Ser.</p>
        </div>
        <div class="col-md-4 service-item">
          <div class="service-icon"><i class="fa fa-tasks"></i></div>
          <h4 class="service-title"><a href="">Matemáticas</a></h4>
          <p class="service-description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
        </div>
        <div class="col-md-4 service-item">
          <div class="service-icon"><i class="fa fa-rocket"></i></div>
          <h4 class="service-title"><a href="">Física</a></h4>
          <p class="service-description">Estudio de los fenómenos que comprenden desde las interacciones fundamentales de la materia a escalas subatómicas hasta escalas macroscópicas  que conciernen al universo en gran escala.</p>
        </div>
        <div class="col-md-4 service-item">
          <div class="service-icon"><i class="fa fa-hourglass-end"></i></div>
          <h4 class="service-title"><a href="">Historia</a></h4>
          <p class="service-description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
        </div>
        <div class="col-md-4 service-item">
          <div class="service-icon"><i class="fa fa-desktop"></i></div>
          <h4 class="service-title"><a href="">Tecnología</a></h4>
          <p class="service-description">Análisis de los riesgos en seguridad informática así como de soporte técnico.</p>
        </div>
      </div>
    </div>  
  </section>
  

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
            <div>
            <button type="submit">Votar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<!--==========================
  Subscrbe Section
============================-->  
  <section id="subscribe">
    <div class="container wow fadeInUp">
      <div class="row">
        <div class="col-md-8">
          <h3 class="subscribe-title">Enlace a la biblioteca del grupo</h3>
          <p class="subscribe-text">Aquí encontrarás la biblioteca que en conjunto hemos construido para cualquiera que esté interesado.</p>
        </div>
        <div class="col-md-4 subscribe-btn-container">
          <a class="subscribe-btn" href="https://drive.google.com/open?id=0BzRevjHZyE3VenMxeEZZTV8zZ2s">Enlace</a>
        </div>
      </div>
    </div>
  </section>
    

<!--==========================
  Team Section
============================-->    
  <section id="team">
    <div class="container wow fadeInUp">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title">Integrantes</h3>
          <div class="section-title-divider"></div>
          <p class="section-description">Conoce un poco más de nosotros</p>
        </div>
      </div>
      <div class="row">
      <?php
          if($conexion){
            $resultados = mysqli_query($conexion,"select * from Usuario");
            if($resultados){
              FOR($i=1; $i<=$row = mysqli_fetch_array($resultados,MYSQLI_ASSOC); $i++){
                $nombreuser = $row['nombre'];
                $areauser = $row['area'];
                $descripcionuser = $row['descripcion'];
                $imagenuser = $row['srcimagen'];
                echo'
                  <div class="col-md-3">
                    <div class="member">
                      <div class="pic"><img src="user/'.$imagenuser.'" alt=""></div>
                      <h4>'.$nombreuser.'</h4>
                      <span>'.$areauser.'</span>
                      <div class="social">
                        <p>'.$descripcionuser.'</p>
                      </div>
                    </div>
                  </div>';
              }
            }
          }
        ?>
      </div>  
    </div>
  </section>
  <!--==========================
  Access Section
============================-->
<section id="access">
    <div class="container wow fadeInUp">
        <div class="row">
            <div class="col-md-8">
                <h3 class="access-title">Link de Whatsapp</h3>
                <p class="access-text">Listo para ingresar, aquí el link de WhatsApp.</p>
            </div>
            <div class="col-md-4 access-btn-container">
                <a class="access-btn" href="https://chat.whatsapp.com/invite/6eWK06096jNAoVjB3wec3E">Link</a>
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