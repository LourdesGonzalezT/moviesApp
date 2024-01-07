<?php
//detectamos si pulsamos el botón
if(!empty($_POST["btnedit"])){

    // paso 21.al botón de modificar btneditar le vamos a dar funcionalidad y hacemos una prueba con un echo para confirmar que se detecta que se presiona
    
    // echo "Botón modificar presionado";

    //Una vez presionado, si ninguno de los campos está vacío vamos a guardar la consulta
    //paso 21. Creamos este if para comprobar que los campos estén cumplimentados, no vacíos
    
        //paso 22. Recogemos los datos del formulario  (ojo que las variables se llamen igual que los campos de la bbdd)
        //para almacenar la información del formulario en las variables de php
        $id_movie = $_POST["id_movie"]; 
        $image = $_FILES["image"]["tmp_name"];
        $imgName = $_FILES["image"]["name"];
        $imgType = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));
        $title=$_POST["title"];
        $director=$_POST["director"];
        $release_date=$_POST["release_date"];
        $genre=$_POST["genre"];
        $synopsis=$_POST["synopsis"];
        $punctuation=$_POST["punctuation"];
        $duration=$_POST["duration"];
        $actors=$_POST["actors"];
        $age_classification=$_POST["age_classification"];
        $idiom=$_POST["idiom"];
        $imgDirectory = "images/";
        // $imageOld = $_POST["image"];

        //validar imagen

        if (is_file($image)) {

            if ($imgType == "jpg" OR $imgType == "jpeg" OR $imgType == "png" OR $imgType == "webp")  {
                //1 Eliminamos la imagen anterior
               
                try{
                unlink($image_path);
                }catch(\Throwable $th){
        
                } 
        
                $image_path = $imgDirectory . $id_movie .'.'. $imgType;
        
                if(move_uploaded_file($image,$image_path)){
        
                    //Si se ha subido correctamente
                    $sql=$connection->query("UPDATE movies SET title='$title', director='$director', release_date='$release_date', genre='$genre', synopsis='$synopsis' , punctuation='$punctuation', duration='$duration', actors='$actors', genre='$genre', age_classification='$age_classification', idiom='$idiom', director='$director'  WHERE id_movie='$id_movie' ");
                
                    $edit=$connection->query("UPDATE movies SET image_path='$image_path' WHERE id_movie='$id_movie'");
                
                    if ($edit==1) {
                
                        echo "<div class='alert alert-success'>imagen modificada con éxito</div>";
                
                
                    } else {
                            echo "<div class='alert alert-danger'>Error al modificar imagen</div>";
                
                    }
                    
                
                }else{
                    // Si no se ha subido correctamente
                    echo "<div class='alert alert-danger'>Error al subir imagen</div>";
                
                }
                
                
                        //2 almacenamos la nueva imagen
                
                        //3 almacenamos la nueva imagen en nuuestra base de datos
                        
                
                    } else {
                        echo "<div class='alert alert-danger'>Solo formatos jpg, jpeg o png.</div>";
                
                    }
                    
                    
                } else {
                    echo "<div class='alert alert-danger'>Debes seleccionar una imagen</div>";
                }?>
                
                <script>
                    history.replaceState(null,null,location.pathname);
                </script>
                <?php
                }
                
                
                
                ?>
        
