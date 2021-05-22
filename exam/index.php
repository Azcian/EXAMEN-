<?php include("conexion.php"); ?>

<?php include('componentes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      
      <div class="card card-body">
        <form action="guardar.php" method="POST">
          <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Nombre" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="ap" class="form-control" placeholder="Apellido Paterno " autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="am" class="form-control" placeholder="Apellido Materno" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="mail" class="form-control" placeholder="Correo electronico" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="mobil" class="form-control" placeholder="Telefono" autofocus>
          </div>
          <input type="submit" name="submit" class="btn btn-success btn-block" value="Guardar">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>NOMBRE</th>
            <th>APELLIDO P</th>
            <th>APELLIDO M</th>
            <th>CORREO</th>
            <th>TELEFONO</th>
            <th>ACCION</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM usuario";
          $datos = mysqli_query($conexion, $query);    

          while($row = mysqli_fetch_assoc($datos)) { ?>
          <tr>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['apell_p']; ?></td>
            <td><?php echo $row['apell_m']; ?></td>
            <td><?php echo $row['correo']; ?></td>
            <td><?php echo $row['telefono']; ?></td>
            <td>
              <a href="editar.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="eliminar.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('componentes/footer.php'); ?>
