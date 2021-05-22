<?php
include("conexion.php");
$title = '';
$description= '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM usuario WHERE id=$id";
  $result = mysqli_query($conexion, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $nombre = $row['nombre'];
    $apellp=$row['apell_p'];
    $apellm=$row['apell_m'];
    $correo = $row['correo'];
    $telefono = $row['telefono'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $name= $_POST['name'];
  $apellido_p = $_POST['ap'];
  $apellido_m = $_POST['am'];
  $email = $_POST['mail'];
  $phone = $_POST['mobil'];

  $query = "UPDATE usuario set nombre = '$name', apell_p = '$apellido_p', apell_m = '$apellido_m', correo = '$email', telefono = '$phone' WHERE id=$id";
  mysqli_query($conexion, $query);
  $_SESSION['message'] = 'Registro actualizado';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('componentes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="editar.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="name" type="text" class="form-control" value="<?php echo $nombre; ?>" placeholder="Modificar nombre">
        </div>
        <div class="form-group">
          <input name="ap" type="text" class="form-control" value="<?php echo $apellp; ?>" placeholder="Modificar apellido">
        </div>
        <div class="form-group">
          <input name="am" type="text" class="form-control" value="<?php echo $apellm; ?>" placeholder="Modificar apellido">
        </div>
        <div class="form-group">
          <input name="mail" type="text" class="form-control" value="<?php echo $correo; ?>" placeholder="Modificar correo">
        </div>
        <div class="form-group">
          <input name="mobil" type="text" class="form-control" value="<?php echo $telefono; ?>" placeholder="Update telefono">
        </div>
        <button class="btn-success" name="update">Update</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('componentes/footer.php'); ?>
