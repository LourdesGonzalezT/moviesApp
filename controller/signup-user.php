<?php
require_once ('../connection/connection.php');
//Verifica si el archivo ya ha sido incluido previamente

//Valida que el formulario se ha enviado porque se ha presionado el botón registro. If isset(si hemos pulsado el botón registro...)
if(isset($_POST['signUp'])) {

 //Creamos las variables para almacenar los valores que estamos enviando a través del formulario y que son los campos de la bbdd así:
$user = $_POST['user_name'];
$email = $_POST['user_email'];
$password = $_POST['user_password'];

//Comprobamos que todos los campos están cumplimentados
    if(empty($user) || empty($email) || empty($password) ) {
//Si esto no ocurre:
    echo "Todos los campos son obligatorios, por favor, cumpliméntalos";
//Si están todos cumplimentados:
    } else {
//Insertamos los datos en la bbdd 
//Creamos la variable signup donde se van a almacenar los datos que se van a enviar directamente a la bbdd

        $signup ="INSERT INTO users(user_id, user_name, user_email, user_password) VALUES (NULL, '$user', '$email', '$password')";

//Comprobamos que se hayan insertado los datos correctamente
        $result = mysqli_query($connection, $signup);

        if($result){
            echo "Se insertaron los datos correctametne";

        }else{
            echo "No se puede insertar la info <br>";
            echo "Error: " . $signup . "<br>" . mysqli_error($connection);
        }
    }
}

?>