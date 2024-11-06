<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/styles/styles.css">
    <link rel="stylesheet" href="src/styles/header.css">
    <link rel="shortcut icon" href="src/image/favicon.ico" type="image/x-icon">
    <title>Rank</title>
</head>
<body>
    <header>
        <nav id="navbar">
            <div id="img--div">
                <img src="src/image/logo_bandeira_MA (1).png" alt="Logo Bandeira do Maranhão" width="70" height="50">
            </div>
            <ul id="nav_list">
                <li class="nav-item">
                    <a href="home.php">Home</a> 
            </ul>
            <button class="btf-default" onclick="redirectToLogin()">Oi!</button>
            <button id="mobile_btn">
                <i class="fa-solid fa-bars"></i>
            </button>
        </nav>
    </header>
    <main style="padding-top: 0;">
        <h1>Rank</h1>
        <div id="tabela-responsiva">
        <div id="tabela-responsiva">
                <table>
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Nome</th>
                            <th>Usuário</th>
                            <th>Partidas Jogadas</th>
                            <th>Vitórias</th>
                            <th>Torneio Ganhos</th>
                            <th>Pontos</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php
                                include 'db.php';
                                include 'funcoes.php';

                                $idJogadores = [];
                                $nomesJogadores = [];
                                $usuariosJogadores = [];
                                $partidasJogadas = [];
                                $vitoriasJogador = [];
                                $torneiosGanhos = [];
                                $pontosJogador = [];


                                for ($i=0; $i < 1000; $i++) { 
                                    $jogadores = jogadores($i);
                                    if ($jogadores[0] != '') {
                                        $nomesJogadores[$i] = $jogadores[0];
                                        $usuariosJogadores[$i] = $jogadores[1];
                                        $partidasJogadas[$i] = $jogadores[2];
                                        $vitoriasJogador[$i] = $jogadores[3];
                                        $torneiosGanhos[$i] = $jogadores[4];
                                        $pontosJogador[$i] = $jogadores[5];
                                        $idJogadores[$i] = $jogadores[6];
                                    }
                                     
                                }

                                for ($i=0; $i < count($nomesJogadores); $i++) {
                    
                                    array_multisort($pontosJogador, SORT_DESC, $nomesJogadores, $usuariosJogadores, $partidasJogadas, $vitoriasJogador, $torneiosGanhos);

                                    

                                    echo '
                                    <tr>
                                        <th>'.($i + 1).'</th>
                                        <th>'.$nomesJogadores[$i].'</th>
                                        <th>'.$usuariosJogadores[$i].'</th>
                                        <th>
                                        <div class="thmutavel">
                                             <form action="" method="POST">
                                                 <input type="button" onclick="diminuirPartidas()" value="-" class="inputadm">
                                                '.$partidasJogadas[$i].'<input type="button" name="'.$idJogadores[$i].'" value="+" class="inputadm">
                                             </form>
                                        </div>
                                        </th>
                                        <th>
                                        <div class="thmutavel">
                                             <form action="">
                                                 <input type="button" onclick="diminuirVitorias()" value="-" class="inputadm">'
                                                .$vitoriasJogador[$i]. '<input type="button" onclick="aumentarVitorias()" value="+" class="inputadm">
                                             </form>
                                            
                                        </div>
                                        </th>
                                        <th>
                                        <div class="thmutavel">
                                             <form action="">
                                                 <input type="button" onclick="diminuirTorneiosGanhos()" value="-" class="inputadm">'
                                                .$torneiosGanhos[$i]. '<input type="button" onclick="aumentarTorneiosGanhos()" value="+" class="inputadm">
                                             </form>
                                        </div>
                                        </th>
                                        <th>'.$pontosJogador[$i].'</th>
                                    <tr>
                                    ';
                                }
                            ?>

                            
                            
                            

                    </tbody>
                </table>
        </div>
        <script>
            function voltarPagina() {
                history.back();
            }
        </script>
        <a href="home.php">
            <button class="butao-acao">
                <h2 class="titulo-acao">Voltar</h2>
            </button>
        </a>
    </main>
    <footer>
        <p>&copy; 2024 Federação Maranhense de Jogos de Dama. Todos os direitos reservados.</p>
        <p><a href="mailto:contato@federacaojogosdama.com.br">contato@federacaojogosdama.com.br</a></p>
    </footer>

</body>
</html>
