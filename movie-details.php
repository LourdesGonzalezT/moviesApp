<?php include "header.php"?>

<!--Aqui termina el header y comienza el contenido principal de la vista de detalles-->

<?php
    /* La función isset() se utiliza para comprobar si una variable existe y tiene un valor distinto de null. En este caso, se está utilizando para comprobar si la variable $_GET['id_movie'] existe y tiene un valor distinto de null.*/if (isset($_GET['id_movie'])) {
    // Recuperar el ID de la película de la URL
    $id_movie = $_GET['id_movie']; // Asegúrate de validar y sanitizar esta entrada para evitar problemas de seguridad
    // Consultar la base de datos para obtener los detalles de la película con el ID proporcionado
    $sql = $connection->query("SELECT * FROM movies WHERE id_movie = $id_movie");
?>

<main>

<div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="..." class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
      </div>
    </div>
  </div>
</div>

</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
</body>

</html>