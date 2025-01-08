<?php
    
    session_start();
    if(isset($_SESSION['username'])){
        echo("username: {$_SESSION['username']} <br> email: {$_SESSION['email']}");
    }else{
        echo("your logout! please login again!");
    }

?>