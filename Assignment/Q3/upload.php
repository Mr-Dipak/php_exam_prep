<?php
    $conn = new mysqli("localhost",'root','','test1');

    $sql = "CREATE TABLE IF NOT EXISTS uploads (id INT AUTO_INCREMENT PRIMARY KEY, filename VARCHAR(255), upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP)";
    $conn->query($sql);


    if($_SERVER["REQUEST_METHOD"]=='POST'){
        $file = $_FILES['fileToUpload'];
        $fileName = $file['name'];
        $fileSize = $file['size'];
        $tmp_name = $file['tmp_name'];
        $fileType = strtolower(pathinfo($fileName,PATHINFO_EXTENSION));
        $targetDir = 'uploads/';
        $uploadOk = 1;

        if($fileSize>100*1024){
            $uploadOk = 0;
            echo("file should be <= 100kb");
        }
        if($fileType != 'pdf'){
            $uploadOk = 0;
            echo("file should be pdf");
        }
        if($uploadOk == 1){
            if(!file_exists($targetDir)){
                mkdir($targetDir,0777,true);
            }
            if(move_uploaded_file($tmp_name,$targetDir.$fileName)){
                $sql_insert = "INSERT INTO uploads (filename) VALUES ('$fileName')";
                if($conn->query($sql_insert)){
                    echo("files uploaded!");
                };
                } else {
                    echo("file upload failed");
                }
            }else{
                echo("field to move file");
            }
        };



        $selectSQL = "SELECT * FROM uploads ORDER BY upload_date ASC";
        $query = $conn->query($selectSQL);
        while($row = $query->fetch_assoc()){
            echo("
            File Name: {$row['filename']} Upload Date: {$row['upload_date']}<br>
            ");
        }
        
    
        $conn->close();


    ?>