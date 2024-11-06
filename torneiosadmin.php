<?php 
    include 'funcoes.php'
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/styles/styles.css">
    <link rel="stylesheet" href="src/styles/header.css">
    <link rel="shortcut icon" href="src/image/favicon.ico" type="image/x-icon">
    <title>Torneios</title>
</head>
<body>
    <header>
        <nav id="navbar">
            <div id="img--div">
                <img src="src/image/logo_bandeira_MA (1).png" alt="Logo Bandeira do Maranhão" width="70" height="50">
            </div>
            <ul id="nav_list">
                <li class="nav-item">
                    <a href="home.php">Home</a> <!-- Link para a página Home -->
            </ul>
            <button class="btf-default" onclick="redirectToLogin()">Oi!</button>
            <button id="mobile_btn">
                <i class="fa-solid fa-bars"></i>
            </button>
        </nav>
    </header>
    <main style="padding-top: 0;">
        <h1>Torneios</h1>
        <form method="post">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" class="input-submit">
            <label for="tabuleiro">Tabuleiro: (10x10 ou 8x8)</label>
            <input type="text" name="tabuleiro" class="input-submit">
            <label for="data">Data: (AAAA-MM-DD)</label>
            <input type="text" name="data" class="input-submit">
            <label for="local">Local:</label>
            <input type="text" name="local" class="input-submit">
            <br><br>
            <div class="button--submit">
                <button type="submit" class="btf-default" name="submit">Adicionar Torneio</button>
            </div>
        </form>

        <?php 
            if (isset($_POST['submit'])) {
                $nome = $_POST['nome'];
                $tabuleiro = $_POST['tabuleiro'];
                $data = $_POST['data'];
                $local = $_POST['local'];

                $executar = adicionarTorneios($nome, $tabuleiro, $data, $local);
            }
        ?>

        <div id="tabela-responsiva">
            <table>
                <thead>
                    <tr>
                        <th>Torneio</th>
                        <th>Tabuleiro</th>
                        <th>Data</th>
                        <th>Local</th>
                        <th>Inscrição</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                        $torneio = [];
                        $tabuleiro = [];
                        $data = [];
                        $local = [];

                        for ($i=0; $i < 500; $i++) { 
                            $torneios = torneios($i);
                            if ($torneios[0] != '') {
                                $torneio[$i] = $torneios[0];
                                $tabuleiro[$i] = $torneios[1];
                                $data[$i] = $torneios[2];
                                $local[$i] = $torneios[3];
                            }
                             
                        }

                        for ($i=0; $i < count($torneio); $i++) {

                            array_multisort($torneio, SORT_ASC, $data, $tabuleiro, $local);

                            echo '
                            <tr>
                                <td>'.$torneio[$i].'</td>
                                <td>'.$tabuleiro[$i].'</td>
                                <td>'.$data[$i].'</td>
                                <td>'.$local[$i].'</td>
                                <form action="pagamento.php" method="GET">
                                    <td class="celula-inscrever">
                                        <button class="button-inscrever" name="Torneio" value="'.$torneio[$i].'"><strong>Inscrever-se</strong></button>
                                    </td>
                                </form>
                            </tr>
                            ';
                        }
                    ?>
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
