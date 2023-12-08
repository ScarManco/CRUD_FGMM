<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "renta de autos";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Conexion fallida: " . $conn->connect_error);
}
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "";
$tipo = isset($_POST['tipo']) ? $_POST['tipo'] : "";
$sabor = isset($_POST['sabor']) ? $_POST['sabor'] : "";


$sql = "INSERT INTO frutas (nombre, tipo, sabor ) VALUES ('$nombre', '$tipo', '$sabor')";

if($_POST){
    echo "<script lenguage='JavaScript'>
    alert(''Los datos son correctos);
    ";
    header("Location: fconsultas14.php"); // Redirigir a la página de inicio después de iniciar sesión
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