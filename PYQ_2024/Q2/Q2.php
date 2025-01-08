<?php
    $dir = 'animal/';
    $fileName = "cat.txt";
    $filePath = $dir.$fileName;

    if(file_exists($filePath)){
        $msg = "All cats are black";
        if(file_put_contents($filePath,$msg)){
            echo("message written!");
        }
        else{
            echo("messge not written!");
        }
    }
    else{
        echo("I con't find fil!");
    }

    ?>
