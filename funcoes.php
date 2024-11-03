<?php 
    function cadastroUsuario($nome, $username, $email, $senha, $telefone) {
        include 'db.php';
        $inserirBd = "INSERT INTO usuarios (admin, name, username, email, password, telefone) VALUES (0, '$nome', '$username', '$email', '$senha', '$telefone')";
        $PushBD = $conn -> query($inserirBd);
        

    }








?>