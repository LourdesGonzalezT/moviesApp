<?php
//Llamamos al archivo que contine la conexión a la bbdd
require_once('../connection/connection.php');

//Para validar el formulario y comprobar que el botón login ha sido pulsado
if(isset($_POST['login'])){

//Obtenemos los valores de los campos del login y los almacenamos en estas variables   
    $user = $_POST['user_name'];
    $password = $_POST['user_password'];

//Creamos la variable con la consulta
    $login = " SELECT * FROM users WHERE user_name = '$user' AND user_password = '$password' ";

//Ejecutamos la consulta
    $result = mysqli_query($connection, $login);

//Vemos cuántas filas nos saca la consulta
    $number_registers = mysqli_num_rows($result);

//Condicional para saber si hay registros(distinto de cero)
        if($number_registers !=0){

//Inicio de sesión correcto
            echo "Hola: " . $user . " Has iniciado sesión";
            header("Location: ../index.php");
            
        }else{
//Credenciales inválidas
            echo "Datos incorrectos, verifica tu usuario y password";
        }
}

?>