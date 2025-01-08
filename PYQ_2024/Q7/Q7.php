<?php
    $conn = new mysqli("localhost","root","","pyq2024");

    if($conn->connect_error){
        die("Error: ".$conn->connect_error);
    }

    $sql = "SELECT * FROM q7";
    $query = $conn->query($sql);

    echo("
        <table border='2'>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>age</th>
            <th>gender</th>
            <th>address</th>
            <th>course</th>
        </tr>

    ");

    while($row = $query->fetch_assoc()){
        echo("
        <tr>
            <td>{$row['id']}</td>
            <td>{$row['name']}</td>
            <td>{$row['age']}</td>
            <td>{$row['gender']}</td>
            <td>{$row['address']}</td>
            <td>{$row['course']}</td>
        </tr>
        ");
    }

    echo("</table>");