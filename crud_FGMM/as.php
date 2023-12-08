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
$direccion = isset($_POST['direccion']) ? $_POST['direccion'] : "";
$horario = isset($_POST['horario']) ? $_POST['horario'] : "";
$telefono = isset($_POST['telefono']) ? $_POST['telefono'] : "";

$sql = "INSERT INTO frutas (nombre, direccion, horario, telefono ) VALUES ('$nombre', '$direccion', '$direccion', '$telefono')";

if($_POST){
    echo "<script lenguage='JavaScript'>
    alert(''Los datos son correctos);
    ";
    header("Location: ms.php"); // Redirigir a la página de inicio después de iniciar sesión
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