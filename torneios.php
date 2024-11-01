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
                    <a href="#">Home</a> <!-- Link para a página Home -->
            </ul>
            <button class="btf-default" onclick="redirectToLogin()">Oi!</button>
            <button id="mobile_btn">
                <i class="fa-solid fa-bars"></i>
            </button>
        </nav>
    </header>
    <main style="padding-top: 0;">
        <h1>Torneios</h1>
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
                        $torneios = ["Torneio 1", "Torneio 2", "Torneio 3", "Torneio 4"];
                        $tabuleiro = ["8x8", "10x10", "10x10", "8x8"];
                        $data = ["15 de março de 2024", "22 de março de 2024", "29 de março de 2024", "5 de abril de 2024"];
                        $localizacao= ["Centro Histórico", "UNDB", "Parque do bom menino", "Shopping da Ilha"];
            
                        array_multisort($data, SORT_DESC, $torneios, $tabuleiro, $data, $localizacao);
                        for ($i=0; $i < count($torneios); $i++) {
                            echo '
                            <tr>
                                <td>'.$torneios[$i].'</td>
                                <td>'.$tabuleiro[$i].'</td>
                                <td>'.$data[$i].'</td>
                                <td>'.$localizacao[$i].'</td>
                                <form action="pagamento.php" method="GET">
                                    <td class="celula-inscrever">
                                        <button class="button-inscrever" name="Torneio" value="'.$torneios[$i].'"><strong>Inscrever-se</strong></button>
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
