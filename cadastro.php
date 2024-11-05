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
            <?php 
                include 'funcoes.php';
            ?>

            <h1>Cadastro</h1>
            <form method="POST">
                <label for="name">Nome:</label>
                <input type="text" class="input-submit" id="name" name="name" placeholder="Ex: João" minlength="3" required>
                <br><br>
                <label for="name">Sobrenome:</label>
                <input type="text" class="input-submit" id="name" name="last-name" placeholder="Ex: Pereira" minlength="3" required>
                <br><br>
                <label for="name">Usuário:</label>
                <input type="text" class="input-submit" id="name" name="usuario" placeholder="Ex: J_Pereira12 (Sem espaços)" minlength="3" pattern="[^ ]+" required>
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
                    <button type="submit" class="btf-default" name="submit">Cadastrar</button>
                </div>
            </form>

            

            <?php 
                if (isset($_POST['submit'])) {
                    $primeiroNome = $_POST['name'];
                    $sobrenome = $_POST['last-name'];
                        
                    $name = "$primeiroNome"." $sobrenome";

                    $username = $_POST['usuario'];
                    $email = $_POST['email'];
                    $senha = password_hash($_POST['password'], PASSWORD_DEFAULT);
                    $telefone = $_POST['phone'];
                    $post= cadastroUsuario($name, $username, $email, $senha, $telefone);

                    header('location: home.php');
                }
                
            ?>
            <br><br>
            <button onclick="voltarPagina()" class="butao-acao">
                <h2 class="titulo-acao">Voltar</h2>
            </button>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Federação Maranhense de Jogos de Dama. Todos os direitos reservados.</p>
        <p><a href="mailto:contato@federacaojogosdama.com.br">contato@federacaojogosdama.com.br</a></p>
    </footer>

</body>
</html>
