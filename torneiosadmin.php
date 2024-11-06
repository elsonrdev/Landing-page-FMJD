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
    <script>
        function formatarData(input) {
            let valor = input.value.replace(/\D/g, '');     
            
            if (valor.length > 8) {
                valor = valor.substring(0, 8);
            }
            if (valor.length > 4) {

                valor = valor.replace(/(\d{2})(\d{2})(\d{4})/, '$1/$2/$3');
            } else if (valor.length > 2) {

                valor = valor.replace(/(\d{2})(\d{2})/, '$1/$2');
            }
        
            input.value = valor;
        }
    </script>
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
        <h2 style="color: #ffcb45;">Criar Torneio</h2>
        <br>
        <form method="post">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" class="input-submit">
            <br><br>
            <label for="tabuleiro">Tabuleiro: (10x10 ou 8x8)</label>
            <input type="text" name="tabuleiro" class="input-submit">
            <br><br>
            <label for="data">Data: (DD/MM/AAAA)</label>
            <input type="text" name="data" class="input-submit" maxlength="10" oninput="formatarData(this)">
            <br><br>
            <label for="local">Local:</label>
            <input type="text" name="local" class="input-submit">
            <br><br>
            <div class="button--submit">
                <button type="submit" class="btf-default" name="submit">Adicionar Torneio</button>
            </div>
        </form>
        <br><br>
        <h1>Torneios</h1>
        <?php 
            if (isset($_POST['submit'])) {
                $nome = $_POST['nome'];
                $tabuleiro = $_POST['tabuleiro'];

                $dataArray = explode('/', $_POST['data']);
                $dataFormatadaSQL = "$dataArray[2]-$dataArray[1]-$dataArray[0]";

                $data = $dataFormatadaSQL;
                $local = $_POST['local'];

                $executar = adicionarTorneios($nome, $tabuleiro, $dataFormatadaSQL, $local);
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

                        if (isset($_POST['cancelar_torneio'])) {
                            $torneioNome = $_POST['cancelar_torneio'];
                            cancelarTorneio($torneioNome);  
                        }

                        for ($i=0; $i < count($torneio); $i++) {

                            array_multisort($data, SORT_ASC, $torneio, $tabuleiro, $local);

                            $dataArray = explode('-', $data[$i]);
                            $dataFormatada = "$dataArray[2]/$dataArray[1]/$dataArray[0]";

                            echo '
                            <tr>
                                <td><strong>'.$torneio[$i].'</strong></td>
                                <td>'.$tabuleiro[$i].'</td>
                                <td>'.$dataFormatada.'</td>
                                <td>'.$local[$i].'</td>
                                <form method="POST">
                                    <td class="celula-inscrever">
                                        <div class="button--submit">
                                            <input type="hidden" name="cancelar_torneio" value="'.$torneio[$i].'">
                                            <button type="submit" class="btf-default">Cancelar Torneio</button>
                                        </div></label>    
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
