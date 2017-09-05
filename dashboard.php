 <?php
 session_start();
 if ($_SESSION["autenticado"] != "SI") {
  header("Location: login.html");
  exit();
}
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
  <title>DPC: Admin</title>
  <meta name="theme-color" content="#820215" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  
  <!-- Facebook Opengraph integration: https://developers.facebook.com/docs/sharing/opengraph -->
  <meta property="og:title" content="">
  <meta property="og:image" content="">
  <meta property="og:url" content="">
  <meta property="og:site_name" content="">
  <meta property="og:description" content="">
  
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
  <link href="dashboard.css" rel="stylesheet">
  
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
          <li class="menu-active"><a href="#books">Libros</a></li>
          <li><a href="#quotes">Frases</a></li>
          <li><a href="#users">Usuarios</a></li>
          <li><a href="#admin">Administradores</a></li>
          <li><a href="logout.php">Cerrar Sesión</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->
  
<!--==========================
  Book Section
  ============================-->
  <section id="books">

    <div class="container wow fadeInUp">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title">Hola <?php echo $_SESSION["admin"]?>, ¿modificaremos libros hoy?</h3>
          <div class="section-title-divider"></div>
          <p class="section-description">En esta sección podrás ver, crear, modificar y eliminar los libros que se mostrarán.</p>
        </div>
      </div>
    </div>

    <div class="container about-container wow fadeInUp">

      <div class="row">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>Nombre</th>
              <th>Escritor</th>
              <th>Sinopsis</th>
              <th>Frase</th>
              <th>Imagen</th>
            </tr>
          </thead>
          <tbody>
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
                  echo'
                  <tr>
                    <th scope="row">'.$idlib.'</th>
                    <td>'.$nombrelib.'</td>
                    <td>'.$escritorlib.'</td>
                    <td>'.$sinopsislib.'</td>
                    <td>'.$fraselib.'</td>
                    <td><div class="pic"><img src="books/'.$imagenlib.'" alt="'.$imagenlib.'">'.$imagenlib.'</div></td>
                  </tr>';
                }
              }
            }
            ?>
          </tbody>
        </table>              
      </div>
      <div class="row">
        <div class="col-xs-6">
          <h1>Insertar Libro</h1>
          <div id="insertbook" class="form">
            <form action="register.php" method="post" role="form" class="contactForm" enctype="multipart/form-data">
              <div class="form-group">
                <label>Nombre del libro:</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Escribe tu nombre o apodo." data-rule="minlen:4" data-msg="Inserta al menos 4 letras." required="" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <label>Nombre del escritor:</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Escribe tu nombre o apodo." data-rule="minlen:4" data-msg="Inserta al menos 4 letras." required="" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <label>Sinopsis (max: <span>300</span>):</label>
                <textarea id="descripcion" name="descripcion" maxlength="300" class="form-control" rows="2" data-rule="required" data-msg="Por favor escribe algo de ti" placeholder="Se que no hay tres minutos, ni cien palabras que te puedan definir, pero puedes intentarlo." required=""></textarea>
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <label>Frase o extracción del libro (max: <span>300</span>):</label>
                <textarea id="descripcion" name="descripcion" maxlength="300" class="form-control" rows="2" data-rule="required" data-msg="Por favor escribe algo de ti" placeholder="Se que no hay tres minutos, ni cien palabras que te puedan definir, pero puedes intentarlo." required=""></textarea>
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <label>Portada del libro:</label>
                <input type="file" class="form-control" name="image" id="image" data-rule="file" data-msg="Ingresa un archivo valido" required="" />
                <div class="validation"></div>
                <h4><small>Procurar que el ancho sea de 400 pixeles para que se ajuste correctamente a la página.</small></h4>
              </div>
              <div class="btn btn-link"><button type="submit">Registrar</button></div>
            </form>
          </div>
        </div>
        <div class="col-xs-6">
          <h1>Modificar Libro</h1>
          <div id="insertbook" class="form">
            <form action="register.php" method="post" role="form" class="contactForm" enctype="multipart/form-data">
              <div class="form-group">
                <label>Libro:</label>
                <select>
                  <?php
                  if($conexion){
                    $resultados = mysqli_query($conexion,"select * from Libro");
                    if($resultados){
                      FOR($i=1; $i<=$row = mysqli_fetch_array($resultados,MYSQLI_ASSOC); $i++){
                        $idlib = $row['idLibro'];
                        $nombrelib = $row['nombreLibro'];
                        echo'
                        <option value="'.$idlib.'">'.$nombrelib.'</option>
                        ';
                      }
                    }
                  }
                  ?>

                </select>
              </div>
              <div class="form-group">
                <label>Nombre del escritor:</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Escribe tu nombre o apodo." data-rule="minlen:4" data-msg="Inserta al menos 4 letras." required="" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <label>Sinopsis (max: <span>300</span>):</label>
                <textarea id="descripcion" name="descripcion" maxlength="300" class="form-control" rows="2" data-rule="required" data-msg="Por favor escribe algo de ti" placeholder="Se que no hay tres minutos, ni cien palabras que te puedan definir, pero puedes intentarlo." required=""></textarea>
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <label>Frase o extracción del libro (max: <span>300</span>):</label>
                <textarea id="descripcion" name="descripcion" maxlength="300" class="form-control" rows="2" data-rule="required" data-msg="Por favor escribe algo de ti" placeholder="Se que no hay tres minutos, ni cien palabras que te puedan definir, pero puedes intentarlo." required=""></textarea>
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <label>Portada del libro:</label>
                <input type="file" class="form-control" name="image" id="image" data-rule="file" data-msg="Ingresa un archivo valido" required="" />
                <div class="validation"></div>
                <h4><small>Procurar que el ancho sea de 400 pixeles para que se ajuste correctamente a la página.</small></h4>
              </div>
              <div class="btn btn-link"><button type="submit">Registrar</button></div>
            </form>
          </div>
          <h1>Eliminar Libro</h1>
          <div id="insertbook" class="form">
            <form action="register.php" method="post" role="form" class="contactForm" enctype="multipart/form-data">
              <div class="form-group">
                <label>Libro:</label>
                <select>
                  <?php
                  if($conexion){
                    $resultados = mysqli_query($conexion,"select * from Libro");
                    if($resultados){
                      FOR($i=1; $i<=$row = mysqli_fetch_array($resultados,MYSQLI_ASSOC); $i++){
                        $idlib = $row['idLibro'];
                        $nombrelib = $row['nombreLibro'];
                        echo'
                        <option value="'.$idlib.'">'.$nombrelib.'</option>
                        ';
                      }
                    }
                  }
                  ?>

                </select>
              </div>
              <div class="btn-get-started"><button type="submit">Eliminar</button></div>
            </form>
          </div>

        </div>
      </section>      
