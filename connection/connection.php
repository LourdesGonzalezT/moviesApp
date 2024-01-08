<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "misdatos";

    $connection = new mysqli($servername, $username, $password, $database);
    $connection ->set_charset("utf8");

    if (!$connection) {
        die("Conexion fallida: " . mysqli_connect_error());

    }
    
?>