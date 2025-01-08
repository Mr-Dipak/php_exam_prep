<?php 
    session_start();

    $_SESSION['username'] = 'Dipak Rathod';
    $_SESSION['email'] = 'mr.dipaknrathod@gmail.com';

    if(isset($_SESSION['username'])){
        header("Location: access.php");
    }

    ?>