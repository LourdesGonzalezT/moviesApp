<?php 
    include "header.php" ;
    include "controller/delete-movie.php";
?>
<!--Aqui termina el header y comienza el contenido principal-->
<main>
<h1>FORMULARIO DE REGISTRO</h1>
<div class="wrapper">
        <div class="logo">
            <img src="logo\spiderman.png" alt="">
        </div>
        <div class="text-center mt-4 name">
            Datos de registro
        </div>
        <form action="controller/signup-user.php" method="POST" class="p-3 mt-3">
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="user_name" id="user_name" placeholder="Nombre de usuario">
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="far fa-envelope"></span>
                <input type="email" name="user_email" id="user_email" placeholder="Email">
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="user_password" id="user_password" placeholder="Contraseña">
            </div>
            <button type="submit" name="signUp" class="btn mt-3">Regístrate</button>
        </form>
        <div class="text-center fs-6">
            <p>¿Ya estás registrado? <a href="login-form.php">Accede</a></p>
        </div>
    </div>

</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>

</body>

</html>