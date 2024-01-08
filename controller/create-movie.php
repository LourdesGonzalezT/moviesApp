<?php 
    ini_set("display_errors", 1);
    ini_set("display_startup_errors", 1);
    error_reporting(E_ALL);
?>
<?php
if(!empty($_POST["btnregister"])){
 
    if(!empty($_POST["title"]) AND !empty($_POST["director"]) AND !empty($_POST["idiom"]) AND !empty($_POST["genre"]) AND !empty($_POST["age_classification"]) AND !empty($_POST["synopsis"]) AND !empty($_POST["actors"]) AND !empty($_POST["punctuation"]) AND !empty($_POST["duration"]) AND !empty($_POST["release_date"])) {

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
        $image = $_FILES["image"]["tmp_name"];
        $imgName = $_FILES["image"]["name"]; 
        $imgType = strtolower(pathinfo($imgName, PATHINFO_EXTENSION)); 
        $imgDirectory = "images/";
    
        if($imgType == "jpg" || $imgType == "jpeg" || $imgType == "png" || $imgType == "webp" ) {
        
            $register = $connection->query("INSERT INTO movies(title, director, idiom, genre, age_classification, synopsis, actors, punctuation, duration, release_date, image_path) VALUES ('$title', '$director', '$idiom', '$genre', '$age_classification', '$synopsis', '$actors', '$punctuation', '$duration', '$release_date', '')");
            if($register){
            $idRegister = $connection->insert_id;
           
            $image_path = $imgDirectory . $idRegister .'.'. $imgType;
         
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
<?php } ?>