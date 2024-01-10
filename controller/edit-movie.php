<?php

    if(!empty($_POST["btnedit"])){

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
            $video_path=$_POST["video_path"];
            $idiom=$_POST["idiom"];
            $imgDirectory = "images/";

            if (is_file($image)) {

                if ($imgType == "jpg" OR $imgType == "jpeg" OR $imgType == "png" OR $imgType == "webp")  {
                
                    try{
                    unlink($image_path);
                    }catch(\Throwable $th){
            
                    } 
            
                    $new_imagePath = $imgDirectory . $id_movie .'-'. $imgName;
                    // $image_path = $imgDirectory . $id_movie .'.'. $imgType;
             
                     if(move_uploaded_file($image,$new_imagePath)){
                         $edit=$connection->query("UPDATE movies SET image_path='$new_imagePath', title='$title', director='$director', release_date='$release_date', genre='$genre', synopsis='$synopsis' , punctuation='$punctuation', duration='$duration', actors='$actors', age_classification='$age_classification', idiom='$idiom', video_path='$video_path'  WHERE id_movie='$id_movie' ");
             
                         // $sql=$connection->query("UPDATE movies SET title='$title', director='$director', release_date='$release_date', genre='$genre', synopsis='$synopsis' , punctuation='$punctuation', duration='$duration', actors='$actors', age_classification='$age_classification', idiom='$idiom', video_path='$video_path'  WHERE id_movie='$id_movie' ");
                     
                         // $edit=$connection->query("UPDATE movies SET image_path='$new_imagePath' WHERE id_movie='$id_movie'");
                     
                    
                        if ($edit==1) {
                            echo "<div class='alert alert-success'>imagen modificada con éxito</div>";
                    
                        } else {
                            echo "<div class='alert alert-danger'>Error al modificar imagen</div>";
                        }
                        
                    }else{
                        echo "<div class='alert alert-danger'>Error al subir imagen</div>";
                    }
                    
                        } else {
                            echo "<div class='alert alert-danger'>Solo formatos jpg, jpeg o png.</div>";
                        }
                        
                    } else {
                        echo "<div class='alert alert-danger'>Debes seleccionar una imagen</div>";
                    }
                    ?>

<script>
history.replaceState(null, null, location.pathname);
</script>
<?php
                }
                ?>