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
$precio = isset($_POST['precio']) ? $_POST['precio'] : "";
$modelo = isset($_POST['modelo']) ? $_POST['modelo'] : "";
$color = isset($_POST['color']) ? $_POST['color'] : "";

$sql = "INSERT INTO frutas (nombre, precio, modelo, color ) VALUES ('$nombre', '$precio', '$precio', '$color')";

if($_POST){
    echo "<script lenguage='JavaScript'>
    alert(''Los datos son correctos);
    ";
    header("Location: mp.php"); // Redirigir a la página de inicio después de iniciar sesión
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