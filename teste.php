<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        $host = 'localhost'; // Use 'localhost' para XAMPP
        $usuario = 'root'; // Usuário padrão no XAMPP
        $senha = ''; // Senha vazia por padrão
        $banco = 'u661331863_bd_fmjd'; // Nome do seu banco de dados
        
        // Criar conexão

        $conn = new mysqli($host, $usuario, $senha, $banco);

        // Verificar conexão
        if ($conn->connect_error) {
            die("Erro na conexão: " . $conn->connect_error);
        }

        // Consulta para selecionar os dados
        $sql = "SELECT * FROM usuarios";
        $result = $conn->query($sql);

        // Verificar se há resultados
        if ($result->num_rows > 0) {
            // Exibir dados em uma tabela HTML
            echo "<table border='1'>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Telefone</th>
                    </tr>";
            // Saída de dados de cada linha
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["id"] . "</td>
                        <td>" . $row["name"] . "</td>
                        <td>" . $row["username"] . "</td>
                        <td>" . $row["email"] . "</td>
                        <td>" . $row["telefone"] . "</td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "0 resultados";
        }

        // Fechar a conexão
        $conn->close();


        $email = $_POST['email'];
        $senha = $_POST['password'];
        echo 'Olá Caio'
    ?>
</body>
</html>