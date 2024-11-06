<?php 
    include 'db.php';
    include 'funcoes.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="src/styles/styles.css">
    <link rel="stylesheet" href="src/styles/header.css">
    <link rel="stylesheet" href="src/styles/stylesLogin.css">
    <link rel="shortcut icon" href="src/image/favicon.ico" type="image/x-icon">
    <title>FMJD</title>
</head>
<body>

    <!-- Header -->
    <header>
        <nav id="navbar">
            <div id="img--div">
                <img src="src/image/logo_bandeira_MA (1).png" alt="Logo Bandeira do Maranhão" width="70" height="50">
            </div>
            <ul id="nav_list">
                <li class="nav-item active">
                    <a>Home</a>
                </li>
                <li class="nav-item">
                    <a href="#about" class="scroll-link">Rank</a> <!-- Adicionando a classe scroll-link para rolagem suave -->
                </li>
                <li class="nav-item">
                    <a href="#tournaments" class="scroll-link">Torneios</a> <!-- Novo item Torneios -->
                </li>
                <li class="nav-item">
                    <a href="#noticias" class="scroll-link">Notícias</a> <!-- Novo item Torneios -->
                </li>
            </ul>
            <button class="btf-default">
                Oi!
            </button>
        </nav>
    </header>

    <!-- Main Section -->
    <main>

        <section id="home">
            <?php 
                $nome = $_POST['name'];
                echo '<h1>Bem Vindo';
                if ($nome != '') {
                    echo ", $nome";
                };
                echo '!</h1>';
            ?>
            <p>Aqui você pode ficar por dentro das últimas notícias da FMJD, além de se inscrever em torneios emocionantes e acompanhar o ranking atualizado dos jogadores. Mantenha-se informado sobre eventos importantes, novas competições e resultados, tudo em um só lugar. Participe ativamente da comunidade e esteja sempre um passo à frente!</p>
            
        </section>

        <!-- Seção Sobre Nós -->
        <section id="about" class="about-section">
            <h2>Rank</h2>
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
                                    }
                                     
                                }

                                for ($i=0; $i < 5; $i++) {
                    
                                    array_multisort($pontosJogador, SORT_DESC, $nomesJogadores, $usuariosJogadores, $partidasJogadas, $vitoriasJogador, $torneiosGanhos);

                                    echo '
                                    <tr>
                                        <th>'.($i + 1).'</th>
                                        <th>'.$nomesJogadores[$i].'</th>
                                        <th>'.$usuariosJogadores[$i].'</th>
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
            <a href="rank.php">
                <button class="butao-acao">
                    <h2 class="titulo-acao">Ver Todos</h2>
                </button>
            </a>
            <?php 
                $admin = $_POST['admin'];
                if ($admin == 1) {
                    echo '
                        <br><br>
                        <a href="rankadmin.php">
                            <button class="butao-acao">
                                <h2 class="titulo-acao">Atualizar rank</h2>
                            </button>
                        </a>
                    ';
                } 
            ?>
        </section>
                <!-- Seção Torneios -->
        <section id="tournaments" class="tournaments-section">
            <h2>Torneios</h2>
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

                        for ($i=0; $i < 4; $i++) {

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
                </tbody>
            </table>
        </div>
            <a href="torneios.php">
                <button class="butao-acao">
                    <h2 class="titulo-acao">Ver Todos</h2>
                </button>
            </a>
        <?php 
            $admin = $_POST['admin'];
            if ($admin == 1) {
                echo '
                    <br><br>
                    <a href="torneiosadmin.php">
                        <button class="butao-acao">
                            <h2 class="titulo-acao">Criar Torneio</h2>
                        </button>
                    </a>
                ';
            } 
        ?>
        </section>

    <section id="noticias" class="about-section">
        <h2>Noticias</h2>
        <div class="slider">
            <div class="slides">
                <div class="slide active">
                    <img src="src/image/Jogo de Dama (1)_page-0002.jpg" alt="Torneio 1">
                </div>
                <div class="slide">
                    <img src="src/image/Jogo de Dama (1)_page-0003.jpg" alt="Torneio 2">
                </div>
                <div class="slide">
                    <img src="src/image/Jogo de Dama (1)_page-0004.jpg" alt="Torneio 3">
                </div>
                <div class="slide">
                    <img src="src/image/Jogo de Dama (1)_page-0005.jpg" alt="Torneio 4">
                </div>
                <div class="slide">
                    <img src="src/image/Jogo de Dama (1)_page-0006.jpg" alt="Torneio 5">
                </div>
                <div class="slide">
                    <img src="src/image/Jogo de Dama (1)_page-0007.jpg" alt="Torneio 6">
                </div>
                <div class="slide">
                    <img src="src/image/Jogo de Dama (1)_page-0012.jpg" alt="Torneio 7">
                </div>
            </div>
            <!-- Controls for the slider -->
            <div class="controls">
                <span class="dot active" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
                <span class="dot" onclick="currentSlide(3)"></span>
                <span class="dot" onclick="currentSlide(4)"></span>
                <span class="dot" onclick="currentSlide(5)"></span>
                <span class="dot" onclick="currentSlide(6)"></span>
                <span class="dot" onclick="currentSlide(7)"></span>
            </div>
        </div>
        <?php 
            $admin = $_POST['admin'];
            if ($admin == 1) {
                echo '
                    <br><br>
                    <button class="butao-acao">
                        <h2 class="titulo-acao">Nova notícia</h2>
                    </button>
                ';
            } 
        ?>
    </section>

    <section>
        <a href="index.html">
            <button class="butao-acao">
                <h2 class="titulo-acao">Sair</h2>
            </button>
        </a>
    </section>
    </main>
    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Federação Maranhense de Jogos de Dama. Todos os direitos reservados.</p>
        <p><a href="mailto:contato@federacaojogosdama.com.br">contato@federacaojogosdama.com.br</a></p>
    </footer>

    <!-- Script para redirecionar -->
    <script>
        function redirectToLogin() {
            window.location.href = "login.php";  // Redireciona para a página de login
        }

        // Efeito de rolagem suave
        document.querySelectorAll('.scroll-link').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>

    <script src="src/javascript/script.js"></script>

    <script src="src/javascript/script.js"></script>
        
</body>
</html>