<!--==========================
  Quote Section
  ============================-->
  <section id="quotes">

    <div class="container wow fadeInUp">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title">Hola <?php echo $_SESSION["admin"]?>, ¿modificaremos frases hoy?</h3>
          <div class="section-title-divider"></div>
          <p class="section-description">En esta sección podrás ver, crear, modificar y eliminar las frases que se mostrarán.</p>
        </div>
      </div>
    </div>

    <div class="container about-container wow fadeInUp">

      <div class="row">
        <div class="col-xs-12 col-md-8">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Frase</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if($conexion){
                $resultados = mysqli_query($conexion,"select * from Frase");
                if($resultados){
                  FOR($i=1; $i<=$row = mysqli_fetch_array($resultados,MYSQLI_ASSOC); $i++){
                    $id = $row['idFrase'];
                    $frase = $row['frase'];
                    echo'
                    <tr>
                      <th scope="row">'.$id.'</th>
                      <td>'.$frase.'</td>
                    </tr>';
                  }
                }
              }
              ?>
            </tbody>
          </table>              
        </div>
        <div class="col-xs-6 col-md-4">
          <h1>Insertar Frase</h1>
          <div class="form">
            <form action="register.php" method="post" role="form" class="contactForm" enctype="multipart/form-data">
              <div class="form-group">
                <label>Frase:</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Escribe tu nombre o apodo." data-rule="minlen:4" data-msg="Inserta al menos 4 letras." required="" />
                <div class="validation"></div>
              </div>
              <div class="btn"><button type="submit">Registrar</button></div>
            </form>
          </div>
          <h1>Modificar Frase</h1>
          <div class="form">
            <form action="register.php" method="post" role="form" class="contactForm" enctype="multipart/form-data">
              <div class="form-group">
                <label># :</label>
                <select>
                  <?php
                  if($conexion){
                    $resultados = mysqli_query($conexion,"select * from Frase");
                    if($resultados){
                      FOR($i=1; $i<=$row = mysqli_fetch_array($resultados,MYSQLI_ASSOC); $i++){
                        $id = $row['idFrase'];
                        echo'
                        <option value="'.$id.'">'.$id.'</option>
                        ';
                      }
                    }
                  }
                  ?>

                </select>
              </div>
              <div class="form-group">
                <label>Modificación:</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Escribe tu nombre o apodo." data-rule="minlen:4" data-msg="Inserta al menos 4 letras." required="" />
                <div class="validation"></div>
              </div>
              <div class="btn"><button type="submit">Modificar</button></div>
            </form>
          </div>
          <h1>Eliminar Frase</h1>
          <div class="form">
            <form action="register.php" method="post" role="form" class="contactForm" enctype="multipart/form-data">
              <div class="form-group">
                <label># :</label>
                <select>
                  <?php
                  if($conexion){
                    $resultados = mysqli_query($conexion,"select * from Frase");
                    if($resultados){
                      FOR($i=1; $i<=$row = mysqli_fetch_array($resultados,MYSQLI_ASSOC); $i++){
                        $id = $row['idFrase'];
                        echo'
                        <option value="'.$id.'">'.$id.'</option>
                        ';
                      }
                    }
                  }
                  ?>

                </select>
              </div>
              <div class="btn"><button type="submit">Eliminar</button></div>
            </form>
          </div>
        </div>
      </div>
      
    </div>
  </section>      
