<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crud";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // collect value of input field
  $nombre = $_POST['nomb'];
  if (empty($nombre)) {
    echo "La caja del nombre esta vacia";
  } else {
    echo $nombre;
  }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // collect value of input field
  $appa = $_POST['apep'];
  if (empty($appa)) {
    echo "La caja del nombre esta vacia";
  } else {
    echo $appa;
  }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // collect value of input field
  $apma = $_POST['apem'];
  if (empty($apma)) {
    echo "La caja del nombre esta vacia";
  } else {
    echo $apma;
  }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $eda = $_POST['edad'];
    if (empty($eda)) {
      echo "La caja del nombre esta vacia";
    } else {
      echo $eda;
    }
  }

  // Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "INSERT INTO personas (nom, app, apm, ed )
VALUES ('".$nombre."', '".$appa."', '".$apma."', '".$eda."')";

if ($conn->query($sql) === TRUE) {
  echo "--Se guardaron los datos en la base de datos--";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
echo "Connected successfully";
$conn->close();
