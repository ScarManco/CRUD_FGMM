<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="estilo.css">
</head>
<body>
  <div class="contenedor">
    <div class="contenedor_label">
      <label for="btn_label" class="btn_label">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
      </label>
    </div>
  <div class="table-container">
    <?php
    $servername = "localhost";
    $username = "root"; 
    $password = "";
    $dbname = "crud";

    // Crear conexión
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Comprobar conexión
    if (!$conn) {
      die("Error de conexión: " . mysqli_connect_error());
    }

    if (isset($_REQUEST['id_producto'])) {
      $recuperada = $_REQUEST['id_producto'];


      // Verificar si se envió el formulario de edición
      if (isset($_POST['guardar'])) {
        $nombre = $_POST['nombre'];
        $direccion = $_POST['direccion'];
        $horario = $_POST['horario'];
        $telefono = $_POST['telefono'];

        // Actualizar la información en la base de datos
        $sql = "UPDATE sucursal SET nombre='$nombre', direccion='$direccion', horario='$horario', telefono='$telefono' WHERE id_producto=$recuperada";
        // Redireccionamiento a la pagina de consulta, justo debajo de la accion de actulizar la base de datos
        if($recuperada){
          echo "<script lenguage='JavaScript'>
          alert(''Los datos son correctos);
          ";
          header("Location: consultas.php"); // Redirigir a la página de inicio después de iniciar sesión
      }else{
          echo "<script lenguage='JavaScript'>
          alert(''Los datos son incorrectos);
          ";
      }
        ?>
 
    <?php

        if (mysqli_query($conn, $sql)) {
          echo "";
        } else {
          echo "Error al actualizar registro: " . mysqli_error($conn);
        }
      }


    
      // Obtener la información de la sucursal seleccionada
      $sql = "SELECT id_producto, nombre, direccion, horario, telefono FROM sucursal WHERE id_producto=$recuperada";
      $result = mysqli_query($conn, $sql);
      $sucursal = mysqli_fetch_assoc($result);
    }
    ?>
    <form method="post">
      <table border="1">
        <tr>
          <th>Id</th>
          <th>Nombre</th>
          <th>Direccion</th>
          <th>Horario</th>
          <th>telefono</th>
        </tr>
        <?php if (isset($sucursal)): ?>
          <tr>
            <td><?php echo $sucursal["id_producto"]; ?></td>
            <td><input type="text" name="nombre" value="<?php echo $sucursal["nombre"]; ?>"></td>
            <td><input type="text" name="direccion" value="<?php echo $sucursal["direccion"]; ?>"></td>
            <td><input type="text" name="horario" value="<?php echo $sucursal["horario"]; ?>"></td>
            <td><input type="text" name="telefono" value="<?php echo $sucursal["telefono"]; ?>"></td>
          </tr>
        <?php endif; ?>
      </table>
      <br>
      <input type="submit" name="guardar" value="Guardar">
    </form>
  </div>

  <?php

  // Cerrar la conexión
  mysqli_close($conn);
  ?>
</body>
</html>
