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
        $precio = $_POST['precio'];
        $modelo = $_POST['modelo'];
        $color = $_POST['color'];

        // Actualizar la información en la base de datos
        $sql = "UPDATE productos SET nombre='$nombre', precio='$precio', modelo='$modelo', color='$color' WHERE id_producto=$recuperada";
        // Redireccionamiento a la pagina de consulta, justo debajo de la accion de actulizar la base de datos
        if($recuperada){
          echo "<script lenguage='JavaScript'>
          alert(''Los datos son correctos);
          ";
          header("Location: consultap.php"); // Redirigir a la página de inicio después de iniciar sesión
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


    
      // Obtener la información de la productos seleccionada
      $sql = "SELECT id_producto, nombre, precio, modelo, color FROM productos WHERE id_producto=$recuperada";
      $result = mysqli_query($conn, $sql);
      $productos = mysqli_fetch_assoc($result);
    }
    ?>
    <form method="post">
      <table border="1">
        <tr>
          <th>Id</th>
          <th>Nombre</th>
          <th>Precio</th>
          <th>Modelo</th>
          <th>Color</th>
        </tr>
        <?php if (isset($productos)): ?>
          <tr>
            <td><?php echo $productos["id_producto"]; ?></td>
            <td><input type="text" name="nombre" value="<?php echo $productos["nombre"]; ?>"></td>
            <td><input type="text" name="precio" value="<?php echo $productos["precio"]; ?>"></td>
            <td><input type="text" name="modelo" value="<?php echo $productos["modelo"]; ?>"></td>
            <td><input type="text" name="color" value="<?php echo $productos["color"]; ?>"></td>
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
