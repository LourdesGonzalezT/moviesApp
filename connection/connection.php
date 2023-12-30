<?php

//Definimos los datos de acceso a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$database = "misdatos";

// Conectamos a la base de datos usando la función mysqli_connect
$connection = new mysqli($servername, $username, $password, $database);
$connection ->set_charset("utf8");
// Verificamos si la conexión fue exitosa
if (!$connection) {
    die("Conexion fallida: " . mysqli_connect_error());

}
?>