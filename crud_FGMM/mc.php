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

    if (isset($_REQUEST['id_cliente'])) {
      $recuperada = $_REQUEST['id_cliente'];


      // Verificar si se envió el formulario de edición
      if (isset($_POST['guardar'])) {
        $nombre = $_POST['nombre'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];

        // Actualizar la información en la base de datos
        $sql = "UPDATE clientes SET nombre='$nombre', telefono='$telefono', direccion='$direccion' WHERE id_cliente=$recuperada";
        // Redireccionamiento a la pagina de consulta, justo debajo de la accion de actulizar la base de datos
        if($recuperada){
          echo "<script lenguage='JavaScript'>
          alert(''Los datos son correctos);
          ";
          header("Location: consultac.php"); // Redirigir a la página de inicio después de iniciar sesión
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


    
      // Obtener la información de la clientes seleccionada
      $sql = "SELECT id_cliente, nombre, telefono, direccion FROM clientes WHERE id_cliente=$recuperada";
      $result = mysqli_query($conn, $sql);
      $clientes = mysqli_fetch_assoc($result);
    }
    ?>
    <form method="post">
      <table border="1">
        <tr>
          <th>Id</th>
          <th>Nombre</th>
          <th>Telefono/th>
          <th>Direccion</th>
        </tr>
        <?php if (isset($clientes)): ?>
          <tr>
            <td><?php echo $clientes["id_cliente"]; ?></td>
            <td><input type="text" name="nombre" value="<?php echo $clientes["nombre"]; ?>"></td>
            <td><input type="text" name="telefono" value="<?php echo $clientes["telefono"]; ?>"></td>
            <td><input type="text" name="direccion" value="<?php echo $clientes["direccion"]; ?>"></td>
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
