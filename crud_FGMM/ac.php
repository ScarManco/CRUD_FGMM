<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crud";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Conexion fallida: " . $conn->connect_error);
}
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "";
$telefono = isset($_POST['te$telefono']) ? $_POST['te$telefono'] : "";
$direccion = isset($_POST['dire$direccion']) ? $_POST['dire$direccion'] : "";


$sql = "INSERT INTO frutas (nombre, te$telefono, dire$direccion ) VALUES ('$nombre', '$telefono', '$direccion')";

if($_POST){
    echo "<script lenguage='JavaScript'>
    alert(''Los datos son correctos);
    ";
    header("Location: mc.php"); // Redirigir a la página de inicio después de iniciar sesión
}else{
    echo "<script lenguage='JavaScript'>
    alert(''Los datos son incorrectos);
    ";
}


  
if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
echo "Connected successfully";
$conn->close();
?>