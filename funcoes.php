<?php 
    function cadastroUsuario($nome, $usuario, $email, $senha, $telefone) {
        include 'db.php';
        $inserirBd = "INSERT INTO usuarios (name, username, email, password, telefone) VALUES ('$nome', '$usuario', '$email', '$senha', '$telefone')";
        $PushBD = $conn -> query($inserirBd);       
        if ($PushBD == 1) {
            echo '<form id="redirectForm" action="home.php" method="POST">';
            echo '<input type="hidden" name="username" value="' . $username . '">';
            echo '<input type="hidden" name="name" value="' . $name . '">';
            echo '</form>';
            echo '<script>document.getElementById("redirectForm").submit();</script>';
        } else {
            echo 'Email, Usuário ou telefone já estão em uso.';
        }
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
            echo '<form id="redirectForm" action="home.php" method="POST">';
            echo '<input type="hidden" name="username" value="' . $username . '">';
            echo '<input type="hidden" name="admin" value="' . $admin . '">';
            echo '<input type="hidden" name="name" value="' . $name . '">';
            echo '</form>';
            echo '<script>document.getElementById("redirectForm").submit();</script>';
            exit(); 
            
        } else {
            echo '<p id="erro">Email ou senha incorreta.</p>';
        }

    };

    function jogadores($num){
        include 'db.php';
        $mostrarJogadores = "SELECT idusuario, name, username, partidas_jogadas, vitorias, torneios_ganhos, pontos FROM usuarios WHERE idusuario = $num";
        $PushBD = $conn -> query($mostrarJogadores);
        $resultado = $PushBD -> fetch_assoc();

        $name = $resultado['name'];
        $username = $resultado['username'];
        $pJ = $resultado['partidas_jogadas'];
        $vitorias = $resultado['vitorias'];
        $tG = $resultado['torneios_ganhos'];
        $pontos = $resultado['pontos'];
        $id = $resultado['idusuario'];

        return array($name, $username, $pJ, $vitorias, $tG, $pontos, $id);
    }

    function torneios($num){
        include 'db.php';
        $mostrarTorneios = "SELECT name, tabuleiro, data, local FROM torneios WHERE idtorneios = $num";
        $PushBD = $conn -> query($mostrarTorneios);
        $resultado = $PushBD -> fetch_assoc();

        $name = $resultado['name'];
        $tabuleiro = $resultado['tabuleiro'];
        $data = $resultado['data'];
        $local = $resultado['local'];

        return array($name, $tabuleiro, $data, $local);
    }

    function adicionarTorneios($nome, $tabuleiro, $data, $local){
        include 'db.php';
        $addTorneios = "INSERT INTO torneios (name, tabuleiro, data, local) VALUES ('$nome', '$tabuleiro', '$data', '$local')";
        $PushBD = $conn -> query($addTorneios);
    }

    function aumentarPartidas($id){
        include 'db.php';
        $aumentarP = "UPDATE usuarios SET partidas_jogadas = partidas_jogadas + 1 WHERE idusuario = $id";
    }