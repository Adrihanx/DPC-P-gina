<?php
  require_once 'mysql_login.php';
  session_start();
  $servername=HOSTNAME;
  $database=DATABASE;
  $username=USERNAME;
  $password=PASSWORD;
  $conexion = mysqli_connect($servername,$username,$password,$database);      
  if (!$conexion) {
   	die('Error de conexión: ' . mysqli_connect_error());
  }
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $string ="select * from Admin where nombre = '".$user."' and pass = sha1('".$pass."');";
    $resultado = mysqli_query($conexion,$string);
    while($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
            $_SESSION['admin']= $row['nombre'];
            $_SESSION["autenticado"] = "SI";
            header('Location: dashboard.php');
            exit;
    }
    header('Location: login.html');
    echo ''. mysqli_connect_error();
?>