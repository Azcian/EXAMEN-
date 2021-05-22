<?php

include("conexion.php");

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "DELETE FROM usuario WHERE id = $id";
  $result = mysqli_query($conexion, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Registro eliminado';
  $_SESSION['message_type'] = 'danger';
  header('Location: index.php');
}

?>
