<?php 
    include "header.php" ;
    include "controller/delete-movie.php";
?>
<!--Aqui termina el header y comienza el contenido principal-->
<main>
<h1>LISTADO PELÍCULAS MEJOR VALORADAS</h1>
    <?php $sql = $connection->query("SELECT * FROM movies ORDER BY RAND()"); ?>
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