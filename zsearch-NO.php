<?php
if(isset($_GET['sendSearch'])) {
    $searching = $_GET['searching'];
    $searchConsult = $connection->query("SELECT * FROM movies WHERE title LIKE '%$searching%' OR actors LIKE '%$searching%' OR director LIKE '%$searching%' ");

    //Mostrar los resultados o realizar acciones con los resultados obtenidos
    if($searchConsult->num_rows > 0) {
?>
<div class="container-fluid">
    <h1 class="display-6 text-center p-3 text-warning">Resultados de búsqueda</h1>
    <!-- Este div modifica el número de cards por fila -->
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php
        // Verificar si hay resultados
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
                <a href="edit-movie-form.php?id_movie=<?= $data->id_movie?>" class="btn btn-warning">Editar<i class="fa-solid fa-user-pen"></i></a>
                <a onclick="return confirmaBorrar()" href="index.php?id_movie=<?= $data->id_movie?>" class="btn btn-danger">Borrar<i class="fa-solid fa-trash-can"></i></a>
            </div>
        </div>
        <?php
        } // Fin del bucle while
        ?>
    </div>
</div>
<?php
    } else {
        // Si no hay resultados 
        echo "<p>No se encontraron películas para el género seleccionado</p>";
    }
}
?>