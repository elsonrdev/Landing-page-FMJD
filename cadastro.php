<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/styles/styles.css">
    <link rel="stylesheet" href="src/styles/header.css">
    <link rel="shortcut icon" href="src/image/favicon.ico" type="image/x-icon">
    <title>Cadastro</title>
    <script>
        function formatarCPF(cpf) {
            cpf = cpf.replace(/\D/g, ''); // Remove tudo que não é número
            if (cpf.length > 11) {
                cpf = cpf.substring(0, 11); // Limita a 11 caracteres
            }
            // Aplica a formatação
            return cpf.replace(/(\d{3})(\d)/, '$1.$2')
                    .replace(/(\d{3})(\d)/, '$1.$2')
                    .replace(/(\d{3})(\d)/, '$1-$2');
        }

        function formatarTelefone(telefone) {
            telefone = telefone.replace(/\D/g, ''); // Remove tudo que não é número
            if (telefone.length > 11) {
                telefone = telefone.substring(0, 11); // Limita a 11 caracteres
            }
            if (telefone.length > 10) {
                return telefone.replace(/(\d{2})(\d{5})(\d)/, '($1) $2-$3');
            } else {
                return telefone.replace(/(\d{2})(\d)/, '($1) $2').replace(/(\d{5})(\d)/, '$1-$2');
            }
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
                <input type="text" class="input-submit" id="name" name="name" placeholder="Ex: João da Silva" minlength="3" required>
                <br><br>
                <label for="cpf">CPF:</label>
                <input type="tel" class="input-submit" id="cpf" name="cpf" placeholder="Ex: 123.456.789-00" minlength="14" maxlength="14" oninput="this.value = formatarCPF(this.value)" required>
                <br><br>
                <label for="email">E-mail:</label>
                <input type="email" class="input-submit" id="email" name="email" placeholder="Ex: seuemail@exemplo.com" required>
                <br><br>
                <label for="password">Senha:</label>
                <input type="password" class="input-submit" id="password" name="password" placeholder="Mínimo 8 caracteres" minlength="8" required>
                <br><br>
                <label for="phone">Número de Telefone:</label>
                <input type="tel" class="input-submit" id="phone" name="phone" placeholder="Ex: (98) 91234-5678" minlength="14" maxlength="15" oninput="this.value = formatarTelefone(this.value)" required>
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
