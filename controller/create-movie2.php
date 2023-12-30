<?php 
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);
?>
<?php
if (!empty($_POST["btnregister"])) {
    // echo "<div class='alert alert-info'>Botón presionado</div>";

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

    if ($imgType == "jpg" or $imgType == "jpeg" or $imgType == "png" or $imgType == "webp") {
        $register = $connection->query("INSERT INTO movies(image_path, title, director, idiom, genre, age_classification, synopsis, actors, punctuation, duration, release_date ) VALUES ('','$title','$director','$idiom','$genre','$age_classification','$synopsis','$actors','$punctuation', '$duration', '$release_date')");
        $idRegister = $connection->insert_id;
        // $image_path = $imgDirectory . $imgName;
        $image_path=$imgDirectory.$idRegister.'.'.$imgType;
        $updateImage = $connection->query("UPDATE movies SET image_path='$image_path' WHERE id_movie='$idRegister'");
        if (move_uploaded_file($image, $image_path)) {
            echo "<div id='mensaje' class='alert alert-success'>Felicidades, película guardada con éxito</div>";
        }
    } else {
        echo "<div id='mensaje' class='alert alert-danger'>Formato de imagen no válido</div>";
    }
}
?>
<!-- Para que no nos envíe otra vez el formulario cuando recargemos la página y tengamos un elemento duplicado -->

<script>
    history.replaceState(null, null, location.pathname);
</script>