<?php

$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "nomina_algj"; 


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("La conexión falló: " . $conn->connect_error);
}
