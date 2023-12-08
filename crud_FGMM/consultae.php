<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crud";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT id_empleado, nombre, telefono, direccion FROM empleados WHERE id_empleado >=1";
$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {
?>
  <head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="estilo.css">
  </head>
  <body>
    <div class="container">
      <nav>
        <ul>
          <li>Inicio</li>
          <li>Altas</li>
          <li>Bajas</li>
        </ul>
      </nav>
    </div>
    <br>
</br>

    <div class="table-container">
      <div class="tools">
          
        <i class="material-icons"><a href=http://localhost/crud_FGMM/altae.html><img src="agregar.png" wid_empleadoth="40" height="40"></i>
       
    </a></p>
      </button>
      </div>
  <table border="1">
<tr>
<th>id_empleado</th>
<th>nombre</th>
<th>telefono</th>
<th>direccion</th>
<th>Eliminar</th>
<th>Modificar</th>

</tr>

<?php
  if (isset($_REQUEST['id_empleado']))
  {
     $recuperada=$_REQUEST['id_empleado'];
    //echo$recuperada;


    $sql = "DELETE FROM empleados WHERE id_empleado=".$recuperada;
            // Redireccionamiento a la pagina de consulta, justo debajo de la accion de actulizar la base de datos
            if($recuperada){
              echo "<script lenguage='JavaScript'>
              alert(''Los datos son correctos);
              ";
              header("Location: consultae.php"); // Redirigir a la página de inicio después de iniciar sesión
          }else{
              echo "<script lenguage='JavaScript'>
              alert(''Los datos son incorrectos);
              ";
          }
    if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
    } else {
    echo "Error deleting record: " . $conn->error;
    }
  }

  while($row = mysqli_fetch_assoc($result)) {
    echo"<tr>";
    echo"<td>". $row["id_empleado"]."</td>". "<td>" . $row["nombre"]."</td>"."<td>". $row["telefono"]."</td>"."<td>" . $row["direccion"];
    echo"<td>"."<p> <a href='http://localhost/crud_FGMM/consultae.php?id_empleado=".$row['id_empleado']."'>
    <img src='basura.png' alt='W3Schools.com' wid_empleadot='38' height='38'>
    </a></p>";
    echo"<td>"."<p> <a href='http://localhost/crud_FGMM/me.php?id_empleado=".$row['id_empleado']."'>
    <img src='mod.png' alt='W3Schools.com' wid_empleadot='38' height='38'>
    </a></p>";
  }
  echo"</table>";
  echo"</div>";
} else {
  echo "0 results no hay nada";
}

mysqli_close($conn);

?>