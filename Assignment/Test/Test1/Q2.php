<?php
    $conn = new mysqli("localhost","root","","Test1");

    if($conn->connect_error){
        die("Error: ".$conn->connect_error);
    }

    $sql = "SELECT * FROM employee WHERE age < 30";

    $query = $conn->query($sql);

    $even = [];
    $odd = [];

    while($row = $query->fetch_assoc()){
        if($row['age'] % 2 == 0){
            $even[] = $row;
        }else{
            $odd[] = $row;
        }
    }

    echo "Even Age: <br>";

    echo("
        <table border='1'>
        <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Age</th>
        <tr>
    ");

    foreach($even as $row){
        echo("
            <tr>
            <td>{$row['id']}</td>
            <td>{$row['name']}</td>
            <td>{$row['age']}</td>
            <tr>
        ");
    }

    echo "</table>";

    echo "<br>Odd Age: <br>";

    echo("
        <table border='1'>
            <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <tr>
    ");

    foreach($odd as $row){
        echo("
            <tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['age']}</td>
            </tr>
        ");
    };

    echo("</table>");


    $conn->close();

    ?>