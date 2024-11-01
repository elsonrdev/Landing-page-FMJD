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
                    <a href="#">Home</a> 
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
            <table>
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Nome</th>
                            <th>Partidas Jogadas</th>
                            <th>Vitórias</th>
                            <th>Torneio Ganhos</th>
                            <th>Pontos</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $nomeJogador = ["Gabriel Almeida", "Ana Paula", "Lucas Silva", "Mariana Costa", "Felipe Santos", "JulianOliveira", "Ricardo Mendes", "Fernanda Lima", "Pedro Henrique", "Tatiane Rocha"];
                            $partidasJogadas = [20, 18, 25, 22, 19, 21, 17, 23, 16, 20];
                            $vitoriasJogador = [15, 12, 18, 14, 11, 16, 9, 20, 10, 13];
                            $torneiosGanhos = [5, 3, 7, 4, 2, 5, 1, 6, 3, 4];
                            $pontosJogador = [45, 36, 54, 42, 33, 48, 27, 60, 30, 39];
            
                            array_multisort($pontosJogador, SORT_DESC, $nomeJogador, $partidasJogadas, $vitoriasJogador, $torneiosGanhos, $pontosJogador);
                            for ($i=0; $i < count($nomeJogador); $i++) {
                            echo '
                            <tr>
                                <th>'.($i + 1).'</th>
                                <th>'.$nomeJogador[$i].'</th>
                                <th>'.$partidasJogadas[$i].'</th>
                                <th>'.$vitoriasJogador[$i].'</th>
                                <th>'.$torneiosGanhos[$i].'</th>
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
        <button onclick="voltarPagina()" class="butao-acao">
            <h2 class="titulo-acao">Voltar</h2>
        </button>
    </main>
    <footer>
        <p>&copy; 2024 Federação Maranhense de Jogos de Dama. Todos os direitos reservados.</p>
        <p><a href="mailto:contato@federacaojogosdama.com.br">contato@federacaojogosdama.com.br</a></p>
    </footer>

</body>
</html>
