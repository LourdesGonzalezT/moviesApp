<?php include "connection/connection.php";?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <!--Aqui comienza el header-->
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">MoviesApp</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="top-movies.php">Top Pelis</a>
                        </li>

                        <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Géneros
                    </a>
                    <ul class="dropdown-menu">
                                <?php
                                // Lista de géneros conocidos
                                $allGenres = array("accion", "aventura", "comedia", "drama", "fantasia", "terror", "romance", "documental", "otros");

                                // Crear opciones para cada género
                                foreach ($allGenres as $selectedGenre) {
                                    echo "<li><a class='dropdown-item' href='genre-movies.php?genre=$selectedGenre'>$selectedGenre</a></li>";
                                }
                                ?>
                            </ul>

                        <li class="nav-item">
                            <a class="nav-link" href="#">Editar películas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="create-movie-form.php">Registrar películas</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <form class="d-flex" action="search-results.php" method="GET">
                                <input class="form-control me-2" type="search" name="searching" placeholder="Buscar" aria-label="Search">
                                <button class="btn btn-outline-success" type="submit" name="sendSearch">Buscar</button>
                            </form>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Perfil
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Regístrate</a></li>
                                <li><a class="dropdown-item" href="#">Accede</a></li>
                                <li><a class="dropdown-item" href="#">Salir</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>