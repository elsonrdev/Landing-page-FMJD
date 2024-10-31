<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/styles/styles.css">
    <link rel="stylesheet" href="src/styles/header.css">
    <link rel="shortcut icon" href="src/image/favicon.ico" type="image/x-icon">
    <title>Cadastro</title>
</head>
<body>
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
        <section id="cadastro">
            <h1>Cadastro</h1>
            <form action="home.php" method="POST">
                <label for="name">Nome Completo:</label>
                <input type="text" id="name" name="name" required>
                <br><br>
                <label for="cpf">CPF:</label>
                <input type="tel" id="cpf" name="cpf" required>
                <br><br>
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" required>
                <br><br>
                <label for="password">Senha:</label>
                <input type="password" id="password" name="password" required>
                <br><br>
                <label for="phone">Número de Telefone:</label>
                <input type="tel" id="phone" name="phone" required>
                <br><br>
                <div class="button--submit">
                    <button type="submit" class="btf-default">Cadastrar</button>
                </div>
            </form>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Federação Maranhense de Jogos de Dama. Todos os direitos reservados.</p>
        <p><a href="mailto:contato@federacaojogosdama.com.br">contato@federacaojogosdama.com.br</a></p>
    </footer>

</body>
</html>