<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
?>
<?php include "header.php"?>

<!--Aqui termina el header y comienza el contenido principal de la vista de detalles-->
<?php
    if (isset($_GET['id_movie'])) {
    $id_oneMovie = $_GET['id_movie']; 
    $sql = $connection->query("SELECT * FROM movies WHERE id_movie = $id_oneMovie");
?>

<main>
    <div class="container-fuid">
    <?php while($data=$sql->fetch_object()){?>
        <h1>Detalles</h1>
        <div class="container-fluid p-3 ficha" style="background-image: url('<?= $data->image_path ?>'); background-size: cover; background-repeat: no-repeat; background-color: rgba(0, 0, 0, 0.5);">
        <div class="container-fluid ">
                <div class="card mb-3 detailsCard">
                    <div class="row g-0">
                        <div class="col-md-6">
                            <img src="<?=$data->image_path?>" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h5 class="card-title"><?=$data->title?></h5>
                                <p class="card-text"><?=$data->synopsis?></p>
                                <p class="card-text">Género: <?=$data->genre?></p>
                                <p class="card-text">Director: <?=$data->director?></p>
                                <p class="card-text">Actores: <?=$data->actors?></p>
                                <p class="card-text">Duración: <?=$data->duration?> min</p>
                                <p class="card-text">Idioma: <?=$data->idiom?></p>
                                <p class="card-text">Fecha de estreno: <?=$data->release_date?></p>
                                <p class="card-text">Puntuación: <?=$data->punctuation?></p>
                                <p class="card-text">Clasificación por edad: <?=$data->age_classification?></p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- Modificar el enlace de YouTube -->
            <?php $embed_link = str_replace('watch?v=', 'embed/', $data->video_path); ?>

            <!-- Aquí se añade el reproductor de video de YouTube con el enlace modificado -->
            <div class="video-container">
                <iframe width="100%" height="315" src="<?=$embed_link?>" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>



        <?php 
        } 
         }
         ?>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
</body>

</html>