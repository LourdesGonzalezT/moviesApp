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
    <div class="container-fuid containerDetails ">
    <h1>Detalles</h1>
    <div class="container-fluid p-3 ">
      <?php while($data=$sql->fetch_object()){?>
        <h1 class="display-6 text-center p-3 m-3">Aqui va el logo</h1>
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="<?=$data->image_path?>" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"><?=$data->title?></h5>
                        <h5 class="card-title"><?=$data->punctuation?> <?=$data->duration?> min <?=$data->release_date?></h5>
                        <p class="card-text"><?=$data->synopsis?></p>
                        <p class="card-text">Género: <?=$data->genre?></p>
                        <p class="card-text">Actores: <?=$data->actors?></p>
                        <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                        <p class="card-text">Actores: <?=$data->actors?></p>
                    </div>
                </div>
            </div>
            <div class="row g-0">
                <div class="col-md-8">
                    <div class="card-body">
                        <h5>Idioma <span class="badge bg-secondary"><?=$data->idiom?></span></h5>
                        <p class="card-text">Actores: <?=$data->actors?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
 <!-- Modificar el enlace de YouTube -->
 <?php
    $embed_link = str_replace('watch?v=', 'embed/', $data->video_path);
    ?>

        <!-- Aquí se añade el reproductor de video de YouTube con el enlace modificado -->
        <div class="video-container">
            <iframe width="100%" height="315" src="<?=$embed_link?>" frameborder="0" allowfullscreen></iframe>
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