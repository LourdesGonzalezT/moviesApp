<?php 
    include "header.php" ;
?>
<!--Aqui termina el header y comienza el contenido principal-->
<main>
<h1>FORMULARIO DE ACCESO</h1>
<div class="wrapper">
        <div class="logo">
            <img src="logo\spiderman2.png" alt="">
        </div>
        <div class="text-center mt-4 name">
            Datos de acceso
        </div>
        <form action="controller/login-user.php" method="POST" class="p-3 mt-3">
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="user_name" id="user_name" placeholder="Nombre de usuario">
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="user_password" id="user_password" placeholder="Contraseña">
            </div>
            <button type="submit" name="login" class="btn mt-3">Entrar</button>
        </form>
        <div class="text-center fs-6">
            <p>Si aún no tienes cuenta <a href="signup-form.php">Regístrate aquí</a></p>
        </div>
    </div>

</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>

</body>

</html>