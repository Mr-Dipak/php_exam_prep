<?php

    $conn = new mysqli('localhost','root','','pyq2024');
    $sql = "CREATE TABLE IF NOT EXISTS  (id INT AUTO_INCREMENT PRIMARY KEY, file_name VARCHAR(255), file_type VARCHAR(255),file_path VARCHAR(255)