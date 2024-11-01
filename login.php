<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/styles/styles.css">
    <link rel="stylesheet" href="src/styles/header.css">
    <link rel="shortcut icon" href="src/image/favicon.ico" type="image/x-icon">
    <title>Login</title>
</head>
<body>
    
    <!-- Header -->
    <header>
        <nav id="navbar">
            <div id="img--div">
                <img src="src/image/logo_bandeira_MA (1).png" alt="Logo Bandeira do Maranhão" width="70" height="50">
            </div>
            <ul id="nav_list">
                <li class="nav-item">
                    <a href="index.html">Home</a> <!-- Link para a página Home -->
            </ul>
            <button class="btf-default" onclick="redirectToLogin()">Torne-se membro!</button>
            <button id="mobile_btn">
                <i class="fa-solid fa-bars"></i>
            </button>
        </nav>
    </header>

    <main>
        <section id="login">
            <h1>Login</h1>
            <form name="form" action="home.php" method="POST">
                <label for="email">E-mail:</label>
                <input type="email" class="input-submit" id="email" name="email" required>
                <br><br>
                <label for="password">Senha:</label>
                <input type="password" class="input-submit" id="password" name="password" required>
                <br><br>
                <div class="button--submit">
                    <button type="submit" class="btf-default">Entrar</button>
                </div>
            </form>
            <!--<br> retirado por caio-->
            <div class="button--submit">
                <button class="btf-default" onclick="redirectToRegister()">Realizar Cadastro</button>
            </div>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Federação Maranhense de Jogos de Dama. Todos os direitos reservados.</p>
        <p><a href="mailto:contato@federacaojogosdama.com.br">contato@federacaojogosdama.com.br</a></p>
    </footer>

    <!-- Script para redirecionar -->
    <script>
        function redirectToRegister() {
            window.location.href = "cadastro.php";  // Direciona para a página de cadastro
        }

        function redirectToLogin() {
            window.location.href = "login.php";  // Redireciona para a página de login
        }
    </script>

</body>
</html>

