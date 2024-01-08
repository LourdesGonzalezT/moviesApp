<?php
    include "header.php";
    include "controller/edit-movie.php";
?>
<?php
    $idMovieToEdit=$_GET['id_movie'];
    $sql = $connection->query("SELECT * FROM movies WHERE id_movie = '$idMovieToEdit'");
 ?>

<!--Aqui termina el header-->

<div class="container-fluid">

    <?php while($data=$sql->fetch_object()) { ?>

    <form class="row g-3" action="" enctype="multipart/form-data" method="POST">
        <input type="hidden" name="id_movie" value="<?= $_GET['id_movie']?>">

        <div class="col-md-12">
            <label for="title" class="form-label">Título película</label>
            <input type="text" name="title" class="form-control" id="title" value="<?=$data->title?>"
                aria-describedby="titleHelp" required>
        </div>
        <div class="col-md-8">
            <label for="director" class="form-label">Director</label>
            <input type="text" class="form-control" name="director" id="director" value="<?=$data->director?>" required>
        </div>
        <div class="col-md-4">
            <label for="idiom" class="form-label">Idioma</label>
            <input type="text" class="form-control" name="idiom" id="idiom" value="<?=$data->idiom?>" required>
        </div>
        <div class="col-md-6">
            <label for="genre" class="form-label">Género</label>
            <select name="genre" class="form-control" required>
                <option value="accion" <?= ($data->genre == 'accion') ? 'selected' : '' ?>>Acción</option>
                <option value="aventura" <?= ($data->genre == 'aventura') ? 'selected' : '' ?>>Aventura</option>
                <option value="comedia" <?= ($data->genre == 'comedia') ? 'selected' : '' ?>>Comedia</option>
                <option value="drama" <?= ($data->genre == 'drama') ? 'selected' : '' ?>>Drama</option>
                <option value="fantasia" <?= ($data->genre == 'fantasia') ? 'selected' : '' ?>>Fantasía</option>
                <option value="terror" <?= ($data->genre == 'terror') ? 'selected' : '' ?>>Terror</option>
                <option value="romance" <?= ($data->genre == 'romance') ? 'selected' : '' ?>>Romance</option>
                <option value="documental" <?= ($data->genre == 'documental') ? 'selected' : '' ?>>Documental</option>
                <option value="otros" <?= ($data->genre == 'otros') ? 'selected' : '' ?>>Otros</option>
            </select>
        </div>
        <div class="col-md-6">
            <label for="age_classification" class="form-label">Clasificación edad</label>
            <input type="text" class="form-control" name="age_classification" id="age_classification"
                value="<?=$data->age_classification?>" required>
        </div>
        <div class="col-12">
            <label for="synopsis" class="form-label">Sinopsis</label>
            <textarea class="form-control" name="synopsis" id="synopsis" cols="30" rows="3"
                required><?=$data->synopsis?></textarea>
        </div>
        <div class="col-12">
            <label for="actors" class="form-label">Actores</label>
            <input type="text" class="form-control" name="actors" value="<?=$data->actors?>" required>
        </div>
        <div class="col-md-4">
            <label for="punctuation" class="form-label">Puntuación</label>
            <input type="number" class="form-control" id="punctuation" value="<?=$data->punctuation?>"
                name="punctuation" min="1" max="10" step="1" placeholder="Del 1 al 10" required>
        </div>
        <div class="col-md-4">
            <label for="duration" class="form-label">Duración</label>
            <input type="number" class="form-control" id="duration" value="<?=$data->duration?>" name="duration" min="0"
                max="300" step="1" placeholder="En minutos" required>
        </div>
        <div class="col-md-4">
            <label for="release_date" class="form-label">Fecha estreno</label>
            <input type="date" class="form-control" name="release_date" id="release_date"
                value="<?= $data->release_date ?>" required>
        </div>
        <div class="col-12">
            <label for="image" class="form-label">Imagen actual</label>
            <img src="<?= $data->image_path ?>" alt="Imagen actual" style="max-width: 30%;">
            <input type="file" class="form-control" name="image" id="image">
        </div>
        <button type="submit" class="btn btn-primary" name="btnedit" value="ok">Guardar cambios</button>
    </form>
    <?php } ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
</body>

</html>