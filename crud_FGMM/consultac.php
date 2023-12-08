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

$sql = "SELECT id_cliente, nombre, telefono, direccion FROM clientes WHERE id_cliente >=1";
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
          
        <i class="material-icons"><a href=http://localhost/crud_FGMM/altac.html><img src="agregar.png" width="40" height="40"></i>
       
    </a></p>
      </button>
      </div>
  <table border="1">
<tr>
<th>Id</th>
<th>nombre</th>
<th>telefono</th>
<th>direccion</th>
<th>Eliminar</th>
<th>Modificar</th>

</tr>

<?php
  if (isset($_REQUEST['id_cliente']))
  {
     $recuperada=$_REQUEST['id_cliente'];
    //echo$recuperada;


    $sql = "DELETE FROM clientes WHERE id_cliente=".$recuperada;
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
    if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
    } else {
    echo "Error deleting record: " . $conn->error;
    }
  }

  while($row = mysqli_fetch_assoc($result)) {
    echo"<tr>";
    echo"<td>". $row["id_cliente"]."</td>". "<td>" . $row["nombre"]."</td>"."<td>". $row["telefono"]."</td>"."<td>" . $row["direccion"];
    echo"<td>"."<p> <a href='http://localhost/crud_FGMM/consultac.php?id_cliente=".$row['id_cliente']."'>
    <img src='basura.png' alt='W3Schools.com' widt='38' height='38'>
    </a></p>";
    echo"<td>"."<p> <a href='http://localhost/crud_FGMM/mc.php?id_cliente=".$row['id_cliente']."'>
    <img src='mod.png' alt='W3Schools.com' widt='38' height='38'>
    </a></p>";
  }
  echo"</table>";
  echo"</div>";
} else {
  echo "0 results no hay nada";
}

mysqli_close($conn);

?>