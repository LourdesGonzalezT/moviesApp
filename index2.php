<?php 
    include "header.php" ;
    include "controller/delete-movie.php";
?>
<!--Aqui termina el header y comienza el contenido principal-->
<main>
    <script>
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>

    <div class="container-fluid" id="carousel-container">
        <?php 
            $sql = $connection->query("SELECT * FROM movies ORDER BY punctuation DESC LIMIT 3");
            $counter = 0; // Contador para manejar la clase 'active' del carousel
        ?>
        <div id="carouselIndex" class="carousel slide">
            <div class="carousel-indicators">
                <?php while ($data = $sql->fetch_object()) { ?>
                <button type="button" data-bs-target="#carouselIndex" data-bs-slide-to="<?= $counter ?>"
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
                            <h1 class="card-title card-titleCarousel"><?= $data->title ?></h1>
                            <?php
                            $year = date("Y", strtotime($data->release_date));
                            ?>
                            <p class="card-text year"><?= $year?></p>
                            <p>holalkdjflaksjdfias</p>
                            <p class="card-text card-text-synopsisInCarousel"><?= $data->synopsis ?></p>
                            <a href="movie-details.php?id_movie=<?= $data->id_movie?>"
                                class="btn btn-primary btn-sm d-inline-block text-center btn-carousel">Ver película</a>
                        </div>
                    </div>
                </div>
                <?php $counter++; ?>
                <?php } ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselIndex" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselIndex" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    </div>
    <?php $sql = $connection->query("SELECT * FROM movies ORDER BY id_movie DESC"); ?>
    <div class="container-fluid">
        <h1 class="display-6  p-3 text-warning">Películas Online</h1>
        <!-- Este div modifica el número de cards por fila -->
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 row-cols-lg-6 g-4 container-cardsIndex">
            <?php while ($data = $sql->fetch_object()) { ?>
                <div class="col cardIndex" data-bs-toggle="tooltip" data-bs-placement="top"
        data-bs-custom-class="custom-tooltip"
        data-bs-title="<?=$data->title?>">
                <div class="oneCardContainer h-100">
                    <a href="movie-details.php?id_movie=<?= $data->id_movie?>">
                        <div class="h-100">
                            <div class="card bg-dark text-white h-100 ">
                                <img src="<?=$data->image_path?>" class="card-img-top h-100" alt="...">
                                <div class="card-img-overlay">
                                    <p class="card-text year"><?=$year?></p>
                                </div>
                            </div>
                            <h6 class="card-title text-center"><?=$data->title?></h6>
                        </div>
                    </a>
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
document.addEventListener('DOMContentLoaded', function() {
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    tooltipTriggerList.forEach(function(tooltipTriggerEl) {
        new bootstrap.Tooltip(tooltipTriggerEl);
    });
});
</script>
<script>
function stopCarouselTransition() {
    var carousel = document.getElementById('carouselIndex');
    carousel.setAttribute('data-bs-interval', 'false');
}
</script>
</body>

</html>