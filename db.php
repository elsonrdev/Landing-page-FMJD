<?php 
    $servername = "";
    $username = "u661331863_admin";
    $password = "Tmnc1998"; #
    $dbname = "u661331863_bd_fmjd";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }
?>