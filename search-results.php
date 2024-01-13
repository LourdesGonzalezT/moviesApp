<?php
include "header.php";
include "controller/delete-movie.php";
 
if(isset($_GET['sendSearch'])) {
    $searching = $_GET['searching'];

    // Consultar películas filtradas por el género seleccionado
    $searchConsult = $connection->query("SELECT * FROM movies WHERE title LIKE '%$searching%' OR actors LIKE '%$searching%' OR director LIKE '%$searching%' ");

} else {
    // Si no se proporciona un género, mostrar todas las películas
    $sql = $connection->query("SELECT * FROM movies ORDER BY id_movie DESC");
    $result = $sql;
}
?>
<!--Aqui termina el header y comienza el contenido principal-->
<main>
    <div class="container-fluid">
        <h1 class="display-6 text-center p-3 text-warning">Resultados de tu búsqueda</h1>
        <!-- Este div modifica el número de cards por fila -->
        <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php
            // Verificar si hay resultados
            if($searchConsult->num_rows > 0) {
                while ($data = $searchConsult->fetch_object()) {
            ?>
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
            <?php 
        } 
         } else{
            //Si no hay resultados 
            echo "<p>No se encontraron películas para la búsqueda</p>";
         }?>
        </div>
    </div>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
</body>
</html>