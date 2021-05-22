<?php

include('conexion.php');

if (isset($_POST['submit'])) {
  $nombre = $_POST['name'];
  $apellido_p = $_POST['ap'];
  $apellido_m = $_POST['am'];
  $email = $_POST['mail'];
  $phone = $_POST['mobil'];
  $query = "INSERT INTO usuario(nombre, apell_p, apell_m, correo, telefono) VALUES ('$nombre', '$apellido_p', '$apellido_m', '$email', '$phone')";
  $result = mysqli_query($conexion, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'REGISTRO GUARDADO CON EXITO';
  $_SESSION['message_type'] = 'EXITOSO';
  header('Location: index.php');

}

?>
