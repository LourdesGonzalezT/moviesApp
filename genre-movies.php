<?php 
    include "header.php" ;
    include "controller/delete-movie.php";
?>
<!--Aqui termina el header y comienza el contenido principal-->
<main>

    <div class="container-fluid">
        <?php 
            $sql = $connection->query("SELECT * FROM movies ORDER BY punctuation DESC LIMIT 3");
            $counter = 0; // Contador para manejar la clase 'active' del carousel
        ?>
        <div id="carouselExampleCaptions" class="carousel slide">
            <div class="carousel-indicators">
                <?php while ($data = $sql->fetch_object()) { ?>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?= $counter ?>"
                    class="<?= ($counter == 0) ? 'active' : '' ?>"
                    aria-current="<?= ($counter == 0) ? 'true' : 'false' ?>"
                    aria-label="Slide <?= $counter + 1 ?>"></button>
                <?php $counter++; ?>
                <?php } ?>
            </div>
            <div class="carousel-inner">
                <?php 
                    $sql->data_seek(0); // Reiniciar el puntero de resultados para recorrerlo de nuevo
                    $counter = 0; // Reiniciar el contador
                    while ($data = $sql->fetch_object()) { 
                ?>
                <div class="carousel-item <?= ($counter == 0) ? 'active' : '' ?>">
                    <div class="card bg-dark text-white d-flex">
                        <img src="<?= $data->image_path ?>" class="card-img" alt="...">
                        <div class="card-img-overlay d-flex flex-column justify-content-center text-start">
                            <h5 class="card-title"><?= $data->title ?></h5>
                            <p class="card-text"><?= $data->synopsis ?></p>
                            <a href="movie-details.php?id_movie=<?= $data->id_movie?>" class="btn btn-primary btn-sm d-inline-block text-center">Ver película</a>
                        </div>
                    </div>
                </div>
                <?php $counter++; ?>
                <?php } ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    </div>
    <?php $sql = $connection->query("SELECT * FROM movies ORDER BY id_movie DESC"); ?>
    <div class="container-fluid">
        <h1 class="display-6 text-center p-3 text-warning">Cartelera</h1>
        <!-- Este div modifica el número de cards por fila -->
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php while ($data = $sql->fetch_object()) { ?>
            <div class="col">
                <div class="card h-100">
                    <!-- La imagen es un enlace a la vista detallada de una película -->
                    <a href="movie-details.php?id_movie=<?= $data->id_movie?>">
                        <img src="<?=$data->image_path?>" class="card-img-top" alt="...">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title"><?=$data->title?></h5>
                    </div>
                    <a href="edit-movie-form.php?id_movie=<?= $data->id_movie?>" class="btn btn-warning">Editar<i
                            class="fa-solid fa-user-pen"></i></a>
                    <a onclick="return confirmaBorrar()" href="index.php?id_movie=<?= $data->id_movie?>"
                        class="btn btn-danger">Borrar<i class="fa-solid fa-trash-can"></i></a>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>

</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
<script>
    function stopCarouselTransition() {
        var carousel = document.getElementById('carouselExampleCaptions');
        carousel.setAttribute('data-bs-interval', 'false');
    }
</script>
</body>

</html>