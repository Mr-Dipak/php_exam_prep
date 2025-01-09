<?php
   if($_SERVER['REQUEST_METHOD']=='POST'){
    $conn = new mysqli('localhost','root','','pyq2023');
    if($conn->connect_error){
        die("Error: ".$conn->connect_error);
    }else{
        $id = $_POST['id'];
        $name = $_POST['name'];
        $author = $_POST['author'];
        $publication = $_POST['publication'];
        $year = $_POST['year'];
        $language = $_POST['language'];

        $sql = "CREATE TABLE IF NOT EXISTS book_master (id INT PRIMARY KEY, name VARCHAR(255),author VARCHAR(255),publication VARCHAR(255),year INT, language VARCHAR(255))";
        if($conn->query($sql)){
            echo("table created!");
        }
        $sql = "INSERT INTO book_master VALUES('$id','$name','$author','$publication','$year','$language')";
        if($conn->query($sql)){
            echo("Record inserted successfully!");
        } else {
            echo("Error: " . $conn->error);
        }
    }
   }
?>