<!--==========================
  User Section
  ============================-->
  <section id="users">

    <div class="container wow fadeInUp">
      <div class="row">
        <div class="col-md-12">
          <br>
          <h3 class="section-title">Hola <?php echo $_SESSION["admin"]?>, ¿modificaremos usuarios hoy?</h3>
          <div class="section-title-divider"></div>
          <p class="section-description">En esta sección podrás ver, crear, modificar y eliminar los usuarios que se mostrarán.</p>
        </div>
      </div>
    </div>

    <div class="container about-container wow fadeInUp">

      <div class="row">
        <div class="col-xs-12 col-md-8">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Area</th>
                <th>Descripción</th>
                <th>Imagen</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if($conexion){
                $resultados = mysqli_query($conexion,"select * from Usuario");
                if($resultados){
                  FOR($i=1; $i<=$row = mysqli_fetch_array($resultados,MYSQLI_ASSOC); $i++){
                    $iduser = $row['idUsuario'];
                    $nombreuser = $row['nombre'];
                    $areauser = $row['area'];
                    $descripcionuser = $row['descripcion'];
                    $imagenuser = $row['srcimagen'];
                    echo'
                    <tr>
                      <th scope="row">'.$iduser.'</th>
                      <td>'.$nombreuser.'</td>
                      <td>'.$areauser.'</td>
                      <td>'.$descripcionuser.'</td>
                      <td><div class="pic"><img src="user/'.$imagenuser.'" alt="'.$imagenuser.'">'.$imagenuser.'</div></td>
                    </tr>';
                  }
                }
              }
              ?>
            </tbody>
          </table>              
        </div>
        <div class="col-xs-6 col-md-4">
          <h1>Modificar Usuario</h1>
          <div id="insertbook" class="form">
            <form action="register.php" method="post" role="form" class="contactForm" enctype="multipart/form-data">
              <div class="form-group">
                <label>Usuario:</label>
                <select>
                  <?php
                  if($conexion){
                    $resultados = mysqli_query($conexion,"select * from Usuario");
                    if($resultados){
                      FOR($i=1; $i<=$row = mysqli_fetch_array($resultados,MYSQLI_ASSOC); $i++){
                        $iduser = $row['idUsuario'];
                        $nombreuser = $row['nombre'];
                        echo'
                        <option value="'.$iduser.'">'.$nombreuser.'</option>
                        ';
                      }
                    }
                  }
                  ?>

                </select>
              </div>
              <div class="form-group">
                <label>Área:</label>
                <input type="text" class="form-control" name="area" id="area" placeholder="Escribe el área en el que te desenvuelves" data-rule="minlen:4" data-msg="Inserta al menos 4 letras." required="" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <label>Descripción (max: <span>150</span>):</label>
                <textarea id="descripcion" name="descripcion" maxlength="150" class="form-control" rows="2" data-rule="required" data-msg="Por favor escribe algo de ti" placeholder="Se que no hay tres minutos, ni cien palabras que te puedan definir, pero puedes intentarlo." required=""></textarea>
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <label>Imagen:</label>
                <input type="file" class="form-control" name="image" id="image" data-rule="file" data-msg="Ingresa un archivo valido" required="" />
                <div class="validation"></div>
              </div>
              <div class="text-center"><button type="submit">Modificar</button></div>
            </form>
          </div>
        </div>
      </div>
      
    </div>
  </section>      
