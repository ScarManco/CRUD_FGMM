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
$telefono = isset($_POST['telefono']) ? $_POST['telefono'] : "";
$direccion = isset($_POST['direccion']) ? $_POST['direccion'] : "";


$sql = "INSERT INTO empleados (nombre, telefono, direccion ) VALUES ('$nombre', '$telefono', '$direccion')";

if($_POST){
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
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
echo "Connected successfully";
$conn->close();
?>
