<?php
  require_once 'mysql_login.php';
  $servername=HOSTNAME;
  $database=DATABASE;
  $username=USERNAME;
  $password=PASSWORD;
  $conexion = mysqli_connect($servername,$username,$password,$database);      
  if (!$conexion) {
   die('Error de conexión: ' . mysqli_connect_error());
  }
    $id = $_POST['book'];
    $string ="update Libro set voto=voto+1 where idLibro =$id";

    if($resultado = mysqli_query($conexion,$string)){
      header('Location:index.php');
    }else{
      echo "Error". mysqli_connect_error();
    }
?>