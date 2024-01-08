<?php 
include "header.php" ;
include "controller/create-movie.php" ;
?>

<!--Aqui termina el header-->

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#registerMovie">
    Añadir película
</button>

<!-- Modal -->
<div class="modal fade container-fluid" id="registerMovie" tabindex="-1" aria-labelledby="registerMovieModalForm"
    aria-hidden="true">
    <div class="modal-dialog container-fluid">
        <div class="modal-content container-fluid">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="registerMovieModalForm">Registrar Película</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body container-fluid">
                <form class="row g-3" action="" enctype="multipart/form-data" method="POST">
                    <div class="col-md-12">
                        <label for="title" class="form-label">Título película</label>
                        <input type="text" name="title" class="form-control" id="title" aria-describedby="titleHelp"
                            required>
                    </div>
                    <div class="col-md-8">
                        <label for="director" class="form-label">Director</label>
                        <input type="text" class="form-control" name="director" id="director" required>
                    </div>
                    <div class="col-md-4">
                        <label for="idiom" class="form-label">Idioma</label>
                        <input type="text" class="form-control" name="idiom" id="idiom" required>
                    </div>
                    <div class="col-md-6">
                        <label for="genre" class="form-label">Género</label>
                        <select name="genre" class="form-control" required>
                            <option value="accion">Acción</option>
                            <option value="aventura">Aventura</option>
                            <option value="comedia">Comedia</option>
                            <option value="drama">Drama</option>
                            <option value="fantasia">Fantasía</option>
                            <option value="terror">Terror</option>
                            <option value="romance">Romance</option>
                            <option value="documental">Documental</option>
                            <option value="otros">Otros</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="age_classification" class="form-label">Clasificación edad</label>
                        <input type="text" class="form-control" name="age_classification" id="age_classification"
                            required>
                    </div>

                    <div class="col-12">
                        <label for="synopsis" class="form-label">Sinopsis</label>
                        <textarea class="form-control" name="synopsis" id="synopsis" cols="30" rows="3"
                            required></textarea>
                    </div>
                    <div class="col-12">
                        <label for="actors" class="form-label">Actores</label>
                        <input type="text" class="form-control" name="actors" required>
                    </div>
                    <div class="col-md-4">
                        <label for="punctuation" class="form-label">Puntuación</label>
                        <input type="number" class="form-control" id="punctuation" name="punctuation" min="1" max="10"
                            step="1" placeholder="Del 1 al 10" required>
                    </div>
                    <div class="col-md-4">
                        <label for="duration" class="form-label">Duración</label>
                        <input type="number" class="form-control" id="duration" name="duration" min="0" max="300"
                            step="1" placeholder="En minutos" required>
                    </div>
                    <div class="col-md-4">
                        <label for="release_date" class="form-label">Fecha estreno</label>
                        <input type="date" class="form-control" name="release_date" id="release_date" required>
                    </div>
                    <div class="col-12">
                        <label for="image" class="form-label">Imagen de la cartelera</label>
                        <input type="file" class="form-control" name="image" id="image">
                    </div>
                    <input type="submit" class="form-control btn btn-success mt-3" value="Register" name="btnregister">
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Fin de la modal -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
</body>

</html>