<!--==========================
  About Section
  ============================-->
  <section id="admin">

    <div class="container wow fadeInUp">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title">Hola <?php echo $_SESSION["admin"]?>, ¿modificaremos libros hoy?</h3>
          <div class="section-title-divider"></div>
          <p class="section-description">En esta sección podrás ver, crear, modificar y eliminar los libros que se mostrarán.</p>
        </div>
      </div>
    </div>

    <div class="container about-container wow fadeInUp">

      <div class="row">
        <div class="col-xs-12 col-md-8">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Escritor</th>
                <th>Sinopsis</th>
                <th>Frase</th>
                <th>Imagen</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
              </tr>
            </tbody>
          </table>              
        </div>
        <div class="col-xs-6 col-md-4">
          <h1>Insertar Libro</h1>
          <div class="form">
            <form action="register.php" method="post" role="form" class="contactForm" enctype="multipart/form-data">
              <div class="form-group">
                <label>Nombre del libro:</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Escribe tu nombre o apodo." data-rule="minlen:4" data-msg="Inserta al menos 4 letras." required="" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <label>Nombre del escritor:</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Escribe tu nombre o apodo." data-rule="minlen:4" data-msg="Inserta al menos 4 letras." required="" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <label>Sinopsis (max: <span>300</span>):</label>
                <textarea id="descripcion" name="descripcion" maxlength="300" class="form-control" rows="2" data-rule="required" data-msg="Por favor escribe algo de ti" placeholder="Se que no hay tres minutos, ni cien palabras que te puedan definir, pero puedes intentarlo." required=""></textarea>
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <label>Frase o extracción del libro (max: <span>300</span>):</label>
                <textarea id="descripcion" name="descripcion" maxlength="300" class="form-control" rows="2" data-rule="required" data-msg="Por favor escribe algo de ti" placeholder="Se que no hay tres minutos, ni cien palabras que te puedan definir, pero puedes intentarlo." required=""></textarea>
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <label>Portada del libro:</label>
                <input type="file" class="form-control" name="image" id="image" data-rule="file" data-msg="Ingresa un archivo valido" required="" />
                <div class="validation"></div>
                <h4><small>Procurar que el ancho sea de 400 pixeles para que se ajuste correctamente a la página.</small></h4>
              </div>
              <div class="btn"><button type="submit">Registrar</button></div>
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
  <script type="text/javascript">
    var inputs = "input[maxlength], textarea[maxlength]";
    $(document).on('keyup', "[maxlength]", function (e) {
      var este = $(this),
      maxlength = este.attr('maxlength'),
      maxlengthint = parseInt(maxlength),
      textoActual = este.val(),
      currentCharacters = este.val().length;
      remainingCharacters = maxlengthint - currentCharacters,
      espan = este.prev('label').find('span');            
              // Detectamos si es IE9 y si hemos llegado al final, convertir el -1 en 0 - bug ie9 porq. no coge directamente el atributo 'maxlength' de HTML5
              if (document.addEventListener && !window.requestAnimationFrame) {
                if (remainingCharacters <= -1) {
                  remainingCharacters = 0;            
                }
              }
              espan.html(remainingCharacters);
              if (!!maxlength) {
                var texto = este.val(); 
                if (texto.length >= maxlength) {
                  este.removeClass().addClass("borderojo");
                  este.val(text.substring(0, maxlength));
                  e.preventDefault();
                }
                else if (texto.length < maxlength) {
                  este.removeClass().addClass("bordegris");
                }   
              }   
            });
          </script>
          <!-- Template Specisifc Custom Javascript File -->
          <script src="js/custom.js"></script>
          
          <script src="contactform/contactform.js"></script>
          
          
        </body>
        </html>