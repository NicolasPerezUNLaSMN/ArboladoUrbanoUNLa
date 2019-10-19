<?php


//Variables a insertar
$fechaHora=$_POST['fechaHora'];
$latitud=$_POST['latitud'];
$longitud=$_POST['longitud'];

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "arbolado";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO censo (fechaHora)
VALUES ('".$fechaHora."')";

$sql = "INSERT INTO coordenada (latitud, longitud, idCenso)
VALUES ('".$latitud."','".$longitud."',18)";



if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();








?>