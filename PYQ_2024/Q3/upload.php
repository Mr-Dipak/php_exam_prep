<?php

    $conn = new mysqli('localhost','root','','pyq2024');
    $sql = "CREATE TABLE IF NOT EXISTS  pdf_master(id INT AUTO_INCREMENT PRIMARY KEY, file_name VARCHAR(255), file_type VARCHAR(255),file_size INT,file_path VARCHAR(255),upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP)";
    if($conn->connect_error){
        die("Error: ".$conn->connect_error);
    }else{
        $conn->query($sql);
    }

    if($_SERVER['REQUEST_METHOD']=='POST'){
        $file = $_FILES['fileToUpload'];
        $fileName = $file['name'];
        $fileSize = $file['size'];
        $tmp_name = $file['tmp_name'];
        $fileType = strtolower(pathinfo($fileName,PATHINFO_EXTENSION));
        $targetDir = "c:/filepdf/";
        $uploadOk = 1;

        if($fileSize > 800*1024){
            echo("file should be <= 800kb");
            $uploadOk = 0;
        }
        
        if($fileType != 'pdf'){
            echo("file should be upload pdf");
            $uploadOk = 0;
        }

        if($uploadOk == 1){
            if(!file_exists($targetDir)){
                mkdir($targetDir,0777,true);
            }
            if(move_uploaded_file($tmp_name,$targetDir.$fileName)){
                $insertSQL = "INSERT INTO pdf_master (file_name,file_type,file_size,file_path) VALUES ('$fileName','$fileType','$fileSize','$targetDir')";
                if($conn->query($insertSQL)){
                    echo("file uploaded!");
                }
                else{
                    echo("file is not uploaded!");
                }
            }

        }
    }