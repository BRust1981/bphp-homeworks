<?php
  ini_set('display_errors', 1);
  error_reporting(E_ALL);
  $imgdir = "$_SERVER[DOCUMENT_ROOT]/2.1-files/2.1.2/img/";
  if(count($_FILES) > 0){
    $filetype = $_FILES['userfile']['type'];
    if($filetype == 'image/jpeg' || $filetype == 'image/png'){
        //var_dump($_FILES);
        
        $dest = str_replace('/', '\\', $imgdir . $_FILES['userfile']['name']);
        $tmpName = $_FILES['userfile']['tmp_name'];
    
        //Копировать файл из временного места в постоянное
        if (is_uploaded_file($tmpName)) {
            move_uploaded_file($tmpName, $dest);
        }
    
    }
  }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>bPHP</title>
</head>
<body>
    <form enctype="multipart/form-data" action="index.php" method="POST">
        <input name="userfile" type="file" accept="image/png, image/jpeg">
        <button type="submit">Отправить файл</button>
    </form>
    <div id="pictures">
        <?php
            $files = scandir($imgdir);
            foreach ($files as $key => $value){ 
                if (!in_array($value,array(".",".."))){
                    if (!is_dir($imgdir . DIRECTORY_SEPARATOR . $value)){
                            echo '<div class="picture">' .
                                '<img src="img\\' . $value . '" width="500" alt="User Image">' .
                            '</div>';
                    }
                }
            }
        ?>
    </div>

</body>
</html>