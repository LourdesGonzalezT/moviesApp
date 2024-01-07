<?php 
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);
?>
<?php
if(!empty($_POST["btnregister"])){
    // echo "<div class='alert alert-info'>Botón presionado</div>"; AQUI COMPROBAMOS QUE PULSAMOS EL BOTÓN
    //AQUÍ NOS ASEGURAMOS QUE LOS CAMPOS NO ESTÁN VACÍOS (NO INCLUIMOS LA IMAGEN)
    if(!empty($_POST["title"]) AND !empty($_POST["director"]) AND !empty($_POST["idiom"]) AND !empty($_POST["genre"]) AND !empty($_POST["age_classification"]) AND !empty($_POST["synopsis"]) AND !empty($_POST["actors"]) AND !empty($_POST["punctuation"]) AND !empty($_POST["duration"]) AND !empty($_POST["release_date"])) {

    // RECOGEMOS LOS CAMPOS DEL FORMULARIO EN VARIABLES QUE INICIALIZAMOS

        $title=$_POST["title"];
        $director=$_POST["director"];
        $idiom=$_POST["idiom"];
        $genre=$_POST["genre"];
        $age_classification=$_POST["age_classification"];
        $synopsis=$_POST["synopsis"];
        $actors=$_POST["actors"];
        $punctuation=$_POST["punctuation"];
        $duration=$_POST["duration"];
        $release_date=$_POST["release_date"];
        //AHORA LAS VARIABLES QUE HACEN REFERENCIA A LA IMAGEN
        $image = $_FILES["image"]["tmp_name"];
        $imgName = $_FILES["image"]["name"]; /*->AQUÍ RECOGE TODO EL NOMBRE DE LA IMAGEN, CON LA EXTENSIÓN INCLUIDA*/
        $imgType = strtolower(pathinfo($imgName, PATHINFO_EXTENSION)); /* ->Y AQUÍ RECOGE EL NOMBRE Y LO SEPARA DE SU EXTENSIÓN, ES DECIR, DE TU TIPO DE FORMATO*/
        $imgDirectory = "images/";
    
        //echo "<div class='alert alert-info'>Y el tipo de imagen es . $imgType</div>"; /* ->CON ESTA LÍNEA PODEMOS COMPROBAR QUE AL SUBIR UN FICHERO NOS DICE LA EXTENSIÓN DEL ARCHIVO*/
        //ESTABLECEMOS QUÉ FORMATOS SERÁN ADMITIDOS
        if($imgType == "jpg" || $imgType == "jpeg" || $imgType == "png" || $imgType == "webp" ) {
        //Si el formato es correcto, vamos a registrar la imagen en la bbdd así, insertamos en el campo image_path ningún valor porque es autoincremental, porque tenemos que coger esta id para asociarla a la imagen
        /*Primero creo el registro con el campo image_path vacío, luego obtengo el id y se lo añado al nombre de la imagen*/
            $register = $connection->query("INSERT INTO movies(title, director, idiom, genre, age_classification, synopsis, actors, punctuation, duration, release_date, image_path) VALUES ('$title', '$director', '$idiom', '$genre', '$age_classification', '$synopsis', '$actors', '$punctuation', '$duration', '$release_date', '')");
            if($register){
        //luego obtengo el id  del nuevo registro y se lo añado al nombre de la imagen
            $idRegister = $connection->insert_id;
            //img_path = $imgDirectory . $imgName;
            //Con el id de registro y su formato renombro el archivo creando la ruta del archivo concatenando las variables $directorio $idRegister y $imgType 
            $image_path = $imgDirectory . $idRegister .'.'. $imgType;
            //Almacenamos la imagen en el servidor:
            $updateImage = $connection->query("UPDATE movies SET image_path='$image_path' WHERE id_movie='$idRegister'");
            
            if($updateImage){
                if (move_uploaded_file($image, $image_path)) {
                    echo "<div class='alert alert-success'>Felicidades, película registrada con éxito</div>";
                } else {
                    echo "<div class='alert alert-warning'>Error al mover el archivo</div>";
                }
            } else {
                echo "<div class='alert alert-warning'>Error al actualizar la ruta en la base de datos</div>";
            }
        } else {
            echo "<div class='alert alert-warning'>Error al registrar la película</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Por favor, introduce un formato de imagen válido</div>";
    }
    } else {
    echo "<div class='alert alert-danger'>Por favor, completa todos los campos</div>";
    }
    ?>
    <!-- Script para que no aparezca la ventana de enviar. Para que no nos envíe otra vez el formulario cuando recargemos la página y tengamos un elemento duplicado-->
    <script>
    history.replaceState(null, null, location.pathname);
    </script>
    <?php
    }
    ?>
