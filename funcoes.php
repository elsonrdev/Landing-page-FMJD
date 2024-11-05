<?php 
    function cadastroUsuario($nome, $username, $email, $senha, $telefone) {
        include 'db.php';
        $inserirBd = "INSERT INTO usuarios (admin, name, username, email, password, telefone) VALUES (0, '$nome', '$username', '$email', '$senha', '$telefone');";
        $PushBD = $conn -> query($inserirBd);
        

    };

    function logar($email, $senha){
        include 'db.php';
        $sql = "SELECT name, admin, username, password FROM usuarios WHERE email = '$email'";    
        
        $PushBD = $conn -> query($sql);
        $resultado = $PushBD -> fetch_assoc();
        $senhaBd = $resultado['password'];
        $name = $resultado['name'];
        $admin = $resultado['admin'];
        $username = $resultado['username'];

        if (password_verify($senha, $senhaBd)) {
            if ($admin == 1) {
                session_start(); 
                $_SESSION['$username'] = $username;
                $_SESSION['$admin'] = $admin;
                $_SESSION['name'] = $name;
                header('location: homeadmin.php');
            } else {
                session_start(); 
                $_SESSION['$username'] = $username;  
                $_SESSION['$admin'] = $admin;  
                $_SESSION['name'] = $name;
                header('location: home.php');}
        } else {
            echo '<p id="erro">Email ou senha incorreta.</p>';
        }

        return $name;

    };
