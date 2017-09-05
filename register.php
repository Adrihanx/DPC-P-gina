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
    $name = $_POST['name'];
    $area = $_POST['area'];
    $descripcion = $_POST['descripcion'];
    $quote = $_POST['quote'];
    $image = $_FILES['image']['name'];
    $string ="insert into Usuario (nombre,area,descripcion,srcimagen) values ('$name','$area','$descripcion','$image')";

    if($resultado = mysqli_query($conexion,$string)){
      move_uploaded_file($_FILES['image']['tmp_name'], "user/" . $_FILES['image']['name']);
      $string = "insert into Frase (frase) VALUES ('$quote');";
      if($resultado = mysqli_query($conexion,$string)){
        header("Location: index.php");
      }
    }else{
      echo "Error". mysqli_connect_error();
    }
?>