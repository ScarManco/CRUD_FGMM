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
    <input type="checkbox" id="btn_label">
    <ul class="menu">
      <li>
        <a href="#">Consulta de Lapiz<i class="bx bx-home-alt"></i></a>
      </li>
      <li>
        <a href="#">Inicio<i class="bx bx-home-alt"></i></a>
      </li>
      <!-- Agregar más opciones de menú si es necesario -->
    </ul>
  </div>

  <div class="table-container">
    <?php
    $servername = "localhost";
    $username = "root"; 
    $password = "";
    $dbname = "renta de autos";

    // Crear conexión
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Comprobar conexión
    if (!$conn) {
      die("Error de conexión: " . mysqli_connect_error());
    }

    if (isset($_REQUEST['id_lapiz'])) {
      $recuperada = $_REQUEST['id_lapiz'];


      // Verificar si se envió el formulario de edición
      if (isset($_POST['guardar'])) {
        $nombre = $_POST['nombre'];
        $tipo = $_POST['tipo'];
        $color = $_POST['color'];

        // Actualizar la información en la base de datos
        $sql = "UPDATE lapiz SET nombre='$nombre', tipo='$tipo', color='$color' WHERE id_lapiz=$recuperada";

        ?>
 
    <?php

        if (mysqli_query($conn, $sql)) {
          echo "";
        } else {
          echo "Error al actualizar registro: " . mysqli_error($conn);
        }
      }

      // Obtener la información de la lapiz seleccionada
      $sql = "SELECT id_lapiz, nombre, tipo, color FROM lapiz WHERE id_lapiz=$recuperada";
      $result = mysqli_query($conn, $sql);
      $lapiz = mysqli_fetch_assoc($result);
    }
    ?>
    <form method="post">
      <table border="1">
        <tr>
          <th>Id</th>
          <th>Region</th>
          <th>tipo</th>
          <th>color</th>
        </tr>
        <?php if (isset($lapiz)): ?>
          <tr>
            <td><?php echo $lapiz["id_lapiz"]; ?></td>
            <td><input type="text" name="nombre" value="<?php echo $lapiz["nombre"]; ?>"></td>
            <td><input type="text" name="tipo" value="<?php echo $lapiz["tipo"]; ?>"></td>
            <td><input type="text" name="color" value="<?php echo $lapiz["color"]; ?>"></td>
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