<?php

    $conn = new mysqli("localhost","root","","test1");
    $sql = "CREATE TABLE IF NOT EXISTS emp_with_img (id INT AUTO_INCREMENT PRIMARY KEY, name VARCHAR(255),age INT,salary INT)";
    $conn->query($sql);

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $file = $_FILES['fileToUpload'];
        $fileName = $file['name'];
        $fileSize = $file['size'];
        $tmp_name = $file['tmp_name'];
        $fileType = strtolower(pathinfo($fileName,PATHINFO_EXTENSION));
        $targetDir = 'employee/images/';
        $uploadOk = 1;


        //details 

        $name = $_POST['name'];
        $age = $_POST['age'];
        $salary = $_POST['salary'];

        $allowedTypes = ['png','jpg','jpeg'];

        if(!in_array($fileType,$allowedTypes)){
            $uploadOk = 0;
            echo("file is not allowd to upload");
        }
        if($fileSize > 500*1024){
            $uploadOk = 0;
        }

        if($uploadOk == 1){
            if(!file_exists($targetDir)){
                mkdir($targetDir,0777,true);
            }
            if(move_uploaded_file($tmp_name,$targetDir.$fileName)){
                $insert_SQL = "INSERT INTO emp_with_img (name,age,salary) VALUES('$name','$age','$salary')";
                if($conn->query($insert_SQL)){
                    echo("data submited");
                }

            }
        }
       
        
    }

    ?>