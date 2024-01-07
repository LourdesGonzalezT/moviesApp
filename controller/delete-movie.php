<?php
if(!empty($_GET["id_movie"])){
    $id=$_GET["id_movie"];
    $delete=$connection->query("DELETE FROM movies WHERE id_movie=$id");
    if($delete==1){
        echo '<div class="alert alert-success"> Pelicula borrada correctamente</div>';
        //Aquí estamos realizando una redireccion refrescando todo  para volver a un index limpio.
        // header("refesh:4; url=index.php");
    }else{
        echo '<div class="alert alert-danger"> Error al borrar pelicula</div>';
    }
}

?>