<?php

  if (isset($_FILES['upload'])){

    $allowedextensions = array('jpg', 'jpeg', 'gif', 'png');

    $extension = strtolower(substr($_FILES['upload']['name'], strrpos($_FILES['upload']['name'], '.') + 1));

    $error = array ();

    # Wrong kind of file
    if(in_array($extension, $allowedextensions) === false){
        
        $error[] = 'This is not an image, upload is allowed only for images.';        
    }

    #File too big
    if($_FILES['upload']['size'] > 100000000){
        
        $error[]='The file exceeded the upload limit, max of 10mb';
    }


    if(empty($error)){

      move_uploaded_file($_FILES["upload"]["tmp_name"], "uploadedimages/{$_FILES["upload"]["name"]}");

    } 

  }

?>


<html>
    <head>
        <title>Security - Upload</title>
           </head>
           
           <body>
               <div>
                  <?php

                  if(isset($error)){

                    if(empty($error)){

                      echo '<a href="uploadedimages/' . $_FILES['upload']['name'] . '">Check file';

                    } else {
          
                           foreach ($error as $err){
                               echo $err;
                               echo "</br>";
                           }
                           
                       }

                  }


                  ?>
               </div>

               <div>
                   
                   <form action="" method="POST" enctype="multipart/form-data">
                       <input type="file" name="upload" /></br>
                       <input  type="submit" value="submit" />
                   </form>                   
               </div>
               <a class="button" href=gallery.php>Go back to the gallery </a>
           </body>
    
    
    
    
</html>