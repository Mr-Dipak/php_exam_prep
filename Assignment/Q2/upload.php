<?php

    if($_SERVER["REQUEST_METHOD"]=='POST'){
        $file = $_FILES['fileToUpload'];
        $fileName = $file['name'];
        $fileType = strtolower(pathinfo($file['name'],PATHINFO_EXTENSION));
        $uploadOk = 1;
        $targetDir = "impFile/";

        if($fileType != 'doc'){
            echo("file to be pdf");
            $uploadOk = 0;
        }
        if($file['size']>500*1024){
            $uplaodOk = 0;
            echo("file should be <= 100kb");

        }

        if($uploadOk == 1){
            if(!file_exists($targetDir)){
                mkdir($targetDir,0777,true);
            }
            if(move_uploaded_file($file['tmp_name'],$targetDir.$fileName)){
                echo("{$fileName} sucessfully uploaded.");
            }
            else{
                echo("file is not upload");
            }
        }
    }


    ?>