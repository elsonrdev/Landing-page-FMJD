<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/styles/styles.css">
    <link rel="stylesheet" href="src/styles/header.css">
    <link rel="shortcut icon" href="src/image/favicon.ico" type="image/x-icon">
    <title>Pagamento</title>
    <script>
        function copiarTexto() {
            const paragrafo = document.getElementById("link");
            const range = document.createRange();
            range.selectNode(paragrafo);
            window.getSelection().removeAllRanges(); 
            window.getSelection().addRange(range); 
            document.execCommand("copy"); 
            window.getSelection().removeAllRanges(); 
            alert("Texto copiado para a área de transferência!");
        }
        
        function voltarPagina() {
            history.back();
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
        <?php 
            $torneioNome = $_GET['Torneio'];
        ?>
        <h1>Faça o pagamento!</h1>
        <h2 style="color: #ffcb45;"><?=$torneioNome?></h2>
        <img src="src/image/qrcode.svg" alt="" height="250px" style="margin: 20px 20px 30px">
        <h2>Link:</h2>
        <p id="link">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Alias, culpa quos exercitationem consectetur tempore nobis, in debitis sequi maxime quidem harum quam magni consequatur incidunt ad pariatur ipsa cumque nesciunt.
        </p>
        <button onclick="copiarTexto()" class="butao-acao" style="padding: 15px; margin-top: 20px; cursor: pointer;">
            <h2>Copiar Texto</h2>
        </button>
        <br>
        

        <button onclick="voltarPagina()" class="butao-acao" style="margin-top: 50px;">
            <h2 class="titulo-acao">Voltar</h2>
        </button>
    </main>
    <footer>
        <p>&copy; 2024 Federação Maranhense de Jogos de Dama. Todos os direitos reservados.</p>
        <p><a href="mailto:contato@federacaojogosdama.com.br">contato@federacaojogosdama.com.br</a></p>
    </footer>
</body>
</html>
