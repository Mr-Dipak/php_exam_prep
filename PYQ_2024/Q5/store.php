<?php
    $conn = new mysqli('localhost','root','','pyq2024');

    if($conn->connect_error){
        die("Error: ". $conn->connect_error);
    }
    else{

        $conn->query("CREATE TABLE IF NOT EXISTS laptop_master(
        id INT PRIMARY KEY, manufacturer VARCHAR(255),price INT,screensize INT, year_of_manufacture INT, color VARCHAR(255)
        )");

        if($_SERVER['REQUEST_METHOD']=='POST'){
            $id = $_POST['id'];
            $manufacturer = $_POST['manufacturer'];
            $price = $_POST['price'];
            $screensize = $_POST['screensize'];
            $year_of_manufacture = $_POST['yom'];
            $color = $_POST['color'];

            $insertSQL = "INSERT INTO laptop_master VALUES('$id','$manufacturer','$price','$screensize','$year_of_manufacture','$color')";
            if($conn->query($insertSQL));

        }
        else{
            echo("data not submited!");
        }
    }

    ?>