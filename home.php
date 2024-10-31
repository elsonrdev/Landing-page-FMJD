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
    <title>Landing Page - FMJD</title>
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
                    <a href="#">Home</a>
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
                echo '<h1>Bem Vindo, '.$nome.'!</h1>';
            ?>
            <p>Aqui você pode ficar por dentro das últimas notícias da FMJD, além de se inscrever em torneios emocionantes e acompanhar o ranking atualizado dos jogadores. Mantenha-se informado sobre eventos importantes, novas competições e resultados, tudo em um só lugar. Participe ativamente da comunidade e esteja sempre um passo à frente!</p>
            
        </section>

        <!-- Seção Sobre Nós -->
        <section id="about" class="about-section">
            <h2>Rank</h2>
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
                                $nomeJogador = ["Gabriel Almeida", "Ana Paula", "Lucas Silva", "Mariana Costa", "Felipe Santos", "Juliana Oliveira", "Ricardo Mendes", "Fernanda Lima", "Pedro Henrique", "Tatiane Rocha"];
                                $partidasJogadas = [20, 18, 25, 22, 19, 21, 17, 23, 16, 20];                                
                                $vitoriasJogador = [15, 12, 18, 14, 11, 16, 9, 20, 10, 13];                                
                                $torneiosGanhos = [5, 3, 7, 4, 2, 5, 1, 6, 3, 4];                              
                                $pontosJogador = [45, 36, 54, 42, 33, 48, 27, 60, 30, 39];
                                
                                array_multisort($pontosJogador, SORT_DESC, $nomeJogador, $partidasJogadas, $vitoriasJogador, $torneiosGanhos, $pontosJogador);


                                for ($i=0; $i < 5; $i++) { 
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
                <a href="rank.php">
                    <button class="butao-acao">
                        <h2 class="titulo-acao">Ver Todos</h2>
                    </button>
                </a>
        </section>

                <!-- Seção Torneios -->
        <section id="tournaments" class="tournaments-section">
            <h2>Torneios</h2>
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


                    for ($i=0; $i < 4; $i++) { 
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
            <a href="torneios.php">
                <button class="butao-acao">
                    <h2 class="titulo-acao">Ver Todos</h2>
                </button>
            </a>
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
